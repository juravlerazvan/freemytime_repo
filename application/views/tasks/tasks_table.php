<table border="0" class="tasks_table" style="float: left; width: 600px; margin: 0; padding: 0" id="tasks_table">
    <thead>
    <th>&nbsp;ID&nbsp;</th>
    <th>Title &nbsp;&nbsp;&nbsp;</th>
    <th>Location &nbsp;&nbsp;&nbsp;</th>
    <th>Bidders &nbsp;&nbsp;&nbsp;</th>
    <th>Average bid &nbsp;&nbsp;&nbsp;</th>
    <th>Expires on &nbsp;&nbsp;&nbsp;</th>
    <th></th>
</thead>
<tbody>     
    <?php
    for ($data_index = 0; $data_index < sizeof($data); $data_index++) {
        echo '
                    <tr style="border-bottom-style: dotted;border-width: 1px; border-color: gray" onmouseover="$(this).css(\'background-color\', \'#CCFFCC\')" onmouseout="$(this).css(\'background-color\', \'\')">
                    <td>' . $data[$data_index]->task_id. '.</td>                    
                    <td>' . $data[$data_index]->title . '</td>
                    <td>' . $data[$data_index]->address . '</td>
                    <td>N/A</td>
                    <td>0.0 $</td>
                    <td>' . date('Y-m-d', strtotime($data[$data_index]->expiration_date)) . '</td>
                    <td><input type="button" class="button_low" value="Details" style="margin: 10px auto 10px 30px;" onclick=document.location="' . base_url() . 'index.php/view-task-details-' . $data[$data_index]->task_id . '" /></td>
                </tr>';
    }
    ?>
    <tr>
        <td colspan="7"></td>
    </tr>
    <tr>
        <td colspan="7" style="text-align: center; color: black;"> 
            <input type="hidden" name="currPageNo" id="currPageNo" value="1" />
            <?php
            $pages_no = $result_pages_no;
            if ($pages_no > 1) {
                echo '<ul id="pagination-flickr">';
                if ($pages_no > 5) {
                    echo '<li class="previous-off" onclick="getTasksTable(' . ($pages_no) . ')"><a href="#">Previous</a></li>';
                }
                if ($pages_no > 0) {
                    $page = 0;
                    while ($page < (($pages_no <= 3) ? $pages_no : 3)) {
                        $page++;
                        echo '<li onclick="getTasksTable(' . ($page) . ')"><a href="#">' . $page . '</a></li>';
                    }
                    if ($pages_no > 5) {
                        echo '<li><a href="#"> ... </a></li>';
                        echo '<li onclick="getTasksTable(' . ($result_pages_no - 1) . ')"><a href="#">' . ($result_pages_no - 1) . '</a></li>';
                        echo '<li onclick="getTasksTable(' . ($pages_no) . ')"><a href="#">' . ($result_pages_no) . '</a></li>';
                        echo '<li class="next" onclick="getTasksTable(' . ($pages_no) . ')"><a href="#">Next</a></li>';
                    }
                }
                echo '</ul>';
            }
            ?>
        </td>
    </tr>
</tbody>
</table>