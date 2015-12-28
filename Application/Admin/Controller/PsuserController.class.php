<?php
namespace Admin\Controller;
use Admin\Controller;
class PsuserController extends IndexController {
    public function __construct() {
        parent::__construct();
        include_once(COMMON_PATH.'Conf/MyConfig.php');
        $this -> assign('ps_config', $ps_config);
    }
    //查看评审人员资格
    public function index(){
    	$psuser = M("Psuser");
        $p = I('get.p') - 1 < 0 ? 0 :I('get.p') - 1;
        $first =  $p * 20;
        if(!empty(I('get.name')) || !empty(I('get.comname')) || !empty(I('get.level'))|| !empty(I('get.state'))) {
            if(!empty(I('get.sid'))){
                $map['name'] = array('eq',I('get.name'));
            }

            if(!empty(I('get.comname'))){
                $map['comname'] = array('like','%'.I('get.comname').'%');
            }

            if(!empty(I('get.level'))){
                $map['level'] = array('eq',I('get.level'));
            }

            if(!empty(I('get.state'))){
                $map['state'] = array('eq',I('get.state'));
            }
            $psuser_data = $psuser -> where($map) -> limit($first,'20')->select();
            //获取分页
            $count = $psuser -> where($map) ->count();
            $num = ceil($count/20);
            $page = new \Think\Page($count,20);
            $pages = $page ->show();
        }
        if(!isset($psuser_data)){
            $psuser_data = $psuser -> order("id DESC") -> limit($first,'20') -> select();
            //获取分页
            $count = $psuser -> count();
            $num = ceil($count/20);
            $page = new \Think\Page($count,20);
            $pages = $page ->show();
        }
        
        $this -> assign('pages', $pages);
        $this -> assign('count', $count);
        $this -> assign('num', $num);
        $this -> assign('psuser',$psuser_data);
        
		$this->display();
	}
    //添加评审人员
    public function add(){
        if(I('post.')){
            $data = I();
            if(empty($data['comname'])){
                $this->error('机构名称不能为空');
            }
            if(empty($data['name'])){
                $this->error('姓名不能为空');
            }
            if(empty($data['level'])){
                $this->error('资质级别不能为空');
            }
            if(empty($data['psfield'])){
                $this->error('评审领域不能为空');
            }
            if($data){
                $com = M('Psuser');
                $lastid = $com -> add($data);
                if($lastid){
                    $data_uid['id'] = $lastid;
                    $data_uid['uid'] = '1'.str_pad($lastid,6,0,STR_PAD_LEFT);
                    $com ->save($data_uid);
                    $this -> success("添加成功",U('Psuser/index'));
                    exit;
                }else{
                    $this->error('添加失败');
                }
            }
        }
        $this->display();
    }
    //修改评审人员资格
    public function update(){
        if(I('post.')){
            $data = I();
            if(empty($data['comname'])){
                $this->error('机构名称不能为空');
            }
            if(empty($data['name'])){
                $this->error('姓名不能为空');
            }
            if(empty($data['level'])){
                $this->error('资质级别不能为空');
            }
            if(empty($data['psfield'])){
                $this->error('评审领域不能为空');
            }
            if($data){
                $psuser = M('psuser');
                if($psuser -> save($data)){
                    $this -> success("修改成功",U('Psuser/index'));
                    exit;
                }else{
                    $this->error('修改失败');
                }
            }
        }
        $id = I('id');
        $psuser = M('Psuser');
        $data = $psuser ->find($id);
        $this -> assign('data', $data);
        $this->display();
    }
    //删除评审人员资格
    public function delete(){
        $psuser = M('Psuser');
        if(is_array(I('post.id'))){
            $id_data = implode(',', I('post.id'));
            $num = $psuser -> delete($id_data);
            if($num){
                $this -> success("删除成功",U('Psuser/index'));
                exit;
            }else{
                $this->error('删除失败');
            }
        }
        if($psuser ->delete(I('get.id'))){
            $this -> success("删除成功",U('Psuser/index'));exit;
        }else{
            $this->error('删除失败');
        }
    }
}