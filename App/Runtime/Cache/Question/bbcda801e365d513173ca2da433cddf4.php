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



		
	<div class="main layui-clear">
		<div class="wrap">
			<div class="content detail">
				<div data-id="<?php echo ($question["id"]); ?>" class="fly-panel detail-box">
					<h1><?php echo ($question["question_title"]); ?></h1>
					<div class="fly-tip fly-detail-hint" data-id="{{rows.id}}">
						<span class="fly-tip-stick">置顶帖</span>
						<span class="fly-tip-jing">精帖</span>
						<span>未结贴</span>
						<!-- <span class="fly-tip-jie">已采纳</span> -->

						<!-- <span class="jie-admin" type="del" style="margin-left: 20px;">删除</span>
				          <span class="jie-admin" type="set" field="stick" rank="1">置顶</span> 
				          <span class="jie-admin" type="set" field="stick" rank="0" style="background-color:#ccc;">取消置顶</span>
				          <span class="jie-admin" type="set" field="status" rank="1">加精</span> 
				          <span class="jie-admin" type="set" field="status" rank="0" style="background-color:#ccc;">取消加精</span> -->

						<div class="fly-list-hint">
							<i class="iconfont" title="回答">&#xe60c;</i><?php echo ($question["question_comment"]); ?>
							<i class="iconfont" title="人气">&#xe60b;</i><?php echo ($question["question_view"]); ?>
						</div>
					</div>
					<div class="detail-about">
						<a class="jie-user" href="">
							<img src="<?php echo ($question["user_image"]); ?>" alt="">
							<cite>
              					<?php echo ($question["user_name"]); ?>
				              	<em><?php echo ($question["question_time"]); ?></em>
				            </cite>
						</a>
						<div class="detail-hits" data-id="{{rows.id}}">
							<span style="color:#FF7200">悬赏：<?php echo ($question["question_award"]); ?>飞吻</span>
							<span class="layui-btn layui-btn-mini jie-admin" type="edit"><a href="/jie/edit/{{rows.id}}">编辑此贴</a></span>
							<span class="layui-btn layui-btn-mini jie-admin " type="collect" data-type="add">收藏</span>
							<!--<span class="layui-btn layui-btn-mini jie-admin  layui-btn-danger" type="collect" data-type="add">取消收藏</span>-->
						</div>
					</div>

					<div class="detail-body photos" style="margin-bottom: 20px;">
						<?php echo ($question["question_content"]); ?>
					</div>
				</div>

				<div class="fly-panel detail-box" style="padding-top: 0;">
					<a name="comment"></a>
					<ul class="jieda photos" id="jieda">
						<?php if(!empty($beast)): ?><li data-id="<?php echo ($beast["id"]); ?>" class="jieda">
							<a name=""></a>
							<div class="detail-about detail-about-reply">
								<a class="jie-user" href="">
									<img src="<?php echo ($beast["user_image"]); ?>" alt="" layer-index="1">
									<cite>
			                  <i><?php echo ($beast["user_name"]); ?></i>
			                </cite>
								</a>
								<div class="detail-hits">
									<span><?php echo ($beast["answer_time"]); ?></span>
								</div>
								<i class="iconfont icon-caina" title="最佳答案"></i>
							</div>
							<div class="detail-body jieda-body">
								<?php echo ($beast["answer_content"]); ?>
							</div>
							<div class="jieda-reply">
								<span class="jieda-zan" type="zan"><i class="iconfont icon-zan"></i><em><?php echo ($beast["zan"]); ?></em></span>
								<span type="reply"><i class="iconfont icon-svgmoban53"></i>回复</span>

							</div>
						</li><?php endif; ?>
						<?php if(is_array($comment)): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li data-id="<?php echo ($vo["id"]); ?>">
								<a name="item-121212121212"></a>
								<div class="detail-about detail-about-reply">
									<a class="jie-user" href="">
										<img src="<?php echo ($vo["user_image"]); ?>" alt="">
										<cite>
						                  <i><?php echo ($vo["user_name"]); ?></i>
						                  <em style="color:#FF9E3F">活雷锋</em>
						                   <!-- <em>(楼主)</em>
						                  <em style="color:#5FB878">(管理员)</em>
						                  <em style="color:#FF9E3F">（活雷锋）</em>
						                  <em style="color:#999">（该号已被封）</em> -->
						                </cite>
									</a>
									<div class="detail-hits">
										<span><?php echo ($vo["answer_time"]); ?></span>
									</div>
								</div>
								<div class="detail-body jieda-body">
									<?php echo ($vo["answer_content"]); ?>
								</div>
								<div class="jieda-reply">
									<span class="jieda-zan" type="zan"><i class="iconfont icon-zan"></i><em><?php echo ($vo["zan"]); ?></em></span>
									<span type="reply"><i class="iconfont icon-svgmoban53"></i>回复</span>
									<?php if(!empty($is_author)): ?><div class="jieda-admin">
											<span type="edit">编辑</span>
											<span type="del"><a href="/index.php/Question/Index/deleteComment?cid=<?php echo ($vo["id"]); ?>">删除</a></span>
											<span class="jieda-accept" type="accept"><a href="/index.php/Question/Index/setBeast?cid=<?php echo ($vo["id"]); ?>&qid=<?php echo ($question["id"]); ?>">采纳</a></span>
										</div><?php endif; ?>
								</div>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
						<?php if(empty($comment)): ?><li class="fly-none">没有任何回答</li><?php endif; ?>

					</ul>

					<div class="layui-form layui-form-pane">
						<form action="/index.php/Question/Index/comment" method="post">
							<div class="layui-form-item layui-form-text">
								<div class="layui-input-block">
									<textarea id="L_content" name="content" required lay-verify="required" placeholder="我要回答" class="layui-textarea fly-editor" style="height: 150px;"></textarea>
								</div>
							</div>
							<div class="layui-form-item">
								<input type="hidden" name="qid" value="<?php echo ($question["id"]); ?>">
								<input type="hidden" name="uid" value="<?php echo (session('uid')); ?>">
								<button class="layui-btn" lay-filter="*" lay-submit>提交回答</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="edge">
			<dl class="fly-panel fly-list-one">
				<dt class="fly-panel-title">最近热帖</dt>
				<?php if(is_array($hot)): $i = 0; $__LIST__ = $hot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dd>
					<a href="/index.php/Question/Index/detail?q=<?php echo ($vo["id"]); ?>"><?php echo ($vo["question_title"]); ?></a>
					<span><i class="iconfont">&#xe60b;</i><?php echo ($vo["question_view"]); ?></span>
				</dd><?php endforeach; endif; else: echo "" ;endif; ?>
			</dl>

			<dl class="fly-panel fly-list-one">
				<dt class="fly-panel-title">近期热议</dt>
				<?php if(is_array($hotComment)): $i = 0; $__LIST__ = $hotComment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dd>
					<a href="/index.php/Question/Index/detail?q=<?php echo ($vo["id"]); ?>"><?php echo ($vo["question_title"]); ?></a>
					<span><i class="iconfont">&#xe60c;</i><?php echo ($vo["question_comment"]); ?></span>
				</dd><?php endforeach; endif; else: echo "" ;endif; ?>
			</dl>
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
		
	<script type="text/javascript">
		
		$("span.jieda-zan").click(function(e){
			var qid = $(".detail-box").attr("data-id");
			var cid = $(this).parents("li").attr("data-id");
			
			var _self = $(this);
			$.post("/index.php/Question/Index/like",{q:qid,c:cid},function(data){
				if(data.status == "ok"){
					if(data.action=="like"){
						_self.addClass("zanok");
					}else{
						_self.removeClass("zanok");
					}
					_self.children("em").text(data.count);
				}else{
					alert("请登录！");
				}
			});
		});
	</script>

	</body>

</html>