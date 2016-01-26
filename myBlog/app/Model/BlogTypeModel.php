<?php
App::uses('Model', 'Model');
class BlogTypeModel extends Model {
	var $useTable = false;
	
	public function getBlogTypeList(){
		$sql = " select ";
		$sql = $sql." sid, blog_type_name,blog_type_id from kongxh_blog_type order by sid";
		$data = $this->query($sql);
		$blogTypeList = array();
		if(count($data) > 0){
			foreach($data as $key=>$val){
				$blogTypeList[$key]= $val['kongxh_blog_type'];
			}
		}
		return $blogTypeList;
	}
	
	public function saveBlogType($blogType){
		$blog_type_name = $blogType['blog_type_name'];
		$blog_type_id = $blogType['blog_type_id'];
		$sql = " insert kongxh_blog_type (blog_type_id,blog_type_name) value";
		$sql = $sql."('$blog_type_id','$blog_type_name')";
		
		$data = $this->query($sql);
	}
	
	public function deleteBlogTypeBySid($sid){
		$sql = " delete ";
		$sql = $sql." from kongxh_blog_type where sid = $sid ";
		$data = $this->query($sql);
	}
	
	public function deleteBlogTypeBySids($sids){
		$sql = " delete ";
		$sql = $sql." from kongxh_blog_type where sid in ($sids) ";
		$data = $this->query($sql);
	}
}
