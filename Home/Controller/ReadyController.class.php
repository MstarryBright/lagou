<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/26 0026
 * Time: 下午 9:37
 */

namespace Home\Controller;

use Think\Controller;

class ReadyController extends Controller
{
    public function ready()
    {
        $model = M('Ready');
        $data = $model->where('user_id=' . session('uid'))->select();
        $this->assign('data', $data);
        $this->display();
    }
<<<<<<< .mine

    public function readyForm()
=======
    public function readyForm()//订阅职位的表单视图
>>>>>>> .r99
    {
        $this->display();
    }

    public function readyOk()
    {
        $post = I('post.');
        $model = M('Ready');
        $data = $model->add($post);
        if($data){
            $this->success('订阅成功',U('ready'),3);
        }
    }
    public function collect()//收藏职位的详情视图
    {
        $this->display();
    }
    public  function delete()
    {
        $id = I('get.id');
        $modle = M("Ready");
        $data = $modle->delete($id);
        if($data){
            $this->success('删除成功，可以再看看别的职位哟',U('ready'),2);
        }
    }
}