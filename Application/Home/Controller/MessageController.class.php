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
        // return I('post.');exit;
        echo 1;exit;

    }
}