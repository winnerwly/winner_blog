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
  <div class="fly-panel fly-panel-user" pad20>
    <div class="layui-tab layui-tab-brief" lay-filter="user">
      <ul class="layui-tab-title">
        <li class="layui-this">找回密码</li>
      </ul>
      <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
        <div class="layui-tab-item layui-show">
          <div class="layui-form layui-form-pane">
            <form method="post">
              <div class="layui-form-item">
                <label for="L_email" class="layui-form-label">邮箱</label>
                <div class="layui-input-inline">
                  <input type="text" id="L_email" name="email" required lay-verify="required" autocomplete="off" class="layui-input">
                </div>
              </div>
              <div class="layui-form-item">
                <label for="L_vercode" class="layui-form-label">人类验证</label>
                <div class="layui-input-inline">
                  <input type="text" id="L_vercode" name="vercode" required lay-verify="required" placeholder="请回答后面的问题" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid">
                  <span style="color: #c00;">{{d.vercode}}</span>
                </div>
              </div>
              <div class="layui-form-item">
                <button class="layui-btn" alert="1" lay-filter="*" lay-submit>提交</button>
              </div>
            </form>
          </div>
          
          <!-- 重置密码模版也在该页面中，HTML被注释部分 -->
          
          <!-- <div class="fly-error">该重置密码链接已失效，请重新校验您的信息</div>
          <div class="fly-error">非法链接，请重新校验您的信息</div>
          
          <div class="fly-msg">马云，请重置您的密码</div>
          <div class="layui-form layui-form-pane"  style="margin-top: 30px;">
            <form action="/user/repass" method="post">
              <div class="layui-form-item">
                <label for="L_pass" class="layui-form-label">密码</label>
                <div class="layui-input-inline">
                  <input type="password" id="L_pass" name="pass" required lay-verify="required" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">6到16个字符</div>
              </div>
              <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">确认密码</label>
                <div class="layui-input-inline">
                  <input type="password" id="L_repass" name="repass" required lay-verify="required" autocomplete="off" class="layui-input">
                </div>
              </div>
              <div class="layui-form-item">
                <label for="L_vercode" class="layui-form-label">人类验证</label>
                <div class="layui-input-inline">
                  <input type="text" id="L_vercode" name="vercode" required lay-verify="required" placeholder="请回答后面的问题" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid">
                  <span style="color: #c00;">{{d.vercode}}</span>
                </div>
              </div>
              <div class="layui-form-item">
                <input type="hidden" name="username" value="{{d.username}}">
                <input type="hidden" name="email" value="{{d.email}}">
                <button class="layui-btn" alert="1" lay-filter="*" lay-submit>提交</button>
              </div>
            </form>
          </div>
          -->
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