<?php
$login = array(
    'name' => 'login',
    'id' => 'login',
    'maxlength' => 80,
    'size' => 30,
    'value' => set_value('login')
);
?>
<br><br><br>
<h2>Forgot my password</h2> 
<br>
<?php echo form_open($this->uri->uri_string()); ?>

<?php echo $this->dx_auth->get_auth_error(); ?>

<dl>
    <dt><?php echo form_label('Enter your username or e-mail adress', $login['id']); ?></dt>
    <dd>
<?php echo form_input($login); ?> 
        <?php echo form_error($login['name']); ?>
        <?php echo form_submit('reset', 'Reset Now'); ?>
    </dd>
</dl>

<?php echo form_close() ?>
