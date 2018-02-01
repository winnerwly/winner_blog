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



		
<div class="main fly-user-main layui-clear">
  <ul class="layui-nav layui-nav-tree layui-inline" lay-filter="user">
    <li class="layui-nav-item">
      <a href="home.html">
        <i class="layui-icon">&#xe609;</i>
        我的主页
      </a>
    </li>
    <li class="layui-nav-item">
      <a href="index.html">
        <i class="layui-icon">&#xe612;</i>
        用户中心
      </a>
    </li>
    <li class="layui-nav-item">
      <a href="set.html">
        <i class="layui-icon">&#xe620;</i>
        基本设置
      </a>
    </li>
    <li class="layui-nav-item">
      <a href="message.html">
        <i class="layui-icon">&#xe611;</i>
        我的消息
      </a>
    </li>
  </ul>

  <div class="site-tree-mobile layui-hide">
    <i class="layui-icon">&#xe602;</i>
  </div>
  <div class="site-mobile-shade"></div>
  
  <div class="fly-panel fly-panel-user" pad20>
    <div class="layui-tab layui-tab-brief" lay-filter="user">
      <ul class="layui-tab-title">
        <li class="layui-this">
          激活邮箱
        </li>
      </ul>
      <div class="layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
        <ul class="layui-form">
          <li class="layui-form-li">
            <label for="activate">您的邮箱：</label>
            <span class="layui-form-text">xx@xx.com
              <!-- <em style="color:#999;">（已成功激活）</em> -->
              <em style="color:#c00;">（尚未激活）</em>
            </span>
          </li>
          <li class="layui-form-li" style="margin-top: 20px; line-height: 26px;">
            <div>
              1. 如果您未收到邮件，或激活链接失效，您可以
              <a class="layui-form-a" style="color:#4f99cf;" id="LAY-activate" href="javascript:;" email="{{user.email}}">重新发送邮件</a>，或者
              <a class="layui-form-a" style="color:#4f99cf;" href="set.html">更换邮箱</a>；
            </div>
            <div>
              2. 如果您始终没有收到 Fly 发送的邮件，请注意查看您邮箱中的垃圾邮件；
            </div>
            <div>
              3. 如果你实在无法激活邮件，您还可以联系：admin@xx.com
            </div>
          </li>
        </ul>
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