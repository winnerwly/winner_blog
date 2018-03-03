<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
use Org\Util\Date;
class IndexController extends Controller {
       //前置操作方法
    public function before(){
        $this->assign("name",cookie("user_name"));
        if(!session("uid")){
            $this->error("请登录!","/User/Index/login");
        }
    }  
   	/***
   	 * 
   	 * $sql = "SELECT u.id,u.user_name,u.user_image,count(a.id) as c from think_user as u left join think_answer as a on u.id = a.answe_uid where 1 GROUP by u.id order by c desc LIMIT 12";
   	 * 
   	 * ***/
    public function index(){
        $this->before();
    	$status = $_GET["status"];
    	$where = "1";
    	if($status==""||$status<0){
    		$status = -1;
    	}else{
    		$where = " question_status = ".$status." ";
    	}
    	$count = M("question")->where($where)->count();
    	$Page = new page($count,15);
    	$show = $Page->show();
    	$sql = "select q.id,q.question_title,q.question_time,q.question_view,q.question_status as s,q.question_comment,q.question_uid as uid ,q.question_type as tid,u.user_name,u.user_image,t.type_name from think_question as q left join think_user as u on q.question_uid = u.id left join think_question_type as t on q.question_type = t.id where ".$where." order by q.question_time desc limit ".$Page->firstRow.",".$Page->listRows;
    	$res = M()->query($sql);
    	$tool = new Date();
    	for($i = 0;$i<count($res);$i++){
    		$res[$i]["question_time"] = $tool->translate($res[$i]["question_time"]);
        }
    	$hot = $this->getHot();
    	$hotComment = $this->getHotComment();
    	$beastUser = $this->getBeastUser();
    	$this->assign("question",$res);
    	$this->assign("show",$show);
    	$this->assign("status",$status);
    	$this->assign("hot",$hot);
     	$this->assign("hotComment",$hotComment);
     	$this->assign("beastUser",$beastUser);
    	$this->display();
    }
    
    public function notFound(){
    	$this->display("404");
    }
    
    public function tips(){
    	$this->display();
    }
    
    public function search(){
    	if(IS_GET){
	    	$keyWord = $_GET["key"];
	    	$status = $_GET["status"];
	    	$where = "1";
	    	if($status==""||$status<0){
	    	  $status = -1;
	    	}else{
	    	  $where = " question_status = ".$status." ";
	    	}
	    	
	    	$count = M("question")->where($where)->count();
	    	$Page = new page($count,15);
	    	$show = $Page->show();
	    	$sql = "select q.id,q.question_title,q.question_time,q.question_view,q.question_status as s,q.question_comment,q.question_uid as uid ,q.question_type as tid,u.user_name,u.user_image,t.type_name from think_question as q left join think_user as u on q.question_uid = u.id left join think_question_type as t on q.question_type = t.id where q.question_title like '%".$keyWord."%'  order by q.question_time desc limit ".$Page->firstRow.",".$Page->listRows;
	    	$res = M()->query($sql);
	    	$tool = new Date();
	    	for($i = 0;$i<count($res);$i++){
	    	  $res[$i]["question_time"] = $tool->translate($res[$i]["question_time"]);
            }
	    	$this->assign("question",$res);
	    	$this->assign("show",$show);
	    	$this->assign("keyWord",$keyWord);
	    	$this->assign("status",$status);
	   		$this->display();
    	}
    }
    
    private function getBeastUser(){
        $sql = "select u.id,u.user_name,u.user_image,count(a.id) as c from think_user as u left join think_answer as a on u.id = a.answe_uid where 1 GROUP by u.id order by c desc LIMIT 12";
    	return M()->query($sql);
    }
    
    private function getHot(){
    	$res = M("question")->where("1")->field("id,question_title,question_view")->order("question_view desc")->limit("8")->select();
   		return $res;
    }

    private function getHotComment(){
    	$res = M("question")->where("1")->field("id,question_title,question_comment")->order("question_comment desc")->limit("8")->select();
   		return $res;
    }
}