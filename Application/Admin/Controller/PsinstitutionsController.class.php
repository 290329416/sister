<?php
namespace Admin\Controller;
use Admin\Controller;
class PsinstitutionsController extends IndexController {
    public function __construct() {
        parent::__construct();
        include_once(MODULE_PATH.'Common/MyConfig.php');
        $this -> assign('psins_config', $com_config);
    }
    //查看评审机构信息
    public function index(){
    	$ps_obj = M("Psinstitutions");
        $p = I('get.p') - 1 < 0 ? 0 :I('get.p') - 1;
        $first =  $p * 20;
        if(!empty(I('get.pname'))) {
            if(!empty(I('get.pname'))){
                $map['pname'] = array('like','%'.I('get.pname').'%');
            }
            $psuser_data = $ps_obj -> where($map) -> limit($first,'20')->select();
            //获取分页
            $count = $ps_obj -> where($map) ->count();
            $num = ceil($count/20);
            $page = new \Think\Page($count,20);
            $pages = $page ->show();
        }
        if(!isset($psuser_data)){
            $psuser_data = $ps_obj -> order("id DESC") -> limit($first,'20') -> select();
            //获取分页
            $count = $ps_obj -> count();
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
    //添加评审机构信息
    public function add(){
        if(I('post.')){
            $data = I();
            if(empty($data['pname'])){
                $this->error('评审机构不能为空');
            }
            if(empty($data['phone'])){
                $this->error('联系电话不能为空');
            }
            if(empty($data['address'])){
                $this->error('通讯地址不能为空');
            }
            if($data){
                $com = M('Psinstitutions');
                $lastid = $com -> add($data);
                if($lastid){
                    $data_uid['id'] = $lastid;
                    $data_uid['pid'] = '1'.str_pad($lastid,6,0,STR_PAD_LEFT);
                    $com ->save($data_uid);
                    $this -> success("添加成功",U('Psinstitutions/index'));
                    exit;
                }else{
                    $this->error('添加失败');
                }
            }
        }
        $this->display();
    }
    //修改评审机构信息
    public function update(){
        if(I('post.')){
            $data = I();
            if(empty($data['pname'])){
                $this->error('评审机构不能为空');
            }
            if(empty($data['address'])){
                $this->error('通讯地址不能为空');
            }
            if($data){
                $psuser = M('Psinstitutions');
                if($psuser -> save($data)){
                    $this -> success("修改成功",U('Psinstitutions/index'));
                    exit;
                }else{
                    $this->error('修改失败');
                }
            }
        }
        $id = I('id');
        $psuser = M('Psinstitutions');
        $data = $psuser ->find($id);
        $this -> assign('data', $data);
        $this->display();
    }
    //删除评审机构信息
    public function delete(){
        $psuser = M('Psinstitutions');
        if(is_array(I('post.id'))){
            $id_data = implode(',', I('post.id'));
            $num = $psuser -> delete($id_data);
            if($num){
                $this -> success("删除成功",U('Psinstitutions/index'));
                exit;
            }else{
                $this->error('删除失败');
            }
        }
        if($psuser ->delete(I('get.id'))){
            exit('11');
            $this -> success("删除成功",U('Psinstitutions/index'));exit;
        }else{
            $this->error('删除失败');
        }
    }
}