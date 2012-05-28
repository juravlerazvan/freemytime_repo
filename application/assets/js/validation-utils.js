// Utility method to valid the e-mail format.
function validateEmail(elementValue){
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9][a-zA-Z0-9.-]+[\.]{1}[a-zA-Z]{2,4}$/;
    return emailPattern.test(elementValue);
}

// Validate form when new task submitted
function addNewTaskFormValidation(status) {
    
    var taskStatus = status;
    var title = $('#task_title').val();
    var description = $('#task_description').val();
    var budget = $('#task_budget').val();
    var address = $('#task_address').val();
    var validity = $('#task_validity').val();
    var digitRegex = /\D/g;
    var errorFlag = 0;
    
    $('#task_title_error').empty();
    $('#task_description_error').empty();
    $('#task_budget_error').empty();
    $('#task_address_error').empty();
    $('#task_validity_error').empty();
    

    if(title == null || title == "" || title.length < 5) {
        errorFlag++;
        $('#task_title_error').text('More than 5 letters');
    }
    
    if(description == null || description == "" || description.length < 20) {
        errorFlag++;
        $('#task_description_error').text('More than 20 letters');
    }
        
    if(budget == null || budget == "" || digitRegex.test(budget) == true) {
        errorFlag++;
        $('#task_budget_error').text('Your budget');
    }

    if(address == null || address == "" || address.length < 5) {
        errorFlag++;
        $('#task_address_error').text('Is this valid?');
    }

    if(validity == null || validity == "" || digitRegex.test(validity) == true) {
        errorFlag++;
        $('#task_validity_error').text('A number please');
    }

    if(errorFlag == 0) {
        create_task(taskStatus);
    }
}