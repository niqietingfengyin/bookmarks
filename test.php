<?php
$conn=mysql_connect("localhost","root","101389")or die("failed.".mysql_error());
mysql_select_db("bookmarks",$conn)or die("bookmark wrong".mysql_error());
$result=mysql_query("select * from user")or die("failed.".mysql_error());
if($result)
echo "ok i love you";
else
echo "not ok";

?>