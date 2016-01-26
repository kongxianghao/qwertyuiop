<div class="form-group">
	<label for="blog_title">日志标题</label>
	<input type="text" class="form-control no_top_radius no_bottom_radius" value="<?php if(isset($blog) && isset($blog['blog_title'])){ echo $blog['blog_title'];} ?>" name="BLOG_TITLE" id="blog_title" placeholder="请输入标题...">
</div>
<div class="form-group">
	<label for="blog_alias">别名</label>
	<input type="text" class="form-control no_top_radius no_bottom_radius" value="<?php if(isset($blog) && isset($blog['blog_alias'])){ echo $blog['blog_alias'];} ?>" name="BLOG_ALIAS" id="blog_alias"   placeholder="请输入别名...">
</div>
<div class="form-group">
	<label for="blog_excerpt">摘要</label>
	<textarea class="form-control  no_top_radius no_bottom_radius" style="resize:none;"  name="BLOG_EXCERPT" id="blog_excerpt" rows="3" placeholder="请输入摘要..." ><?php if(isset($blog) && isset($blog['blog_excerpt'])){ echo $blog['blog_excerpt'];} ?></textarea>
</div>
<div class="form-group">
	<div class="btn-group" role="group" style="min-width:80px;width:100px;" >
		<button type="button" style="width:100%;text-align:right;" class="btn btn-info dropdown-toggle no_top_radius no_bottom_radius" data-toggle="dropdown" aria-expanded="false">
			<span class="blogTypeHtmlText" >
				<?php 
					$text = "未分类";
					if(isset($blog) && isset($blog['blog_type'])){ 
						foreach($blogTypeList as $key=>$blogType){ 
							if($blogType['blog_type_id'] == $blog['blog_type']){
								$text = $blogType['blog_type_name'];
								break;
							}
						}
					}
					echo $text ;
				?>
			</span>
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu no_top_radius no_bottom_radius pull-right" role="menu" style="min-width:inherit;width:inherit;">
			<?php foreach($blogTypeList as $key=>$blogType){ ?>
			<li style="text-align:right;" ><a href="#" data-type="<?php echo $blogType['blog_type_id']; ?>" class="set_blog_type" ><?php echo $blogType['blog_type_name']; ?></a></li>
			<?php } ?>
		</ul>
		<input type="hidden" name="BLOG_TYPE" id="BLOG_TYPE" value="<?php echo (isset($blog) && isset($blog['blog_type'])) ?  $blog['blog_type'] : '1' ;  ?>" />	
	</div>
</div>

   <div class="form-group">
	<label for="BLOG_CONTENT">内容</label>
	<script id="BLOG_CONTENT" name="BLOG_CONTENT" type="text/plain">
        <?php if(isset($blog) && isset($blog['blog_content'])){ echo $blog['blog_content'];} ?>
    </script>
    <script type="text/javascript">
        var blog_content = UE.getEditor('BLOG_CONTENT');
    </script>
  </div>
  <input type="hidden" name="BLOG_HIDE" id="BLOG_HIDE"  value="<?php if(isset($blog) && isset($blog['blog_hide'])){ echo $blog['blog_hide'];} ?>"  >
  <input type="hidden" name="BLOG_SID" id="BLOG_SID"  value="<?php if(isset($blog) && isset($blog['sid'])){ echo $blog['sid'];} ?>"  >
  <button type="button" class="btn btn-primary no_top_radius no_bottom_radius save_blog_button">添加日志</button>
  <?php if(!isset($blog) || !isset($blog['sid'])){  ?>
	<button type="button" class="btn btn-info no_top_radius no_bottom_radius save_blog_draft_button">添加草稿</button>
  <?php } ?>
<script>
	$(".set_blog_type").click(function(e){
		var blog_type = $(this).data('type');
		
		$(".blogTypeHtmlText").text($(this).text());
		$("#BLOG_TYPE").val(blog_type);
	});
	
	$(".save_blog_button").click(function(e){
		var content = blog_content.getContent();
		$("#BLOG_HIDE").val("n");
		$("#manage_common").attr("action", "<?php print $this->webroot;?>blogManage/saveBlog").submit();
	});
	$(".save_blog_draft_button").click(function(e){
		var content = blog_content.getContent();
		$("#BLOG_HIDE").val("y");
		$("#manage_common").attr("action", "<?php print $this->webroot;?>blogManage/saveBlog").submit();
	});
	
	
</script>