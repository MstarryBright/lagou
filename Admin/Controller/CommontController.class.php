<?php

namespace Admin\Controller;
use Think\Controller;

//权限分配
class CommontController extends Controller
{
    public function _initialize()
    {
        //判断用户是否登录 (依据是session中adid是否存在)
        $adid = session('adid');
        //empty方法只接受变量,不接受返回值
        if (empty($adid)) {
            $url = U('Public/login');
            echo "<script>top.location.href='$url';</script>";
        }
        //RBAC权限判断
        //获取当前请求的控制器名 和方法名
        $controller = strtolower(CONTROLLER_NAME);
        $action = strtolower(ACTION_NAME);
        //连接控制器名和方法名
        $ac = $controller . '/' . $action;
        //获取用户的level(权限) id
        $levelid = session('level');
        //获取全部的权限信息
        $auths = C('RBAC_AUTHS');
        //获取当前用户所在用户组的权限列表
        $auth = $auths[$levelid];
        //判断是否哪部分管理
        if ($levelid != '1') {
            //RABC比较  ...
            if (!in_array($ac, $auth) && !in_array($controller.'/*', $auth)) {
                //提示 跳转
                $this->error('正在跳转...', U('Index/index'), 2);die;
            }
        }


    }


}