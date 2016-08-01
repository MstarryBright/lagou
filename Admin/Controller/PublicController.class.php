<?php

namespace Admin\Controller;

use Think\Controller;
use Think\Verify;

class PublicController extends Controller
{
    //载入登录页面
    public function login()
    {
        $this->display();
    }

    //登录验证
    public function index()
    {
        //校验码判断
        $verify = new Verify();
        //验证码内部 方法验证
        if (!$verify->check($_POST['code'])) {
            $this->assign('errorinfo', '验证码有误');
            $this->display('login');   //跳转
//        }
        //接收数据
        $post = I('post.');
        //实例化
        $model = M('Aduser');
        //查询
        $data = $model->where($post)->find();
        //判断
        if ($data) {
            #存在对应的用户，用户信息的持久化，并且跳转到后台的首页
            session('adid', $data['id']);#用户id信息
            session('adame', $data['username']);#用户名信息
            session('level', $data['level']);#用户组信息
            #跳转
            $this->success('登录成功', U('Index/index'), 2);
        } else {
            #用户不存在
            $this->error('用户名或密码错误', U('login'), 3);
        }
    }

    //验证码
    public function captcha()
    {
        //配置
        $cfg = array(
            'fontSize' => 50,
            'length' => 4,
            'useNoise' => true,
            'useCurve' => false,
        );
        //实例化验证码类
        $verify = new Verify($cfg);
        //输出验证码
        $verify->entry();
    }

    //退出登录
    public function loginOut()
    {
        session(null);
        //跳转登录页面
        $this->success('退出成功!', U('login'), 2);
    }


}







