<?php
namespace Admin\Controller;
use Think\Controller;

class CommonController extends Controller{
	public function _initialize(){
		header('Content-type:text/html;charset=utf-8');
		$this->checklogin();
	}
	public function checklogin(){
		if(!isset($_SESSION['user'])){
			$this->redirect('Admin/login');
		}
	}
}