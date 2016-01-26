<?php
App::uses('ManageController', 'Controller');
class BlogTypeManageController extends ManageController {
	
	public $uses = array('BlogTypeModel');
		
	public function beforeFilter(){
		parent::beforeFilter();
	}
	public function blogTypeIndex(){
		$blogTypeList = $this->BlogTypeModel->getBlogTypeList();
		$this->set('blogTypeList',$blogTypeList);
		$this->render('manageBlogTypeIndex');
	}
	
	public function deleteBlogTypeBySid($sid = '0'){
		$this->BlogTypeModel->deleteBlogTypeBySid($sid);
		$blogTypeList = $this->BlogTypeModel->getBlogTypeList();
		$this->set('blogTypeList',$blogTypeList);
		$this->render('manageBlogTypeIndex');
	}
	
	public function deleteBlogTypeBySids(){
		if($this->isGetRequest()){
			$this->toErrMessagePage(MSG_0003);
		}
		$sidList = $this->getParameterValuesByPost("SIDS");
		if(count($sidList) > 0){
			$sids = implode($sidList,',');
			$this->BlogTypeModel->deleteBlogTypeBySids($sids);
		}
		$blogTypeList = $this->BlogTypeModel->getBlogTypeList();
		$this->set('blogTypeList',$blogTypeList);
		$this->render('manageBlogTypeIndex');
	}
	
	public function createBlogType(){
		if($this->isGetRequest()){
			$this->toErrMessagePage(MSG_0003);
		}
		$blogType = array();
		
		$blogType['blog_type_id'] = $this->getParameterByPost("BLOG_TYPE_ID");
		
		$blogType['blog_type_name'] = $this->getParameterByPost("BLOG_TYPE_NAME");
		
		$this->BlogTypeModel->saveBlogType($blogType);
		
		$blogTypeList = $this->BlogTypeModel->getBlogTypeList();
		$this->set('blogTypeList',$blogTypeList);
		$this->render('manageBlogTypeIndex');
	}
	
}