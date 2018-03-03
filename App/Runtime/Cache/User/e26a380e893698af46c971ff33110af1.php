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
        <i class="iconfont icon-wenda"></i>问答中心
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


	

		
<div class="main fly-user-main layui-clear">
 	<ul class="layui-nav layui-nav-tree layui-inline" lay-filter="user">
	<li class="layui-nav-item">
		<a href="/User/Index/home?p=0">
			<i class="layui-icon">&#xe609;</i> 我的主页
		</a>
	</li>
	<li class="layui-nav-item">
		<a href="/User/Index/index?p=1">
			<i class="layui-icon">&#xe612;</i> 用户中心
		</a>
	</li>
	<li class="layui-nav-item">
		<a href="/User/Index/set?p=2">
			<i class="layui-icon">&#xe620;</i> 基本设置
		</a>
	</li>
	<li class="layui-nav-item">
		<a href="/User/Index/message?p=3">
			<i class="layui-icon">&#xe611;</i> 我的消息
		</a>
	</li>
</ul>
<input value="<?php echo ($_GET['p']); ?>" type="hidden" id="page-index" />
<script type="text/javascript">
	
	$(document).ready(function(){
		var index = $("input#page-index").val();
		$("ul li.layui-nav-item").removeClass("layui-this").eq(index).addClass("layui-this");
	});
	
</script>
  <div class="site-tree-mobile layui-hide">
    <i class="layui-icon">&#xe602;</i>
  </div>
  <div class="site-mobile-shade"></div>
  
  <div class="fly-panel fly-panel-user" pad20>
    <!--
    <div class="fly-msg" style="margin-top: 15px;">
      您的邮箱尚未验证，这比较影响您的帐号安全，<a href="activate.html">立即去激活？</a>
    </div>
    -->
    <div class="layui-tab layui-tab-brief" lay-filter="user">
      <ul class="layui-tab-title" id="LAY_mine">
        <li data-type="mine-jie" lay-id="index" class="layui-this">我发的帖（<span>89</span>）</li>
        <li data-type="collection" data-url="/collection/find/" lay-id="collection">我收藏的帖（<span>16</span>）</li>
      </ul>
      <div class="layui-tab-content" style="padding: 20px 0;">
        <div class="layui-tab-item layui-show">
          <ul class="mine-view jie-row">
            <li>
              <a class="jie-title" href="/jie/8116.html" target="_blank">LayIM 3.5.0 发布，移动端版本大更新（带演示图）</a>
              <i>2017/3/14 上午8:30:00</i>
              <a class="mine-edit" href="/jie/edit/8116">编辑</a>
              <em>661阅/10答</em>
            </li>
            <li>
              <a class="jie-title" href="/jie/8116.html" target="_blank">LayIM 3.5.0 发布，移动端版本大更新（带演示图）</a>
              <i>2017/3/14 上午8:30:00</i>
              <a class="mine-edit" href="/jie/edit/8116">编辑</a>
              <em>661阅/10答</em>
            </li>
            <li>
              <a class="jie-title" href="/jie/8116.html" target="_blank">LayIM 3.5.0 发布，移动端版本大更新（带演示图）</a>
              <i>2017/3/14 上午8:30:00</i>
              <a class="mine-edit" href="/jie/edit/8116">编辑</a>
              <em>661阅/10答</em>
            </li>
          </ul>
          <div id="LAY_page"></div>
        </div>
        <div class="layui-tab-item">
          <ul class="mine-view jie-row">
            <li>
              <a class="jie-title" href="http://fly.layui.com/jie/5366.html" target="_blank">layui 常见问题的处理和实用干货集锦</a>
              <i>收藏于23小时前</i>  </li>
          </ul>
          <div id="LAY_page1"></div>
        </div>
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