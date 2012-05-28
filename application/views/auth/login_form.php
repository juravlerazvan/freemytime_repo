
<?php
$username = array(
    'name' => 'username',
    'id' => 'username',
    'size' => 30,
    'value' => set_value('username')
);

$password = array(
    'name' => 'password',
    'id' => 'password',
    'size' => 30
);

$remember = array(
    'name' => 'remember',
    'id' => 'remember',
    'value' => 1,
    'checked' => set_value('remember'),
    'style' => 'margin:0;padding:0'
);

$confirmation_code = array(
    'name' => 'captcha',
    'id' => 'captcha',
    'maxlength' => 8
);
?>

<br><br><br>
<h2>Login</h2> 
<br>
    <?php echo form_open($this->uri->uri_string()) ?>

    <?php echo $this->dx_auth->get_auth_error(); ?>


    <dl>	
        <dt><?php echo form_label('Username', $username['id']); ?></dt>
        <dd class="error_message_small">
            <?php echo form_input($username) ?>
            <?php echo form_error($username['name']); ?>
        </dd>
<br/>
        <dt><?php echo form_label('Password', $password['id']); ?></dt>
        <dd class="error_message_small">
            <?php echo form_password($password) ?>
            <?php echo form_error($password['name']); ?>
        </dd>

        <?php if ($show_captcha): ?>
<br/>
        <dt>Enter the code bellow</dt>
            <dd><?php echo $this->dx_auth->get_captcha_image(); ?></dd>
<br/>
            <dt><?php echo form_label('Confirmation code', $confirmation_code['id']); ?></dt>
            <dd class="error_message_small">
                <?php echo form_input($confirmation_code); ?>
                <?php echo form_error($confirmation_code['name']); ?>
            </dd>

        <?php endif; ?>

        <dt></dt>
        <dd>
            <br>
            <?php echo form_checkbox($remember); ?> <?php echo form_label('Remember me', $remember['id']); ?> 
            <br><br>
            <?php echo anchor($this->dx_auth->forgot_password_uri, 'Forgot my password'); ?> 
            <?php
            if ($this->dx_auth->allow_registration) {
                echo '&nbsp;&nbsp;';
                echo anchor($this->dx_auth->register_uri, 'Sign-up');
            };
            ?>
        </dd>

        <dt></dt>
        <br>
        <dd><?php echo form_submit('login', 'Login', 'class="button"'); ?></dd>
    </dl>

    <?php echo form_close() ?>
<br><br>