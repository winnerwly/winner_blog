<?php
namespace Ng\Controller;
use Think\Controller;
use Org\Util\Date;
class IndexController extends Controller {
  // 获取post数据
  private function getPost(){
    $tmp = file_get_contents('php://input', true);
    return json_decode($tmp); 
  }
  
  //用户登录
  // 用户名 username string require
  // 密码   pass     string require
  // 验证码 code     string require
  // method POST

  public function login(){
    if(IS_POST){
      // 获取post提交的数据
      $obj = $this->getPost();  
      $map["user_name"] = $obj->username;
      $map["user_pwd"] = md5($obj->pass);
      $code = $obj->code;
      // 验证验证码
      if (!$this->verifyCheck($code)) {
        $data['code'] = 201;
        $data['msg'] = '验证码不正确';
        $this->ajaxReturn($data);
      }
      // 验证登陆
      $res = M("user")->where($map)->field("id,user_name,user_image")->find();
      if($res==null){
        // 登陆成功的返回
        $data['code'] = 201;
        $data['msg'] = '用户名或者密码不正确';
        $this->ajaxReturn($data);
      }else{
        // 登陆失败的返回
        $data['code'] = 200;
        $data['msg'] = '登陆成功';
        $data['obj'] = $res;
        $this->ajaxReturn($data);
      }
    }else{
      // 提交方式错误的返回
      $data['code'] = 401;
      $data['msg'] = '请用Post提交数据';
      $this->ajaxReturn($data);
    }
  }

  // 用户注册
  // 用户名   username string requiret
  // 邮箱     email    string require
  // 密码     pass     string require
  // 验证密码 repass   string require
  // 验证码   code     string require
  // method POST

  public function reg(){
    if (IS_POST) {
      $obj = $this->getPost();
      $map['user_email'] = $obj->email;
      $map['user_pwd'] = $obj->pass;
      $map['user_name'] = $obj->username;
      $repass = $obj->repass;
      $code = $obj->code;
      $data['code'] = 201;
      if (!$this->verifyCheck($code)) {
        $data['msg'] = '验证码不正确';
        $this->ajaxReturn($data);
      }
      if ($map['user_pwd'] != $repass) {
        $data['msg'] = '两次输入的密码不一致';
        $this->ajaxReturn($data);
      }
      if (M('user')->where("user_name = '".$map['user_name']."'")->count()>0) {
        $data['msg'] = '你输入的用户名已存在';
        $this->ajaxReturn($data);
      }
      $map['user_reg_time'] = time();
      $map['user_image'] = "/Public/images/avatar/".rand(0,11).".jpg";
      $map['user_pwd'] = md5($map['user_pwd']);
      $uid = M('user')->add($map);
      if ($uid>0) {
        $res = M("user")->where($map)->field("id,user_name,user_image")->find();
        $data['code'] = 200;
        $data['msg'] = '注册成功';
        $data['obj'] = $res;
        $this->ajaxReturn($data);
      }else{
        $data['msg'] = '你输入的用户名已存在';
        $this->ajaxReturn($data);
      }
    }else{
      $data['code'] = 401;
      $data['msg'] = '请用Post提交数据';
      $this->ajaxReturn($data);
    }
  }
  // 验证码
  // merhod GET
  public function verifyCode(){
    $Verify = new \Think\Verify();
    $Verify->length = 3;
    $Verify->useCurve = false;
    $Verify->fontSize = 16;
    $Verify->useNoise = false;
    $Verify->entry();
  }

  public function checkCode(){
    if (IS_POST) {
      $obj = $this->getPost();
      $code = $obj->code;
      echo ($code);
      if (!$this->verifyCheck($code)) {
        $data['code'] = 201;
        $data['msg'] = '验证码不正确';
        $this->ajaxReturn($data);
      }else{
        $data['msg'] = '验证码正确';
        $data['code'] = 200;
        $this->ajaxReturn($data);
      }
    }
  }
  
  // 验证码的验证
  private function verifyCheck($code){
    $verify = new \Think\Verify();
    return $verify->check($code);
  }
  
}