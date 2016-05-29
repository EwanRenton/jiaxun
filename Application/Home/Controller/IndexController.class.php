<?php
namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class IndexController extends CommonController {
//	public function school(){
//		$menber  = M('Index');
//		$result= $menber->where(array('i_class'=>4))->select();  //学校简介
//		$this->assign('data',$result[0]);
//		$this->display();
//	}
//
	public function index(){
		$this->display();
	}




		
	


}