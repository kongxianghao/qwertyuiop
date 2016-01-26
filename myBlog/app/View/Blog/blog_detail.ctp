
	<div>
		<h4 style="color:#337AB7;text-align:center;" > 
			<?php echo $blog['blog_title'];?>
		</h4>
	</div>
	<div class="hidden-xs" style="padding-top:10px;text-align:center;">
		<span class="glyphicon glyphicon-user" aria-hidden="true"></span>                    <span>作者:祥昊</span>&nbsp;
		<span class="glyphicon glyphicon glyphicon-tag" aria-hidden="true"></span>           <span>分类:<?php echo $blog['blog_type_name'];?></span>&nbsp
		<span class="glyphicon glyphicon glyphicon-tag" aria-hidden="true"></span>           <span>浏览:<?php echo $blog['blog_views'];?></span>&nbsp
		<span class="for_transform glyphicon glyphicon-time" aria-hidden="true"></span>      <span>时间:<?php echo $blog['blog_create_date'];?></span>
		
	</div>
	<div class="visible-xs" style="padding-top:10px;">
		<span class="glyphicon glyphicon glyphicon-tag" aria-hidden="true"></span>           <span>浏览:<?php echo $blog['blog_views'];?></span>&nbsp
		<span class="for_transform glyphicon glyphicon-time" aria-hidden="true"></span>      <span>时间:<?php echo $blog['blog_create_date'];?></span>
		
	</div>
	<div class="visible-xs" style="padding-top:10px;">
		<span class="glyphicon glyphicon-user" aria-hidden="true"></span>                    <span>作者:祥昊</span>&nbsp;
		<span class="glyphicon glyphicon glyphicon-tag" aria-hidden="true"></span>           <span>分类:<?php echo $blog['blog_type_name'];?></span>&nbsp
		
	</div>
	
	<div style="padding-top:10px;border-bottom:1px dashed #e5e5e5;"></div>
	<div class="blog_common_content" >
	<?php echo $blog['blog_content'];?>
	
	</div>
	<div style="padding-top:10px;border-bottom:1px dashed #e5e5e5;"></div>
	<div style="padding-top:10px;">
		<input type="hidden" name="COMMENT_BLOG_ID" value="<?php echo $blog['sid']; ?>"  >
		<input type="hidden" name="GUID" value="<?php echo $guid; ?>"  >
		
		<div class="form-group">
			<input type="text" class="form-control" id="COMMENT_POSTER" name="COMMENT_POSTER" required="required" placeholder="留下你的昵称..." style="resize:none;border-radius:0px;">
		</div>
		<div class="form-group">
			<input type="email" class="form-control" id="COMMENT_MAIl" name="COMMENT_MAIl" required="required" placeholder="还有还有邮件..." style="resize:none;border-radius:0px;">
		</div>

		<div class="form-group">
			<textarea class="form-control" id="COMMENT_CONTENT" name="COMMENT_CONTENT" rows="3" style="resize:none;border-radius:0px;" required="required" placeholder="对他说点什么把..."></textarea>
		</div>
		<div class="form-group text-right" >
			<button class="btn btn-info saveCommentButton" type="button"  style="border-radius:0px;width:150px;">
			 留言
			</button>
		</div>
	</div>
	<div style="padding-top:10px;line-height:1.9;padding-bottom:10px;">
		<?php foreach($commentList as $key=>$comment){ ?>
		<div style="padding-top:10px;padding-left:2px;border-top:1px dashed #e5e5e5">
			<div>
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				
				<span >昵称:<?php echo $comment['comment_poster']; ?></span>&nbsp;
				
				<span class="glyphicon glyphicon-time for_transform" aria-hidden="true"></span>
				<span >时间:<?php echo $comment['comment_date']; ?><span>&nbsp
				
			</div>
			<div>
				<p >
					<?php echo $comment['comment_content']; ?>				
				</p>
			</div>
		</div>
		<?php }  ?>
	</div>
	<script >
		var isCommit = true;
		$(".saveCommentButton").click(function(e){
			if(isCommit){
				$("#manage_common").attr("action", "<?php print $this->webroot;?>blog/saveComment").submit();
				isCommit = false;
			}
		});
	</script>





