<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/22 0022
 * Time: 下午 10:02
 */

namespace Home\Controller;

use Think\Controller;

class LoginController extends Controller
{
<<<<<<< .mine
<<<<<<< .mine
    public function adduser()
    {
        $this->display();
    }

    public function adduserOk()
    {
        $post = I('post.');
        $model = M('User');
        dump($model);
    }
====== =
====== =
    public function adduser()
    {
        $this->display();
    }

    public function adduserOk()
    {
        $post = I('post.');
        $model = M('User');
        dump($model);
    }
>>>>>>> .r72
    public function login()
=======
    public function login()//登录视图页
>>>>>>> .r100
    {
        $this->display();
    }
<<<<<<< .mine

    public function loginOk()
=======
    public function loginOk()//登录成功
>>>>>>> .r100
    {
        $post = I('post.');
        $model = M('User');
        $data = $model->where($post)->find();
        $lasttime = time();
       // dump($data);die;
            if($data){
                session('uid',$data['id']);
                session('email',$data['email']);
                session('lasttime',$data['lasttime']);
                session('addtime',$data['addtime']);
                $model->execute("update la_user set lasttime={$lasttime} where id={$data['id']}");
                $this->success('登录成功',U('Pros/index'),3);
            } else {
                $this->error('邮箱或者密码错误了',U('login'),3);
            }
    }
    public function clogin()
    {
       //公司登录视图
        $this->display();
    }
    public function cloginOk()
    {
        //公司登录成功页面
        $post = I('post.');
        $model= M('Addcp');
        $data = $model->where($poost)->select();
<<<<<<< .mine
        <<<<<<< .
        mine
        if ($data) {
            session('uid', $data['id']);
            session('useername', $data['username']);
            session('phone', $data['phone']);
            session('email', $data['data']);
            session('lasttime', $data['lasttime']);
            session('addtime', $data['addtime']);
            session('power', $data['power']);
            session('rank', $data['rank']);
            $this->success('登录成功', U('Index/index'), 3);
            ====== =
            if ($data) {
                session('uid', $data['id']);
                session('useername', $data['username']);
                session('phone', $data['phone']);
                session('email', $data['email']);
                session('lasttime', $data['lasttime']);
                session('addtime', $data['addtime']);
                session('power', $data['power']);
                session('rank', $data['rank']);
                $this->success('登录成功', U('Pros/index'), 3);
                >>>>>>> .
                r72
=======
        if($data){
            session('cuid',$data['id']);
            session();
            $this->success('恭喜您！来到了寻找大腿的世界',U('Pros/index'),3);
>>>>>>> .r100
        } else {
<<<<<<< .mine
                $this->error('邮箱或者密码错误了', U('login'), 3);
            }
=======
            $this->error('不好意思，您可能把邮箱或者密码记错了',U('clogin'),3);
>>>>>>> .r100
        }

    public function loginOut()//退出登录
    {
<<<<<<< .mine
        <<<<<<< .
        mine
        session('username', null);
        $this->success('您已退出登录', U('Index/index'), 3);
=======
        session('username', null);
        $this->success('您已退出登录', U('Pros/index'), 3);
>>>>>>> .r72
=======
        session(null);
        $this->success('您已退出登录',U('Pros/index'),3);
>>>>>>> .r100
    }
    public function loginajax()
    {
        //个人用户登录验证邮箱是否注册
        $email = I('post.email');
        $model = M('User');
        $data = $model->where("email = '$email'")->select();
        if($data){
            echo json_encode(array(
                    'emailOk' => 'chacksuccess',
                ));
        }else {
             echo json_encode(array(
                    'emailOk' => 'chackerror',
                ));
        }
    }
    public function cloginajax()
    {
        //公司用户登录验证邮箱是否注册
        $email = I('post.email');
        $model = M('User');
        $data = $model->where("email = '$email'")->select();
        if($data){
            echo json_encode(array(
                    'emailOk' => 'chacksuccess',
                ));
        }else {
             echo json_encode(array(
                    'emailOk' => 'chackerror',
                ));
        }
    }
}