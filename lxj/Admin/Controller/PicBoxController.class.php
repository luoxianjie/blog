<?php
namespace Admin\Controller;


class PicBoxController extends CommonController{
	/**
	 * 增加相册
	 */
	public function addPicBox(){
		if(IS_POST){
			$url=upload();
			$data=I('post.');
			$data['url']=$url;
			$picbox=D('PicBox');
			if($picbox->add($data)){
				$this->success('相册创建成功',U('showpicbox'));
			}else{
				$this->error('相册创建失败');
			}
		}else{
			$this->display();
		}
	}
	/**
	 * 显示所有相册
	 */
	public function showPicBox(){
		$picbox=D('PicBox');
		$count=$picbox->count();
		$page =new \Think\Page($count,PAGESIZE);
		$data=$picbox->limit($page->firstRow,$page->listRows)->select();
		$this->assign('data',$data);
		$this->display();
	}
	/**
	 * 修改相册
	 */
	public function editPicBox($id){
	if(IS_POST){
			$data=I('post.');
			if($_FILES['cover']['size']){
				$url=upload();
				$data['url']=$url;
			}
			$picbox=D('PicBox');
			if($picbox->data($data)->save()){
				$this->success('相册修改成功',U('showpicbox'));
			}else{
				$this->error('相册修改失败');
			}
		}else{
			$picbox=D('PicBox');
			$data=$picbox->find($id);
			$this->assign('data',$data);
			$this->display();
		}
	}
	/**
	 * 删除相册
	 */
	public function deletePicBox($id){
		$picbox=D('PicBox');
		$info=$picbox->field('url')->find($id);
		if($picbox->where("id = $id")->delete()){
			$file='./Uploads/'.$info['url'];
			unlink($file);
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}
	
}