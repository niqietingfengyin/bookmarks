<?php
require_once('db_fns.php'); //在bookmarks.php中已经包括db_fns.php；在此函数可直接调用


function register($username,$email,$password)
{ //判断用户名是否已存在
  $conn=db_connect();
  mysql_select_db("bookmarks",$conn);
  $result=mysql_query("select * from user where username='".$username."'")or die("cann't execute query".mysql_error());
  if(!$result)
   {
     Throw new Exception("can't execute query.");
   }
   if($row=mysql_fetch_array($result))
   { 
      die("the name is taken-go back and choose another name.");
    Throw new Exception("the name is taken-go back and choose another name.");
   }
   //把正确的用户名，密码，邮箱等信息存入数据库的user表中；
   $result=mysql_query("insert into user values('".$username."',md5('".$password."'),'".$email."')")or die("Coudn't register you in database".mysql_error());
    if(!result)
	{
	Throw new Exception("Coudn't register you in database");
	}
	 return true;  
}
function login($username,$passwd)
  {  //check whether the username and passwd exist..
     if(empty($username)||empty($passwd))
	 Throw new Exception("input username and password completely  please  .");
     $conn=db_connect();
	 mysql_select_db("bookmarks",$conn);
	 $result=mysql_query("select * from user where username='".$username."'and passwd=md5('".$passwd."') ")or die("no the user.".mysql_error());
      if(!($row=mysql_fetch_array($result)))  
	  Throw new Exception("could not log you in.");    
  }
  
  function check_valid_user()
    {  //check whether the session_var has been registerd.
	  echo "<hr />";
	  session_start();
      if(isset($_SESSION['valid_user']))
	    echo "Logged in as  '".$_SESSION['valid_user']."'<br/>";
	  else
	  {
	     //do_html_header('Problem:');
		 echo "You are not logged in.<br />";
		 do_html_url('login.php','Login');
		 do_html_footer();
		 exit;
	  }
    }
	function change_password($username,$old_passwd,$new_passwd)
    {
	   //login($username,$old_passwd);
	   $conn=db_connect();
	   mysql_select_db("bookmarks",$conn)or die("db_select failed".mysql_error());
	   $result=mysql_query("update user set passwd=md5('".$new_passwd."') where username='".$username."'")or die('update failed'.mysql_error());
	   echo "update new password in databsa succesfully!";	
	   echo "<br/>";
	
	}	

?>