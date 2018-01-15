<?php
namespace Admin\Controller;
use Admin\Model\CategoryModel;


class BlogController extends CommonController{
	/**
	 * 增加文章
	 */
	public function addBlog(){
		
		if(IS_POST){
			$blog=D('blogs');
			$data=I('post.');
			$data['time']=time();
			$data['attr']=implode(',', $data['attr']);
			if($blog->add($data)){
				$this->success('发表成功',U('Blog/showBlog'));
			}else{
				$this->error('发表失败');
			}
		}else{
			$cate=new CategoryModel();
			$this->assign('cate',$cate->getCate());
			$this->display();
		}
	}
	/**
	 * 显示所有文章
	 */
	public function showBlog(){
		$blog=D('blogs');
		$cate=D('Category');
		$data=$blog->order('time desc')->select();
		$info=array();
		foreach($data as $k=> $v){
			$info[$k]=$v;
			$arr=$cate->find($data[$k]['cate']);
			$info[$k]['cate']=$arr['name'];	
		}
		$this->assign('info',$info);
		$this->display();
	}
	/**
	 * 修改文章
	 */
	public function editBlog($id){
		$blog=D('blogs');
		if(IS_POST){
		$blog=D('blogs');
			$data=I('post.');
			$data['time']=time();
			$data['attr']=implode(',', $data['attr']);
			if($blog->where("id =$id")->save($data)){
				$this->success('修改成功',U('Blog/showBlog'));
			}else{
				$this->error('修改失败');
			}
		}else{
			$info=$blog->find($id);
			$attr=explode(',',$info['attr']);
			if(in_array('front',$attr)){
				$info['front']=1;
			}
			if(in_array('recomment',$attr)){
				$info['recomment']=1;
			}
			$cate=new CategoryModel();
			$info['cate']=$cate->getCate($info['cate']);
			$this->assign('data',$info);
			$this->display();
		}
	}
	/**
	 * 删除文章
	 */
	public function deleteBlog($id){
		$blogs=D('blogs');
		if($blogs->where("id = $id")->delete()){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}
}