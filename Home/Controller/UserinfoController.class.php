<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/24 0024
 * Time: 下午 1:01
 */

namespace Home\Controller;
use Think\Controller;

class UserinfoController extends Controller
{
     public function userinfo ()
     {
         //基本信息回显
          $model   = M('Buser');
          $info    = $model->where('uid = '.session('uid') ) -> find();
         //期望工作回显
          $model2  = M('Uholp');
          $holp    = $model2->where('uid ='.session('uid'))->find();
         //工作经验回显
          $model3  = M('Undergo');
          $work    = $model3->where('user_id ='.session('uid'))->find();
         //学历信息回显
          $model4  = M('Uedu');
          $edu     = $model4->where('uid='.session('uid'))->find();
         //自我描述
         $model5 = M('Uparsent');
         $present = $model5->where('uid='.session('uid'))->find();
         //作品展示
         $model6 = M('Ureveal');
         $reveal = $model6->where('uid='.session('uid'))->find();
          $this->assign('info',$info);
          $this->assign('holp',$holp);
          $this->assign('work' , $work );
          $this->assign('edu' , $edu );
         $this->assign('present' , $present );
         $this->assign('reveal' , $reveal );
          $this->display();
    }
    public function userlist()
    {
       //简历信息详情视图
        $this->display();
    }
    public function uploadfile()
    {//简历上传的页面
        $post = I('post.');
        $cfg = array();

    }
    public function basOk(){
        $post = I('post.');
        dump($post);die;
        $model = M('Buser');
        $bas = $model->add($post);
        if($bas){
            $this->success('添加成功，您可以去添加期望工作啦',U('work'),3);
        }
    }
    public function workOk(){
        $post = I('post.');
        $model = M('Uholp');
        $hope = $model->add($post);
        if($hope){
            $this->success('添加成功，请继续完善项目经验',U('undergo'),3);
        }
    }
    public function undergoOk()
    {
        $post = I('post.');
        $model= M('Undergo');
        $data = $model->add($post);
        if($data){
            $this->success('添加成功，还有学历没有完成哦',U('edu'),3);
        }
    }
    public function eduOk()// 
    {
        $post = I('post.');
        $model = M('Uedu');
        $data = $model->add($post);
        if($data){
            $this->success('您可以去做自我介绍咯',U('parsent'),3);
        }
    }
    public function parsentOk()
    {
        //自我介绍
        $post = I('post.');
        $model = M('Uparsent');
        //dump($post);die;
        $data = $model->add($post);
        if($data){
            $this->success('您的自我介绍很精彩，祝您能找到称心如意的工作',U('userinfo'),3);
        }
    }
    public function revealOk()
    {
        //作品展示
        $post = I('post.');
        //dump($post);die;
        $model = M('Ureveal');
        $reveal = $model->add($post);
        if($reveal){
            $this->success('您简历已经全部完善了，快去看看吧',U('userinfo'),3);
        }
    }
}