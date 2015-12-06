<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
	//验证码 
	public $Verify;
	//COOKIE信息的加密与解密
	protected $user_auth;

	public function __construct() {
        parent::__construct();
        $this->Verify = new \Org\Util\Verify();
		$this->user_auth = D('user');
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
                    $user_auth_key = array_keys($userdata);
                    $user_auth_cookie_key = implode('\t', $user_auth_key);
                    $user_auth_cookie_key = $this->user_auth->authcode($user_auth_cookie_key,ENCODE);
                    cookie('user_keyauth',$user_auth_cookie_key,3600);

    				$user_auth = implode('\t', $userdata);
    				$user_auth_cookie_val = $this->user_auth->authcode($user_auth,ENCODE);
                    cookie('user_valauth',$user_auth_cookie_val,3600);
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
        cookie('user_keyauth',null);
        cookie('user_valauth',null);
        $this->success("退出成功",U('login/index'));
        exit;
    }
}