<?php
namespace Home\Controller;


class WordsController extends CommonController {
	public function comment(){
		$this->assign('nav','comments');
		$this->display();
	}
	/**
	 * 留言
	 */
	public function leave(){
		if(IS_POST){
			$data=I('post.');
			if(!checkverify($data['code'],1)){
				$this->error('验证码有误');
			}
			$words=D('words');
			if(isset($_COOKIE['userid'])){
				$data['uid']=$_COOKIE['userid'];
			}else{
				$data['uid']=0;
			}
			$data['is_comment']=false;
			$data['time']=time();
			if($words->data($data)->add()){
				$this->success('留言成功');
			}else{
				$this->error('留言失败');
			}
		}else{
			$this->assign('nav','leave');
			$this->display();
		}
	}
	//验证码
	public function verify($id){
		$verify=new \Think\Verify();
		$verify->length=4;
		$verify->entry($id);
	}
}

?>