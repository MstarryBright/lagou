<?php
/**
 * Created by PhpStorm.
 * User: rjs
 * Date: 2016/7/24
 * Time: 18:28
 */
namespace Home\Controller;

use Think\Controller;
use Think\Image;
use Think\Upload;

class ConsumController extends Controller
{
    public function index()
    {
        #把用户的id插入到注册的cuid中
        $mode = M('company');
        #获取用户的id
        $use_id = $_SESSION['user_id'];
        #得到这个用户的信息（自有公司的人员才能访问）
        /*$list = $mode ->where($where['cuid']=$use_id)-> getField('id');
            if(!empty($list)){
                //Controller类的redirect方法可以实现页面的重定向功能。
                $this ->redirect('Consum/index');
            }*/
        $time = time();
        //获取登录时间
        $this->assign('time', $time);
        #获取用户
        $this->assign('userid', $use_id);
        #模板展示
        $this->display('step1');
    }

    public function step1()
    {
        $name = I('post.cname');
        $mode = M('company');
        #判断公司上传图片是否重复
        //	dump($_FILES['clogo']['name']);
        //dump($_FILES);
        if (empty($_FILES['clogo']['name'])) {
            $mode->create();
            if ($mode->add()) {
                //根据插入的公司名称,查询id
                $id = $mode->where("cname='{$name}'")->getField("id");
                $this->assign("id", $id);
                // $this->redirect("Consum/step2");
                $this->display("step2");

            } else {
                $this->error("保存失败");
            }
        } else {
            #保存图片
            $upload = new Upload();
            // 实例化上传类
            ///设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
            //设置附件上传类型
            $upload->rootPath = UPLOAD_PATH . FILE_PATH;
            // 设置附件上传目录// 上传文件
            $info = $upload->upload();
            //dump($info);die;
            if (!$info) {
                $this->error($upload->getError());
            } else {
                //循环图片信息
                foreach ($info as $file) {
                    //保存上传图片
                    $img = new\Think\Image();
                    $img->open(UPLOAD_PATH . FILE_PATH . $file['savepath'] . $file['savename']);
                    $_POST['clogo'] = $file['savepath'] . 'm_' . $file['savename'];
                    //dump($_POST['clogo']);die;
                    $img->thumb(150, 150)->save(UPLOAD_PATH . FILE_PATH . $_POST['clogo']);
                    $arr = $mode->create();
                    if ($mode->add()) {
                        //判断是否图片有相同
                        $id = $mode->where("cname='{$name}'")->getField("id");
                        $lastId = $mode->getlastInsID();
                        if ($id == $lastId) {
                            $this->error('图片重复');
                            die;
                        } else {
                            $this->assign("id", $id);
                            // $this->redirect("Consum/step2");
                            //id传入下个信息表
                            $this->display("step2");
                        }
                    } else {
                        $this->error("保存失败");

                    }
                }
            }
        }
    }

    #检测公司名称是否被注册
    public function nameCheck()
    {
        #获取表单提交的公司名字
        $name = I('post.cename');
        #实例化模型
        $mode = M('company');
        #查出数据库所有的cname字段的值
        $list = $mode->getField('cname', true);
        if (in_array($name, $list)) {
            $this->ajaxReturn(0);
        } else {
            $this->ajaxReturn(1);
        }

    }
}