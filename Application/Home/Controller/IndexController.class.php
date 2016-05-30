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
		$ban_pageid=M('banner_page')->field('bp_id')->where("bp_name='首页'")->find();
		$imgs=M('banner')->where("ban_pageid='{$ban_pageid["bp_id"]}'")->order('ban_order desc')->limit(6)->select();
//		print_r($imgs);
		$trainCateId=M('artcate')->field('cate_id')->where("cate_name='员工培训'")->find();
//		print_r($trainCateId);
		$train=M('article')->where("art_cateid='{$trainCateId["cate_id"]}'")->order('art_addtime desc')->limit(2)->select();
//		print_r($train);
//		$train['art_content']=html_entity_decode($train['art_content']);
		$this->assign('train',$train);
		$this->assign('imgs',$imgs);
		$this->display();
	}




		
	


}