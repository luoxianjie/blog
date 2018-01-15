<?php
namespace Admin\Controller;

class PublicController extends CommonController{
	public function top(){
		session_start();
		$this->assign('user',$_SESSION['user']);
		$this->display();
	}
	public function sidebar(){
		if(!@isset($_GET['side'])){
			$this->assign('nav','index');
		}else{
			$this->assign('nav',I('get.side'));
		}
		$this->display();
	}
	public function upload(){
		if(IS_POST){
			$url=upload('up_tb');
			echo "<script> window.opener.document.getElementById('tb').value='".$url."';window.close();</script>";
		}else{
			$this->display();
		}
	}
}