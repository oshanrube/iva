<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('en', array (
  'validators' => 
  array (
    'fos_user.username.already_used' => 'The username is already used',
    'fos_user.username.blank' => 'Please enter a username',
    'fos_user.username.short' => 'The username is too short',
    'fos_user.username.long' => 'The username is too long',
    'fos_user.email.already_used' => 'The email is already used',
    'fos_user.email.blank' => 'Please enter an email',
    'fos_user.email.short' => 'The email is too short',
    'fos_user.email.long' => 'The email is too long',
    'fos_user.email.invalid' => 'The email is not valid',
    'fos_user.password.blank' => 'Please enter a password',
    'fos_user.password.short' => 'The password is too short',
    'fos_user.new_password.blank' => 'Please enter a new password',
    'fos_user.new_password.short' => 'The new password is too short',
    'fos_user.current_password.invalid' => 'The entered password is invalid',
    'fos_user.group.blank' => 'Please enter a name',
    'fos_user.group.short' => 'The name is too short',
    'fos_user.group.long' => 'The name is too long',
  ),
  'FOSUserBundle' => 
  array (
    'fos_user_group_form_name' => 'Group name:',
    'fos_user_profile_form_user_username' => 'Username:',
    'fos_user_profile_form_user_email' => 'Email:',
    'fos_user_profile_form_current' => 'Current Password:',
    'fos_user_registration_form_username' => 'Username:',
    'fos_user_registration_form_email' => 'Email:',
    'fos_user_registration_form_plainPassword_first' => 'Password:',
    'fos_user_registration_form_plainPassword_second' => 'Confirmation:',
    'fos_user_registration_form_name' => 'Full Name:',
    'fos_user_resetting_form_new_first' => 'New password:',
    'fos_user_resetting_form_new_second' => 'Verification:',
    'fos_user_change_password_form_new_first' => 'New password:',
    'fos_user_change_password_form_new_second' => 'Verification:',
    'fos_user_change_password_form_current' => 'Current password:',
    'group.edit.submit' => 'Update group',
    'group.show.name' => 'Group name',
    'group.new.submit' => 'Create group',
    'group.flash.updated' => 'The group has been updated',
    'group.flash.created' => 'The group has been created',
    'group.flash.deleted' => 'The group has been deleted',
    'security.login.username' => 'Username:',
    'security.login.password' => 'Password:',
    'security.login.remember_me' => 'Remember me',
    'security.login.submit' => 'Login',
    'security.login.name' => 'Full Name:',
    'profile.show.username' => 'Username',
    'profile.show.email' => 'Email',
    'profile.edit.submit' => 'Update',
    'profile.flash.updated' => 'The profile has been updated',
    'change_password.submit' => 'Change password',
    'change_password.flash.success' => 'The password has been changed',
    'registration.check_email' => 'An email has been sent to %email%. It contains an activation link you must click to activate your account.',
    'registration.confirmed' => 'Congrats %username%, your account is now activated.',
    'registration.back' => 'Back to the originating page.',
    'registration.submit' => 'Register',
    'registration.flash.user_created' => 'The user has been created successfully',
    'registration.email' => 'Welcome %username%!
Hello %username%!

To finish activating your account - please visit %confirmationUrl%

Regards,
the Team.
',
    'resetting.password_already_requested' => 'The password for this user has already been requested within the last 24 hours.',
    'resetting.check_email' => 'An email has been sent to %email%. It contains a link you must click to reset your password.',
    'resetting.request.invalid_username' => 'The username or email address "%username%" does not exist.',
    'resetting.request.username' => 'Username or email address:',
    'resetting.request.submit' => 'Reset password',
    'resetting.reset.submit' => 'Change password',
    'resetting.flash.success' => 'The password has been reset successfully',
    'resetting.email' => 'Reset Password
Hello %username%!

To reset your password - please visit %confirmationUrl%

Regards,
the Team.
',
    'layout.logout' => 'Logout',
    'layout.login' => 'Login',
    'layout.register' => 'Register',
    'layout.logged_in_as' => 'Logged in as %username%',
  ),
));



return $catalogue;
