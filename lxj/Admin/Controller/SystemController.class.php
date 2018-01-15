<?php
namespace Admin\Controller;


class SystemController extends CommonController{
	/**
	 * 系统配置
	 */
	public function config(){
		if(IS_POST){
			
		}else{
			$this->display();
		}
	}
	/**
	 * 管理员管理
	 */
	public function manage(){
		$this->display();
	}
	
}