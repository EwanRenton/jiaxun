<?php
/**
 * Created by PhpStorm.
 * User: Ewan
 * Date: 2016/5/28
 * Time: 13:58
 */

namespace Home\Controller;
use Think\Controller;

class MessageController extends CommonController
{
    public function index(){
        $data=D('message')->listMessage();
//        var_dump($data);
        $i=0;
        foreach($data['list'] as $item){
//            print_r($item);
            $back=M('message_reply')->where("reply_cmtid = '{$item['msg_id']}'")->find();
            $data['list'][$i]['reply']=$back;
            $i++;
        }
//        print_r($data);
        $this->assign('message',$data);
        $this->display();
    }
    public function addMessage(){
        if(IS_POST){
            $data['msg_name']=I('post.msg_name','游客','htmlspecialchars');
            $data['msg_content']=I('post.msg_content',null,'htmlspecialchars');
            $data['msg_tel']=I('post.msg_tel','','htmlspecialchars');
            $data['msg_addtime']=time();
            if(empty($data['msg_content'])){
                $this->error('请输入留言内容');
            }else{
                $back=M('message')->add($data);
                if($back){
                    $this->success('留言成功',U('/index.php/Home/Message/index'));
                }else{
                    $this->error('留言失败请等会重试');
                }
            }
        }
    }
    public function replyMessage(){
        if(IS_POST){
            $data['reply_user']=I('post.reply_user','游客','htmlspecialchars');
            $data['reply_content']=I('post.reply_content',null,'htmlspecialchars');
            $data['reply_cmtid']=I('post.msg_tel','','htmlspecialchars');
            $data['reply_addtime']=time();
        }
    }
}