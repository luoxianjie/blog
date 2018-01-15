<?php
namespace Home\Controller;


class CategoryController extends CommonController{
	public function index(){
		$this->assign('nav','cate');
		$blog=D('blogs');
		$count=$blog->count();
		$Page=new \Think\Page($count,6);
		$data=$blog->limit($Page->firstRow,$Page->listRows)->select();
		$cate=D('category');
		$comment=D('Words');
		foreach($data as $k=> $v){
			$arr=$cate->field('name')->find($v['cate']);
			$data[$k]['cate']=$arr['name'];
			$comments=$comment->where("bid = '".$v['id']."'")->count();
			$data[$k]['comments']=$comments;
		}
		$this->assign('blogs',$data);
		$this->assign('page',$Page->show());
		$this->display();
	}
	public function detail($id){
		$this->assign('nav','cate');
		$blog=D('blogs');
		$comment=D('Words');
		$cate=D('Category');
		$data=$blog->find($id);
		$data['comments']=$comment->where("bid ='".$data['id']."'")->count();
		$info=$cate->field('name')->find($data['cate']);
		$data['cate']=$info['name'];
		$this->assign('data',$data);
		$this->display();
	}
}