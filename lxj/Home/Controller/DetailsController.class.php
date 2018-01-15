<?php
namespace Home\Controller;


Class DetailsController extends CommonController{
	public function index(){
		$this->assign('nav','cate');
		$this->display();
	}
}