<?php
/**
 * 命名空间
 *
 * 
 * **/
namespace User\Controller;
use Think\Controller;
class IndexController extends Controller {
   //前置操作方法
	 public function before(){
		$this->assign("name",cookie("user_name"));
		if(!session("uid")){
			$this->error("请登录！","/index.php/User/Index/login");
		}
	 }  
    //个人中心
    public function index(){
    	$this->before();
    	$this->display();
    }
    //用户登录
    public function login(){
    	
    	if(IS_POST){
    		$map["user_email"] = $_POST["email"];
    		$map["user_pwd"] = md5($_POST["pass"]);
    		$code = $_POST["vercode"];
    		// 验证码
//  		if(!$this->verifyCheck($code)){
//  			$this->error("验证码错误！");
//  		}
    		
    		$res = M("user")->where($map)->field("id,user_name,user_image")->find();
    		if($res==null){
    			$this->error("用户名或密码错误！");
    		}else{
    			cookie("user_name",$res["user_name"]);
    			cookie("user_image",$res["user_image"]);
    			session("uid",$res["id"]);
				$this->success("登录成功！","Index/index");    			
    		}
    	}else{
    		$this->display();
    	}
    }
    
    // 邮箱激活
    public function activate(){
    	$this->before();
    	$this->display();
    }
    // 忘记密码
    public function forget(){
    	$this->display();
    }
    
    // 主页
    public function home(){
    	$this->before();
    	$this->display();
    }
    
    // 消息
    public function message(){
    	$this->before();
    	$this->display();
    }
    
    // 注册
    public function reg(){
    	if(IS_POST){
    		/**
    		 * 	email:邮箱
				username:用户名
				pass:密码
				repass:重复密码
				vercode:验证码
    		 * 1. 校验验证码
    		 * 1.5密码是否一致
    		 * 2. 检查邮箱是否重复
    		 * 3. 检查用户名是否重复
    		 * 4. 注册成功  ，存 cookie session
    		 * **/
    		$data['user_email'] = $_POST["email"]; 
    		$data['user_pwd'] = $_POST["pass"];
    		$data['user_name'] = $_POST["username"];
    		$repass = $_POST["repass"];
    		$code = $_POST["vercode"];
    		// 验证码
    		if(!$this->verifyCheck($code)){
    			$this->error("验证码错误！");
    		}
    		//验证密码一致性
    		if($data['user_pwd'] != $repass){
    			$this->error("密码不一致！");
    		}
    		// 邮箱验证
    		if(M("user")->where("user_email = '".$data['user_email']."'")->count()>0){
    			$this->error("邮箱已经存在！！");
    		}
    		
    		// 用户名验证
    		if(M("user")->where("user_name = '".$data['user_name']."'")->count()>0){
    			$this->error("用户名已经存在！！");
    		}
    		
    		// 将获取的数据写入数据库
    		$data["user_reg_time"] = time();
    		$data['user_pwd'] = md5($data['user_pwd']);
    		$uid = M("user")->add($data);
    		
    		if($uid>0){
    			cookie("user_name",$data["user_name"]);
    			cookie("user_image","/Public/images/avatar/default.png");
    			session("uid",$uid);
    			$this->success("注册成功！！","Index/index");
    		}else{
    			$this->error("用户名已经存在！！");
    		}
    		
    	}else{
    		$this->display();
    	}
    }
    
    // 设置
    public function set(){
    	$this->before();
    	$this->display();
    }
    
    // 验证码
    public function verifyCode(){
    	$Verify = new \Think\Verify();
		$Verify->entry();
    }
    // 验证码的验证
    private function verifyCheck($code){
    	$verify = new \Think\Verify();
		return $verify->check($code);
    }
    
    // 退出
    public function logout(){
    	cookie("user_name",null);
    	cookie("user_image",null);
    	session("uid",null);
    	$this->success("退出成功！","/index.php/User/Index/login");
    }
}