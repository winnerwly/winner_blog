<?php
namespace Demo\Controller;
use Think\Controller;
class DemoController extends Controller {
	public function index(){
		$model=D('user');
		$data=$model->field("name")->select();
		$data=$model->field("*")->where('name like "%1%"')->select();
		$data=$model->field("*")->order('time desc')->select();
		// $data=$model->execute($model->getLastSql());
		dump($data);
		echo $model->getLastSql();
	}
    public function demo(){
    	echo "这是一个很简单的方法";
    }

    public function aa(){
		D('Admin/User')->index();
    }
}