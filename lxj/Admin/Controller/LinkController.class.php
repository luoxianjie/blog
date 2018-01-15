<?php
namespace Admin\Controller;


class LinkController extends CommonController{
	/**
	 * 增加友链
	 */
	public function addlink(){
		if(IS_POST){
			$link=D('links');
			if(!$link->create()){
				$link->getError();
			}else{
				if($link->add()){
					$this->success('友链新增成功',U('Link/showlink'));
				}else{
					$this->error('友链添加失败');
				}
			}
		}else{
			$this->display();
		}
	}
	/**
	 * 显示所有友链
	 */
	public function showlink(){
		$link=D('links');
		$count=$link->count();
		$Page= new \Think\Page($count,PAGESIZE);
		$show=$Page->show();
		$this->assign('page',$show);
		$this->assign('links',$link->order('id desc')->limit($Page->firstRow,$Page->listRows)->select());
		$this->display();
	}
	/**
	 * 修改友链
	 */
	public function editlink($id){
		$link=D('links');
		if(IS_POST){
			$data=I('post.');
			if($link->where(array('id'=>I('post.id')))->save($data)){
				$this->success('修改成功',U('showlink'));
			}else{
				$this->error('修改失败');
			}
		}else{
			$data=$link->find($id);
			$this->assign('id',$id);
			$this->assign('data',$data);
			$this->display();
		}
	}
	/**
	 * 删除友链
	 */
	public function deletelink($id){
		$link=D('links');
		if(false===$link->where(array('id'=>$id))->delete()){
			$this->error('删除失败');
		}else{
			$this->success('删除成功',PREV_URL);
		}
	}
	/**
	 * 修改审核状态
	 */
	public function updatestatus($id){
		$link=D('links');
		$link->data(array('id'=>$id,'status'=>1))->save();
		$this->success('修改成功',PREV_URL);
	}
}