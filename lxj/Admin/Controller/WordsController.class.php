<?php
namespace Admin\Controller;


class WordsController extends CommonController{
	/**
	 * 留言处理
	 */
	public function leave(){
		$Words=D('words');
		$count=$Words->count();
		$Page=new \Think\Page($count,PAGESIZE);
		$data=$Words->limit($Page->firstRow,$Page->listRows)->select();
		$leave=array();
		foreach($data as $v){
			if($v['uid']>0){
				$user=D('user');
				$info=$user->field('nackname')->find($v['uid']);
				$v['name']=$info['nackname'];
			}
			$leave[]=$v;
		}
		$this->assign('data',$leave);
		$this->display();
	}
	/**
	 * 显示详细留言信息
	 */
	public function showleave($id){
		$leave=D('words');
		$data=$leave->find($id);
		if($data['uid']>0){
			$user=D('user');
			$info=$user->field('nackname')->find($v['uid']);
			$data['name']=$info['nackname'];
		}
		$this->assign('data',$data);
		$this->display();
	}
	/**
	 * 修改留言信息
	 */
	public function editleave($id){
		$leave=D('words');
		if(IS_POST){
			$data=I('post.');
			$data['is_callback']=1;
			if($leave->data($data)->save()){
				$this->success('修改成功',U('leave'));
			}else{
				$this->error('修改失败');
			}
		}else{
			$data=$leave->find($id);
			if($data['uid']>0){
				$user=D('user');
				$info=$user->field('nackname')->find($v['uid']);
				$data['name']=$info['nackname'];
			}
			$this->assign('data',$data);
			$this->display();
		}
	}
	/**
	 * 删除留言
	 */
	public function deleteleave($id){
		$words=D('words');
		if($words->where("id = $id")->delete()){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
		
	}
	/**
	 * 评论处理
	 */
	public function comment(){
		
	}
	
}