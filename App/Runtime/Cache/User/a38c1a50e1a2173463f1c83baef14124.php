<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<title>论坛</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="keywords" content="关键词">
		<meta name="description" content="页面描述">
		<link rel="stylesheet" href="/Public/layui/css/layui.css">
		<link rel="stylesheet" href="/Public/css/global.css">
		
		<script src="/Public/jquery-2.1.0.js"></script>
		
	</head>

	<body>
		
	<div class="header">
  <div class="main">
    <a class="logo" href="<?php echo U('Home/Index/index');?>" title="Fly">首页</a>
    <div class="nav">
      <a class="nav-this" href="<?php echo U('User/Index/home?u='.session('uid'));?>">
        <i class="iconfont icon-wenda"></i>我的问答
      </a>
      <a class="nav-this" href="<?php echo U('User/Index/index');?>">
        <i class="iconfont icon-logo"></i>问答中心
      </a>
      <a class="nav-this" href="/index.php/User/Index/index?p=1">
        <i class="iconfont icon-ui"></i>个人中心
      </a>
    </div>
    
    <div class="nav-user">
     <?php if(empty($name)): ?><!-- 未登入状态 -->
	      <a class="unlogin" href="#"><i class="iconfont icon-touxiang"></i></a>
	      <span><a href="/index.php/User/Index/login">登入</a><a href="/index.php/User/Index/reg">注册</a></span>
	     <!--  <p class="out-login">
	        <a href="#" class="iconfont icon-qq" title="QQ登入"></a>
	        <a href="#" class="iconfont icon-weibo" title="微博登入"></a>
	      </p> --><?php endif; ?>
      
      <?php if(!empty($name)): ?><!-- 登入后的状态 -->
      <a class="avatar" href="/index.php/User/Index/home?u=<?php echo (session('uid')); ?>">
        <img src="<?php echo (cookie('user_image')); ?>">
        <cite><?php echo (cookie('user_name')); ?></cite>
        <i>VIP2</i>
      </a>
      <div class="nav">
        <a href="#"><i class="iconfont icon-shezhi"></i>设置</a>
        <a href="/index.php/User/Index/logout">
        	<i class="iconfont icon-tuichu" style="top: 0; font-size: 22px;"></i>退了
        </a>
      </div><?php endif; ?>
    </div>
  </div>
</div>



		
	<div class="fly-home" style="background-image: url();">
  <img src="<?php echo ($usermsg["user_image"]); ?>" alt="用户头像">
  <h1>
    <?php echo ($usermsg["user_name"]); ?>
    <i class="iconfont icon-nan"></i> 
    <!-- <i class="iconfont icon-nv"></i> -->
    
    <!-- <span style="color:#c00;">（超级码农）</span>
    <span style="color:#5FB878;">（活雷锋）</span>
    <span>（该号已被封）</span> -->
  </h1>
  <p class="fly-home-info">
    <i class="iconfont icon-zuichun" title="飞吻"></i><span style="color: #FF7200;">67206飞吻</span>
    <i class="iconfont icon-shijian"></i><span><?php echo ($usermsg["user_regtime"]); ?> 加入</span>
    <i class="iconfont icon-chengshi"></i><span>来自杭州</span>
  </p>
  <p class="fly-home-sign">（<?php echo ($usermsg["user_motto"]); ?>）</p>
</div>
<div class="main fly-home-main">
  <div class="layui-inline fly-home-jie">
    <div class="fly-panel">
      <h3 class="fly-panel-title"><b><?php echo ($usermsg["user_name"]); ?></b> -- 最近的提问</h3>
      <?php if($questionList): ?><ul class="jie-row">
          <?php if(is_array($questionList)): $i = 0; $__LIST__ = $questionList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
              <span class="fly-jing">精</span>
              <a href="/Question/index/detail?q=<?php echo ($vo["qid"]); ?>" class="jie-title"><?php echo ($vo["qid"]); echo ($vo["question_title"]); ?></a>
              <i><?php echo ($vo["question_time"]); ?></i>
              <em><?php echo ($vo["question_view"]); ?>阅/<?php echo ($vo["question_comment"]); ?>答</em>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      <?php else: ?>
        <div class="fly-none" style="min-height: 50px; padding:30px 0; height:auto;"><i style="font-size:14px;">没有发表任何求解</i></div><?php endif; ?>
    </div>
  </div>
  
  <div class="layui-inline fly-home-da">
    <div class="fly-panel">
      <h3 class="fly-panel-title"><b><?php echo ($usermsg["user_name"]); ?></b> -- 最近的回答</h3>
      <?php if($answerList): ?><ul class="home-jieda">
          <?php if(is_array($answerList)): $i = 0; $__LIST__ = $answerList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$avo): $mod = ($i % 2 );++$i;?><li>
              <p>
              <span><?php echo ($avo["answer_time"]); ?></span>
              在<a href="/Question/index/detail?q=<?php echo ($vo["qid"]); ?>" target="_blank"><?php echo ($avo["question_title"]); ?></a>中回答：
              </p>
              <div class="home-dacontent">
                <?php echo ($avo["answer_content"]); ?>
                <!-- <pre>
                </pre> -->
              </div>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      <?php else: ?>
        <div class="fly-none" style="min-height: 50px; padding:30px 0; height:auto;"><span>没有回答任何问题</span></div><?php endif; ?>
    </div>
  </div>
</div>

		
	<div class="footer">
	<p>
		<a href="#">Fly社区</a> 2017 &copy;
		<a href="#">layui.com</a>
	</p>
	<p>
		<a href="#" target="_blank">产品授权</a>
		<a href="#" target="_blank">获取Fly社区模版</a>
		<a href="#" target="_blank">微信公众号</a>
	</p>
</div>

		<script src="/Public/layui/layui.js"></script>
		<script>
			layui.config({
				version: "2.0.0",
				base: '/Public/mods/'
			}).extend({
				fly: 'index'
			}).use('fly');
		</script>
		
	</body>

</html>