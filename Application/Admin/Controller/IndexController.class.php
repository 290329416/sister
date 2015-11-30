<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
	//栏目名称与对应ID
	public $typedata;

	public function __construct() {
        parent::__construct();
		$key = I('cookie.user_keyauth');
		$val = I('cookie.user_valauth');
		if(empty($key) && empty($val)){
			$this -> error("请登录",U('login/index'));
		}
		$auth = D('user');
		$user_key = explode('\t',$auth->authcode($key,DECODE));
		$user_val = explode('\t',$auth->authcode($val,DECODE));
		$user_data = array_combine($user_key,$user_val);
		$type = M('type');
        $typedata = $type -> select();
        foreach($typedata as $k=>$v){
            $this->typedata[$v['id']] = $v['name'];
        }
        $this -> assign('typedata',$this->typedata);
		$this -> assign('user_data', $user_data);
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