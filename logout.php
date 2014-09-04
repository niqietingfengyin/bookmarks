<?php
   require_once('bookmark_fns.php');

  session_start();
  $olduser=$_SESSION["valid_user"];
  unset($_SESSION['valid_user']);
  $result=session_destroy();
   if(empty($olduser))
   {
     echo "You were not logged in but came to this page ";
	 do_html_url('login.php','Login');
   }
   else
   {
     if($result)
	    {
		  echo "Log  out!";
		  echo "<br>";
		  do_html_url('login.php','Login');
		}
	  else
	    {
		  echo  "Could not log you out……";
		
		}
   }
   
   
   
?>