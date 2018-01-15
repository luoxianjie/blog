<?php
namespace Home\Model;
use Think\Model;

class UserModel extends Model{
	protected $_map=array(
			'name'=>'nackname',
			'password'=>'passwd',
	);
	
	protected $_auto=array(
			array('status','1'),
			array('header', '1.jpg'),
			array('equip', 'Win7'),
			array('address', '武汉'),
			array('passwd','md5',1,'function')
	);
	
}