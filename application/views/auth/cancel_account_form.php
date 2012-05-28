<?php
$password = array(
    'name' => 'password',
    'id' => 'password',
    'size' => 30
);
?>

<fieldset>
    <legend><b>Delete my account</b></legend>
    <br>
    <?php echo form_open($this->uri->uri_string()); ?>

    <?php echo $this->dx_auth->get_auth_error(); ?>

    <dl>
        <dt><?php echo form_label('Password', $password['id']); ?></dt>
        <dd>
            <?php echo form_password($password); ?>
            <?php echo form_error($password['name']); ?>
        </dd>
        <br/>
        <dt></dt>
        <dd><?php echo form_submit('cancel', 'Delete your account'); ?></dd>
    </dl>

    <?php echo form_close(); ?>
</fieldset>