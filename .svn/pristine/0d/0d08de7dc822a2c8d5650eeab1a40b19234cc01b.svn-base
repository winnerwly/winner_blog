<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index($page=1){
    	$model=M('user');
        $count=$model->count();
        // echo $count;
    	$data=$model->order('time desc')->page(($page).',10')->select();
        // echo $model->getLastSql();
    	$status=array('1'=>'看书','2'=>'玩游戏','0'=>'其他');
    	$this->assign('data',$data);
    	$this->assign('status',$status);
        $this->assign('count',$count);
        $this->assign('page',$page);
        $this->assign('rows',ceil($count/10));
    	$this->display();
    }

    public function add(){
    	// 判断是否有post数据提交
    	if (IS_POST) {
    		// 实例化数据库
    		$model=M('user');
            // $_POST['time']=date('y-m-d h:i:s',time());
    		// $_POST['time']=time().'000';
            // 判断用户名是否已存在
            if (!$model->where(array('name'=>$_POST['name']))->select()) {
                // 添加新的数据到数据库
        		if($model->add($_POST)){
                    // 添加成功,返回用户展示页面
        			$this->success('添加成功',U('index'));
        		}else{
                    // 添加失败,返回添加页面
        			$this->error('添加失败');
        		}
            } else {
                // 用户名已存在,返回添加页面
                $this->error('抱歉啦,您添加的用户名已存在');
            }
    	}else{
    		$this->display();
    	}
    }

    public function delete($id){
        $model=M('user');
        if ($id&&$model->delete($id)) {
            $this->success('删除成功',U('index'));
        }else{
            $this->error('删除失败');
        }
    }

    public function update($id){
        $model=M('user');
        if (IS_POST) {
            // 跟新数据
            if ($model->where('id='.$id)->save($_POST)) {
                $this->success('修改成功',U('index'));
            } else {
                $this->error('修改失败');
            }
            
        } else {
            $data=$model->find($id);
            $this->assign('data',$data);
            $this->display();
        }
        
    }
}