<?php
namespace Admin\Controller;
use Admin\Controller;
class TypeController extends IndexController {
    public function index(){
        $result = S('admin_type');
        $this -> assign('result', $result);
        $this->display();
	}
	//添加栏目页面
	public function add(){
        if(I('post.name') && I('post.namepath') && I('post.state')){
            $data = I();
            $data['path'] = '0,';
            $type = M('type');
            $result = $type -> add($data);
            if($result){
                $typedata = $type -> select();
                S('admin_type',$typedata,600);
                $this->success('添加成功',U('Type/index'));
                exit;
            }else{
                $this -> error("添加失败"); 
            }
        }
		$this->display();
	}
    //修改栏目信息
    public function update(){
        if(I('post.')){
            $type = M('type');
            $data = I('post.');
            if($type->create()){
                $num = $type -> save($data);
                if($num){
                    $typedata = $type -> select();
                    S('admin_type',$typedata,600);
                    $this->success('修改成功',U('Type/index'));
                    exit; 
                }else{
                    $this -> error("修改失败"); 
                }
            }else{
                $this -> error("修改失败"); 
            }
        }
        $id = I('get.id');
        $type = M('type');
        $res = $type -> find($id);
        $this -> assign('res', $res);
        $this->display();
    }
    //删除栏目
    public function del(){
        $id = I('get.id');
        $type = M('type');
        if($type -> delete($id)){
            $typedata = $type -> select();
            S('admin_type',$typedata,600);
            $this->success('删除成功',U('Type/index'));
            exit; 
        }else{
            $this -> error("删除失败");
        }
    }
}