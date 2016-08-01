<?php
namespace Home\Controller;

use Think\Controller;

class RegisterController extends Controller
{
<<<<<<< .mine
    public function adduser()
    {
        $this->display();
    }

    public function adduserOk()
    {
        $post = I('post.');
        $post['lasttime'] = time();
        $post['addtime'] = time();
        //dump($post['type']);die;
        if ($post['type'] == 0) {
            $model = M('User');
            unset($post['type']);
            $email = $model->where($post)->find();
            if (!$email) {
                $data = $model->add($post);
                if ($data) {
                    $this->success('注册成功', U('Login/login'), 3);
                } else {
                    $this->error('注册失败', U('adduser'), 3);
                }
            } else {
                $this->error('该邮箱已经被注册了', U('adduser'), 3);
            }
        } else {
            $post = I('post.');
            unset($post['type']);
            unset($post['rank']);
            unset($post['phone']);
            unset($post['properties']);
            unset($post['power']);
            unset($post['username']);
            $model = M('Addcp');
            $post['addtime'] = time();
            //dump($post);die;
            $info = $model->where($post)->find();
            dump($info);
            if (!$info) {
                dump($post);
                die;
                $data = $model->add($post);
                if ($data) {
                    $this->success('注册成功', U('Login/login'), 3);
                } else {
                    $this->error('注册失败', U('adduser'), 3);
                }
            }
        }
    }
=======
	public function adduser()
	{
		$this->display();
	}
	public function adduserOk()
	{
		$post = I('post.');
		//dump($post);
		$email = $post['email'];
		$post['lasttime'] = time();
		$post['addtime'] = time();
		//dump($post['type']);die;
		if($post['type'] == 0){
		//个人用户注册
			$model = M('User');
			unset($post['type']);
				$data = $model->add($post);
				if($data){
					$this->success('注册成功',U('Login/login'),3);
				} else {
					$this->error('注册失败', U('adduser'), 3);
				}
			
		} else {
			#公司用户注册页面
			$model = M('Addcp');
			$post['addtime'] = time();
				$data = $model->add($post);
				if($data){
					$this->success('注册成功',U('Login/login'),3);
				} else {
					$this->error('注册失败', U('adduser'), 3);
				}
		}
	}

	public function getRoleInfo()
	{
		$email = I('post.useremail');
		$checktype = I('post.checktype');
		if($checktype == 0){
		//个人用户注册
			$model = M('User');
			$email2 = $model->where("email = '$email'")->select();
			if($email2){
				echo json_encode(array(
					'emailOk'	=> 'checksuccess',
					));
			}else{
				echo json_encode(array(
					'emailOk'	=> 'checkerror',
					));
			}
		} else {
			#公司用户ajax判断
			$model = M('Addcp');
			$email2 = $model->where("email = '$email'")->select();
			if($email2){
				echo json_encode(array(
					'emailOk'	=> 'checksuccess',
					));
			}else{
				echo json_encode(array(
					'emailOk'	=> 'checkerror',
					));
			}
		}
	}
>>>>>>> .r99
}