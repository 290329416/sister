<?php
namespace Admin\Controller;
use Admin\Controller;
class CompanyController extends IndexController {
    public function __construct() {
        parent::__construct();
        include_once(COMMON_PATH.'Conf/MyConfig.php');
        $this -> assign('com_config', $com_config);
    }
    //查看企业资质首页
    public function index(){
    	$com = M("Company");
        $p = I('get.p') - 1 < 0 ? 0 :I('get.p') - 1;
        $first =  $p * 20;
        $data = I('get.');
        $s = CONTROLLER_NAME.'/'.ACTION_NAME;
        $this->assign('s',$s);// 模板输出
        if(!empty($data)) {
            if(!empty($data['comnum'])){
                $map['comnum'] = array('eq',$data['comnum']);
            }

            if(!empty($data['comname'])){
                $map['comname'] = array('like','%'.$data['comname'].'%');
            }

            if(!empty($data['comgrade'])){
                $map['comgrade'] = array('eq',$data['comgrade']);
            }

            if(!empty($data['state'])){
                $map['state'] = array('eq',$data['state']);
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
        $comgrade = S('comgrade');
        if(!$comgrade){
            $comgrade_mod = M('comgrade');
            $comgrade = $comgrade_mod -> getField('id,comgrade');
            S('comgrade',$comgrade,3600);
        }
        $this -> assign('data',$data);
        $this -> assign('comgrade',$comgrade);
        $this -> assign('pages', $pages);
        $this -> assign('count', $count);
        $this -> assign('num', $num);
        $this -> assign('com_data',$com_data);
        
		$this->display();
	}
	//添加企业资质
	public function add(){
        $data = I('post.');
		if($data){
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
            if(empty($data['cid'])){
                $this->error('资质等级不能为空');
            }
            $data['comnum'] = strtoupper($data['comnum']);
            $data['b_time'] = strtotime($data['b_time']);
            $data['c_time'] = strtotime($data['c_time']);
            $com = M('Company');
            $lastid = $com -> add($data);
            if($lastid){
                $data_sid['id'] = $lastid;
                $data_sid['sid'] = '1'.str_pad($lastid,6,0,STR_PAD_LEFT);
                $com ->save($data_sid);
                $comname = $com -> field('id,comname') -> where('state=1')->select();
                S('company',$comname,3600);
                $this -> success("添加成功",U('Company/index'));
                exit;
            }else{
                $this->error('添加失败');
            }
		}
        $comgrade = S('comgrade');
        if(!$comgrade){
            $comgrade_mod = M('comgrade');
            $comgrade = $comgrade_mod -> getField('id,comgrade');
            S('comgrade',$comgrade,3600);
        }
        $this -> assign('comgrade',$comgrade);
		$this->display();
	}
    //修改企业资质
    public function update(){
        $data = I('post.');
        if($data){
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
            if(empty($data['cid'])){
                $this->error('资质等级不能为空');
            }
            $data['comnum'] = strtoupper($data['comnum']);
            $data['b_time'] = strtotime($data['b_time']);
            $data['c_time'] = strtotime($data['c_time']);
            $com = M('Company');
            if($com -> save($data)){
                $comname = $com -> field('id,comname') -> where('state=1')->select();
                S('company',$comname,3600);
                $this -> success("修改成功",U('Company/index'));
                exit;
            }else{
                $this->error('修改失败');
            }
        }
        $id = I('id');
        $com = M('Company');
        $data = $com ->find($id);
        $comgrade = S('comgrade');
        if(!$comgrade){
            $comgrade_mod = M('comgrade');
            $comgrade = $comgrade_mod -> getField('id,comgrade');
            S('comgrade',$comgrade,3600);
        }
        $this -> assign('comgrade',$comgrade);
        $this -> assign('data', $data);
        $this->display();
    }
    //删除企业资质
    public function delete(){
        $com = M('Company');
        $data = I('post.id');
        if(is_array($data)){
            $id_data = implode(',', $data);
            $num = $com -> delete($id_data);
            if($num){
                $comname = $com -> field('id,comname') -> where('state=1')->select();
                S('company',$comname,3600);
                $this -> success("删除成功",U('Company/index'));
                exit;
            }else{
                $this->error('删除失败');
            }
        }
        $id = I('get.id');
        if($com ->delete($id)){
            $comname = $com -> field('id,comname') -> where('state=1')->select();
            S('company',$comname,3600);
            $this -> success("删除成功",U('Company/index'));exit;
        }else{
            $this->error('删除失败');
        }
    }

    //企业等级
    public function comgrade(){
        $p = I('get.p') - 1 < 0 ? 0 :I('get.p') - 1;
        $first =  $p * 20;
        $comgrade = M('comgrade');
        $data = $comgrade -> limit($first,'20')->select();
        $count = $comgrade ->count();
        $num = ceil($count/20);
        $page = new \Think\Page($count,20);
        $pages = $page ->show();
        $this -> assign('comgrade', $data);
        $this -> assign('count', $count);
        $this -> assign('num', $num);
        $this -> assign('pages', $pages);
        $this -> display();
    }
    //企业等级添加与修改
    public function comup(){
        $id = I('request.id');
        if(!$id){
            $adate = I('post.comgrade');
            if(empty($adate)){
                $this -> display();exit;
            }
            $comgrade = M('comgrade');
            $data['comgrade'] = $adate;
            $data['create_time'] = time();
            $data['last_time'] = $data['create_time'];
            $res = $comgrade -> add($data);
            if($res){
                $this -> success("添加成功",U('Company/comgrade'));
            }else{
                $this -> error("添加失败",U('Company/comup'));
            }
        }else{
            $savedata = I('post.');
            $comgrade = M('comgrade');
            if(!empty($savedata['comgrade'])){
                $savedata['last_time'] = time();
                $res = $comgrade -> save($savedata);
                if($res){
                    $this -> success("修改成功",U('Company/comgrade'));exit;
                }else{
                    $this -> error("修改失败",U('Company/comgrade'));
                }
            }
            $data = $comgrade ->find($id);
            $this -> assign('data',$data);
            $this -> display();
        }
    }
    //企业等级的删除
    public function delgrade(){
        $comgrade = M('comgrade');
        $data = I('request.id');
        if(is_array($data)){
            $id_data = implode(',', $data);
            $num = $comgrade ->delete($id_data);
            if($num){
                $comname = $comgrade ->getField('id,comgrade');
                S('comgrade',$comname,3600);
                $this -> success("删除成功",U('Company/comgrade'));
                exit;
            }else{
                $this->error('删除失败');
            }
        }
        if($comgrade ->delete($data)){
            $comname = $comgrade ->getField('id,comgrade');
            S('comgrade',$comname,3600);
            $this -> success("删除成功",U('Company/comgrade'));exit;
        }else{
            $this->error('删除失败');
        }
    }

}