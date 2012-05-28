    <tr>
        <td colspan="6" style="text-align: center; color: black;"> 
            <input type="hidden" name="currPageNo" id="currPageNo" value="1" />
            <?php
            $pages_no = $result_pages_no;
            if ($pages_no > 1) {
                echo '<ul id="pagination-flickr" style="margin-left: 21%">';
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