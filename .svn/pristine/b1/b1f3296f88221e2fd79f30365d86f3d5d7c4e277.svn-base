<?php
namespace Ajax\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index($page=1,$rows=10){
    	$model=M('user');
        $count=$model->count();
    	$obj=$model->order('time desc')->page(($page).','.$rows)->select();
    	$data = array('code'=>200,'msg'=>'查询成功','obj'=>$obj,'total'=>$count);
    	// echo "callback(".$this->ajaxReturn($data).");";
    	$callback = $_GET['callback'];
		// echo $callback.'('.$this->ajaxReturn($data).')';

    	// dump($this->ajaxReturn($data));
    	// echo "<hr/>";
    	// echo "<br/>";
    	// dump(json_encode($data));
		echo $callback.'('.json_encode($data).')';
    }
}