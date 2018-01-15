<?php
namespace Home\Controller;
use Think\Controller;

class CommonController extends Controller{
	public function _initialize(){
		header('Content-type:text/html;charset=utf-8');
		$this->islogin(); //判断是否登录
		$this->dataTotal();    //数据统计
		$this->userinfo();
		$this->header();
		$this->onlinenum();   //统计在线人数
	}
	public function islogin(){
		$user=D('user');
		if(!!$userid=$_COOKIE['userid']){
			$info=$user->field('nackname')->find($userid);
			$this->assign('user',$info['nackname']);
			$this->assign('islogin',1);
		}else{
			$this->assign('islogin',0);
		}
	}
	public function dataTotal(){
		$data=D('data');
		if(!isset($_COOKIE['userflag'])){
			setcookie('userflag','1',null,'/');
			$data->setI('today');
		}
		$info=$data->get();
		if($info['time']!=date('Y-m-d',time())){
			$data->data(array('id'=>1,'time'=>date('Y-m-d',time()),'today'=>1))->save();
		}
		$data->setI('total');
	}
	public function userinfo(){
		$equip=checkequip();
		$ipinfo=get_onlineip();
		$this->assign('ipinfo',$ipinfo);
		$this->assign('equip',$equip);
	}
	public function header(){
		$data=D('data');
		$this->assign('data',$data->get());
	}
	public function onlinenum(){
		$user=D('user');
		if(!!$id=$_COOKIE['userid']){
			$data=array();
			$data['id']=$id;
			$data['last_time']=time();
			$user->data($data)->save();
		}
		$map=array();
		$map['last_time']=array('gt',time()-1800);
		$online=$user->where($map)->count();
		$this->assign('online',$online);
	}
}