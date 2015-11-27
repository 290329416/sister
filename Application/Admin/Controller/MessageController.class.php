<?php
namespace Admin\Controller;
use Admin\Controller;
class MessageController extends IndexController {
    public function index(){
		
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
    //删除用户密码
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