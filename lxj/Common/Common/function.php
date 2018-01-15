<?php
function checkverify($code,$id=''){
	$verify=new \Think\Verify();
	return $verify->check($code,$id);
}