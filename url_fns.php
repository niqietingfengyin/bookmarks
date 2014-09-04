<?php
require_once('db_fns.php');

function get_user_urls($username)
 {
   $conn=db_connect();
   mysql_select_db("bookmarks",$conn)or die("databas worong".mysql_error());
   $result=mysql_query("select * from bookmark where username='".$username."'")or die("serch for bookmark failed.".mysql_error());
   $c=0;
   $url_array=array();
   for($count=1;$row=mysql_fetch_array($result);++$count)
   {
      $url_array[$count]=$row[1];  //$row[0]是username列，$row[1]是url列；
   }   
   return $url_array;
 }
 function add_bm($new_url)
 {
    echo "Attemp to add ".htmlspecialchars($new_url)."<br />";
	$valid_user=$_SESSION['valid_user'];
	
	$conn=db_connect();
	mysql_select_db('bookmarks',$conn);
    $result=mysql_query("select * from bookmark where username='".$valid_user."'and bm_URL='".$new_url."'")or die("seach failed.".mysql_error());
    if($row=mysql_fetch_array($result))
    throw new Exception("the url in user's bm_urls had existed.");	
	
	$result2=mysql_query("insert into bookmark values('".$valid_user."','".$new_url."')")or die("insert failed.".mysql_error());
	//if(!($row2=mysql_fetch_array($result2)))
	//throw new Exception("insert zero row so failed.");
 
 }
 function delete_bm($valid_user,$url)
 {
    $conn=db_connect();
	mysql_select_db('bookmarks',$conn);
	$result=mysql_query("delete from bookmark where username='".$valid_user."'and bm_URL='".$url."'")or
	die("delete failed.".mysql_error());
    if($result)
	   return true;
	else 
	   return false;
 }
 
 function recommand_urls($valid_user,$popularity)
 {   
     // group by bm_URL having count(bm_URL)>'".$popularity."'
    $conn=db_connect();
	mysql_select_db('bookmarks',$conn);
	//找出有相同书签的用户b2，把这些用户b2的书签中去除与本用户b1相同的书签，把剩余的书签分类，只选择出现次数大于$popularity的书签输出；
	$result=mysql_query("select bm_URL from bookmark where username in(select distinct(b2.username) from bookmark b1,bookmark b2 where b1.username='".$valid_user."'
	                               and b1.username!=b2.username 
								   and b1.bm_URL=b2.bm_URL)
	                       and bm_URL not in(select bm_URL from bookmark where username='".$valid_user."')
						   group by bm_URL having count(bm_URL)>'".$popularity."'")or die("select similar bm_URLs failed .!! ".mysql_error());
	 $url_array=array();
     $c=0;	 
	while($row=mysql_fetch_array($result))
	{
	  $url_array[$c++]=$row[0];
	  
     }
	 return $url_array;
 }
?>