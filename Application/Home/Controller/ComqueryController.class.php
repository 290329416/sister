<?php
namespace Home\Controller;
use Think\Controller;
class ComqueryController extends IndexController {
    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->display();
	}
}