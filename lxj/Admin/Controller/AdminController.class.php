<?php
namespace Admin\Controller;
use Think\Controller;

class adminController extends Controller{
	public function login(){
		
		if(IS_POST){
			$data=I('post.');
			if(!checkverify($data['code'])){
				$this->error('验证码有误');
			}
			$admin=D('admin');
			$info=$admin->where(array('name'=>$data['name']))->find();
			if($info){
				if(MD5($data['passwd'])!=$info['passwd']){
					$this->error('密码有误');
				}else{
					session_start();
					$_SESSION['user']=$info['name'];
					$this->redirect('Index/index');
				}
			}else{
				$this->error('用户名有误');
			}
		}else{
			$this->display();
		}
	}
	public function logout(){
		session_start();
		session_destroy();
		$this->redirect('admin/login');
	}
	public function verify(){
		
		$verify=new \Think\Verify();
		$verify->length=4;
		$verify->entry();
	}
}