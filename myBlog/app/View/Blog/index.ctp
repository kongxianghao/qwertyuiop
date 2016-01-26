			<?php // echo "<pre>";print_r($blogList) ; echo "<pre>"; ?>
			<div >
				
				<ul class="media-list">
				<?php foreach($blogList as $key=>$blog){ ?>
				
					<li class="media">
						<div class="media-left media-top hidden-xs">
							<div class="media_lable">
								<div ><?php echo date('d',strtotime($blog['blog_create_date']));?></div>
								<div ><?php echo date('Y-m',strtotime($blog['blog_create_date']));?></div>
							</div>
						</div>
						<div class="media-body media-body-other" >
							<h4 class="media-heading media-other-heading" >
								<a href="<?php print $this->webroot;?>blog/blogDetail/<?php print $blog['sid']; ?>/<?php print $blog['sid']; ?>" ><?php echo $blog['blog_title'];?> </a> <?php  if($blog['is_new']){ ?><span class="label label-warning">New</span> <?php  } ?>
							</h4>
							<div class="text-right" >
								<span  class="for_transform glyphicon glyphicon-time" aria-hidden="true"></span> <span ><?php echo $blog['blog_create_date'];?></span>&nbsp;
								<a href="<?php print $this->webroot;?>blog/blogDetail/<?php print $blog['sid']; ?>/<?php print $blog['sid']; ?>" style="color:#777;" >阅读全文>></a> 
							</div>
							<div  style="line-height:1.9;">
								<p >
								<?php echo $blog['blog_excerpt'];?>
								
							</div>
							<div class="row">
								<div class="col-xs-12 visible-xs">
									<span class="glyphicon glyphicon-user" aria-hidden="true"></span> <span>祥昊 </span> 
									<span class="glyphicon glyphicon glyphicon-tag" aria-hidden="true"></span>  <span >分类：<?php echo $blog['blog_type_name'];?>  </span>
									<span class="glyphicon glyphicon glyphicon-pushpin" aria-hidden="true"></span> <span >评论：<?php echo $blog['comment_count'];?> </span>
								</div>
							
								<div class="col-md-6 col-sm-6 hidden-xs">
									<span class="glyphicon glyphicon-user" aria-hidden="true"></span> <span>祥昊 </span>  &nbsp;
									<span class="glyphicon glyphicon glyphicon-tag" aria-hidden="true"></span>  <span >分类：<?php echo $blog['blog_type_name'];?>  </span>
								</div>
								<div class="col-md-6 col-sm-6 hidden-xs text-right">
									<span class="glyphicon glyphicon glyphicon-send" aria-hidden="true"></span> <span >浏览：<?php echo $blog['blog_views'];?></span>  &nbsp;
									<span class="glyphicon glyphicon glyphicon-pushpin" aria-hidden="true"></span> <span >评论：<?php echo $blog['comment_count'];?> </span>
								</div>
							</div>
						</div>
					</li>
					<?php }  ?>
				</ul>
			</div>
			<div>
				<nav class="text-right">
					<ul class="pagination pagination_bottom">
						<input type="hidden" id="FORWORD_PAGE" name="FORWORD_PAGE" >
						<?php if($currentPage >1 ){ ?>
							<li>
								<a href="####" data-pagination="<?php echo ($currentPage-1);?>" aria-label="Previous" class="no_top_radius no_bottom_radius ">
									<span aria-hidden="true">&laquo;</span>
								</a>
							</li>
						<?php } ?>
						<?php foreach($paginationArray as $key=>$pagination){ ?>
							
							<li <?php if($currentPage == $pagination ) echo "class='active'";?>><a data-pagination="<?php echo $pagination;?>"  href="####"  class="no_top_radius no_bottom_radius" ><?php echo $pagination;?></a></li>
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
				$(".pagination_bottom a").click(function(e){
					$("#FORWORD_PAGE").val($(this).data("pagination"));
					$("#manage_common").attr("action", "<?php print $this->webroot;?>blog/blogList").submit();
				});
			</script>
