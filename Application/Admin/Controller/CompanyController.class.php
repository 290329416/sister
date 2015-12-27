<?php
namespace Admin\Controller;
use Admin\Controller;
class CompanyController extends IndexController {
    public function __construct() {
        parent::__construct();
        include_once(MODULE_PATH.'Common/MyConfig.php');
        $this -> assign('com_config', $com_config);
    }
    //查看企业资质首页
    public function index(){
    	$com = M("Company");
        $p = I('get.p') - 1 < 0 ? 0 :I('get.p') - 1;
        $first =  $p * 20;
        if(!empty(I('get.sid')) || !empty(I('get.comname')) || !empty(I('get.comgrade'))|| !empty(I('get.state'))) {
            if(!empty(I('get.sid'))){
                $map['sid'] = array('eq',I('get.sid'));
            }

            if(!empty(I('get.comname'))){
                $map['comname'] = array('like','%'.I('get.comname').'%');
            }

            if(!empty(I('get.comgrade'))){
                $map['comgrade'] = array('eq',I('get.comgrade'));
            }

            if(!empty(I('get.state'))){
                $map['state'] = array('eq',I('get.state'));
            }
            $com_data = $com -> where($map) -> limit($first,'20')->select();
            //获取分页
            $count = $com -> where($map) ->count();
            $num = ceil($count/20);
            $page = new \Think\Page($count,20);
            $pages = $page ->show();
        }
        if(!isset($com_data)){
            $com_data = $com -> order("id DESC") -> limit($first,'20') -> select();
            //获取分页
            $count = $com -> count();
            $num = ceil($count/20);
            $page = new \Think\Page($count,20);
            $pages = $page ->show();
        }
        
        $this -> assign('pages', $pages);
        $this -> assign('count', $count);
        $this -> assign('num', $num);
        $this -> assign('com_data',$com_data);
        
		$this->display();
	}
	//添加企业资质
	public function add(){
		if(I('post.')){
            $data = I();
            if(empty($data['comname'])){
                $this->error('企业名称不能为空');
            }
            if(empty($data['comnum'])){
                $this->error('资质证书编号不能为空');
            }
            if(empty($data['b_time'])){
                $this->error('发证日期不能为空');
            }
            if(empty($data['c_time'])){
                $this->error('证书有效期不能为空');
            }
            if(empty($data['comgrade'])){
                $this->error('资质等级不能为空');
            }
            $data['comnum'] = strtoupper($data['comnum']);
            $data['b_time'] = strtotime($data['b_time']);
            $data['c_time'] = strtotime($data['c_time']);
            if($data){
                $com = M('Company');
                $lastid = $com -> add($data);
                if($lastid){
                    $data_sid['id'] = $lastid;
                    $data_sid['sid'] = '1'.str_pad($lastid,6,0,STR_PAD_LEFT);
                    $com ->save($data_sid);
                    $this -> success("添加成功",U('Company/index'));
                    exit;
                }else{
                    $this->error('添加失败');
                }
            }
		}
		$this->display();
	}
    //修改企业资质
    public function update(){
        if(I('post.')){
            $data = I();
            if(empty($data['comname'])){
                $this->error('企业名称不能为空');
            }
            if(empty($data['comnum'])){
                $this->error('资质证书编号不能为空');
            }
            if(empty($data['b_time'])){
                $this->error('发证日期不能为空');
            }
            if(empty($data['c_time'])){
                $this->error('证书有效期不能为空');
            }
            if(empty($data['comgrade'])){
                $this->error('资质等级不能为空');
            }
            $data['comnum'] = strtoupper($data['comnum']);
            $data['b_time'] = strtotime($data['b_time']);
            $data['c_time'] = strtotime($data['c_time']);
            if($data){
                $com = M('Company');
                if($com -> save($data)){
                    $this -> success("修改成功",U('Company/index'));
                    exit;
                }else{
                    $this->error('修改失败');
                }
            }
        }
        $id = I('id');
        $com = M('Company');
        $data = $com ->find($id);
        $this -> assign('data', $data);
        $this->display();
    }
    //删除企业资质
    public function delete(){
        $com = M('Company');
        if(is_array(I('post.id'))){
            $id_data = implode(',', I('post.id'));
            $num = $com -> delete($id_data);
            if($num){
                $this -> success("删除成功",U('Company/index'));
                exit;
            }else{
                $this->error('删除失败');
            }
        }
        if($com ->delete(I('get.id'))){
            $this -> success("删除成功",U('Company/index'));exit;
        }else{
            $this->error('删除失败');
        }
    }
}