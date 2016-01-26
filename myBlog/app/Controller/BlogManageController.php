<?php
App::uses('ManageController', 'Controller');
class BlogManageController extends ManageController {
	
	public $uses = array('CommentModel','BlogModel','BlogTypeModel');
	
	public function beforeFilter(){
		parent::beforeFilter();
	}
	
	//共通函数 待重构
	private function getBlogData($whereList,$currentPage = 1,$pageSize = 5){
		//从 DB 调出数据
		$blogList = $this->BlogModel->getBlogListForManage($whereList,$currentPage,$pageSize); 
		
		$blogTypeList = $this->BlogTypeModel->getBlogTypeList();
		
		$theTotalNumberOfPages = $this->BlogModel->getBlogTotalNumberOfPagesForManage($pageSize,$whereList);
		
		//创建分页数据
		$paginationArray = $this->Common->createPaginationArray($currentPage,$theTotalNumberOfPages);
		
		$this->set('blogTypeList',$blogTypeList);
		
		$this->set('blogList',$blogList);  
	
		$this->set('currentPage',$currentPage); // 当前查询为第几页
		
		$this->set('theTotalNumberOfPages',$theTotalNumberOfPages); // 一共有多少页
		
		$this->set('paginationArray',$paginationArray); // 回显分页导航条
		
		$this->set('whereList',$whereList); //回显关键字
	}
	
	//后台首页
	public function index() {
		$whereList = array('keywords' => '','blog_type'=>'','blog_hide' => 'n');
		$this->getBlogData($whereList);
		// 去显示页面显示
		$this->render('manageIndex');	
	}
	
	public function blogList() {
		
		//初始化需要的参数
		$whereList = array('keywords' => '','blog_type'=>'','blog_hide' => 'n');
			
		$whereList['blog_type'] = $this->getParameterByPost("BLOG_TYPE");
		
		$whereList['blog_hide'] = $this->getParameterByPost("BLOG_HIDE");
		
		$whereList['keywords'] = $this->getParameterByPost("KEYWORDS");
		
		$currentPage = $this->getParameterByPost("FORWORD_PAGE",'1');
		
		$this->getBlogData($whereList,$currentPage);
		
		// 去显示页面显示
		$this->render('manageIndex');
	}
	
	public function toSaveBlog(){
		
		$blogTypeList = $this->BlogTypeModel->getBlogTypeList();
		
		$this->set('blogTypeList',$blogTypeList);
		
		$this->render('manageBlogDetail');
	}
	
	public function toUpdateBlog($sid = '0'){
		
		$blog = $this->BlogModel->getBlogBySid($sid);
		
		if(!$this->checkCount($blog)){
			$this->toErrMessagePage(MSG_0001);
			return;
		}
		
		$blogTypeList = $this->BlogTypeModel->getBlogTypeList();
		
		$this->set('blogTypeList',$blogTypeList);
		$this->set('blog',$blog);
		$this->render('manageBlogDetail');
	}
	
	public function deleteBlogBySid($sid = '0'){
		$blog = $this->BlogModel->getBlogBySid($sid);
		
		if(!$this->checkCount($blog)){
			
			$this->toErrMessagePage(MSG_0001);
			return;
		}
		
		$this->CommentModel->deleteCommentByBlogSid($sid);
		
		$this->BlogModel->deleteBlogBySid($sid);
		//初始化需要的参数
		$whereList = array('keywords' => '','blog_type'=>'','blog_hide' => 'n');
		$this->getBlogData($whereList);
		// 去显示页面显示
		$this->render('manageIndex');	
	}
	
	public function draftBlogBySid($sid = '0'){
		$blog = $this->BlogModel->getBlogBySid($sid);
		
		if(!$this->checkCount($blog)){
			
			$this->toErrMessagePage(MSG_0001);
			return;
		}
		
		$this->BlogModel->updateBlogHideBySid($sid,'y');
		
		$whereList = array('keywords' => '','blog_type'=>'','blog_hide' => 'n');
		
		$this->getBlogData($whereList);
		// 去显示页面显示
		$this->render('manageIndex');
	}

	public function deleteBlogBySids(){
		if($this->isGetRequest()){
			$this->toErrMessagePage(MSG_0003);
			return;
		}
		$whereList = array('keywords' => '','blog_type'=>'','blog_hide' => 'n');
		
		$sidList = $this->getParameterValuesByPost("SIDS");
			
		$whereList['blog_type'] = $this->getParameterByPost("BLOG_TYPE");
		
		$whereList['blog_hide'] = $this->getParameterByPost("BLOG_HIDE");
		
		$whereList['keywords'] = $this->getParameterByPost("KEYWORDS");
		
		if($this->checkCount($sidList)){
			
			$sids = implode($sidList,',');
			
			$this->BlogModel->deleteBlogBySids($sids);
			
			$this->CommentModel->deleteCommentByBlogSidList($sids);
		}else {
			$this->toErrMessagePage(MSG_0008); //博文未选择
			return;
		}
		$this->getBlogData($whereList);
		// 去显示页面显示
		$this->render('manageIndex');	
	}
	
	public function draftBlogBySids(){
		if($this->isGetRequest()){
			$this->toErrMessagePage(MSG_0003);
			return;
		}
		$whereList = array('keywords' => '','blog_type'=>'','blog_hide' => 'n');
		
		$sidList = $this->getParameterValuesByPost("SIDS");
			
		$whereList['blog_type'] = $this->getParameterByPost("BLOG_TYPE");
		
		$whereList['blog_hide'] = $this->getParameterByPost("BLOG_HIDE");
		
		$whereList['keywords'] = $this->getParameterByPost("KEYWORDS");
		
		if($this->checkCount($sidList)){
			$sids = implode($sidList,',');
			
			$this->BlogModel->draftBlogBySids($sids);
		}else {
			$this->toErrMessagePage(MSG_0008);//博文未选择
			return;
		}
		$this->getBlogData($whereList);
		// 去显示页面显示
		$this->render('manageIndex');	
	}
	
	public function publishBlogBySids(){
		if($this->isGetRequest()){
			$this->toErrMessagePage(MSG_0003);
			return;
		}
		
		$whereList = array('keywords' => '','blog_type'=>'','blog_hide' => 'y');
		
		$sidList = $this->getParameterValuesByPost("SIDS");
		
		$whereList['blog_type'] = $this->getParameterByPost("BLOG_TYPE");
		
		$whereList['blog_hide'] = $this->getParameterByPost("BLOG_HIDE");
		
		$whereList['keywords'] = $this->getParameterByPost("KEYWORDS");
		
		if($this->checkCount($sidList)){
			
			$sids = implode($sidList,',');
			
			$this->BlogModel->publishBlogBySids($sids);
		}else {
			$this->toErrMessagePage(MSG_0008);//博文未选择
			return;
		}
		$this->getBlogData($whereList);
		// 去显示页面显示
		$this->render('manageIndex');	
	}
	
	public function publishBlogBySid($sid = '0'){
		$blog = $this->BlogModel->getBlogBySid($sid);
		
		if(!$this->checkCount($blog)){
			$this->toErrMessagePage(MSG_0001);
			return;
		}
		
		$this->BlogModel->updateBlogHideBySid($sid,'n');
		//初始化需要的参数
		$whereList = array('keywords' => '','blog_type'=>'','blog_hide' => 'y');
		$this->getBlogData($whereList);
		// 去显示页面显示
		$this->render('manageIndex');
	}
	
	private function getBlogByPost(){
		$blog = array();
		
		$blog['sid'] = $this->getParameterByPost("BLOG_SID");
		
		$blog['blog_title'] = $this->getParameterByPost("BLOG_TITLE");
		
		$blog['blog_alias'] = $this->getParameterByPost("BLOG_ALIAS");
		
		$blog['blog_type'] = $this->getParameterByPost("BLOG_TYPE");
		
		$blog['blog_excerpt'] = $this->getParameterByPost("BLOG_EXCERPT");
		
		$blog['blog_content'] = $this->getParameterByPost("BLOG_CONTENT");
		
		$blog['blog_hide'] = $this->getParameterByPost("BLOG_HIDE");
		
		return $blog;
	}
	
	public function saveBlog(){
		if($this->isGetRequest()){
			$this->toErrMessagePage(MSG_0003);
			return;
		}
		$blog = $this->getBlogByPost();
		
		$blog_err = $this->checkSaveBlog($blog);
		if(!$this->isEmpty($blog_err)){
			
			$this->toErrMessagePage($blog_err);
			
			return;
		}
		//try {
			if(!$this->isEmpty($blog['sid'])){
				$this->BlogModel->updateBlog($blog);
			}else{
				$this->BlogModel->saveBlog($blog);
			}
		//} catch (Exception $e) {
			
		//}
		$this->redirect(array('controller' => 'blogManage', 'action' => 'index'));
	}
	
	private function checkSaveBlog($blog){
		$blog_err = '';
		if ($this->request->is('get')) {
			$blog_err = $blog_err.MSG_0003;
			return $blog_err;
		}
		
		if ($this->request->is('post')) {
			
			if($this->isEmpty($blog['blog_title'])){
				
				$blog_err = $blog_err.MSG_0010;
			}
			
			if($this->isEmpty($blog['blog_alias'])){
				
				$blog_err = $blog_err.MSG_0011;
			}
			
			if($this->isEmpty($blog['blog_excerpt'])){
				
				$blog_err = $blog_err.MSG_0012;
			}
			
			if($this->isEmpty($blog['blog_content'])){
				
				$blog_err = $blog_err.MSG_0013;
			}
			
		}
		if($blog_err != ''){
			$blog_err = MSG_0014.$blog_err;
		}
		return $blog_err;
	}
}