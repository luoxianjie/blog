<?php
namespace  Admin\Model;
use Think\Model;

class PicBoxModel extends Model{
	
	public function getAllName(){
		$data=$this->field('id,name')->select();
		$html="";
		$html='<option value="0">---请在资源类型为相片时选择----</option>';
		foreach($data as $v){
			$html.="<option value=".$v['id']." >";
			$html.=$v['name'];
			$html.="</option>";
		}
		return $html;
		
	}
}