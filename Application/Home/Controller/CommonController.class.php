<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {

	
	public function _initialize(){
		$artCate=M('artcate');
		$article=M('article');
		$Cate=$artCate->where("cate_name!='首页巨幕' && cate_pid=0 &&cate_name!='滑动导航'")->limit(6)->select();
		$i=0;
		foreach($Cate as $item){
			$Cate[$i]['childCate']=$artCate->where("cate_pid={$item['cate_id']}")->select();
			$i++;
		}
		$navBackColor=array('1','2','3','4','5');
//		print_r($Cate);
		$GScateid=$artCate->field('cate_id')->where("cate_name='首页巨幕'")->find();
//		print_r($GScateid);
		$navcateid=$artCate->field('cate_id')->where("cate_name='滑动导航'")->find();
		$NWcateid=$artCate->field('cate_id')->where("cate_name='行业新闻' ")->find();
//		print_r($NWcateid);
		$giantScreen=$article->order('art_addtime desc')->where("art_cateid='{$GScateid["cate_id"]}' and art_isshow=1")->limit(3)->select();
		$news=$article->where("art_cateid='{$NWcateid["cate_id"]}' and art_isshow=1")->select();

		$nav=$article->where("art_cateid='{$navcateid["cate_id"]}' and art_isshow=1")->limit(5)->select();
		$i=0;
		foreach($nav as $item){
			$nav[$i]['backcolor']=$navBackColor[$i];
			$i++;
		}
//		print_r($nav);
		$this->assign('nav',$nav);
		$this->assign('news',$news);
		$this->assign('giantScreen',$giantScreen);
		$this->assign('Cate',$Cate);
	}

}