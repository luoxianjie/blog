<?php
function upload($name='cover'){
	$upload = new \Think\Upload();   // 实例化上传类
	$upload->maxSize   =     3145728 ;// 设置附件上传大小
	$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	$upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
	// 上传单个文件
	$info   =   $upload->uploadOne($_FILES[$name]);
	if(!$info) {// 上传错误提示错误信息
		die('图片上传出错');
	}else{// 上传成功 获取上传文件信息
		return $url=$info['savepath'].$info['savename'];
	}
}