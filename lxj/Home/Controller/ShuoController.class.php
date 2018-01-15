<?php
namespace Home\Controller;


class ShuoController extends CommonController {
	public function index(){
		$this->assign('nav','talk');
		$this->display();
	}
}