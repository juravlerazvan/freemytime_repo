<br><br><br>
<section id="content">
    <article class="col1 pad_left1">
        <h2><?php echo $page_title ?></h2>
        <div id="task_table_placeholder"></div>
    </article>

    <!-- FILTERING SECTION -->

    <article class="col2 pad_left2" style="float: right; width: 300px">
        <div class="box1">
            <div class="inner">
                <div class="pad">
                    <div class="wrapper">
                        <p class="font1" style="color: black"><b>Filter tasks</b></p>
                        <br>
                        <form id="filter_form">
                            <table border="0" style="width:auto">
                                <tbody>
                                    <tr>
                                        <td>Category</td>
                                        <td><select name="filter_category" style="margin-left:25px; border: 1px solid #767676; width: 140px">
                                                <option value="all" selected="selected">All categories</option>
                                                <?php
                                                foreach ($categories as $category) {
                                                    echo '<option value="' . $category->cat_id . '">' . $category->category . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td><input type="text" name="filter_description" value="" style="margin-left:25px; border: 1px solid #767676; width: 140px" /></td>
                                    </tr>
                                    <tr>
                                        <td>Budget</td>
                                        <td><input type="text" name="filter_budget" value="" style="margin-left:25px; border: 1px solid #767676; width: 140px" /></td>
                                    </tr>
                                    <tr>
                                        <td>Location</td>
                                        <td><input type="text" name="filter_location" value="" style="margin-left:25px; border: 1px solid #767676; width: 140px" /></td>
                                    </tr>
                                    <tr>
                                        <td>Valid until</td>
                                        <td><input type="text" name="expiration_period" id="expiration_period" style="margin-left:25px; border: 1px solid #767676; width: 140px" placeholder=" yyyy-mm-dd" />&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>Results per page</td>
                                        <td>
                                            <select name="results_per_page" id="results_per_page" style="margin-left:25px;" onchange="getTasksTable()">
                                                <option value="10" selected="selected">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                            </select>
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>  

                        <br>
                        <input type="button" value="Clear" name="clear_filter" id="clear_filter" class="button_low" onclick="clearSearchFilter()"/>
                        <input type="button" value="Search" name="filter_tasks" id="filter_tasks" class="button" onclick="getTasksTable()" />
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>
<div style="clear: both"></div>