<?php
namespace Demo\Controller;
use Think\Controller;
class WinnerController extends Controller {
    public function demo(){
        IndexController::urls();
        \Home\Controller\IndexController::index();
        $Index=new \Home\Controller\IndexController();
        $Index->index();
    }

    public function aa(){
		D('Admin/User')->index();
    }
}