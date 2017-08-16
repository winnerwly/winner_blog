<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    
    /***
     * /入口文件/模块名/控制器名/方法名
     * **/
    
    public function index(){
    	// CURD   增删改查
    	/**
    	 * M("表名") 选择需要操作的表
    	 * where()  设定操作条件
    	 * field()  设定需要查找的字段
    	 * select() 执行查找
    	 * order()  排序  desc 降序  asc 升序
    	 * find()   只取一条记录
    	 * limit()  一个数字n：取n条数据出来   两个数字  n,m 从 n 开始取出 m条数据
    	 * add($data) 插入数据，返回的是自增id
    	 * save($data) 修改  返回的是被调修条数
    	 * setField()  修改某一个字段的操作
    	 * getField()  获取某一个字段（ limit 1 只有一条数据 ）
    	 * delete()    删除数据记录
    	 * 
    	 * select * from think_user  where 1=1 
    	 * INSERT INTO `think_user` (`user_name`,`user_pwd`,`user_email`,`user_image`,`user_reg_time`) VALUES ('admin123','0192023a7bbd73250516f069df18b500','niyinlong@125.com','/Public/1.jpg','1500792607')
    	 * UPDATE `think_user` SET `user_reg_time`='1500793917' WHERE ( 1 )
    	 * UPDATE `think_user` SET `user_status`='1'
    	 * DELETE FROM `think_user` WHERE ( id>6 )
    	 * 
    	 * */
//  	$map["user_name"] = "niyinlong";
//  	$map["user_pwd"] =  md5('123456');
//  	$result = M("user")
//  			  ->where('1')
//  			  ->field("id,user_name")
//  			  ->order("id asc")
//  			  ->limit(1,6)
//  			  ->select();
//  	// 1.利用查找  验证用户名与密码是否正确怎么做？		  
//  	dump($result);
//  	$res = M("user")->where($map)
//  					->field("id,user_name,user_image")
//  					->find();
//  	dump($res);
//  	
//  	//增加
//  	$data["user_name"] = "admin123";
//  	$data["user_pwd"] = md5($data["user_name"]);
//  	$data["user_email"] = "niyinlong@125.com";
//  	$data["user_image"] = "/Public/1.jpg";
//  	$data["user_reg_time"] = time();
//  	
//  	//$res = M("user")->add($data);
//  	dump(M("user")->getLastSql());
//  	dump($res);
//  	// 2. 注册怎么写？ 注册前，检查用户名、邮箱是否存在
//  	
//  	// 更新
//  	$A["user_reg_time"] = time();
//  	//$res = M("user")->where("1")->save($A);  
//  	$res = M("user")->where("1")->getField("user_name");  	
//  	dump(M("user")->getLastSql());
//  	dump($res);
//  	
//  	// 删除
//  	
//  	$res = M("user")->where("id>6")->delete();
//  	dump(M("user")->getLastSql());
//  	dump($res);
   		$this->display();
    }
    
    public function notFound(){
    	$this->display("404");
    }
    
    public function tips(){
    	$this->display();
    }
}