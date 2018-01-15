<?php
namespace Home\Controller;


class UserController extends CommonController {
	/**
	 * 用户登陆
	 */
    public function login(){
    	if(IS_POST){
        	$user = D('user');
        	$data=I('post.');
        	if(!$info=$user->where(array('nackname'=>$data['name']))->find()){
        		$this->error('用户名不存在！');
        	}else{
        		
        		if(md5($data['password'])!=$info['passwd']){
        			$this->error('密码有误');
        		}else{
        			if(!I('post.remember')){
        				setcookie('userid',$info['id'],null,'/');
        			}else{
        				setcookie('userid',$info['id'],time()+3600*24*30,'/');
        			}
        			$data=D('data');
        			$data->setI('online');
        			$user->where(array('id'=>$info['id']))->save(array('login_time'=>time()));
        			$this->success('登陆成功',U('Index/index'));
        		}
        	}
    	}else{
    		$this->display();
    	}
    }
    /**
     * 用户注册
     */
    public function register(){
    	if(IS_POST){
    		$user=D('user');
    		
    		if($user->create()){
    			
    			if(!$user->add()){
    				$this->error('用户注册失败',U('user/register'));
    			}else{
    				$this->success('用户注册成功',U('user/login'));
    			}
    			
    		}else{
    			$user->getError();
    		}
    	
    	}else{
    		$this->display();
    	}
    }
    /**
     * 用户退出系统
     */
    public function logout(){
    	setcookie('userid',null,time()-3600,'/');
    	$user=D('user');
    	$data=array();
		$data['id']=$_COOKIE['userid'];
		$data['last_time']=time()-1800;
		$user->data($data)->save();
    	$this->redirect('Index/index');
    }
}