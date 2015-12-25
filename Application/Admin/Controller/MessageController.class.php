<?php
namespace Admin\Controller;
use Admin\Controller;
class MessageController extends IndexController {
    public function index(){
        $p = I('get.p') - 1 < 0 ? 0 :I('get.p') - 1;
        $first =  $p * 10;

		$message = M('message');
        $mess = $message -> order("id DESC") -> limit($first,'10') -> select();
        $count = $message -> count();
        $num = ceil($count/10);
        $page = new \Think\Page($count,10);
        $pages = $page ->show();
        $this -> assign('pages', $pages);
        $this -> assign('count', $count);
        $this -> assign('num', $num);
        $this -> assign('mess',$mess);

		$this->display();
	}

    //查看单用户信息
    public function show(){
        $id = I('id');
        $message = M('message');
        $data = $message ->find($id);
        $this -> assign('data', $data);
        $this->display();
    }
    //删除用户密码
    public function delete(){
        $message = M('message');
        $data = I('get.id');
        if($message -> delete($data)){
            $this -> success("删除成功",U('message/index'));
        }else{
            $this->error('删除失败');
        }
    }
}