<?php
/*这是前台页面的控制器*/
namespace Home\Controller;

use \Think\Controller;

class ProsController extends Controller
{
    public function index()
    {
        /*$model = M('Gcate');//实例化
        $data = $model
                       ->field('l1.*,l2.pname as pname,l3.sname as sname')
                       ->table('la_gcate as l1,la_pcate as l2,la_scate as l3')
                       ->where('l1.id = l2.pid and l2.id = l3.sid')
                       ->group('l1.cname')
                       ->order('l1.id')
                       -> select();*/
        $data = $this->findall();//查找所有
        $com = M('company');
        $res = $com->field('l1. salary,experience,education,lure,paddr,end_time,l2.cname,ctype,cstep,csize')
            ->table('la_position as l1,la_company as l2')
            ->where('l1.cid = l2.id')
            //->fetchSql()
            ->limit(5)
            ->select();
        //dump($res);die;
        $this->assign('res', $res);
        $this->assign('data', $data);//给前台传值
        $this->display();//展示模版
    }

    public function findall()
    {
        $type = getDates('Gcate'); //个方法传表名
        //dump($type);die;
        $arr = array();
        foreach ($type as $value) {
            $tow = getDates('Pcate', 'pid =' . $value['id']); //循环出科技和他的子级
            foreach ($tow as $vol) {
                $scate = getDates('Scate', 'sid =' . $vol['id']); //循环出科技子级的子级
                foreach ($scate as $v) {
                    $arr[$value['cname']][$vol['pname']][] = $v['sname']; //留一个空数组将最底层数组连到一起
                }
            }
        }
        return $arr;
    }

    public function search()
    {
        $str = I('post.query');
        $model = M('Scate');
        $where['sname'] = array('like', "%{$str}%");
        $data = $model->where($where)->select();
        $this->ajaxReturn($data);
    }
}