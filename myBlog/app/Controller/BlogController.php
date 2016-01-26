<?php
App::uses('BaseController', 'Controller');
//App::uses('Sanitize','Utility');
class BlogController extends BaseController {

	public $helpers = array('Html', 'Form');
	
	public $components = array('Session','RequestHandler' ,'Common'); 
	
	public $autoLayout = true; 
	
	public $layout = 'blog_common';

	public $uses = array('BlogModel','CommentModel','LinkModel','BlogTypeModel');
	
	function beforeFilter(){
		if ( $this->action == 'js' || $this->action == 'css' || $this->action == 'images' ) {
			return;
		}
		
		$newBlogList = $this->BlogModel->getNewBlogs(); //最新文章
		
		$blogTypeAndCount = $this->BlogModel->getBlogTypeAndCount();
		
		$linkList = $this->LinkModel->getLinkList();
		
		$this->set('title_for_layout',  COMMON_MSG_0001);
		
		$this->set('blogTypeAndCount',$blogTypeAndCount);
		
		$this->set('newBlogList',$newBlogList);
				
		$this->set('linkList',$linkList);
	}
	
	private function getBlogData($whereList,$currentPage = 1,$pageSize = 10){
		//从 DB 调出数据
		$blogList = $this->BlogModel->getBlogList($whereList,$currentPage,$pageSize); 
		
		$theTotalNumberOfPages = $this->BlogModel->getBlogTotalNumberOfPages($pageSize,$whereList);

		$paginationArray = $this->Common->createPaginationArray($currentPage,$theTotalNumberOfPages);
		
		$this->set('blogList',$blogList);
		
		$this->set('paginationArray',$paginationArray);
		
		$this->set('currentPage',$currentPage);
		
		$this->set('theTotalNumberOfPages',$theTotalNumberOfPages);
		
		$this->set('whereList',$whereList);
		
	}

	public function index() {
		
		$whereList = array('keywords' => '','blog_type'=>'');
		
		$this->getBlogData($whereList);
		
		$this->render('index');
	}
	
	public function blogList() {
		
		$whereList = array('keywords' => '','blog_type'=>'');
		
		$currentPage = $this->getParameterByPostParanoid('FORWORD_PAGE','1');
			
		$whereList['blog_type'] = $this->getParameterByPostParanoid('BLOG_TYPE');
		
		$whereList['keywords'] =  $this->getParameterByPostEscape('KEYWORDS','');
		
		$this->getBlogData($whereList,$currentPage);
		
		$this->render('index');
	}
	
	public function blogDetail($sid='0',$addViews = '') {
		
		if(!$this->isNumeric($sid)){
			
			$this->toErrMessagePage(MSG_0007);
			
			return;
		}
		
		$sasid = $this->getStringByEscape($sid);
		
		$blog = $this->BlogModel->getBlogBySid($sasid);
		
		if(!$this->checkCount($blog)){
			
			$this->toErrMessagePage(MSG_0001);
			
			return;
		}
		
		$commentList = $this->CommentModel->getCommentListByBlogSid($sasid);
		
		if(!$this->isEmpty($addViews)){
			
			$this->BlogModel->updateBlogView($sasid);
			
		}
		
		$this->set('blog',$blog);
		// 防止反复登录的guid
		$this->set('guid',$this->Common->guid());
		
		$this->set('commentList',$commentList);
		
		$this->set('whereList',array('blog_type'=>$blog['blog_type']));
		
		$this->render('blogDetail');
	}

	private function checkComment($comment){
		$comment_err = '';
		
		if ($this->request->is('get')) {
			
			$comment_err = $comment_err.MSG_0003;
			
			return $comment_err;
			
		}
		if ($this->request->is('post')) {
			
			if($this->isEmpty($comment['comment_poster'])){
				
				$comment_err = $comment_err.MSG_0004;
			}
			if(!$this->isEmpty($comment['comment_mail'])){
				if(!$this->isEmail($comment['comment_mail'])){
					$comment_err = $comment_err.MSG_0009;
				}
			}
			if($this->isEmpty($comment['comment_content'])){
				
				$comment_err = $comment_err.MSG_0005;
			}
			if($this->isEmpty($comment['blog_id']) || !preg_match("/^\d*$/",$comment['blog_id'])){
				
				$comment_err = $comment_err.MSG_0006;
			}else{
				
				$blog = $this->BlogModel->getBlogBySid($comment['blog_id']);
				
				if(!$this->checkCount($blog)){
					
					$comment_err = $comment_err.MSG_0006;
				}
			}
		}
		if($comment_err != ''){
			$comment_err = MSG_0002.$comment_err;
		}
		return $comment_err;
	}
	
	private function getCommentByPost(){
		$comment = array();
		
		$comment['blog_id'] = $this->getParameterByPostEscape('COMMENT_BLOG_ID');
		
		$comment['guid'] = $this->getParameterByPostEscape('GUID');
			
		$comment['comment_poster'] = $this->getParameterByPostEscape('COMMENT_POSTER');
		
		$comment['comment_content'] = $this->getParameterByPostEscape('COMMENT_CONTENT');
		
		$comment['comment_mail'] = $this->getParameterByPostEscape('COMMENT_MAIl');
		
		return $comment;
	}
	
	public function saveComment(){
		
		$comment = $this->getCommentByPost();
		
		$comment_err = $this->checkComment($comment);
		
		if(!$this->isEmpty($comment_err)){
			
			$this->toErrMessagePage($comment_err);
			
			return;
		}
		try {
			$this->CommentModel->saveComment($comment);
		} catch (Exception $e) {
			
		}
		$this->redirect(array('controller' => 'blog', 'action' => 'blogDetail',$comment['blog_id']));
	}
	
}
