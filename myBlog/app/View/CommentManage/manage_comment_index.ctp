<div >
	<a href="####" class="btn btn-sm btn-primary no_top_radius no_bottom_radius deleteCommentAll">删除</a>
</div>
<div style="padding-top: 10px;">
	<div class="table-responsive">
	  <table class="table table-striped table-bordered table-hover table-condensed">
		<tr>
			<td style="width:80px; text-align:center;" >
				<a href="####" class="selectAll" >全选</a> 
				<a href="####" class="clearAll" style="display:none;">全不选</a>
			</td>
			<td >标题</td>
			<td >内容</td>
			<td >创建时间</td>
			<td >作者</td>
			<td >发布</td>
			<td >删除</td>
		</tr>
		<?php foreach($commentList as $key=>$comment){ ?>
		<tr>
			<td style="text-align:center;"> 
				 <input type="checkbox" class="selectable" name="SIDS[]" value="<?php echo $comment['sid'] ; ?>"/> 
			</td>
			<td ><?php echo $comment['blog_title'];?></td>
			<td ><?php echo $comment['comment_content'];?></td>
			<td ><?php echo $comment['comment_date'];?></td>
			<td ><?php echo $comment['comment_poster'];?></td>
			<td >
				<?php if($comment['comment_hide'] == 'n'){?>
					<a href="<?php print $this->webroot;?>commentManage/shieldCommentBySid/<?php echo $comment['sid'];?>">屏蔽</a>
				<?php }else{?>
					<a href="<?php print $this->webroot;?>commentManage/passCommentBySid/<?php echo $comment['sid'];?>">审核</a>
				<?php }?>
			</td>
			<td ><a href="<?php print $this->webroot;?>commentManage/deleteCommentBySid/<?php echo $comment['sid'];?>">删除</a></td>
		</tr>
		<?php }?>
	  </table>
	</div>
</div>
<script >
	$(".deleteCommentAll").click(function(e){
		$("#manage_common").attr("action", "<?php print $this->webroot;?>commentManage/deleteCommentBySids").submit();
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
</script>
			