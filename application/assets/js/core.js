/*
 * Core javascript functions of FreeMyTime platform. Depends on jQuery framework.
 * The principle of its implmentation is: an event triggers a javascript method,
 * then that metod calls  "backendAjaxActionManager" core method that manages the ajax call.
 * Also "backendAjaxActionManager" method uses "getSerializedFormParams" to get all
 * field id's parameters values.
 */


/*
 * Returns a serialized object containing form values.
 */
function getSerializedFormParams(formId) {
    var form = formId;
    var serializedParams = $("#" + form).serialize();
    return serializedParams;
}


/* 
 * Backend ajax call action manager. Makes an AJAX call to a desired
 * controller and passes as parameter a serialized form.    
 * Input params:
 * @paramsFormId - the form id wich contains all the needed fields to be submited
 * @customParams - other params to be sent not only that are contained in the form
 * @controllerUrl - the application controller url were the action will be posted
 * @callbackFunction - callback function to be executed after action has been posted.
 */
function backendAjaxActionManager(paramsFormId, controllerUrl, customParams, callbackFunction) {
    $(document).ready(function() {
        var formId = paramsFormId;
        var backendUrl = controllerUrl;
        var custParams = customParams;
        var params = getSerializedFormParams(formId);
        var callbackFunc = callbackFunction;

        if(params === null || params == "") {
            params = "";
        }

        /*
         * Check if we supplied custom params and send them to the application controller.
         */
        if(custParams != null && custParams !== "") {
            params += "&" + custParams;
        }
    
        // make the AJAX call
        $.ajax({
            type: 'POST',
            cache: false,
            url: backendUrl,
            data: params,
            success: function(data){
                if(callbackFunc != "" || callbackFunc != null) {
                    window[callbackFunction](data);
                }
            }
        });
    });
}


/*
     * Method used to send contact message.
     */
function sendMessage() {
    $(document).ready(function() {
        var name = $('#name').val();
        var email = $('#email').val();
        var message = $('#message').val();

        if(name == '' || email == '' || message == '') {
            $('#sending_status').addClass("error_message_big")
            $('#sending_status').fadeIn('fast');
            $('#sending_status').html('Please fill in all fields!<br><br>');
            $('#sending_status').fadeOut(3500);
        }
        else if(!validateEmail(email)) {
            $('#email').before('<span class="error_message_small">Incorrect e-mail format.</span><br/>');
        }
        else {
            backendAjaxActionManager("contactForm", "contact/send_message", "", "confirmSendingMessage");
        }
    });
}

// Utility method to confirm that contact message was sent.
function confirmSendingMessage(data) {
    $("#name").val('');
    $("#email").val('');
    $("#message").val('');

    $('#sending_status').css({
        'color': 'green',
        'font-weight': 'bold',
        'font-size': '16px'
    });
    $('#sending_status').html(data);
    $('#sendButton').hide();
    $('#resetButton').hide();
}



// Method used to publish/save a task.
function create_task(taskStatus) {
    var status = taskStatus;
    if(status == "" || status == null) {
        status = "draft";
    }
    backendAjaxActionManager("add_task_form", "task/create_task", "task_status=" + status, "confirmPublishedTask");
}

function confirmPublishedTask(data) {
    $('#confirm_publishing').html(data);
    $('#content').hide();
}


function clearSearchFilter() {
    $('#filter_form').each(function(){
        this.reset();
    });
    getTasksTable();
}



// Get tasks table on page load or when filter is applied
function getTasksTable(pageNumber) {
    var pageNo = 1;
    var offset = 0;
    if(pageNumber!= null && pageNumber > 1) {
        pageNo = pageNumber;
        offset = (pageNo-1)*$('#results_per_page').val()+1;
    }
    backendAjaxActionManager("filter_form", "task/get_tasks_table", "offset=" + offset + "&pageNo=" + pageNo, "showTasksTable");
}


// Attach data from "getTasksTable" ajax response to a div placeholder
function showTasksTable(data) {
    $('#task_table_placeholder').empty();
    $('#task_table_placeholder').html(data);
}


// initializes map params and flags on map
function initialize_map() {
    
    var myOptions = {
        zoom: 3,
        center: new google.maps.LatLng(0, 0),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    
    map = new google.maps.Map(document.getElementById("map_canvas"),
        myOptions);
        
    // Check for geolocation support to get user location an re-center map to his zone
    if (navigator.geolocation) {        
        navigator.geolocation.getCurrentPosition(currentPositionCallback, userLocationErrorCallback);
    } else {
        alert('Your browser does not support geolocation, please upgrade to a newer version.');
    }
}

function userLocationErrorCallback (err) {
    switch(err.code) {
        case 1:
            alert("Sorry, but this application does not have the permission to use geolocation");
            break;
        case 2:
            alert("Sorry, but a problem happened while getting your location");
            break;
        case 3:
            alert("Sorry, this is taking too long...");
            break;
        default:
            alert("unknown");
    }
}

function currentPositionCallback(position) {
    
    var base_url = "http://localhost/freemytime/";
    
    // Create a new latlng based on the latitude and longitude from the user's position
    var user_lat_long = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

    // Add a marker using the tasks lat_long position    
    var marker = new google.maps.Marker({
        position: user_lat_long,
        map: map,
        icon: base_url + "application/assets/images/home.png",
        title: "Your location"
    });
    

    // Add tasks markers  
    geocoder = new google.maps.Geocoder();
    $.ajax({
        type: "POST",
        cache: false,
        url: base_url + "index.php/task/show_task_on_map",
        beforeSend: function(x) {
            if(x && x.overrideMimeType) {
                x.overrideMimeType("application/j-son;charset=UTF-8");
            }
        },
        dataType: "json",
        success: function(data){
            var tasks = new Array();
            tasks = data;            
            if(tasks != null && tasks.length > 0) {
                for(var paramIndex = 0; paramIndex < tasks.length; paramIndex++)  {
                    var title = "";
                    title = tasks[paramIndex].title;
                    taskDetailsURL = base_url + "index.php/view-task-details-" + tasks[paramIndex].task_id
                    geocoder.geocode({
                        'address': tasks[paramIndex].address
                    }, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {                            
                            var marker = new google.maps.Marker({
                                position: results[0].geometry.location,
                                map: map,
                                title: title
                            });
                            google.maps.event.addListener(marker, "click", function() {
                                document.location = taskDetailsURL;
                            }); 
                        }
                    });
                }
            }
        }
    });
    
    // Set the center of the map to the user's position and zomm into a more detailed level
    map.setCenter(user_lat_long);
    map.setZoom(6);
}