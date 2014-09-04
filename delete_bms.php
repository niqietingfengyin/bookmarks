<?PHP
require_once('bookmark_fns.php');
session_start();

$del_me=$_POST['del_me'];
$valid_user=$_SESSION['valid_user'];

do_html_header('deleting bms');
check_valid_user();
if(!(filled_out($del_me)))//????????????????????????filled_out()函数是否能验证没有选择书签的情况
   {
   echo "you didn't choose anyone to delete.</br>";
   display_user_menu();
   do_html_url('login.php','Login');
   do_html_footer();
   exit;
   }
else
  { 
    if(count($del_me)>0)
	{
	   foreach($del_me as $url)
	     {
		    if(delete_bm($valid_user,$url))
			echo  "<br />Delete  ".htmlspecialchars($url)."  successfully.";
			else
			echo "<br />Could not delete".htmlspecialchars($url);
		 }
	}
	else
	{ 
	// echo $del_me;
	echo "No bookmarks selected for deletion.</br>"; 
       }
   if($url_array=get_user_urls($valid_user))
    {  echo "<br>";
      display_user_urls($url_array);
	}
  display_user_menu();
  do_html_footer();
 }


?>