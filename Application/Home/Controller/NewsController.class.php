<?php
/**
 * Created by PhpStorm.
 * User: Ewan
 * Date: 2016/5/29
 * Time: 20:23
 */
namespace Home\Controller;
use Think\Controller;
class NewsController extends CommonController{
    public function index(){
        $cate_id=I('get.cate_id',9);
//        print_r($cate_id);
        $cate_name=I('get.cate_name','新闻');
//        print_r($cate_name);
        $data=D('article')->listNews($cate_id);
//        print_r($data);
        $this->assign('news_list',$data);
        $this->assign('cate_name',$cate_name);
        $this->display();
    }
    public function detailsNew(){
        $info=I('get.art_id',0,'int');
//        var_dump($info);
        $cate_id=M('article')->field('art_cateid')->where("art_id='{$info}'")->find();
//        var_dump($cate_id);
        $cate_name=M('artcate')->field('cate_name')->where("cate_id='{$cate_id['art_cateid']}'")->find();
//        print_r($cate_id);
//        print_r($info);
        $content=M('article')->where("art_id='{$info}'")->find();
//        print_r($content);
        $this->assign('art_info',$content);
        $this->assign('cate_name',$cate_name['cate_name']);
        $this->assign('cate_id',$cate_id);
        $this->assign('content',html_entity_decode($content['art_content']));
        $this->display();
    }

}