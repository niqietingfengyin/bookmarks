<?php
require_once('bookmark_fns.php');
session_start();
do_html_header('Changing password');

$username=$_SESSION['valid_user'];
$old_passwd=$_POST['old_passwd'];
$new_passwd=$_POST['new_passwd'];
$new_passwd2=$_POST['new_passwd2'];
//echo $_SESSION['valid_user'];
 check_valid_user();
try
{
   if((strlen($new_passwd)>16)||((strlen($new_passwd)<6)))
	throw new Exception('the length of new password must be between 6 and 16');
	if($new_passwd!=$new_passwd2)
    throw new Exception('Passwords entered were not the same.');
	if(!filled_out($_POST))
    throw new Exception("You haven't filled out the form completely.");
	login($username,$old_passwd);
	change_password($username,$old_passwd,$new_passwd);
 }
catch(Exception $e)
{
 echo $e->getMessage();
 echo " <br />failed.</br>";
}

display_user_menu();
do_html_footer();

?>