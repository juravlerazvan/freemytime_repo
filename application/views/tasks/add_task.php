<br><br><br>
<p class="confirmation_message_big" id="confirm_publishing"></p>
<section id="content">
    <article class="col1 pad_left1">
        <h2><?php echo $page_title ?></h2>
        <form name="add_task_form" id="add_task_form">
            <table border="0">
                <tr>
                    <td><strong>Category</strong></td>
                    <td>
                        <select name="task_category_id" id="task_category_id" class="new_task_form_field_select" style="margin-left: 15%">
                            <?php
                            foreach ($categories as $category) {
                                echo '<option value="' . $category->cat_id . '">' . $category->category . '</option>';
                            }
                            ?>
                        </select>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><strong>Title</strong></td>
                    <td><input name="task_title" id="task_title" type="text" class="new_task_form_field_input" maxlength="25"/></td>
                    <td><span class="error_message_small" id="task_title_error"></span></td>
                </tr>
                <tr>
                    <td><strong>Description</strong></td>
                    <td><textarea name="task_description" id="task_description" cols="22" rows="7" class="new_task_form_field_textarea" ></textarea></td>
                    <td><span class="error_message_small" id="task_description_error"></span></td>
                </tr>
                <tr>
                    <td><strong>Available budget</strong></td>
                    <td><input name="task_budget" id="task_budget" type="text" class="new_task_form_field_input" placeholder=" $"/></td>
                    <td><span class="error_message_small" id="task_budget_error"></span></td>
                </tr>
                <tr>
                    <td><strong>Location</strong></td>
                    <td><input name="task_address" id="task_address" type="text" maxlength="50" class="new_task_form_field_input" placeholder="zip code"/></td>
                    <td><span class="error_message_small" id="task_address_error"></span></td>
                </tr>
                <tr>
                    <td><strong>Task valid for</strong></td>
                    <td>
                        <input name="task_validity" id="task_validity" type="text" type="text" class="new_task_form_field_input" placeholder=" number of days"/>
                    </td>
                    <td><span class="error_message_small" id="task_validity_error"></span></td>
                </tr>
                <tr>
                    <td><strong>Payment method</strong></td>
                    <td>
                        <select name="payment_method" id="payment_method" class="new_task_form_field_select" style="margin-left: 15%">
                            <option value="all">All methods</option>
                            <option value="automotive">Cash</option>
                            <option value="housekeeping">PayPal</option>
                        </select>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><strong>Bidder location</strong></td>
                    <td>
                        <input name="bidder_location" id="bidder_location" type="radio" value="anywhere" checked="checked" style="margin-left: 15%" />
                        <span>Anywhere</span>
                        <input name="bidder_location" id="bidder_location" type="radio" value="task_location" style="margin-left: 5%" />
                        <span>Same as task</span>
                    </td>
                    <td>&nbsp;</td>
                </tr>
            </table>

            <br><br><br>
            <input name="reset_form" id="reset_form" class="button_low" type="reset" value="Clear" />
            <input name="reset_form" id="save_draft" class="button_medium" type="button" value="Save as draft" onclick="addNewTaskFormValidation('draft')" >
            <input name="submit_task" id="submit_task" class="button" type="button" value="Publish" onclick="addNewTaskFormValidation('new')">
        </form>
    </article>

    <br>
    <br>