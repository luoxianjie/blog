<?php
namespace  Admin\Model;
use Think\Model;

class LinksModel extends Model{
	protected $_validate=array(
			array('name','require','网站名称必须'),
			array('url','require','网站地址必须'),
	);
}