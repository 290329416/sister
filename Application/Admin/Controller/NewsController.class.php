<?php
namespace Admin\Controller;
use Admin\Controller;
class NewsController extends IndexController {
    //查看文章首页
    public function index(){
    	$news = M("news");
        $p = I('get.p') - 1 < 0 ? 0 :I('get.p') - 1;
        $first =  $p * 20;
        $type = S('admin_type');
        $this -> assign('type',$type);
        $data = I('get.');
        $s = CONTROLLER_NAME.'/'.ACTION_NAME;
        $this->assign('s',$s);// 模板输出
        if(!empty($data)) {

            if(!empty($data['title'])){
                $map['title'] = array('like','%'.$data['title'].'%');
            }
            if(!empty($data['pid'])){
                $map['pid'] = array('eq',$data['pid']);
            }
            if(!empty($data['state'])){
                $map['state'] = array('eq',$data['state']);
            }
            $new = $news -> where($map) -> limit($first,'20')->select();
            //获取分页
            $count = $news -> where($map) ->count();
            // print_r($count);exit;
            $num = ceil($count/20);
            $page = new \Think\Page($count,20);
            $pages = $page ->show();
            $this -> assign('data',$data);
            $this -> assign('pages', $pages);
            $this -> assign('count', $count);
            $this -> assign('num', $num);
            $this -> assign('new',$new);
            $this->display();exit;
        }
        
        $new = $news -> order("id DESC") -> limit($first,'20') -> select();
        //获取分页
        $count = $news -> count();
        $num = ceil($count/20);
        $page = new \Think\Page($count,20);
        $pages = $page ->show();
        $this -> assign('pages', $pages);
        $this -> assign('count', $count);
        $this -> assign('num', $num);
        $this -> assign('new',$new);
		$this->display();
	}
	//添加文章页面
	public function add(){
        $data = I('post.');
		if($data){
            $data['inputtime'] = time();
            if(strpos($_FILES['file']['type'],'text') === false){
                $this->error('文章类型上传错误,必须txt文件');
            }
            $data['content'] = mb_convert_encoding(file_get_contents($_FILES['file']['tmp_name']), 'UTF-8','GB2312,gbk,UTF-8');
            if(empty($data['title'])){
                $this->error('文章标题不能为空');
            }
            if(empty($data['pid'])){
                $this->error('文章栏目不能为空');
            }
            if(empty($data['content'])){
                $this->error('文章内容不能为空');
            }
            if(!empty($data['releasetime'])){
                $data['releasetime'] = trim($data['releasetime'],'日').'日';
            }
            $news = M('news');
            if($news -> add($data)){
                $this -> success("添加成功",U('news/index'));
                exit;
            }else{
                $this->error('添加失败');
            }
		}
        $type = M('type');
        $typedata = $type -> select();
        $this -> assign('typedata', $typedata);
		$this->display();
	}

    //查看文章信息
    public function show(){
        $id = I('id');
        $news = M('news');
        $data = $news ->find($id);
        $type = M('type');
        $typedata = $type -> select();
        $this -> assign('typedata', $typedata);
        $this -> assign('data', $data);
        $this->display();
    }
    //修改文章
    public function update(){
        $data = I('post.');
        if($data){
            $data['content'] = mb_convert_encoding($data['content'], 'UTF-8','GB2312,gbk,UTF-8');
            if(empty($data['title'])){
                $this->error('文章标题不能为空');
            }
            if(empty($data['pid'])){
                $this->error('文章栏目不能为空');
            }
            if(empty($data['content'])){
                $this->error('文章内容不能为空');
            }
            if(!empty($data['releasetime'])){
                $data['releasetime'] = trim($data['releasetime'],'日').'日';
            }
            $news = M('news');
            if($news -> save($data)){
                $this -> success("修改成功",U('news/index'));
                exit;
            }else{
                $this->error('修改失败');
            }
        }
        $id = I('id');
        $news = M('news');
        $data = $news ->find($id);
        $type = M('type');
        $typedata = $type -> select();
        $this -> assign('typedata', $typedata);
        $this -> assign('data', $data);
        $this->display();
    }
    //删除文章
    public function delete(){
        $news = M('news');
        $data = I('post.id');
        if(is_array($data)){
            $id_data = implode(',', $data);
            $num = $news -> delete($id_data);
            if($num){
                $this -> success("删除成功",U('news/index'));
                exit;
            }else{
                $this->error('删除失败');
            }
        }
        $id = I('get.id');
        if($news ->delete($id)){
            $this -> success("删除成功",U('news/index'));exit;
        }else{
            $this->error('删除失败');
        }
    }
}