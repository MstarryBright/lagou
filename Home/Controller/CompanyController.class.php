<?php
namespace Home\Controller;

use Think\Controller;

class CompanyController extends Controller
{
    public function companylist()
    {
    	$com = M('company');
        //SQL找出所有需要的东西
        $res = $com->field('l2.cname,ctype,cadd,cstep,clabel,clogo')
            ->table('la_company as l2')
            //->fetchSql()
            //->limit(5)
            ->select();
        //定义数组接收标签
        $data = array();
        //先循环出全部标签
        foreach ($res as $value) {
        	$data[] = $value['clabel'];
        }
        //定义数组准备接受切割的单个标签
        $arr = array();
        //循环切割一维数组里的VALUE值
        foreach($data as $key => $v){
			$arr[] = array('day' => $key , 'sum' => explode( ',', $v ) );
        } 
        //把最后组成的二维数组传到HTML
        $this->assign('arr', $arr);
        //把SQL查找出来的传到HTML
        $this->assign('res', $res);
        //展示模版更新
        $a = '12';
        $this->display();
    }
}