<?php
namespace Home\Controller;


class ResourceController extends CommonController {
	public function index(){
		$this->assign('nav','resource');
		$this->display();
	}
}