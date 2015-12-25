<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
	//验证码 
	public $Verify;

	public function __construct() {
        parent::__construct();
        $this->Verify = new \Org\Util\Verify();
    }

	//用户登录
    public function index(){
    	if(!empty(I('post.username')) && !empty(I('post.password')) && !empty(I('post.verify'))){
    		$data = I();
    		if($this->Verify->check($data['verify'])){
    			$user = M('user');
    			$userdata = $user -> where("username='%s' and state=0",$data['username'])-> find();
    			if($userdata && ($userdata['password'] === md5(C('SECURE_CODE').md5($data['password'])))){
    				unset($userdata['password']);
                    $user ->where('id='.$userdata['id'])->save(array('logintime'=>time()));
                    $user_auth = json_encode($userdata);
                    $user_auth_cookie = authcode($user_auth,ENCODE);
                    cookie('auth',$user_auth_cookie,3600);
    				$this->success('登陆成功',U('index/index'));
    				exit;
    			}else{
    				$this -> error("用户名或密码错误"); 
    			}
    		}else{
    			$this -> error("验证码填写错误"); 
    		}
    	}
    	$this -> display();
    }
	//验证码
	public function verify(){
    	$this->Verify->imageH = 40;
    	$this->Verify->imageW = 130;
    	$this->Verify->fontSize = 15;
    	$this->Verify->length   = 4;
        $this->Verify->fontttf ='5.ttf';
    	$this->Verify->entry();
	}
    public function quit(){
        cookie('kauth',null);
        cookie('lauth',null);
        $this->success("退出成功",U('login/index'));
        exit;
    }
}