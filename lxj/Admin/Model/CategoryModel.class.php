<?php
namespace  Admin\Model;
use Think\Model;

class CategoryModel extends Model{
	public function getCate($id=''){
		$data=$this->select();
		$html="";
		foreach($data as $v){
			if($v['id']==$id){
				$html.="<option selected='selected' value=".$v['id'].">";
			}else{
				$html.="<option value=".$v['id'].">";
			}
			$html.=$v['name'];
			$html.="</option>";
		}
		return $html;
	}
}