<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    //栏目信息
    public $type;
    //友情链接
    public $link;

    public function __construct(){
        parent::__construct();
        $this->type = S('type');
        if(empty($this->type)){
            $type = M('type');
            $this->type = $type ->where('state=2') ->order('weight desc') ->select();
            S('type',$this->type,86400);
        }
        $this->link = S('link');
        if(empty($this->link)){
            $links = M('links');
            $this->link =  $links -> where('state=1') ->select();
            S('link',$this->link,1800);
        }
        $this -> assign('type',$this->type);
        $type = array();
        foreach($this->type as $k=>$v){
            $type[$v['id']] = $v;
        }
        $this -> assign('new_type',$type);
        $this -> assign('links',$this->link);
    }
    public function index(){
        $news = M('news');
        $title = I('post.title');
        if(!empty($title)){
            $data['title'] = array('like','%'.I('post.title').'%');
            $data['state'] = 2;
            $newdata = $news -> where($data) ->select();
            $this -> assign('newdata',$newdata);
            $this->display('tlist'); exit;
        }
    	$news = M('news');
    	foreach($this->type as $v){
    		$new[$v['namepath']] = $news -> where("pid =" . $v['id'] .' and state=2') -> order('id desc') -> limit(8) -> select();
    	}
    	$this -> assign('new',$new);
        $this->display();
	}
	public function article(){
        foreach($this->type as $val){
            if($val['namepath'] == I('get.type')){
                $data['pid'] = $val['id'];
            }
        }
        if($data['pid'] == false){$this->error('错误');}
        $news = M('news');
        $data['id'] = I('get.id');
        $data['state'] = 2;
        $new = $news -> where($data) ->find();
        $new['content'] = htmlspecialchars_decode($new['content']);
        $this -> assign('new',$new);
        $this->display();
	}

    public function tlist(){
        $type = M('type');
        $type_find = $type -> where("namepath='%s'",I('get.type')) ->find();
        $this->assign('type_find',$type_find);// 赋值分页输出

        $news = M('news');
        $newdata = $news -> where("pid=%d and state=2",$type_find['id']) -> order('id desc')->page(I('get.p').',20') -> select();
        $this -> assign('newdata',$newdata);

        $count = $news->where("pid=%d and state=2",$type_find['id']) ->count();// 查询满足要求的总记录数
        $Page  = new \Org\Util\Page($count,20,'t_'.$type_find['namepath']);// 实例化分页类 传入总记录数和每页显示的记录数
        $show  = $Page->show();// 分页显示输出
        $this->assign('page',$show);// 赋值分页输出
        
        $this->display();
    }

}