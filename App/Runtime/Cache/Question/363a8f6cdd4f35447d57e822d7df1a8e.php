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
    <a class="logo" href="/index.php" title="Fly">Fly社区</a>
    <div class="nav">
      <a class="nav-this" href="/index.php/Question">
        <i class="iconfont icon-wenda"></i>问答
      </a>
      <a href="/index.php/User/Index/index?p=1">
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
      <a class="avatar" href="#">
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



		

	<div class="main layui-clear">
		<div class="wrap">
			<div class="content" style="margin-right:0">
				<div class="fly-tab">
					<span>
						<?php if(($status == -1)): ?><a href="/index.php/Question/Index"  class="tab-this" >全部</a>
			          	<?php else: ?>
			          		<a href="/index.php/Question/Index"  >全部</a><?php endif; ?> 
			          	
			          	<?php if(($status == 0)): ?><a href="/index.php/Question/Index?status=0" class="tab-this" >未结帖</a>
			          	<?php else: ?>
			          		<a href="/index.php/Question/Index?status=0" >未结帖</a><?php endif; ?> 
			          	
			          	<?php if(($status == 1)): ?><a href="/index.php/Question/Index?status=1" class="tab-this" >已采纳</a>
			          	<?php else: ?>
			          		 <a href="/index.php/Question/Index?status=1" >已采纳</a><?php endif; ?> 
			          	
			          	<?php if(($status == 2)): ?><a href="/index.php/Question/Index?status=2" class="tab-this" >精帖</a>
			          	<?php else: ?>
			          		<a href="/index.php/Question/Index?status=2" >精帖</a><?php endif; ?> 
			          <a href="../user/index.html" >我的帖</a>
			        </span>
					<form action="/index.php/Home/Index/search" method="get" class="fly-search">
						<i class="iconfont icon-sousuo"></i>
						<input class="layui-input" autocomplete="off" placeholder="搜索内容，回车跳转" type="text" name="key">
					</form>
					<a href="/index.php/Question/Index/add" class="layui-btn jie-add">发布问题</a>
				</div>

				<ul class="fly-list">
					
					<?php if(is_array($question)): $i = 0; $__LIST__ = $question;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="fly-list-li">
							<a href="user/home.html" class="fly-list-avatar">
								<img src="<?php echo ($vo["user_image"]); ?>" alt="">
							</a>
							<h2 class="fly-tip">
					            <a href="/index.php/Question/Index/detail?q=<?php echo ($vo["id"]); ?>"><?php echo ($vo["question_title"]); ?></a>
					             <?php if(($vo["s"] == 1)): ?><span class="fly-tip-stick">已解决</span>
									<?php elseif($vo["s"] == 2): ?>
										<span class="fly-tip-stick">已解决</span>
										<span class="fly-tip-jing">精帖</span><?php endif; ?>
	          				</h2>
							<p>
								<span><a href="user/home.html"><?php echo ($vo["user_name"]); ?></a></span>
								<span><?php echo ($vo["question_time"]); ?></span>
								<span><?php echo ($vo["type_name"]); ?></span>
								<span class="fly-list-hint"> 
					              <i class="iconfont" title="回答">&#xe60c;</i> <?php echo ($vo["question_comment"]); ?>
					              <i class="iconfont" title="人气">&#xe60b;</i> <?php echo ($vo["question_view"]); ?>
	           				 </span>
							</p>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>

				<!-- <div class="fly-none">并无相关数据</div> -->

				<div style="text-align: center">
						<?php echo ($show); ?>
				</div>

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