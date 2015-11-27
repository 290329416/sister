<?php
namespace Home\Controller;
use Think\Controller;
class MessageController extends IndexController {
    //验证码 
    public $Verify;

    public function __construct() {
        parent::__construct();
        $this->Verify = new \Think\Verify();
    }

    public function index(){
        $this->display();
	}

    //验证码
    public function verify(){
        $this->Verify->imageH = 30;
        $this->Verify->imageW = 100;
        $this->Verify->fontSize = 15;
        $this->Verify->length   = 4;
        $this->Verify->useNoise = false;
        $this->Verify->entry();
    }
    public function add(){
        
        if(!$this->Verify->check(I('post.verifyCode'))){
            echo  '{"result":"0","msg":"验证码错误!"}';exit;
        }
        if(empty(I('post.prisename'))){
            echo  '{"result":"0","msg":"企业名称不能为空!"}';exit;
        }
        if(empty(I('post.name'))){
            echo  '{"result":"0","msg":"联系人不能为空!"}';exit;
        }
        if(empty(I('post.phone')) | !is_numeric(I('post.phone'))){
            echo  '{"result":"0","msg":"电话不合法!"}';exit;
        }
        if(empty(I('post.email')) | !preg_match("/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/", I('post.email'))){
            echo  '{"result":"0","msg":"邮箱不合法!"}';exit;
        }
        if(empty(I('post.message'))){
            echo  '{"result":"0","msg":"内容不能为空!"}';exit;
        }
        $message = M('message');
        if($message -> create(I('post'))){
            $result = $message->add();
            if($result){
                exit('1');
            }
        }
        
        exit('0');
    }
}