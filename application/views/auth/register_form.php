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

$captcha = array(
    'name' => 'captcha',
    'id' => 'captcha'
);
?>

<br><br>
<section id="content">
    <article class="col1 pad_left1">
        <h2>Create my account</h2>
        <?php echo form_open($this->uri->uri_string()) ?>
        <br>
        <dl>
            <dt><?php echo form_label('Username', $username['id']); ?></dt>
            <dd>
                <?php echo form_input($username) ?>
                <span id="register_error" class="error_message_small"><?php echo form_error($username['name']); ?></span>
            </dd>
            <br>
            <dt><?php echo form_label('Password', $password['id']); ?></dt>
            <dd>
                <?php echo form_password($password) ?>
                <span id="register_error" class="error_message_small"><?php echo form_error($password['name']); ?></span>
            </dd>
            <br>
            <dt><?php echo form_label('Confirm password', $confirm_password['id']); ?></dt>
            <dd>
                <?php echo form_password($confirm_password); ?>
                <span id="register_error" class="error_message_small"><?php echo form_error($confirm_password['name']); ?></span>
            </dd>
            <br>
            <dt><?php echo form_label('E-mail', $email['id']); ?></dt>
            <dd>
                <?php echo form_input($email); ?>
                <span id="register_error" class="error_message_small"> <?php echo form_error($email['name']); ?></span>
            </dd>
            <br>	
            <?php if ($this->dx_auth->captcha_registration): ?>

                <dt>Enter the code bellow</dt>
                <dd><?php echo $this->dx_auth->get_captcha_image(); ?></dd>
                <br>
                <dt><?php echo form_label('Confirmation code', $captcha['id']); ?></dt>
                <dd>
                    <?php echo form_input($captcha); ?>
                    <span id="register_error" class="error_message_small"><?php echo form_error($captcha['name']); ?></span>
                </dd>
                <br>
            <?php endif; ?>

            <dt></dt>
            <dd><?php echo form_submit('register', 'Create account', 'class="button"'); ?></dd>
        </dl>

        <?php echo form_close() ?>
        </div>
        </div>
    </article>
    <br><br>