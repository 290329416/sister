<?php
namespace Admin\Controller;
use Admin\Controller;
class PsuserController extends IndexController {
    private $comname;   //企业名称
    private $psfield;   //评审领域
    private $pslevel;     //资质级别

    public function __construct() {
        parent::__construct();
        //机构名称
        $this->comname = S('company');
        if(empty($this->comname)){
            $comname = M('company');
            $this->comname = $comname -> field('id,comname') -> where('state=1')->select();
            S('company',$this->comname,3600);
        }
        $this -> assign('company', $this->comname);
        //评审领域
        $this->psfield = S('psfield');
        if(empty($this->psfield)){
            $psfield = M('psfield');
            $this->psfield = $psfield ->getfield('id,psfield');
            S('psfield',$this->psfield,3600);
        }
        $this -> assign('psfield', $this->psfield);
        //资质级别
        $this->pslevel = S('pslevel');
        if(empty($this->pslevel)){
            $pslevel = M('pslevel');
            $this->pslevel = $pslevel ->getfield('id,pslevel');
            S('pslevel',$this->pslevel,3600);
        }
        $this -> assign('pslevel', $this->pslevel);
    }
    //查看评审人员资格
    public function index(){
    	$psuser = M("Psuser");
        $p = I('get.p') - 1 < 0 ? 0 :I('get.p') - 1;
        $first =  $p * 20;
        $data = I('get.');
        $s = CONTROLLER_NAME.'/'.ACTION_NAME;
        $this->assign('s',$s);// 模板输出
        if(!empty($data)) {
            if(!empty($data['name'])){
                $map['name'] = array('eq',$data['name']);
            }

            if(!empty($data['comname'])){
                $map['comname'] = array('like','%'.$data['comname'].'%');
            }

            if(!empty($data['level'])){
                $map['level'] = array('eq',$data['level']);
            }

            if(!empty($data['psfield'])){
                $map['psfield'] = array('eq',$data['psfield']);
            }

            if(!empty($data['state'])){
                $map['state'] = array('eq',$data['state']);
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
        $this -> assign('data',$data);
        $this -> assign('pages', $pages);
        $this -> assign('count', $count);
        $this -> assign('num', $num);
        $this -> assign('psuser',$psuser_data);
        
		$this->display();
	}
    //添加评审人员
    public function add(){
        $data = I('post.');
        if($data){
            if(!empty($data['cid'])){
                foreach($this->comname as $val){
                    if($val['id'] == $data['cid']){
                        $data['comname'] = $val['comname'];
                    }
                }
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
        $this->display();
    }
    //修改评审人员资格
    public function update(){
        $data = I('post.');
        if($data){
            if(!empty($data['cid'])){
                foreach($this->comname as $val){
                    if($val['id'] == $data['cid']){
                        $data['comname'] = $val['comname'];
                    }
                }
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
            $psuser = M('psuser');
            if($psuser -> save($data)){
                $this -> success("修改成功",U('Psuser/index'));
                exit;
            }else{
                $this->error('修改失败');
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
        $data = I('post.id');
        if(is_array($data)){
            $id_data = implode(',', I('post.id'));
            $num = $psuser -> delete($id_data);
            if($num){
                $this -> success("删除成功",U('Psuser/index'));
                exit;
            }else{
                $this->error('删除失败');
            }
        }
        $id = I('get.id');
        if($psuser ->delete($id)){
            $this -> success("删除成功",U('Psuser/index'));exit;
        }else{
            $this->error('删除失败');
        }
    }


    //评审领域
    public function psfield(){
        $p = I('get.p') - 1 < 0 ? 0 :I('get.p') - 1;
        $first =  $p * 20;
        $psfield = M('psfield');
        $data = $psfield -> limit($first,'20')->select();
        $count = $psfield ->count();
        $num = ceil($count/20);
        $page = new \Think\Page($count,20);
        $pages = $page ->show();
        $this -> assign('comgrade', $data);
        $this -> assign('count', $count);
        $this -> assign('num', $num);
        $this -> assign('pages', $pages);
        $this -> display();
    }
    //评审领域添加与修改
    public function editfield(){
        $id = I('request.id');
        if(!$id){
            $adate = I('post.psfield');
            if(empty($adate)){
                $this -> display();exit;
            }
            $psfield = M('psfield');
            $data['psfield'] = $adate;
            $data['create_time'] = time();
            $data['last_time'] = $data['create_time'];
            $res = $psfield -> add($data);
            if($res){
                S('psfield',null);
                $this -> success("添加成功",U('Psuser/psfield'));
            }else{
                $this -> error("添加失败",U('Psuser/editfield'));
            }
        }else{
            $savedata = I('post.');
            $psfield = M('psfield');
            if(!empty($savedata['psfield'])){
                $savedata['last_time'] = time();
                $res = $psfield -> save($savedata);
                if($res){
                    S('psfield',null);
                    $this -> success("修改成功",U('Psuser/psfield'));exit;
                }else{
                    $this -> error("修改失败",U('Psuser/editfield'));
                }
            }
            $data = $psfield ->find($id);
            $this -> assign('data',$data);
            $this -> display();
        }
    }
    //评审领域的删除
    public function delfield(){
        $psfield = M('psfield');
        $data = I('request.id');
        if(is_array($data)){
            $id_data = implode(',', $data);
            $num = $psfield ->delete($id_data);
            if($num){
                $psfield = $psfield ->getField('id,psfield');
                S('psfield',null);
                $this -> success("删除成功",U('Psuser/psfield'));
                exit;
            }else{
                $this->error('删除失败');
            }
        }
        if($psfield ->delete($data)){
            $psfield = $psfield ->getField('id,psfield');
            S('psfield',null);
            $this -> success("删除成功",U('Psuser/psfield'));exit;
        }else{
            $this->error('删除失败');
        }
    }

    //资质级别
    public function pslevel(){
        $p = I('get.p') - 1 < 0 ? 0 :I('get.p') - 1;
        $first =  $p * 20;
        $pslevel = M('pslevel');
        $data = $pslevel -> limit($first,'20')->select();
        $count = $pslevel ->count();
        $num = ceil($count/20);
        $page = new \Think\Page($count,20);
        $pages = $page ->show();
        $this -> assign('comgrade', $data);
        $this -> assign('count', $count);
        $this -> assign('num', $num);
        $this -> assign('pages', $pages);
        $this -> display();
    }
    //评审领域添加与修改
    public function editlevel(){
        $id = I('request.id');
        if(!$id){
            $adate = I('post.pslevel');
            if(empty($adate)){
                $this -> display();exit;
            }
            $pslevel = M('pslevel');
            $data['pslevel'] = $adate;
            $data['create_time'] = time();
            $data['last_time'] = $data['create_time'];
            $res = $pslevel -> add($data);
            if($res){
                S('pslevel',null);
                $this -> success("添加成功",U('Psuser/pslevel'));
            }else{
                $this -> error("添加失败",U('Psuser/editlevel'));
            }
        }else{
            $savedata = I('post.');
            $pslevel = M('pslevel');
            if(!empty($savedata['pslevel'])){
                $savedata['last_time'] = time();
                $res = $pslevel -> save($savedata);
                if($res){
                    S('pslevel',null);
                    $this -> success("修改成功",U('Psuser/pslevel'));exit;
                }else{
                    $this -> error("修改失败",U('Psuser/editlevel'));
                }
            }
            $data = $pslevel ->find($id);
            $this -> assign('data',$data);
            $this -> display();
        }
    }
    //评审领域的删除
    public function dellevel(){
        $pslevel = M('pslevel');
        $data = I('request.id');
        if(is_array($data)){
            $id_data = implode(',', $data);
            $num = $pslevel ->delete($id_data);
            if($num){
                $pslevel = $pslevel ->getField('id,pslevel');
                S('pslevel',null);
                $this -> success("删除成功",U('Psuser/pslevel'));
                exit;
            }else{
                $this->error('删除失败');
            }
        }
        if($pslevel ->delete($data)){
            $pslevel = $pslevel ->getField('id,pslevel');
            S('pslevel',null);
            $this -> success("删除成功",U('Psuser/pslevel'));exit;
        }else{
            $this->error('删除失败');
        }
    }
}