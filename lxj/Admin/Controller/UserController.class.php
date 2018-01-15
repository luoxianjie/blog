<?php
namespace Admin\Controller;


class UserController extends CommonController{
	/**
	 * 增加会员
	 */
	public function adduser(){
		if(IS_POST){
			$user=D('user');
			if(!$user->create()){
				$user->getError();
			}else{
				if($user->add()){
					$this->success('会员新增成功',U('User/showuser'));
				}else{
					$this->error('会员添加失败');
				}
			}
		}else{
			$this->display();
		}
	}
	/**
	 * 显示所有会员
	 */
	public function showuser(){
		$user=D('user');
		$count=$user->count();
		$Page= new \Think\Page($count,PAGESIZE);
		$show=$Page->show();
		$this->assign('page',$show);
		$this->assign('user',$user->limit($Page->firstRow,$Page->listRows)->select());
		$this->display();
	}
	/**
	 * 修改会员
	 */
	public function edituser($id){
		$user=D('user');
		if(IS_POST){
			$data=I('post.');
			if($user->where(array('id'=>I('post.id')))->save($data)){
				$this->success('修改成功',U('showuser'));
			}else{
				$this->error('修改失败');
			}
		}else{
			$data=$user->find($id);
			$this->assign('id',$id);
			$this->assign('data',$data);
			$this->display();
		}
	}
	/**
	 * 删除会员
	 */
	public function deleteuser($id){
		$user=D('user');
		if(false===$user->where(array('id'=>$id))->delete()){
			$this->error('删除失败');
		}else{
			$this->success('删除成功',PREV_URL);
		}
	}
	/**
	 * 修改审核状态
	 */
	public function updatestatus($id){
		$user=D('user');
		$user->data(array('id'=>$id,'status'=>1))->save();
		$this->success('修改成功',PREV_URL);
	}
}