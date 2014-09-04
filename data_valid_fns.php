<?php
 function filled_out($form_vars)
 {  //$form_vars 是一个数组，键值是字符，数值是对应输入，判断是否有输入；
   foreach($form_vars as $key=>$value)
      {
	    if((!isset($key))||($value==''))
		    return false;
	  }
	return true;
 }
  function valid_email($address)
    { 
	//正则表达式判断输入邮箱格式是否正确
	  if(ereg('^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\.\-]+$',$address))
	    return true;
		else
		 return false;
	}
?>