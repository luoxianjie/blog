<?php
namespace Admin\Controller;


class TalksController extends CommonController{
	/**
	 * 增加说说
	 */
	public function addTalk(){
		if(IS_POST){
			$talk=D('talks');
			$data=I('post.');
			$data['pics']=upload('pics');
			$data['time']=time();
			if($talk->create()){
				if($talk->add($data)){
					$this->success('发布成功',U('Talks/showTalk'));
				}else{
					$this->error('发布失败');
				}
			}else{
				echo $talk->getError();
			}
		}else{
			$this->display();
		}
	}
	/**
	 * 显示所有说说
	 */
	public function showTalk(){
		$talk=D('talks');
		$this->assign('data',$talk->select());
		$this->display();
	}
	/**
	 * 修改说说
	 */
	public function editTalk($id){
		$talk=D('talks');
		if(IS_POST){
			$data=I('post.');
			if($_FILES["pics"]['size']){
				$data['pics']=upload('pics');
			}
			$data['time']=time();
			if($talk->where("id = $id")->save($data)){
				$this->success('修改成功',U('Talks/showTalk'));
			}else{
				$this->error('修改失败');
			}
		}else{
			
			$this->assign('data',$talk->find($id));
			$this->display();
		}
	}
	/**
	 * 删除说说
	 */
	public function deleteTalk($id){
	    $talk=D('talks');
		$info=$talk->field('pics')->find($id);
		if($talk->where("id = $id")->delete()){
			$file='./Uploads/'.$info['pics'];
			unlink($file);
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}
}