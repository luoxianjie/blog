<?php
namespace Home\Controller;


class PublicController extends CommonController{
	public function header(){
		
		
		$this->display('header');
	}
	public function footer(){
		$this->display('footer');
	}
}