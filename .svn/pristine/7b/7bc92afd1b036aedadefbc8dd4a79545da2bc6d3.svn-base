<?php
namespace Demo\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function _before_index(){
		echo "这是一个前置方法";
	}

	public function before(){
		header('content-type:text/html;charset=utf-8;');
	}

    public function index(){
    	$this->before();
    	echo "这是是一个demo下的index方法";
    }

    public function _after_index(){
    	echo "这是一个后置方法";
    }

    public function ben($id=10,$name='张三'){
    	echo $id;
    	echo "<br/>";
    	echo $name;
    }

    public function urls(){
    	echo U().'<hr/>';
    	echo U('index').'<hr/>';
    	echo U('Index/index').'<hr/>';
    	echo U('Home/Index/index').'<hr/>';
    	echo U('Home/Index/index?id=100').'<hr/>';
    	echo U('Home/Index/index','id=456').'<hr/>';
    	echo U('Home/Index/index',array('id'=>'123456')).'<hr/>';
    	echo U('Home/Index/index/id/123/name/456').'<hr/>';
    }

    public function a(){
    	echo "aaaaa<br/>";
    }
    public function b(){
    	$this->a();
    	self::a();
    	IndexController::a();
    	echo "bbbbbb";
    }

    public function kua(){
    	echo "123456";
    	// A('Winner')->demo();
    	A('Home/Index')->index();
    }
}