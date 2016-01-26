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
	
	<div class="content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<form action="<?php print $this->webroot;?>login/sign" name="LoginForm" id="LoginForm" method="post" >
					<div class="form-group">
						<label for="xxxx">用户名:</label>
						<input type="text" class="form-control no_top_radius no_bottom_radius" id="USER_NAME" name="USER_NAME" placeholder="请输入用户名">
					</div>
					<div class="form-group">
						<label for="xxxxx">密码:</label>
						<input type="password" class="form-control no_top_radius no_bottom_radius" id="USER_PASSWORD" name="USER_PASSWORD" placeholder="请输入密码">
					</div>
					
					<button type="submit" class="btn btn-primary no_top_radius no_bottom_radius">登录</button>
				</form>
				
			</div>
		</div>
	</div>
	
	
    <script src="<?php print $this->webroot."bootstrap/js/bootstrap.min.js";?>"></script>

	
  </body>
</html>