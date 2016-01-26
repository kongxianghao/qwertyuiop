<div >
	<a href="####" class="btn btn-sm btn-primary no_top_radius no_bottom_radius deleteBlogTypeAll">删除</a>
</div>
<div style="padding-top: 10px;">
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover table-condensed">
			<tr>
				<td style="width:80px; text-align:center;" >
					<a href="####" class="selectBlogTypeAll" >全选</a> 
					<a href="####" class="clearBlogTypeAll" style="display:none;">全不选</a>
					
				</td>
				<td >分类id</td>
				<td >分类名</td>
				
				<td >删除</td>
			</tr>
			<?php foreach($blogTypeList as $key=>$blogType){ ?>
			<tr>
				<td style="text-align:center;"> 
					<input type="checkbox" class="selectable" name="SIDS[]" value="<?php echo $blogType['sid'] ; ?>"/> 
				</td>
				<td ><?php echo $blogType['blog_type_id'];?></td>
				<td ><?php echo $blogType['blog_type_name'];?></td>
				<td ><a href="<?php print $this->webroot;?>blogTypeManage/deleteBlogTypeBySid/<?php echo $blogType['sid'];?>">删除</a></td>
			</tr>
			<?php }?>
		</table>
	    <table class="table table-striped table-bordered table-condensed">
			<tr>
				<td >分类名</td>
				<td >	
					<input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="BLOG_TYPE_ID" id="BLOG_TYPE_ID"   placeholder="请输入分类ID">
				</td>
				<td >	
					<input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="BLOG_TYPE_NAME" id="BLOG_TYPE_NAME"   placeholder="请输入分类名">
				</td>
			</tr>
		</table>
		<button type="button" class="btn btn-sm btn-success input-sm no_top_radius no_bottom_radius create_blog_type_button">添加分类</button>
	</div>
</div>
<script >
	$(".deleteBlogTypeAll").click(function(e){
		$("#manage_common").attr("action", "<?php print $this->webroot;?>blogTypeManage/deleteBlogTypeBySids").submit();
	});


	$(".selectBlogTypeAll").click(function(e){
		$(".selectable").each(function(){
			$(this).prop("checked", true);
		});
		$(this).hide();
		$(".clearBlogTypeAll").show();
	});
	$(".clearBlogTypeAll").click(function(e){
		$(".selectable").each(function(){
			$(this).prop("checked", false);
		});
		$(this).hide();
		$(".selectBlogTypeAll").show();
	});
	$(".create_blog_type_button").click(function(e){
		$("#manage_common").attr("action", "<?php print $this->webroot;?>blogTypeManage/createBlogType").submit();
	});
</script>
			