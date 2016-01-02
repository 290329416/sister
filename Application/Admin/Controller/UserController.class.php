<?php
namespace Admin\Controller;
use Admin\Controller;
class UserController extends IndexController {
    public function index(){
    	$user = M("user");
    	//获取当前页的用户
    	$where['name'] = I('post.name');
    	$p = I('get.p') - 1 < 0 ? 0 :I('get.p') - 1;
    	$first =  $p * 15;

    	if(empty($where['name'])){
    		$users = $user -> order("id DESC") -> limit($first,'15') -> select();
            //获取分页
            $count = $user -> count();
            $num = ceil($count/15);
            $page = new \Think\Page($count,15);
            $pages = $page ->show();
            $this -> assign('pages', $pages);
            $this -> assign('count', $count);
            $this -> assign('num', $num);
    	}else{
    		$users = $user -> order("id DESC") -> limit($first,'15') -> where($where) -> select();
    	}
    	
    	//分配数据
    	$this -> assign('users', $users);
		$this->display();
	}
	//添加用户页面
	public function add(){
        $name = I('post.username');
		if($name){
            $data = I();
            $data['password'] = md5(C('SECURE_CODE').md5($data['password']));
            $data['password2'] = md5(C('SECURE_CODE').md5($data['password2']));
            $data['inputtime'] = time();
            $user = D("User");
            if (!$user->create($data)){
                $this->error($user->getError());
            }else{
                $result = $user->add();
                if($result){
                    $this -> success("用户添加成功",U('user/index'));
                    exit;
                }
            }
		}
		$this->display();
	}

    //查看单用户信息
    public function show(){
        $id = I('id');
        $user = M('User');
        $data = $user ->find($id);
        $this -> assign('data', $data);
        $this->display();
    }
    //修改用户信息
    public function update(){
        $user = M('User');
        $update_id = I('post.id');
        if($update_id){
            $data = I();
            if (!preg_match('/^[A-Za-z0-9-_.+%]+@[A-Za-z0-9-.]+\.[A-Za-z]{2,4}$/',$data['email'])){
                $this->error('请填写正确邮箱');
            }
            if($user -> save($data)){
                $this -> success("用户修改成功",U('user/index'));
                exit;
            }
        }
        $id = I('id');
        $data = $user ->find($id);
        $this -> assign('data', $data);
        $this->display();
    }
    //修改用户密码
    public function chpass(){
        $user = M('User');
        $update_id = I('post.');
        if($update_id){
            $data['id'] = I('post.id');
            $oneuser = $user -> field('password') -> where($data) -> find();
            $oldpass = md5(C('SECURE_CODE').md5(I('post.oldpass')));
            if($oneuser['password'] == $oldpass){
                $data['password'] = md5(C('SECURE_CODE').md5(I('post.password')));
                $data['password2'] = md5(C('SECURE_CODE').md5(I('post.password2')));
                if($data['password'] === $data['password2']){
                    if($user -> save($data)){
                        $this -> success("用户修改成功",U('user/index'));
                        exit;
                    }else{
                        $this->error('修改失败');
                    }
                }
            }else{
                $this->error('原始密码不正确');
            }
        }
        $id = I('id');
        $data = $user ->find($id);
        $this -> assign('data', $data);
        $this->display();
    }
    //删除用户
    public function delete(){
        $user = M('User');
        $data['id'] = I('id');
        $data['state'] = 2;
        if($user ->save($data)){
            $this -> success("删除成功,已禁止该用户",U('user/index'));
        }else{
            $this->error('删除失败');
        }
    }
}