<div >
	<a href="####" class="btn btn-sm btn-primary no_top_radius no_bottom_radius deleteLinkAll">删除</a>
</div>
<div style="padding-top: 10px;">
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover table-condensed">
			<tr>
				<td style="width:80px; text-align:center;" >
					<a href="####" class="selectLinkAll" >全选</a> 
					<a href="####" class="clearLinkAll" style="display:none;">全不选</a>
				</td>
				<td >网站名</td>
				<td >URL</td>
				<td >描述</td>
				<td >顺序</td>
				<td >发布</td>
				<td >删除</td>
			</tr>
			<?php foreach($linkList as $key=>$link){ ?>
			<tr>
				<td style="text-align:center;"> 
					<input type="checkbox" class="selectable" name="SIDS[]" value="<?php echo $link['sid'] ; ?>"/> 
				</td>
				<td ><?php echo $link['site_name'];?></td>
				<td ><?php echo $link['site_url'];?></td>
				<td ><?php echo $link['description'];?></td>
				<td ><?php echo $link['taxis'];?></td>
				<td >
					<?php if($link['hide'] == 'n'){?>
						<a href="<?php print $this->webroot;?>linkManage/shieldLinkBySid/<?php echo $link['sid'];?>">屏蔽</a>
					<?php }else{?>
						<a href="<?php print $this->webroot;?>linkManage/passLinkBySid/<?php echo $link['sid'];?>">审核</a>
					<?php }?>
				</td>
				<td ><a href="<?php print $this->webroot;?>linkManage/deleteLinkBySid/<?php echo $link['sid'];?>">删除</a></td>
			</tr>
			<?php }?>
		</table>
	    <table class="table table-striped table-bordered table-condensed">
			<tr>
				<td >网站名</td>
				<td >	
					<input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="SITE_NAME" id="SITE_NAME"   placeholder="请输入网站名">
				</td>
			</tr>
			<tr>
				<td >URL</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="SITE_URL" id="SITE_URL"   placeholder="请输入URL"></td>
			</tr>
			<tr>
				<td >描述</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="DESCRIPTION" id="DESCRIPTION"   placeholder="请输入描述"></td>
			</tr>
			<tr>
				<td >顺序</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="TAXIS" id="TAXIS"   placeholder="请输入顺序"></td>
			</tr>
		</table>
		<button type="button" class="btn btn-sm btn-success input-sm no_top_radius no_bottom_radius save_link_button">添加链接</button>
	</div>
</div>
<script >
	$(".deleteLinkAll").click(function(e){
		$("#manage_common").attr("action", "<?php print $this->webroot;?>linkManage/deleteLinkBySids").submit();
	});


	$(".selectLinkAll").click(function(e){
		$(".selectable").each(function(){
			$(this).prop("checked", true);
		});
		$(this).hide();
		$(".clearLinkAll").show();
	});
	$(".clearLinkAll").click(function(e){
		$(".selectable").each(function(){
			$(this).prop("checked", false);
		});
		$(this).hide();
		$(".selectLinkAll").show();
	});
	$(".save_link_button").click(function(e){
		$("#manage_common").attr("action", "<?php print $this->webroot;?>linkManage/createLink").submit();
	});
</script>
			