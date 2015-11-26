<?php
namespace Admin\Controller;
use Admin\Controller;
class NewsController extends IndexController {
    //查看文章首页
    public function index(){
    	$news = M("news");
        $p = I('get.p') - 1 < 0 ? 0 :I('get.p') - 1;
        $first =  $p * 20;
        $type = M('type');
        $type = $type -> select();
        $this -> assign('type',$type);
        if(!empty(I('get.title')) || !empty(I('get.pid')) || !empty(I('get.state'))) {

            if(!empty(I('get.title'))){
                $map['title'] = array('like','%'.I('get.title').'%');
            }
            if(!empty(I('get.pid'))){
                $map['pid'] = array('eq',I('get.pid'));
            }
            if(!empty(I('get.state'))){
                $map['state'] = array('eq',I('get.state'));
            }
            $new = $news -> where($map) -> limit($first,'20')->select();
            //获取分页
            $count = $news -> where($map) ->count();
            // print_r($count);exit;
            $num = ceil($count/20);
            $page = new \Think\Page($count,20);
            $pages = $page ->show();
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
		if(I('post.')){
            $data = I();
            $data['inputtime'] = time();
            
            $data['content'] = mb_convert_encoding(file_get_contents($_FILES['file']['tmp_name']), 'UTF-8','GB2312,UTF-8');
            if(empty($data['title'])){
                $this->error('文章标题不能为空');
            }
            if(empty($data['pid'])){
                $this->error('文章栏目不能为空');
            }
            if(empty($data['content'])){
                $this->error('文章内容不能为空');
            }
            if($data){
                $data['releasetime'] = trim('日',$data['releasetime']).'日';
                $news = M('news');
                if($news -> add($data)){
                    $this -> success("添加成功",U('news/index'));
                    exit;
                }else{
                    $this->error('添加失败');
                }
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
        if(I('post.')){
            $data = I();
            $data['content'] = mb_convert_encoding($data['content'], 'UTF-8','GB2312,UTF-8');
            if(empty($data['title'])){
                $this->error('文章标题不能为空');
            }
            if(empty($data['pid'])){
                $this->error('文章栏目不能为空');
            }
            if(empty($data['content'])){
                $this->error('文章内容不能为空');
            }
            if($data){
                $data['releasetime'] .= '日';
                $news = M('news');
                if($news -> save($data)){
                    $this -> success("修改成功",U('news/index'));
                    exit;
                }else{
                    $this->error('修改失败');
                }
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
        $data['id'] = I('id');
        $data['state'] = 3;
        if($news ->save($data)){
            $this -> success("删除成功",U('news/index'));
        }else{
            $this->error('删除失败');
        }
    }
}