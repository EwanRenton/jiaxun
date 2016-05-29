<?php
/**
 * Created by PhpStorm.
 * User: Ewan
 * Date: 2016/5/29
 * Time: 18:22
 */
namespace Admin\Controller;
use Think\Controller;
class NavController extends CommonController {
    public function sort(){ //文章分类页

        if(IS_POST){    //二级分类添加
            $sec_class = I('post.sec_class');
            $cate_pid = I('post.cate_pid');
            $sec_cate = M('Procate');
            $cate_order = $sec_cate->where(array('cate_pid'=>$cate_pid))->order('cate_order ASC')->limit(1)->select();
            if(!$cate_order){
                $order = 1;
            }else{
                $order = $cate_order[0]['cate_order']+1;
            }
            $arr = array(
                'cate_order' => $order,
                'cate_pid' => $cate_pid,
                'cate_name' => $sec_class
            );
            $res = $sec_cate->add($arr);
        }
        $procate=M('index_nav');
        $cate = $procate->order('cate_order ASC')->select();

        //重构分类列表
        foreach($cate as $key => $val){
            if($val['cate_pid'] == 0){
                $one_cate[$key] = $val;
            }
        }
        foreach($one_cate as $k => $v){
            foreach($cate as $ke => $va){
                if($v['cate_id'] == $va['cate_pid']){
                    $one_cate[$k]['sid'][] = $va;
                }
            }
        }
        // dump($one_cate);die;
        $data=array(
            'cate'=>$one_cate,
        );

        $this->assign($data);
        $this->display();
    }
}