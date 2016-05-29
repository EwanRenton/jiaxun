<?php
/**
 * Created by PhpStorm.
 * User: Ewan
 * Date: 2016/5/29
 * Time: 20:37
 */
namespace Home\Model;

use Think\Model;
class ArticleModel extends Model{
    public function listNews(){
        $page =I('p',1,'int');
        $limit=5;
        $NWcateid=M('artcate')->field('cate_id')->where("cate_name='ÐÂÎÅ' ")->find();
//        var_dump($NWcateid);
        $data=$this->where("art_cateid=7 and art_isshow=1")->order('art_addtime DESC')->page($page.','.$limit)->select();

        $count=M('article')->where("art_cateid='{$NWcateid["cate_id"]}' and art_isshow=1")->count();
//        print_r($data);
        $Page=new \Think\Page($count,$limit);
        $show=$Page->show();
        return array(
            "list" =>$data,"page"=>$show);
    }
}