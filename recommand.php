<?php
 require_once("bookmark_fns.php");
 session_start();

$valid_user=$_SESSION['valid_user'];
$popularity=2;
do_html_header('Recomending  URLs');
try{
check_valid_user();
$urls=recommand_urls($valid_user,$popularity);
display_recommanded_urls($urls);
}
catch (Exception $e)
{
  echo $e->getMessage();
}
display_user_menu();
do_html_footer();

?>