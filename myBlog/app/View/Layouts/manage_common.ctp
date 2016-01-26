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
	<script>
		window.UEDITOR_HOME_URL  = "<?php print $this->webroot."ueditor/";?>";
		window.UEDITOR_SERVER_URL  = "<?php print $this->webroot."forUeditor";?>";
    </script>
	<script type="text/javascript" src="<?php print $this->webroot."ueditor/ueditor.config.js";?>"></script>
    <script type="text/javascript" src="<?php print $this->webroot."ueditor/ueditor.all.js";?>"></script>
  </head>
<body >
	<div class="content container">
		<form name="manage_common" id="manage_common" method="post">
			<div class="row">
				<div class="col-md-2 ">
					<div class="list-group">
						<a href="<?php print $this->webroot;?>blog/index" class="list-group-item no_top_radius" style="font-weight:700;border:1px solid #ddd; background-color:#337ab7;color:#fff" ><span> 查看首页</span></a>
						<a href="<?php print $this->webroot;?>blogManage/index" class="list-group-item " style="font-weight:700;border:1px solid #ddd; background-color:#5cb85c;color:#fff" ><span> 博文管理</span></a>
						<a href="<?php print $this->webroot;?>commentManage/commentIndex" class="list-group-item " style="font-weight:700;border:1px solid #ddd; background-color:#fa9900;color:#fff" ><span>评论管理</span></a>
						<a href="<?php print $this->webroot;?>blogTypeManage/blogTypeIndex" class="list-group-item " style="font-weight:700;border:1px solid #ddd; background-color:#993333;;color:#fff" ><span>分类管理</span></a>
						<a href="<?php print $this->webroot;?>linkManage/linkIndex" class="list-group-item " style="font-weight:700;border:1px solid #ddd; background-color:#46b8da;color:#fff" ><span>链接管理</span></a>
						<a href="<?php print $this->webroot;?>versatileManage/versatileIndex" class="list-group-item " style="font-weight:700;border:1px solid #ddd; background-color:#fa99a0;color:#fff" ><span>系统设置</span></a>
						<a href="<?php print $this->webroot;?>Login/logout" class="list-group-item no_bottom_radius" style="font-weight:700;border:1px solid #ddd; background-color:#fa39a0;color:#fff" ><span class=""> 退出 </span> </a>
					</div>
				</div>
				<div class="col-md-10">
					<?php echo $this->Session->flash(); ?>
					<?php echo $content_for_layout; ?>
				</div>
			</div>
		</form>
	</div>
	
	
    <script src="<?php print $this->webroot."bootstrap/js/bootstrap.min.js";?>"></script>
	<script>
		
	</script>
	
  </body>
</html>