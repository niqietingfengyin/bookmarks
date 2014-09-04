<?php
  function db_connect()
  {
    $result=mysql_connect("localhost","root","101389")or die("Could't connect to the database server.".mysql_error());
	if($result)
	 return $result;
  }

?>