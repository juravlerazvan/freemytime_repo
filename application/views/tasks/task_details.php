<br><br><br>
<section id="content">
    <article class="col1 pad_left1">
        <h2><?php echo $page_title; ?></h2>

        <table id="task_details_table">
            <tr>
                <td><b>Category</b></td>
                <td style="padding-left: 30px; color: black"><?php echo $data['category'][0]->category ?></td>
            </tr>
            <tr>
                <td><b>Location</b></td>
                <td style="padding-left: 30px; color: black"><?php echo $data[0]->address; ?></td>
            </tr>
            <tr>
                <td><b>Task ID</b></td>
                <td style="padding-left: 30px; color: black"><?php echo $data[0]->task_id; ?></td>
            </tr>
            <tr>
                <td><b>Expires on</b></td>
                <td style="padding-left: 30px; color: black"><?php echo date('M-d-Y', strtotime($data[0]->expiration_date)); ?></td>
            </tr>
            <tr>
                <td><b>Status</b></td>
                <td style="padding-left: 30px; color: black"><?php echo ucfirst($data[0]->status); ?></td>
            </tr>
            <tr>
                <td><b>Budget</b></td>
                <td style="padding-left: 30px; color: black"><?php echo $data[0]->budget; ?>&nbsp;&#36;</td>
            </tr>
            <tr>
                <td><b>Average bid</b></td>
                <td style="padding-left: 30px; color: black">25.2&nbsp;&#36;</td>
            </tr>
            <tr>
                <td><b>Payment method</b></td>
                <td style="padding-left: 30px; color: black"><?php echo $data[0]->payment_method; ?></td>
            </tr>
        </table>
        <br>
        <h3>Description</h3>
        <p style="color: black">
            <?php
            echo $data[0]->description;
            ?>
        </p>
        <br>
    </article>


    <!-- Extra info panel -->

    <article class="col2 pad_left2" style="float: right; width: 300px">
        <div class="box1">
            <div class="inner">
                <div class="pad">
                    <div class="wrapper">
                        <p class="font1" style="color: black"><b>Employer info</b></p>
                        <table>
                            <tr>
                                <td>Employer</td>
                                
                                <td style="padding-left: 30px; color: black"><?php echo (sizeof($data['user']) == 1)?$data['user'][0]->username:'N/A'; ?></td>
                            </tr>
                            <tr>
                                <td>Member since</td>
                                <td style="padding-left: 30px; color: black"><?php echo (sizeof($data['user']) == 1)?date('Y-m-d', strtotime($data['user'][0]->created)):'N/A'; ?></td>
                            </tr>
                            <tr>
                                <td>Feedback</td>
                                <td style="padding-left: 30px; color: black"><?php echo (sizeof($data['user']) == 1)?$data['user'][0]->feedback:'N/A'; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <!-- End of extra info panel -->

</section>
<div style="clear: both"></div>