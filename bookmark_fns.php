<?php
  require_once('data_valid_fns.php');//filled_out();验证是否为空，valid_email()验证邮箱格式是否正确；
  require_once('db_fns.php'); //db_connect()与数据库建立连接
  require_once('user_auth_fns.php');//register（）判断用户名是否已存在，如果不存在则把注册信息存入表user,注册成功；
                                    //login()判断登录名及密码是否为空，不为空则判断是否与数据库中一致，不一致返回异常
                                   //check_valid_user()判断$_SESSION['valid_user']是否存在，如果存在则显示‘log in as $_SESSION['valid_user']'，否则跳转另一个problem页面；
								   //change_password()连接数据库，修改特定用户的密码
								   
  require_once('url_fns.php'); //get_user_urls()连接数据库返回某个username的书签urls;
                               //add_bm()注册$_SESSION['valid_user']，先判断新书签是否已经存在，不存在则插入数据库中保存，存在会抛出异常；
                              //delete_bm()删除指定$username的指定$url;
							  //recommand_urls()用sql语句查询出推荐书签，并保存到$url_array中返回；
  require_once('output_fns.php'); //do_html_header($title)全部的页面顶部显示格式，只有$title部分不同
                                  //do_html_heading($title)用于显示$title;
								  //do_html_footer()与do_html_header()对应完整的<body></html>
                                  
								  //display_site_info()显示列表式的基本网站信息
								  //display_login_form()包括'not a member'连接，登陆表格，’forgot passowrd‘连接
								  //display_registration_form()注册新用户的表单
								  //do_html_url($url,$name) 显示$name 并与$url连接；
								  //display_user_urls($url_array)定义一个全局变量$bm_table，并显示$url_array的书签，或者显示’No bookmarks on record‘；
								  //display_user_menu()显示菜单部分，其中如果$bm_table为true则Delte BM按钮有效，否则灰色；
								  
								  //display_password_form()修改密码的表单；
								  //display_add_bm_form()添加书签的表单；
								  //display_recommanded_urls($urls)显示推荐标签的表单；
								  ?>