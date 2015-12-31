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
        $get_data = I('get.');
        if(!empty($get_data)){
            if(!empty($get_data['num'])){
                $data['comnum'] = $get_data['num'];
            }
            if(!empty($get_data['name']) && empty($get_data['lname'])){
                $data['comname'] = $get_data['name'];
            }elseif(!empty($get_data['lname'])){
                $map['comname'] = array('like','%'.$get_data['lname'].'%');
            }
            if(!empty($get_data['grade'])){
                $data['comgrade'] = (int) $get_data['grade'];
            }
            if(!empty($get_data['area'])){
                $data['area'] = $get_data['area'];
            }
            if(!empty($get_data['b_time']) && !empty($get_data['l_time'])){
                $data['ntime'] = $get_data['b_time'];
                $data['mtime'] = $get_data['l_time'];
                $b_time = (int) strtotime($get_data['b_time']);
                $l_time = (int) strtotime($get_data['l_time']);
                $data['b_time'] = array('between',array($b_time,$l_time));
            }
            if($data){
                $com = M('company');
                $data['state'] = 1;
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