<?php
namespace Admin\Controller;
use Admin\Model\PicBoxModel;

class ResourceController extends CommonController{
	/**
	 * 增加资源
	 */
	public function addRes(){
		if(IS_POST){
			$res=D('Resource');
			$data=I('post.');
			$data['time']=time();
			if($res->create()){
				if($res->add($data)){
					$this->success('增加成功',U('Resource/showRes'));
				}else{
					$this->error('增加失败');
				}
			}else{
				echo $res->getError();
			}
		}else{
			$this->display();
		}
	}
	/**
	 * 显示所有资源
	 */
	public function showRes(){
		$res=D('Resource');
		$count=$res->count();
		$Page=new \Think\Page($count,PAGESIZE);
		$data=$res->limit($Page->firstRow,$Page->listRows)->select();
		$this->assign('page',$Page->show());
		$this->assign('data',$data);
		$this->display();
	}
	/**
	 * 修改资源
	 */
	public function editRes($id){
		if(IS_POST){
			$res=D('Resource');
			$data=I('post.');
			$data['time']=time();
			if($res->where("id = $id")->save($data)){
				$this->success('修改成功',U('Resource/showRes'));
			}else{
				$this->error('修改失败');
			}
		}else{
			$res=D('Resource');
			$this->assign('data',$res->find($id));
			$this->display();
		}
	}
	/**
	 * 删除资源
	 */
	public function deleteRes($id){
		$res=D('Resource');
		if($res->where("id = $id")->delete()){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}
}