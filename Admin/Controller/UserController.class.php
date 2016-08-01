<?php

namespace Admin\Controller;

use Think\Controller;
use Think\Page;

//后台管理员控制器
class UserController extends Controller
{
    //添加用户
    public function add()
    {
        $model = M('Aduser');
        $data = $model->select();
        $this->assign('data', $data);
        $this->display();
    }
    function addOk()
    {
        //添加
        $model = M('Aduser');
        //创建数据对象
        $model->create();
        $res = $model->add();
        if ($res) {
            $this->success('添加成功', U('showlist'), 1);
        } else {
            $this->error('添加失败', U('showlist'), 2);
        }
    }
    //展示
    public function showlist()
    {
        $model = M('Aduser');
        //分页
        //1.查询表中的总记录数
        $count = $model->count();
        //2.实例化分页类 至少传递一个参数
        $page = new Page($count, 3);
        //3.自定义
        $page -> setConfig('prev','上一页');
        $page -> setConfig('next','下一页');
        $page->setConfig('first', '首页');
        $page->setConfig('last', '末页');
        $page->rollPage = 3; //每页显示条数
        $page->lastSuffix = false; //末页是否显示总页数
        //4.使用show 方法组装url
        $show = $page->show();
        //5.查询 limit语法
        $data = $model->limit($page->firstRow,$page->listRows)->select();
        //6.传递给模板
        $this->assign('show', $show);
        $this->assign('data', $data);
        $this->display();
    }

    //修改
    public function edit()
    {
        $id = I('get,id');
        $model = M('Aduser');
        $data = $model->find($id);
        $this->assign('data', $data);
        $this->display();

    }
    public function editOk()
    {

    }

    //删除
    public function del()
    {
        $ids = I('get.ids');
        $model = M('Aduser');
        $result = $model->delete($ids);
        if ($result) {
            $this->success('删除成功', U('showlist'), 1);
        } else {
            $this->error('删除失败', U('showlist'), 1);
        }
    }



}

























