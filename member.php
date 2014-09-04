<?php
   require_once("bookmark_fns.php");
   session_start();
   
   $username=$_POST["username"];
   $passwd=$_POST["passwd"];
   if($username&&$passwd)
   {
   try{
	    login($username,$passwd);     //在user_auth_fns.php中验证是否为空 是否名字密码对应；
		$_SESSION['valid_user']=$username;//如果上一步不抛出异常，即名字密码都存在数据库中，则注册用户名的会话变量
		}
	 catch(Exception $e)
	    {
		  do_html_header(" Log  in Promblem");
		  echo $e->getMessage();
		  echo "<br>You could not be logged in.";
		  do_html_url('login.php','Login');
		  do_html_footer();
		  exit;
		}
	}
		do_html_header("Home");
		check_valid_user();   //检查会话变量$_SESSION['valid_user']是否被注册，也即是否成功登录
		                        //如果注册则显示‘Log in as $_SESSION['valid_user']’否则跳转problem页面并exit出程序；
		
		if($url_array=get_user_urls($_SESSION['valid_user']))  //获得注册变量名用户的书签；
		{
		   display_user_urls($url_array);
		}
		display_user_menu($username,$passwd);
        do_html_footer();
 
?>