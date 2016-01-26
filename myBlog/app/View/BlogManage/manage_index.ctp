<div class="row" >
	<div class="col-md-6">
		<div class="btn-group" role="group" aria-label="...">
			<button type="button" class="btn btn-sm btn-success no_top_radius no_bottom_radius save_blog_button">写日志</button>
			<button type="button" class="btn btn-sm btn-primary no_top_radius no_bottom_radius deleteBlogAll">删除选中</button>
			<?php if(isset($whereList) && isset($whereList['blog_hide'])){ ?>
				<?php if($whereList['blog_hide'] == 'n'){ ?>
					<button type="button" class="btn btn-sm btn-info no_top_radius no_bottom_radius draftBlogAll">转到草稿</button>
				<?php }else{ ?>
					<button type="button" class="btn btn-sm btn-info no_top_radius no_bottom_radius publishBlogAll">选中发布</button>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
	<div class="col-md-6">
		<div class="input-group input-group-sm">
			<input type="text" name="TEMP_KEYWORDS" id="TEMP_KEYWORDS" class="form-control no_top_radius no_bottom_radius" value="<?php if(isset($whereList['keywords'])){echo $whereList['keywords'];} ?>"  placeholder="请输入关键字" >
			<div class="input-group-btn" style="min-width:80px;width:100px;">
				<button type="button" data-type="<?php if(isset($whereList['blog_type'])){echo $whereList['blog_type'];} ?>" style="width:100%;text-align:right;" class="for_blog_type_button btn btn-sm btn-primary dropdown-toggle no_top_radius no_bottom_radius" data-toggle="dropdown" aria-expanded="false">
					<span class="blogTypeHtmlText" >
						<?php 
							$text = "全检索";
							foreach($blogTypeList as $key=>$blogType){ 
								if($blogType['blog_type_id'] == $whereList['blog_type']){
									$text = $blogType['blog_type_name'];
									break;
								}
							}
							echo $text ;
						?>
					</span>
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu pull-right no_top_radius no_bottom_radius" role="menu" style="min-width:inherit;width:inherit;">
					<li style="text-align:right;"><a href="#" data-type="" class="get_blog_by_type_button" ><?php echo "全检索";?></a></li>
					<?php foreach($blogTypeList as $key=>$blogType){ ?>
						<li style="text-align:right;"><a href="#" data-type="<?php echo $blogType['blog_type_id'];?>" class="get_blog_by_type_button" ><?php echo $blogType['blog_type_name'];?></a></li>
					<?php }?>
				</ul>
			</div>
			
			<div class="input-group-btn" style="min-width:70px;width:70px;">
				<button type="button" data-hide="<?php if(isset($whereList['blog_hide'])){echo $whereList['blog_hide'];} ?>" style="width:100%;text-align:right;" class="for_blog_hide_button btn btn-sm btn-info dropdown-toggle no_top_radius no_bottom_radius" data-toggle="dropdown" aria-expanded="false">
					<span class="blogHideHtmlText" >
					<?php 
							$blog_hide_text = "已发布";
							if (isset($whereList['blog_hide'])) {
								if ($whereList['blog_hide'] == 'n') {
									$blog_hide_text = "已发布";
								}else{
									$blog_hide_text = "草稿箱";
								}
							}
							echo $blog_hide_text ;
						?>
					</span>
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu pull-right no_top_radius no_bottom_radius" role="menu" style="min-width:inherit;width:inherit;">
					<li style="text-align:right;"><a href="#" data-hide="n" class="get_blog_by_hide_button" >已发布</a></li>
					<li style="text-align:right;"><a href="#" data-hide="y" class="get_blog_by_hide_button" >草稿箱</a></li>
				</ul>
			</div>
			
			<span class="input-group-btn">
				<button class="btn btn-success no_top_radius no_bottom_radius get_blog_by_query_button" type="button" >检索</button>
			</span>
		</div>
	</div>
</div>
<div style="padding-top:10px;" >
	<div class="table-responsive">
	  <table class="table table-striped table-bordered table-hover table-condensed">
		<tr>
			<td style="width:80px; text-align:center;" >
				<a href="####" class="selectAll" >全选</a> 
				<a href="####" class="clearAll" style="display:none;">全不选</a>
			</td>
			<td >标题</td>
			<td >分类</td>
			<td >浏览</td>
			<td >创建时间</td>
			<td >作者</td>
			<td >发布</td>
			<td >修改</td>
			<td >删除</td>
		</tr>
		<?php foreach($blogList as $key=>$blog){ ?>
		<tr>
			<td style="text-align:center;"> 
				 <input type="checkbox" class="selectable" name="SIDS[]" value="<?php echo $blog['sid'] ; ?>"/> 
			</td>
			<td ><?php echo $blog['blog_title'];?></td>
			<td ><?php echo $blog['blog_type_name'];?></td>
			<td ><?php echo $blog['blog_views'];?>次</td>
			<td ><?php echo $blog['blog_create_date'];?></td>
			<td >孔祥昊</td>
			<td >
				<?php if($blog['blog_hide'] == 'n'){?>
					<a href="<?php print $this->webroot;?>blogManage/draftBlogBySid/<?php echo $blog['sid'];?>">转入草稿箱</a>
				<?php }else{?>
					<a href="<?php print $this->webroot;?>blogManage/publishBlogBySid/<?php echo $blog['sid'];?>">发布</a>
				<?php }?>
			</td>
			<td ><a href="<?php print $this->webroot;?>blogManage/toUpdateBlog/<?php echo $blog['sid'];?>">修改</a></td>
			<td ><a href="<?php print $this->webroot;?>blogManage/deleteBlogBySid/<?php echo $blog['sid'];?>">删除</a></td>
		</tr>
		<?php }?>
	  </table>
	</div>
</div>
<div>
	<nav class="text-right">
		<ul class="pagination pagination_bottom">
			<input type="hidden" id="BLOG_HIDE" name="BLOG_HIDE" value="<?php if(isset($whereList['blog_hide'])){echo $whereList['blog_hide'];} ?>"/>
			<input type="hidden" id="BLOG_TYPE" name="BLOG_TYPE" value="<?php if(isset($whereList['blog_type'])){echo $whereList['blog_type'];} ?>"/>
			<input type="hidden" id="KEYWORDS" name="KEYWORDS" value="<?php if(isset($whereList['keywords'])){echo $whereList['keywords'];} ?>"/>
			<input type="hidden" id="FORWORD_PAGE_BOTTOM" name="FORWORD_PAGE" />
			<?php if($currentPage >1 ){ ?>
				<li>
					<a href="####" data-pagination="<?php echo ($currentPage-1);?>" aria-label="Previous" class="no_top_radius no_bottom_radius">
						<span aria-hidden="true">&laquo;</span>
					</a>
				</li>
			<?php } ?>
			<?php foreach($paginationArray as $key=>$pagination){ ?>
				<li <?php if($currentPage == $pagination ) echo "class='active'";?>><a data-pagination="<?php echo $pagination;?>"  href="####" style="color:##;" class="no_top_radius no_bottom_radius" ><?php echo $pagination;?></a></li>
			<?php } ?>
			<?php if($theTotalNumberOfPages > $currentPage ){ ?>
			<li>
				<a href="####"  data-pagination="<?php echo ($currentPage+1);?>" aria-label="Next" class="no_top_radius no_bottom_radius" >
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>
			<?php } ?>
		</ul>
	</nav>
</div>
<script >

	$(".deleteBlogAll").click(function(e){
		var selectCount = $("input:checkbox:checked").length;
		if(selectCount > 0){
			$("#manage_common").attr("action", "<?php print $this->webroot;?>blogManage/deleteBlogBySids").submit();
		}else{
			alert("博文未选中");
		}
	});

	$(".draftBlogAll").click(function(e){
		var selectCount = $("input:checkbox:checked").length;
		
		if(selectCount > 0){
			$("#manage_common").attr("action", "<?php print $this->webroot;?>blogManage/draftBlogBySids").submit();
		}else{
			alert("博文未选中");
		}
	});

	$(".publishBlogAll").click(function(e){
		var selectCount = $("input:checkbox:checked").length;
		if(selectCount > 0){
			$("#manage_common").attr("action", "<?php print $this->webroot;?>blogManage/publishBlogBySids").submit();
		}else{
			alert("博文未选中");
		}
	});
	
	$(".selectAll").click(function(e){
		$(".selectable").each(function(){
			$(this).prop("checked", true);
		});
		$(this).hide();
		$(".clearAll").show();
	});
	$(".clearAll").click(function(e){
		$(".selectable").each(function(){
			$(this).prop("checked", false);
		});
		$(this).hide();
		$(".selectAll").show();
	});

	$(".save_blog_button").click(function(e){
		$("#manage_common").attr("action", "<?php print $this->webroot;?>blogManage/toSaveBlog").submit();
	});
	
	$(".get_blog_by_type_button").click(function(e){
		var blog_type = $(this).data("type");
		$(".blogTypeHtmlText").text($(this).text());
		$(".for_blog_type_button").data("type",blog_type);
	});

	$(".get_blog_by_hide_button").click(function(e){
		var blog_hide = $(this).data("hide");
		$(".blogHideHtmlText").text($(this).text());
		$(".for_blog_hide_button").data("hide",blog_hide);
	});
	
	$(".get_blog_by_query_button").click(function(e){
		//页数 第一页
		$("#FORWORD_PAGE_BOTTOM").val("1");
		//分类
		var blog_type = $(".for_blog_type_button").data("type");
		$("#BLOG_TYPE").val(blog_type);
		//发布 和 草稿箱
		var blog_hide = $(".for_blog_hide_button").data("hide");
		$("#BLOG_HIDE").val(blog_hide);
		//关键字
		var keywords = $("#TEMP_KEYWORDS").val();
		$("#KEYWORDS").val(keywords);
		
		$("#manage_common").attr("action", "<?php print $this->webroot;?>blogManage/blogList").submit();
	})
	
	$(".pagination_bottom a").click(function(e){
		var pagination = $(this).data("pagination");
		$("#FORWORD_PAGE_BOTTOM").val(pagination);
		$("#manage_common").attr("action", "<?php print $this->webroot;?>blogManage/blogList").submit();
	});
	
	
</script>
			