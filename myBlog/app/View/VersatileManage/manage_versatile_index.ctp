<div> 
	<h4 style="margin-top: 0px;">系统相关参数</h4>
	<div class="table-responsive">
	  <table class="table table-striped table-bordered table-hover table-condensed">
		<tr>
			
			<td >versatile_cd</td>
			<td >versatile_nm</td>
			<td >remarks</td>
			<td >编辑</td>
			<td >详细</td>
		</tr>
		<?php foreach($versatileList as $key=>$versatile_for_list){ ?>
		<tr>
			<td ><?php echo $versatile_for_list['versatile_cd'];?></td>
			<td ><?php echo $versatile_for_list['versatile_nm'];?></td>
			<td ><?php echo $versatile_for_list['remarks'];?></td>
			<td >
				<a href="<?php print $this->webroot;?>versatileManage/toVersatileUpdate/<?php echo $versatile_for_list['versatile_cd'] ; ?>">编辑</a>
			</td>
			<td >
				<a href="<?php print $this->webroot;?>versatileManage/toVersatileDetailUpdate/<?php echo $versatile_for_list['versatile_cd'] ; ?>">详细</a>
			</td>
		</tr>
		<?php }?>
	  </table>
	</div>
	<?php if(isset($versatile)){ ?>
	<h4 style="margin-top: 0px;">系统参数配置</h4>
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-condensed">
			<tr>
				<td style="width:300px">
					关键字
				</td>
				<td >值</td>
			</tr>
			<tr>
				<td >
					参数cd
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="versatile_cd" readonly="readonly"  value="<?php echo $versatile['versatile_cd']?>"/></td>
			</tr>
			<tr>
				<td >
					versatile_nm
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="versatile_nm" value="<?php echo $versatile['versatile_nm']?>"/></td>
			</tr>
			<tr>
				<td >
					remarks
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="remarks" value="<?php echo $versatile['remarks']?>"/></td>
			</tr>
			<tr>
				<td >
					text_1_title
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="text_1_title" value="<?php echo $versatile['text_1_title']?>" /></td>
			</tr>
			<tr>
				<td >
					text_2_title
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="text_2_title" value="<?php echo $versatile['text_2_title']?>" /></td>
			</tr>
			<tr>
				<td >
					text_3_title
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="text_3_title" value="<?php echo $versatile['text_3_title']?>" /></td>
			</tr>
			<tr>
				<td >
					text_4_title
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="text_4_title" value="<?php echo $versatile['text_4_title']?>" /></td>
			</tr>
			<tr>
				<td >
					text_5_title
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="text_5_title" value="<?php echo $versatile['text_5_title']?>" /></td>
			</tr>
			<tr>
				<td >
					decimal_1_title
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="decimal_1_title"  value="<?php echo $versatile['decimal_1_title']?>" /></td>
			</tr>
			<tr>
				<td >
					decimal_2_title
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="decimal_2_title" value="<?php echo $versatile['decimal_2_title']?>" /></td>
			</tr>
			<tr>
				<td >
					decimal_3_title
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="decimal_3_title" value="<?php echo $versatile['decimal_3_title']?>" /></td>
			</tr>
			<tr>
				<td >
					decimal_4_title
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="decimal_4_title" value="<?php echo $versatile['decimal_4_title']?>" /></td>
			</tr>
			<tr>
				<td >
					decimal_5_title
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="decimal_5_title" value="<?php echo $versatile['decimal_5_title']?>" /></td>
			</tr>
			<tr>
				<td >
					bool_1_title
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="bool_1_title" value="<?php echo $versatile['bool_1_title']?>" /></td>
			</tr>
			<tr>
				<td >
					bool_2_title
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="bool_2_title" value="<?php echo $versatile['bool_2_title']?>" /></td>
			</tr>
			<tr>
				<td >
					bool_3_title
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="bool_3_title" value="<?php echo $versatile['bool_3_title']?>" /></td>
			</tr>
			<tr>
				<td >
					bool_4_title
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="bool_4_title" value="<?php echo $versatile['bool_4_title']?>" /></td>
			</tr>
			<tr>
				<td >
					bool_5_title
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="bool_5_title" value="<?php echo $versatile['bool_5_title']?>" /></td>
			</tr>
			
			<tr>
				<td >
					date_1_title
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="date_1_title" value="<?php echo $versatile['date_1_title']?>" /></td>
			</tr>
			<tr>
				<td >
					date_2_title
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="date_2_title" value="<?php echo $versatile['date_2_title']?>"  /></td>
			</tr>
			<tr>
				<td >
					date_3_title
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="date_3_title" value="<?php echo $versatile['date_3_title']?>" /></td>
			</tr>
			<tr>
				<td >
					date_4_title
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="date_4_title" value="<?php echo $versatile['date_4_title']?>" /></td>
			</tr>
			<tr>
				<td >
					date_5_title
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="date_5_title" value="<?php echo $versatile['date_5_title']?>"/></td>
			</tr>
		</table>
	</div>
	
	<button type="button" class="btn btn-sm btn-success input-sm no_top_radius no_bottom_radius save_versatile_button">更新</button>
	<?php } ?>
</div>
<script >
	$(".save_versatile_button").click(function(e){
		$("#manage_common").attr("action", "<?php print $this->webroot;?>versatileManage/saveVersatile").submit();
	});
	
</script>
			