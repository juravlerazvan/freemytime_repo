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
    'size' => 30,
    'value' => set_value('password')
);

$confirm_password = array(
    'name' => 'confirm_password',
    'id' => 'confirm_password',
    'size' => 30,
    'value' => set_value('confirm_password')
);

$email = array(
    'name' => 'email',
    'id' => 'email',
    'maxlength' => 80,
    'size' => 30,
    'value' => set_value('email')
);
?>

<html>
    <body>

        <br><br><br>
        <h2>Create your account</h2> 
        <br>
        <?php echo form_open($this->uri->uri_string()) ?>

        <dl>
            <dt><?php echo form_label('Username', $username['id']); ?></dt>
            <dd>
                <?php echo form_input($username) ?>
                <span id="register_error" class="error_message_small"><?php echo form_error($username['name']); ?></span>
            </dd>
            <br/>
            <dt><?php echo form_label('Password', $password['id']); ?></dt>
            <dd>
                <?php echo form_password($password) ?>
                <span id="register_error" class="error_message_small"><?php echo form_error($password['name']); ?></span>
            </dd>
            <br/>
            <dt><?php echo form_label('Confirm Password', $confirm_password['id']); ?></dt>
            <dd>
                <?php echo form_password($confirm_password); ?>
                <span id="register_error" class="error_message_small"> <?php echo form_error($confirm_password['name']); ?></span>
            </dd>
            <br/>
            <dt><?php echo form_label('E-mail Address', $email['id']); ?></dt>
            <dd>
                <?php echo form_input($email); ?>
                <span id="register_error" class="error_message_small"> <?php echo form_error($email['name']); ?></span>
            </dd>

            <?php if ($this->dx_auth->captcha_registration): ?>
                <br/>
                <dt></dt>
                <dd>
                    <?php
                    // Show recaptcha imgage
                    echo $this->dx_auth->get_recaptcha_image();
                    // Show reload captcha link
                    echo $this->dx_auth->get_recaptcha_reload_link();
                    // Show switch to image captcha or audio link
                    echo $this->dx_auth->get_recaptcha_switch_image_audio_link();
                    ?>
                </dd>
                <br/>
                <dt><?php echo $this->dx_auth->get_recaptcha_label(); ?></dt>
                <dd>
                    <?php echo $this->dx_auth->get_recaptcha_input(); ?>
                    <span id="register_error" class="error_message_small"><?php echo form_error('recaptcha_response_field'); ?></span>
                </dd>

                <?php
                // Get recaptcha javascript and non javasript html
                echo $this->dx_auth->get_recaptcha_html();
                ?>
            <?php endif; ?>
            <br/>
            <dt></dt>
            <dd><?php echo form_submit('register', 'Create account', 'class="button"'); ?></dd>
        </dl>

        <?php echo form_close() ?>
</body>
</html>