<?php
namespace Study\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	// echo "this is a study index";
    	$model=M('userinfo');
    	// $sql='select u.name as uname,u.sex as usex,i.name as iname,i.id from userinfo as i,user as u where i.uid=u.id';
    	// $data=$model->query($sql);
    	// $data=$model->field('userinfo.name as iname,user.name as uname,user.sex as usex,userinfo.id')->join('user on userinfo.uid=user.id')->select();
    	// $data=$model->field('userinfo.name as iname,user.name as uname,user.sex as usex,userinfo.id')->join('user on userinfo.uid=user.id','right')->select();
    	$data=$model->field('userinfo.name as iname,user.name as uname,user.sex as usex,userinfo.id')->join('user on userinfo.uid=user.id','left')->count();
    	echo $model->getLastSql();
    	dump($data);
    }
}