<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {

	
	public function _initialize(){
		$procate=M('procate');
		$article=M('article');
		$Cate=$procate->where('cate_pid=0')->select();
		$i=0;
		foreach($Cate as $item){
			$Cate[$i]['childCate']=$procate->where("cate_pid={$item['cate_order']}")->select();
			$i++;
		}
		$GScateid=M('artcate')->field('cate_id')->where("cate_name='首页巨幕'")->find();
//		print_r($GScateid);
		$NWcateid=M('artcate')->field('cate_id')->where("cate_name='新闻' ")->find();
//		print_r($NWcateid);
		$giantScreen=$article->order('art_addtime desc')->where("art_cateid='{$GScateid["cate_id"]}' and art_isshow=1")->select();
		$news=$article->where("art_cateid='{$NWcateid["cate_id"]}' and art_isshow=1")->select();


//		print_r($giantScreen);
		$this->assign('news',$news);
		$this->assign('giantScreen',$giantScreen);
		$this->assign('Cate',$Cate);
	}

}