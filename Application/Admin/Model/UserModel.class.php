<?php
namespace Admin\Model;
use Admin\Model;
class UserModel extends IndexModel{
	protected $_validate = array(
		array('username','','账号已存在!','1','unique'),
		array('username', '/^[a-zA-z][a-zA-Z0-9_]{6,20}$/' , '账号格式错误' , 1 , 'regex' ,1),
		array('username','6,20','账号长度不正确!','1','length'),
		array('password','password2','两次输入的密码不正确!','1','confirm'),
		array('email','email','邮箱不正确'),
	);
}