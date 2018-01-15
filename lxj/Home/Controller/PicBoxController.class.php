<?php
namespace Home\Controller;


Class PicBoxController extends CommonController{
	public function index(){
		$this->assign('nav','picbox');
		$this->display();
	}
}