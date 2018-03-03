<?php
namespace Question\Controller;
use Think\Controller;

use Org\Util\Date;
use Think\Page;
class IndexController extends Controller {
 	//前置操作方法, 验证用户是否登陆
	 public function before(){
		$this->assign("name",cookie("user_name"));
		if(!session("uid")){
			$this->error("请登录！","/User/Index/login");
		}
	}

    // public function index(){
    //     $this->before();
    // 	// $this->assign("name",cookie("user_name"));
    // 	$status = $_GET["status"];
    // 	$where = "1";
    // 	if($status==""||$status<0){
    // 		$status = -1;
    // 	}else{
    // 		$where = " question_status = ".$status." ";
    // 	}
    	
    // 	$count = M("question")->where($where)->count();
    // 	$Page = new page($count,15);
    // 	$show = $Page->show();
    // 	$sql = "select q.id,q.question_title,q.question_time,q.question_view,q.question_status as s,q.question_comment,q.question_uid as uid ,q.question_type as tid,u.user_name,u.user_image,t.type_name from think_question as q left join think_user as u on q.question_uid = u.id left join think_question_type as t on q.question_type = t.id where ".$where." order by q.question_time desc limit ".$Page->firstRow.",".$Page->listRows;
    // 	$res = M()->query($sql);
    // 	/**
    // 	 * 
    // 	 * 刚刚
    // 	 * 几分钟前
    // 	 * 几个小时前
    // 	 * 几天前
    // 	 * 几月前
    // 	 * 几年前
    // 	 * time - now 
    // 	 **/ 
    // 	$tool = new Date();
    // 	for($i = 0;$i<count($res);$i++){
    // 		$res[$i]["question_time"] = $tool->translate($res[$i]["question_time"]);
    // 	}
    // 	$this->assign("question",$res);
    // 	$this->assign("show",$show);
    	
    // 	$this->assign("status",$status);
   	// 	$this->display();
    // }
    
    public function add(){
    	$this->before();
    	if(IS_POST){
    		/**
    		 * title :标题
			 * content :文字能内容
			 * class :
			 * experience :5 
			 * vercode :2
    		 **/
    		$data["question_title"] = $_POST["title"];
    		$data["question_content"] = $_POST["content"];
    		$data["question_type"] = $_POST["class"];
    		$data["question_uid"] = session("uid");
    		$data["question_time"] = time();
    		$data["question_award"] = $_POST["experience"];
    		$qid = M("question")->add($data);
    		if($qid>0){
    			$this->redirect("detail?q=".$qid);
    		}else{
    			$this->error("未知错误！");
    		}
    	}else{
    		$this->display();
    	}
    	
   		
    }
     public function detail(){
        $this->before();
     	// $this->assign("name",cookie("user_name"));
     	$qid = $_GET["q"];
		$sql = "select u.id as uid,u.user_name,u.user_image,q.* from think_user as u right join think_question as q on u.id = q.question_uid where q.id = ".$qid;
		$res = M()->query($sql);
		$res = $res[0];
		$res["question_time"] = date("Y:m:d H:i:s",$res["question_time"]);
     	$comments = $this->getComment($qid);
     	$this->assign("comment",$comments);
     	$this->assign("question",$res);
     	
     	if($res["uid"]==session("uid")){
     		$this->assign("is_author","1");
     	}
     	
     	// 浏览加1
     	M("question")->where("id = ".$qid)->setInc("question_view");
     	
     	$hot = $this->getHot();
     	$hotComment = $this->getHotComment();
     	
     	$this->assign("hot",$hot);
     	$this->assign("hotComment",$hotComment);
   		$this->display();
    }
    
    
    private function getComment($qid){
    	$cid = M("question")->where("id=".$qid)->getField("question_beast");
    	$sql = "select a.* ,u.id as uid,u.user_name,u.user_image from think_answer as a left join think_user as u on a.answe_uid = u.id where a.answer_qid = ".$qid." and a.id !=".$cid." order by answer_time desc";
    	$res = M()->query($sql);
    	$tool = new Date();
    	for($i = 0;$i<count($res);$i++){
    		$res[$i]["answer_time"] = $tool->translate($res[$i]["answer_time"]);
    		$res[$i]["zan"] = M("answer_like")->where("like_cid = ".$res[$i]["id"])->count();
    	}
    	if($cid>0){
    		$beast = $this->getBeast($qid,$cid);
        }
    	if($beast[0]!=NULL){
    		$beast[0]["answer_time"] = $tool->translate($beast[0]["answer_time"]);
    		$this->assign("beast",$beast[0]);
    	}
     	return $res;
    }
    
    public function comment(){
    	$this->before();
    	$qid = $_POST["qid"];
    	$uid = $_POST["uid"];
    	$content = $_POST["content"];
    	
    	$data["answer_qid"] = $qid;
    	$data["answe_uid"] = $uid;
    	$data["answer_content"] = $content;
    	$data["answer_time"] = time();
    	
    	if(M("answer")->add($data)){
    		
    		$count = M("answer")->where("answer_qid=".$qid)->count();
    		M("question")->where("id = ".$qid)->setField("question_comment",$count);
    		$this->success("评论成功！");
    	}else{
    		$this->error("评论失败！");
    	}
    }
    
    public function  deleteComment(){
    	$cid = $_GET["cid"];
    	if(M("answer")->where("id = ".$cid)->delete()){
    		$this->success("删除成功！");
    	}else{
    		$this->error("删除失败！");
    	}
    }
    
    public function setBeast(){
    	$cid = $_GET["cid"];
    	$qid = $_GET["qid"];
        $Model = M("question");
        $res = $Model->where("id=".$qid)->save(array("question_beast"=>$cid,'question_status'=>1));
    	if($res){
    		$this->success("采纳成功！");
    	}else{
    		$this->error("采纳失败！");
    	}
    }
    
    private function getBeast($qid,$cid){
    	$sql = "select a.* ,u.id as uid,u.user_name,u.user_image from think_answer as a left join think_user as u on a.answe_uid = u.id where a.id = ".$cid;
    	$beast = M()->query($sql);
    	$beast[0]["zan"] = M("answer_like")->where("like_cid = ".$beast[0]["id"])->count();
    	return $beast;
    }
    
    /**赞**/
    public function like(){
    	$data["status"] = "ok";
    	if(IS_POST){
    		$map["like_uid"] = session("uid");
    		if($map["like_uid"]<=0||$map["like_uid"]==""||$map["like_uid"]==null){
    			$data["status"] = "no";
    			$this->ajaxReturn($data);
    		}
    		$map["like_cid"] = $_POST["c"];
    		$map["like_qid"] = $_POST["q"];
    		if(M("answer_like")->where($map)->count()>0){
    			M("answer_like")->where($map)->delete();
    			$data["action"] = "unlike";
    		}else{
    			M("answer_like")->add($map);
    			$data["action"] = "like";
    		}
    		$data["count"] = M("answer_like")->where("like_cid = ".$map["like_cid"])->count();
    	}
  		$this->ajaxReturn($data);
    }
    
    public function getHot(){
    	$res = M("question")->where("1")->field("id,question_title,question_view")->order("question_view desc")->limit("8")->select();
   		return $res;
    }
    public function getHotComment(){
    	$res = M("question")->where("1")->field("id,question_title,question_comment")->order("question_comment desc")->limit("8")->select();
   		return $res;
    }
    
}
