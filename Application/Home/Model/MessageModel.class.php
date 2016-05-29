<?php
/**
 * Created by PhpStorm.
 * User: Ewan
 * Date: 2016/5/28
 * Time: 15:30
 */
namespace Home\Model;

use Think\Model;
class MessageModel extends Model{
    public function listMessage(){
        $page =I('p',1,'int');
        $limit=5;
        $data = $this->order('msg_addtime DESC')->page($page.','.$limit)->select();
        $count=$this->count();
        $Page=new \Think\Page($count,$limit);
        $show=$Page->show();
        return array(
            "list" =>$data,"page"=>$show);
    }
}