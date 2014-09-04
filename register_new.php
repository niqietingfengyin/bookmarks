<?php
require_once('bookmark_fns.php');

$email=$_POST["email"];
$username=$_POST["username"];
$passwd=$_POST["passwd"];
$passwd2=$_POST["passwd2"];
//start a session
session_start();
try{
     if(!filled_out($_POST))
	    {
		  Throw new Exception('You have not filled the form out correctly,please go back and try again.');  
		}
	 if(!valid_email($email))
	   {
	     Throw new Exception('That\'s not a valid email address.');
	    }
	 if($passwd!=$passwd2)
       {
	     Throw new Exception("The passwords you entered don't match.");
	   } 
	 if((strlen($passwd)<6)||(strlen($passwd)>16))
	   {
	     Throw new  Exception("Your passwords are too long ,please go back and try again.");
	   }
  
   register($username,$email,$passwd);  //check register chars and insert into database;
   $_SESSION["valid_user"]=$username;
   
   do_html_header('Register successfully');
   echo "Your registration was successfully.";
   do_html_url("member.php",'Go to members page');
   do_html_footer();
   }
  catch(Exception $e)
  {
     do_html_header("Problem:");
	 echo $e->getMessage();
	 do_html_footer();
	 exit;
  }

?>