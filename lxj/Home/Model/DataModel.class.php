<?php
namespace Home\Model;
use Think\Model;

class DataModel extends Model{
	public function get($field){
		return $data=$this->field($field)->find(1);
	}
	public function setI($field){
		$this->where('id = 1')->setInc($field);
	}
	public function setD($field){
		$this->where('id = 1')->setDec($field);
	}
}