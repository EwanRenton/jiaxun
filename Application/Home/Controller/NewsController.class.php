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
        $data=D('article')->listNews();
        $this->assign('news_list',$data);
        $this->display();
    }
    public function detailsNew(){
        $info=I('get.art_id',0,'int');
//        print_r($info);
        $content=M('article')->where("art_id='{$info}'")->find();
//        print_r($content);
        $this->assign('content',html_entity_decode($content['art_content']));
        $this->display();
    }

}