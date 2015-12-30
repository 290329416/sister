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
        $this->Verify->imageH = 35;
        $this->Verify->imageW = 120;
        $this->Verify->fontSize = 16;
        $this->Verify->length   = 4;
        $this->Verify->fontttf = '4.ttf';
        $this->Verify->useNoise = false;
        $this->Verify->entry();
    }
    public function add(){
        $data = I('post.');
        if(!$this->Verify->check($data['verifyCode'])){
            echo  '{"result":"0","msg":"验证码错误!"}';exit;
        }
        if(empty($data['prisename'])){
            echo  '{"result":"0","msg":"企业名称不能为空!"}';exit;
        }
        if(empty($data['name'])){
            echo  '{"result":"0","msg":"联系人不能为空!"}';exit;
        }
        if(empty($data['phone']) | !is_numeric(I('post.phone'))){
            echo  '{"result":"0","msg":"电话不合法!"}';exit;
        }
        if(empty($data['email']) | !preg_match("/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/", $data['email'])){
            echo  '{"result":"0","msg":"邮箱不合法!"}';exit;
        }
        if(empty($data['message'])){
            echo  '{"result":"0","msg":"内容不能为空!"}';exit;
        }
        $message = M('message');
        $data['inputtime']= time();
        if($message -> create($data)){
            $result = $message->add();
            if($result){
                cookie('message','',60);
                exit('1');
            }
        }
        
        exit('0');
    }
}