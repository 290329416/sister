<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
	//栏目名称与对应ID
	public $type_data;

	public function __construct() {
        parent::__construct();
		$user_auth = I('cookie.auth');
		if(empty($user_auth)){
			$this -> error("请登录",U('login/index'));
		}
		$login_user = json_decode(authcode($user_auth,DECODE),true);
		if($login_user['ip'] !== get_client_ip()){
			$this -> error("请登录",U('login/index'));
		}
		$this -> assign('user_data', $login_user);
		$Only_user = S($login_user['username']);
		if (empty($Only_user)) {
			$user = M('user');
			$Only_user = $user -> where("id=%d and state=0",$login_user['id']) -> find();
			if(empty($Only_user)){
				$this -> error("请登录",U('login/index'));
			}else{
				unset($Only_user['password']);
				$logintime = $Only_user['logintime'];
				unset($Only_user['logintime']);
				unset($login_user['logintime']);
				unset($login_user['ip']);
				unset($Only_user['ip']);
				// $Only_user['ip'] = get_client_ip();
				$user_auth = json_encode($login_user);
				$json_user = json_encode($Only_user);
				if ($user_auth !== $json_user) {
					$this -> error("请登录",U('login/index'));
				}
				$Only_user['logintime'] = $logintime;
				S($Only_user['username'],$Only_user,300);
			}
		}else{
			$logintime = $Only_user['logintime'];
			unset($Only_user['logintime']);
			unset($login_user['logintime']);
			unset($login_user['ip']);
			unset($Only_user['ip']);
			$json_user = json_encode($login_user);
			$user_auth = json_encode($Only_user);
			if ($user_auth !== $json_user) {
				$this -> error("请登录",U('login/index'));
			}
			$Only_user['logintime'] = $logintime;
			S($Only_user['username'],$Only_user,300);
		}
		$this->type_data = S('admin_type');
		if (empty($this->type_data)) {
			$type = M('type');
	        $this->type_data = $type -> getField('id,id,name,namepath,pid,path,weight,state');
	        S('admin_type',$this->type_data,600);
		}
        $this -> assign('typedata',$this->type_data);
    }

    public function index(){
    	$user = M('user');
    	$user_num = $user -> count('id');
    	$new = M('news');
    	$new_num = $new -> count('id');
    	$this -> assign('user_num', $user_num);
    	$this -> assign('new_num', $new_num);
		$this -> display();
	}
}