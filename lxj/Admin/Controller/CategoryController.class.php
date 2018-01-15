<?php
namespace Admin\Controller;


class CategoryController extends CommonController{
	/**
	 * 增加分类
	 */
	public function addCate(){
		if(IS_POST){
			$cate=D('category');
			$data=I('post.');
			if($cate->create()){
				if($cate->add($data)){
					$this->success('新增分类成功',U('Category/showcate'));
				}else{
					$this->error('新增分类失败');
				}
			}else{
				echo $cate->getError();
			}
		}else{
			$this->display();
		}
	}
	/**
	 * 显示所有分类
	 */
	public function showCate(){
		$cate=D('Category');
		$this->assign('data',$cate->select());
		$this->display();
	}
	/**
	 * 修改分类
	 */
	public function editCate($id){
		$cate=D('Category');
		if(IS_POST){
			$data=I('post.');
			if($cate->where("id = $id")->save($data)){
				$this->success('修改成功',U('Category/showCate'));
			}else{
				$this->error('修改失败');
			}
		}else{
			$this->assign('data',$cate->find($id));
			$this->display();
		}
	}
	/**
	 * 删除分类
	 */
	public function deleteCate($id){
		$cate=D('Category');
		if($cate->where("id = $id")->delete()){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}
}