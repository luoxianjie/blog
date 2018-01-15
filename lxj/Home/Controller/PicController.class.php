<?php
namespace Home\Controller;


Class PicController extends CommonController{
	public function index(){
		$this->assign('nav','picbox');
		$this->display();
	}
}
