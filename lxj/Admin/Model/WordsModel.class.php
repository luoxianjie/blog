<?php
namespace  Admin\Model;
use Think\Model;

class WordsModel extends Model{
	public function leave(){
		$this->display();
	}
	public function comment(){
		$this->display();
	}
}