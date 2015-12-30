<?php
namespace Home\Controller;
use Think\Controller;
class ComqueryController extends IndexController {
    public function __construct() {
        parent::__construct();
        include_once(COMMON_PATH.'Conf/MyConfig.php');
        $this -> assign('com_config', $com_config);
    }

    public function index(){
        if(!empty(I('get.'))){
            if(!empty(I('get.num'))){
                $data['comnum'] = I('get.num');
            }
            if(!empty(I('get.name')) && empty(I('get.lname'))){
                $data['comname'] = I('get.name');
            }elseif(!empty(I('get.lname'))){
                $map['comname'] = array('like','%'.I('get.name').'%');
            }
            if(!empty(I('get.grade'))){
                $data['comgrade'] = (int) I('get.grade');
            }
            if(!empty(I('get.area'))){
                $data['area'] = I('get.area');
            }
            if(!empty(I('get.b_time')) && !empty(I('get.l_time'))){
                $data['ntime'] = I('get.b_time');
                $data['mtime'] = I('get.l_time');
                $b_time = (int) strtotime(I('get.b_time'));
                $l_time = (int) strtotime(I('get.l_time'));
                $data['b_time'] = array('between',array($b_time,$l_time));
            }
            if($data){
                $com = M('company');
                $count = $com -> where($data) -> count();
                $page = new \Org\Util\ComPage($count,4);
                $show  = $page->show();// 分页显示输出
                $result = $com -> where($data) -> limit($page->firstRow.','.$page->listRows)->select();
                $this->assign('result',$result);// 赋值数据集
                $this->assign('page',$show);// 赋值分页输出
                $this->assign('data',$data);// 赋值数据集
            }
        }
        $this->display();
	}
}