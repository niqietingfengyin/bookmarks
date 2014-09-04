<?php
require_once('bookmark_fns.php');
session_start();
$new_url=$_POST['new_url'];
do_html_header('Adding bookmarks:');

try
{
  check_valid_user();
  echo "<br>";
  if(!(filled_out($_POST)))
    throw new Exception("Form not completely filled out.");
  if((strstr($new_url,'http://'))===false)
    $new_url='http://'.$new_url;
  if(!(@fopen($new_url,'r')))
     throw new Exception("can't open the url,it's not a valid url.");
	 
   add_bm($new_url);
   echo "Add a bookmark succesfully.";
   if($url_array=get_user_urls($_SESSION['valid_user']))
     {
	    display_user_urls($url_array);
	 }
	 display_user_menu();
   
}
catch (Exception $e)
{
  echo $e->getMessage();

}

do_html_footer();


?>