<?php
namespace Admin\Controller;
use Admin\Controller;
class LinksController extends IndexController {
    public function index(){
        $links = M("links");
        //获取当前页的链接
        $where['name'] = I('post.name');
        $p = I('get.p') - 1 < 0 ? 0 :I('get.p') - 1;
        $first =  $p * 5;

        if(empty($where['name'])){
            $link = $links -> limit($first,'5') -> select();
            //获取分页
            $count = $links -> count();
            $num = ceil($count/5);
            $page = new \Think\Page($count,5);
            $pages = $page ->show();
            $this -> assign('pages', $pages);
            $this -> assign('count', $count);
            $this -> assign('num', $num);
        }else{
            $link = $links -> limit($first,'5') -> where($where) -> select();
        }
        
        //分配数据
        $this -> assign('link', $link);
        $this->display();
	}
	//添加用户页面
	public function add(){
        if(I('post.name') && I('post.url')){
            $data = I('post.');
            $links = M('links');
            $result = $links -> add($data);
            if($result){
                $this->success('添加成功',U('Links/index'));
                exit;
            }else{
                $this -> error("添加失败"); 
            }
        }
		$this->display();
	}
    //修改用户信息
    public function update(){
        if(I('post.')){
            $links = M('links');
            $data = I('post.');
            if($links->create()){
                $num = $links -> save($data);
                if($num){
                    $this->success('修改成功',U('links/index'));
                    exit; 
                }else{
                    $this -> error("修改失败"); 
                }
            }else{
                $this -> error("修改失败"); 
            }
        }
        $id = I('get.id');
        $links = M('links');
        $res = $links -> find($id);
        $this -> assign('res', $res);
        $this->display();
    }
    //删除
    public function del(){
        $id = I('get.id');
        $link = M('links');
        if($link -> delete($id)){
            $this->success('删除成功',U('Links/index'));
            exit; 
        }else{
            $this -> error("删除失败");
        }
    }
}