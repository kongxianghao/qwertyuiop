<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title_for_layout; ?></title>
    <!-- bootstrap.min.css -->
    <link href="<?php print $this->webroot."bootstrap/css/bootstrap.min.css";?>" rel="stylesheet">
	<link href="<?php print $this->webroot."css/blog_common.css";?>" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    [endif] -->
	 <script src="<?php print $this->webroot."bootstrap/js/jquery.js";?>"></script>
  </head>
<body >
	<form name="manage_common" id="manage_common" method="post" >
		<div class="header">
			<div >
				<nav class="navbar navbar-inverse navbar-fixed-top navbar_badge_background_color" >
				  <div class="container" >
					<div class="navbar-header" >
						<a class="navbar-brand" href="<?php print $this->webroot;?>blog/index">kongxh</a>
					</div>
					<div class="collapse navbar-collapse" >
					  <ul class="nav navbar-nav" >
						<li class="active active_background_color" ><a href="<?php print $this->webroot;?>blog/index"  >博文管理</a></li>
						<!--<li ><a href="#" >留言管理</a></li>
						<li ><a href="#" >关于网站</a></li>-->
					  </ul>
					  <a href="<?php print $this->webroot."login/index";?>" class="btn btn-info navbar-btn navbar-right no_top_radius no_bottom_radius" >Sign in</a>
					  <div class="navbar-form navbar-right" role="search" >
						<div class="form-group">
							<div class="input-group">
								<input type="text" id="KEYWORDS" name="KEYWORDS" value="<?php if(isset($whereList) && isset($whereList['keywords'])){echo $whereList['keywords'];} ?>" class="form-control no_top_radius no_bottom_radius" placeholder="输入搜索内容" >
								<span class="input-group-btn" >
								<button class="btn btn-info no_top_radius no_bottom_radius for_query_button" type="button">
								 检索
								</button>
								</span>
							</div>
						</div>
					  </div>
					</div>
				  </div>
				</nav>
			</div>
			<div class="visible-xs" style="margin-bottom: 30px;">
			</div>
			
			<div class="jumbotron hidden-xs l_tit" style="background-color:#3D9CCC;color:#FFF;margin-bottom: 30px;">
				<div class="container">
					<h1 >祥昊的图文</h1>
					<h2> 在路上！！！</h2>
				</div>
			</div> <!--
			<div id="myCarousel" class="carousel slide" style="margin-bottom: 30px;">
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>   
				<div class="carousel-inner">
					<div class="item active"  >
						<div class="jumbotron" style="background-color:#FA99a0;color:#FFF;margin-bottom: 0px;">
							<div class="container">
								<h1 >祥昊的图文</h1>
								<h2> 現実は厳しいですね！！！</h2>
							</div>
						</div>
					</div>
					<div class="item" >
						<div class="jumbotron" style="background-color:#3D9CCC;color:#FFF;margin-bottom: 0px;">
							<div class="container">
								<h1 >祥昊的图文</h1>
								<h2> 現実は厳しいですね！！！</h2>
							</div>
						</div>
					</div>
					<div class="item" >
						<div class="jumbotron" style="background-color:#FA9900;color:#FFF;margin-bottom: 0px;">
							 <div class="container">
								<h1 >祥昊的图文</h1>
								<h2> 現実は厳しいですね！！！</h2>
							  </div>
						</div>
					</div>
				</div>
				<a class="carousel-control left" href="#myCarousel" data-slide="prev" role="button" ><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control right" role="button" href="#myCarousel" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>-->
		</div>
		
		<div class="content container">
			<div class="row">
				<div class="col-md-3">
					<div class="list-group">
						<a href="####" class="list-group-item no_top_radius no_bottom_radius active new_blog_lable" ><span>最新日志</span></a>
						<?php foreach($newBlogList as $key=>$blog){ ?>
							<a href="<?php print $this->webroot."blog/blogDetail/".$blog['sid'];?>" class="list-group-item no_bottom_radius" ><span><?php echo $blog['blog_title'] ;?> </span></a>
							
						<?php }  ?>
					</div>
					
					<div class="list-group">
					
						<input type="hidden" id="BLOG_TYPE" name="BLOG_TYPE" value="<?php if(isset($whereList) && isset($whereList['blog_type'])){echo $whereList['blog_type'];} ?>">
						<a href="####" class="list-group-item no_top_radius no_bottom_radius active sort_blog_lable" ><span >日志分类</span></a>
						<?php foreach($blogTypeAndCount as $key=>$e){ ?>
							<a href="####" data-type="<?php echo $e['blog_type'] ;?>" class="list-group-item no_bottom_radius blog_type_for_button" ><span class=""> <?php echo $e['blog_type_name'] ;?> </span> <span class="for_transform badge "> <?php echo $e['count'] ;?></span></a>
						<?php }  ?>
					</div>
					
					
					
					<div class="list-group">
						<a href="####" class="list-group-item no_top_radius no_bottom_radius active about_link" ><span>相关链接</span></a>
						
						<?php foreach($linkList as $key=>$link){ ?>
						<a href="http://<?php echo $link['site_url']?>" class="list-group-item no_bottom_radius" target="_blank"><span> <?php echo $link['site_name']?> </span></a>
						<?php }  ?>
						<!--<a href="####" class="list-group-item" ><span> java 基础 </span> </a>
						<a href="####" class="list-group-item no_bottom_radius" ><span> java 基础 </span> </a>-->
					</div>
					
				</div>
				<div class="col-md-9">
					<div>
						<ol class="breadcrumb no_top_radius no_bottom_radius" >
							<li><a href="<?php print $this->webroot;?>blog/index" >首页</a></li>
							<li><a href="<?php print $this->webroot;?>blog/index" >博文管理</a></li>
							<li class="active">
								<span>
								<?php
									if(isset($whereList) && isset($whereList['blog_type']) != ''){
										foreach($blogTypeAndCount as $key=>$e){
											if($e['blog_type'] == $whereList['blog_type']){
												echo $e['blog_type_name'];
												break;
											}
										}
									}
								?>
								</span>
							</li>
						</ol>
					</div>
					<div>
						<?php echo $this->Session->flash(); ?>
						<?php echo $content_for_layout; ?>
					</div>
				</div>
			</div>
		</div>
	
		<div class="footer">
				<p>CopyRight 2013 祥昊的图文 All Right Served.沪ICP备13027011号 </p>
		</div>
	 </form>
	
    <script src="<?php print $this->webroot."bootstrap/js/bootstrap.min.js";?>"></script>
	<script >
		$(".navbar-nav a").click(function(e){
			$(this).tab("show");
		});
		$(".blog_type_for_button").click(function(e){
			$("#BLOG_TYPE").val($(this).data("type"));
			$("#KEYWORDS").val("");
			$("#FORWORD_PAGE").val("1");
			$("#manage_common").attr("action", "<?php print $this->webroot;?>blog/blogList").submit();
		});
		$(".for_query_button").click(function(e){
			$("#BLOG_TYPE").val("");
			$("#FORWORD_PAGE").val("1");
			$("#manage_common").attr("action", "<?php print $this->webroot;?>blog/blogList").submit();
		}); 
		
		
		
	</script>
	
  </body>
</html>