<?php
namespace Home\Controller;


class TalkController extends CommonController {
	public function index(){
		$this->assign('nav','talk');
		$this->display();
	}
}