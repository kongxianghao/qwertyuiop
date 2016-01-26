<div  >
	<h4 style="margin-top: 0px;">详细参数</h4>
	<div class="table-responsive">
	  <table class="table table-striped table-bordered table-hover table-condensed">
		<tr>
			<!--<td style="width:80px; text-align:center;" >
				<a href="####"  >全选</a> 
				<a href="####" style="display:none;">全不选</a>
				<a href="####" >删除</a>
			</td>-->
			<td >versatile_cd</td>
			<td >versatile_kbn</td>
			<td >remarks</td>
			<td >编辑</td>
		</tr>
		<input type="hidden" id="for_update_versatile_cd" name="for_update_versatile_cd" />
		<input type="hidden" id="for_update_versatile_sid" name="for_update_versatile_sid" />
		<?php foreach($versatileDetailList as $key=>$versatile_detail_for_list){ ?>
		<tr><!--
			<td style="text-align:center;"> 
				 <input type="checkbox" class="selectable" name="SIDS[]" value=""/> 
			</td>-->
			<td ><?php echo $versatile_detail_for_list['versatile_cd'];?></td>
			<td ><?php echo $versatile_detail_for_list['versatile_kbn'];?></td>
			
			
			
			<td ><?php echo $versatile_detail_for_list['remarks'];?></td>
			
			<td >
				<a class="versatile_detail_edit" data-vcd="<?php echo $versatile_detail_for_list['versatile_cd'] ; ?>" data-vsid="<?php echo $versatile_detail_for_list['sid'] ; ?>" href="####">编辑</a>
			</td>
			
		</tr>
		<?php }?>
	  </table>
	</div>

	
	<?php if(isset($versatileDetail)){ ?>
	<h4>系统参数子配置</h4>
	<div class="table-responsive">
		<input type="hidden"  name="sid" value="<?php echo $versatileDetail['sid']?>" />
		<table class="table table-striped table-bordered table-condensed">
			<tr>
				<td style="width:300px">
					关键字
				</td>
				<td >值</td>
			</tr>
			<tr>
				<td >
					versatile_cd
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="versatile_cd" readonly="true" value="<?php echo $versatileDetail['versatile_cd']?>" ></td>
			</tr>
			<tr>
				<td >
					versatile_kbn
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="versatile_kbn" readonly="true" value="<?php echo $versatileDetail['versatile_kbn']?>"></td>
			</tr>
			<tr>
				<td >
					remarks
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="remarks" value="<?php echo $versatileDetail['remarks']?>" ></td>
			</tr>
			<tr>
				<td >
					master_start_date
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="master_start_date" value="<?php echo $versatileDetail['master_start_date']?>" ></td>
			</tr>
			<tr>
				<td >
					master_end_date
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="master_end_date"  value="<?php echo $versatileDetail['master_end_date']?>" ></td>
			</tr>
			<tr>
				<td >
					text_value_1
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="text_value_1" value="<?php echo $versatileDetail['text_value_1']?>" ></td>
			</tr>
			<tr>
				<td >
					text_value_2
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="text_value_2" value="<?php echo $versatileDetail['text_value_2']?>" ></td>
			</tr>
			<tr>
				<td >
					text_value_3
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="text_value_3" value="<?php echo $versatileDetail['text_value_3']?>" ></td>
			</tr>
			<tr>
				<td >
					text_value_4
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="text_value_4" value="<?php echo $versatileDetail['text_value_4']?>" ></td>
			</tr>
			<tr>
				<td >
					text_value_5
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="text_value_5" value="<?php echo $versatileDetail['text_value_5']?>" ></td>
			</tr>
			<tr>
				<td >
					decimal_value_1
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="decimal_value_1" value="<?php echo $versatileDetail['decimal_value_1']?>" ></td>
			</tr>
			<tr>
				<td >
					decimal_value_2
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="decimal_value_2" value="<?php echo $versatileDetail['decimal_value_2']?>" ></td>
			</tr>
			<tr>
				<td >
					decimal_value_3
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="decimal_value_3" value="<?php echo $versatileDetail['decimal_value_3']?>" ></td>
			</tr>
			<tr>
				<td >
					decimal_value_4
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="decimal_value_4" value="<?php echo $versatileDetail['decimal_value_4']?>" ></td>
			</tr>
			<tr>
				<td >
					decimal_value_5
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="decimal_value_5" value="<?php echo $versatileDetail['decimal_value_5']?>" ></td>
			</tr>
			<tr>
				<td >
					bool_value_1
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="bool_value_1" value="<?php echo $versatileDetail['bool_value_1']?>" ></td>
			</tr>
			<tr>
				<td >
					bool_value_2
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="bool_value_2" value="<?php echo $versatileDetail['bool_value_2']?>" ></td>
			</tr>
			<tr>
				<td >
					bool_value_3
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="bool_value_3" value="<?php echo $versatileDetail['bool_value_3']?>" ></td>
			</tr>
			<tr>
				<td >
					bool_value_4
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="bool_value_4" value="<?php echo $versatileDetail['bool_value_4']?>" ></td>
			</tr>
			<tr>
				<td >
					bool_value_5
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="bool_value_5" value="<?php echo $versatileDetail['bool_value_5']?>" ></td>
			</tr>
			
			<tr>
				<td >
					date_value_1
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="date_value_1" value="<?php echo $versatileDetail['date_value_1']?>" ></td>
			</tr>
			<tr>
				<td >
					date_value_2
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="date_value_2" value="<?php echo $versatileDetail['date_value_2']?>" ></td>
			</tr>
			<tr>
				<td >
					date_value_3
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="date_value_3"  value="<?php echo $versatileDetail['date_value_3']?>" ></td>
			</tr>
			<tr>
				<td >
					date_value_4
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="date_value_4" value="<?php echo $versatileDetail['date_value_4']?>" ></td>
			</tr>
			<tr>
				<td >
					date_value_5
				</td>
				<td ><input type="text" class="form-control input-sm no_top_radius no_bottom_radius" name="date_value_5" value="<?php echo $versatileDetail['date_value_5']?>" ></td>
			</tr>
		</table>
	</div>
	<button type="button" class="btn btn-sm btn-success input-sm no_top_radius no_bottom_radius save_versatile_detail_button">更新</button>
	<?php }?>
</div>
<script>
	
	$(".save_versatile_detail_button").click(function(e){
	
		$("#manage_common").attr("action", "<?php print $this->webroot;?>versatileManage/versatileDetailSave").submit();
	});
	
	$(".versatile_detail_edit").click(function(e){
		var vcd = $(this).data("vcd");
		var vsid = $(this).data("vsid");
		
		$("#for_update_versatile_cd").val(vcd);
		$("#for_update_versatile_sid").val(vsid);
	
		$("#manage_common").attr("action", "<?php print $this->webroot;?>versatileManage/toVersatileDetailEdit").submit();
	});
</script>