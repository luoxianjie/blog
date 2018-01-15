<?php
/**
 * 获取客户端IP信息
 * @return mixed
 */
function get_onlineip() {
	$url='http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js';
	$ch = curl_init($url);
	
	curl_setopt($ch,CURLOPT_ENCODING ,'gbk2312');
	
	curl_setopt($ch, CURLOPT_TIMEOUT, 100);
	
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回
	
	$str = curl_exec($ch);
	$str=preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $str);
	return $str;
}
/**
 * 检测设备类型
 * @return string
 */
function checkequip(){
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	if(stristr($user_agent,'iPad')) {
		$equip= 'iPad';
	}else if(stristr($user_agent,'Android')) {
		$equip= 'Android';
	}else if(stristr($user_agent,'Linux')){
		$equip= 'Linux';
	}else if(stristr($user_agent,'iPhone')){
		$equip= 'iPhone';
	}else if(stristr($user_agent,'win 7')){
		$equip= 'win7';
	}else if(stristr($user_agent,'win 8')){
		$equip= 'win8';
	}else if(stristr($user_agent,'win 10')){
		$equip= 'win10';
	}else if(stristr($user_agent,'windows NT')){
		$equip= 'win NT';
	}
	return $equip;
}













