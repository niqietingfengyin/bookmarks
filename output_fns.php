<?php
 function do_html_header($title)
   {
?>
<html>
  <head>
  <title><?php  echo $title; ?></title>
  <style>
    body { font-family:Arial,Helvetica,sans-serif; font-size:13px}
	li,td { font-family:Arial,Helvetica,sans-serif; font-size:13px;}
	hr {color:#333cc;width=300;text-align=left}
	a  {color:#000000}
	</style>
	</head>
	<body>
	<img src="../images/rain.gif" alt="PHPbookmark logo" border="0" 
	      align="left" valign="bottom" width="100" height="50" >
	<h1>PHPbookmark</h1>
	<hr />
	
  <?php
        if($title)
		do_html_heading($title);
    }
 
  function do_html_heading($heading)
        {
		   echo "<h2>".$heading."</h2>";
		}
		
  function  do_html_footer()
    {
	 
	  echo "<h3>end</h3></body></html>";  
     
	}
    function display_site_info()
      {
   ?>
	    <ul>
		<li>Store your bookmarks online with us!</li>
		<li>See what other users use!</li>
		<li>Share your favorite links with others!</li>
		</ul>
   <?php
	  }
      function display_login_form()
	  {
	 ?>
	 <p><a href="register_form.php">Not a member?</a></p>
	 <form method="post" action="member.php">
	 <table bgcolor="#EEEEEE" >
	   <tr>
	    <td colspan="2"><b>Members log in here</b></td>
		</tr>
	   <tr>
	    <td>Username:</td>
		<td><input type="text" name="username"></td>
		</tr>
	   <tr>
	    <td>Password:</td>
		<td><input type="password" name="passwd"></td>
	   </tr>
	   <tr>
	    <td colspan="2"><input type="submit" value="Log in"></td>
	   </tr>
	   <tr>
	   <td colspan="2"><a href="forgot_form.php">Forgot your password?</td>
	   </tr>
	   </table>
      </form>
   <?php
      }
	  function display_registration_form()
	   {
	 ?>
	 <p>&nbsp;</p>
     <form method="post" action="register_new.php">
        <table bgcolor="#cccccc">
        <tr>
          <td><b>Email address:</b></td>
          <td><input type="text" name="email" size="30" maxlength="100"></td>
        </tr>
        <tr>
		<td><b>Preferred username<br/>(max 16 chars)</b></td>
		<td><input type="text" name="username" size="16" maxlength="16"></td>
        </tr>		
	    <tr>
		<td><b>Password<br>(between 6 and 16 chars):</b></td>
		<td><input type="password" name="passwd" size="16" maxlength="16" ></td>
		</tr>
	    <tr>
		<td><b>Confirm password</b></td>
		<td><input type="password" name="passwd2" size="16" maxlength="16">
		</tr>
	    <tr>
		<td colspan="2" align="center">
		<input type="submit" value="Register"></td></tr>
		</table>
		</form>
	<?php   
	   }
	  function do_html_url($url,$name)
	   {
	   ?>
	   <br/><a href="<?php echo $url;?>"><?php echo $name; ?></a><br>
	   <?php
	   }
	   function display_user_urls($url_array)
	   {  global $bm_table;
	      $bm_table=true;
	   
	  ?>
	  <br/>
	  <form method="post" action="delete_bms.php" name="bm_table">
	    <table width="300" cellpadding="2" cellspacing="0">
		<?php
		   $color="#CCCCCC";
		   echo  "<tr bgcolor='".$color."'><td><strong>Bookmark</strong></td>";
		   echo  "<td><strong>Delete?</strong><td></tr>";
		 if(is_array($url_array)&&(count($url_array)>0))  
		 {
           foreach($url_array as $url)		  
 		   { 
		   if($color=="#CCCCCC")
		       $color="#FFFFFF";
		   else
		       $color="#CCCCCC";
			echo "<tr bgcolor='".$color."'><td><a href='".$url."'>".htmlspecialchars($url)."</a></td>
			        <td><input type='checkbox' name='del_me[]' value='".$url."'></td></tr>"	;
			}       
		  }
		   else
             echo "<tr><td>No bookmarks on record.</td></tr>";
		  ?> 
	     </table>
		</form>
	<?PHP
	    }
	    function display_user_menu()
		{
		 
		   //????????????????????????? <a href="member.php?username='".$username."' & passwd='".$passwd."'">Home</a>&nbsp;|&nbsp;
		   //向member.php传递参数username和passwd，点击Home才能回到本页面；
		  // echo "<a href=\"member.php\">Home</a> &nbsp;|&nbsp;";
	        
	  ?>
	  <br />
	  <a href="member.php">Home</a>&nbsp;|&nbsp;
	  <a href="add_bm_form.php">Add BM</a>  &nbsp;|&nbsp;
	<?php
         global $bm_table;
          if($bm_table==true)
             echo "<a  href=\"#\" onClick=\"bm_table.submit();\">Delete BM</a>&nbsp;|&nbsp;";
		   else
		     echo "<span style=\"color:#cccccc\">Delete BM</span>  &nbsp;|&nbsp;";  //Delte BM是灰色按钮，当书签表格没有内容时；
	    
		?>
		<a href="change_passwd_form.php">Change password</a> &nbsp;|&nbsp;
		<br />
		<a href="recommand.php">Recommand URLS to me</a> &nbsp;|&nbsp;
		<a href="logout.php">Logout</a>
		
		<?php
		}
		function display_password_form()
		{
		//diplay html change password form
		?>
		<form method="POST" action="change_passwd.php" >
		<br/>
            <table width="300" cellpadding="2" cellspacint="0" bgcolor="#cccccc" >
            <tr>
			<td>Old password:</td>
			<td><input type="password" name="old_passwd" size="20" maxlength="20"></td>
			</tr>
            <tr>			
			<td>New password:</td>
			<td><input type="password" name="new_passwd" size="20" maxlength="20"></td>
			</tr>
			<tr>
			<td>Repeat new password:</td>
			<td><input type="password" name="new_passwd2" size="20" maxlength="20"></td>
			</tr>
		    <tr >
			<td colspan="2" align="center">
			<input type="submit" value="Change password"/>
			</td>
			</tr>
			</table>
			</form>
		<?php
		}
		function display_add_bm_form()
		{
		 ?>
		 <br />
		 <form method="POST" action="add_bms.php">
		   <table bgcolor="#cccccc" cellpadding='2' cellspacing='2' width='260'>
            <tr >
			<td>New BM:
			</td>
			<td><input type="text" name="new_url" maxlength='255' >
			</td>
			</tr>
			<tr>
			<td colspan='2' align="center"><input type="submit" value="Add bookmark">
			</td>
			</tr>
			</table>
		 </form>
			
        <?php		 
		}
		function display_recommanded_urls($urls)
		{  
		      $color="#CCCCCC";
              echo "<br /><table width='200'  cellspacing='0' cellpadding='0' bgcolor=".$color.">";
              echo "<tr bgcolor='#CCCCCC'><td><strong>Recommendations:</strong></td></tr>";
		  if((is_array($urls))&&(count($urls)>0))
		    {
			   foreach($urls as $url)
			  {
			    /*if($color=="#CCCCCC")
				  $color="#FFFFFF";
				 else
				  $color="#CCCCCC";*/
				echo "<tr bgcolor='".$color."'><td><a href='".$url."'>".htmlspecialchars($url)."</a ></td></tr>";
			  }
			}
			else
			 {
			    echo "<tr ><td>NO recommendations for you .</td></tr>";
			   
			 }
		  
		    echo " </table>";
		  
		 }
	    ?>
	  
	 