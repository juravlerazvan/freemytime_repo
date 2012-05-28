<?php

/*
	It is recommended for you to change 'auth_login_incorrect_password' and 'auth_login_username_not_exist' into something vague.
	For example: Username and password do not match.
*/

$lang['auth_login_incorrect_password'] = "Your password was incorrect.";
$lang['auth_login_username_not_exist'] = "Username not exist.";

$lang['auth_username_or_email_not_exist'] = "Username or email address not exist.";
$lang['auth_not_activated'] = "Your account hasn't been activated yet. Please check your email.";
$lang['auth_request_sent'] = "Your request to change password is already sent. Please check your email.";
$lang['auth_incorrect_old_password'] = "Your old password is incorrect.";
$lang['auth_incorrect_password'] = "Your password is incorrect.";

// Email subject
$lang['auth_account_subject'] = "%s account details";
$lang['auth_activate_subject'] = "%s activation";
$lang['auth_forgot_password_subject'] = "New password request";

// Email content
$lang['auth_account_content'] = "Welcome to %s,

Thank you for registering. Your account was successfully created.

<br/> <br/> You can login with either your username or email address:

<br/> Login: %s
<br/> Email: %s
<br/> Password: %s

<br/> You can try logging in now by going to %s

We hope that you enjoy your stay with us.

<br/><br/>  Regards,
<br/> The %s Team";

$lang['auth_activate_content'] = "Welcome to %s,

To activate your account, you must follow the activation link below:
%s

<br/> Please activate your account within %s hours, otherwise your registration will become invalid and you will have to register again.

You can use either you username or email address to login.
<br/> <br/> Your login details are as follows:

<br/> Login: %s
<br/> Email: %s
<br/> Password: %s

<br/> We hope that you enjoy your stay with us :)

<br/><br/>  Regards,
<br/> The %s Team";

$lang['auth_forgot_password_content'] = "%s,

You have requested your password to be changed, because you forgot the password.
<br/> Please follow this link in order to complete change password process:
%s

<br/> Your New Password: %s
<br/> Key for Activation: %s

<br/> <br/> After you successfully complete the process, you can change this new password into password that you want.

<br/> If you have any more problems with gaining access to your account please contact %s.

<br/> <br/> Regards,
<br/> The %s Team";

/* End of file dx_auth_lang.php */
/* Location: ./application/language/english/dx_auth_lang.php */