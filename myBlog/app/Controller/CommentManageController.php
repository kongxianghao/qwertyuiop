<?php
App::uses('ManageController', 'Controller');
class CommentManageController extends ManageController {
	
	public $uses = array('CommentModel');
	
	public function beforeFilter(){
		parent::beforeFilter();
	}
	
	public function commentIndex(){
		$commentList = $this->CommentModel->getCommentAllList();
		$this->set('commentList',$commentList);
		$this->render('manageCommentIndex');
	}
	
	public function shieldCommentBySid($sid = '0'){
		$this->CommentModel->updateCommentHideBySid($sid,'y');
		$commentList = $this->CommentModel->getCommentAllList();
		$this->set('commentList',$commentList);
		$this->render('manageCommentIndex');
	}
	
	public function passCommentBySid($sid = '0'){
		$this->CommentModel->updateCommentHideBySid($sid,'n');
		$commentList = $this->CommentModel->getCommentAllList();
		$this->set('commentList',$commentList);
		$this->render('manageCommentIndex');
	}
	
	public function deleteCommentBySid($sid = '0'){
		$this->CommentModel->deleteCommentBySid($sid);
		$commentList = $this->CommentModel->getCommentAllList();
		$this->set('commentList',$commentList);
		$this->render('manageCommentIndex');
	}
	
	public function deleteCommentBySids(){
		if($this->isGetRequest()){
			$this->toErrMessagePage(MSG_0003);
		}
		$sidList = $this->getParameterValuesByPost("SIDS");
		if(count($sidList) > 0){
			$sids = implode($sidList,',');
			$this->CommentModel->deleteAllCommentBySids($sids);
		}
		
		$commentList = $this->CommentModel->getCommentAllList();
		$this->set('commentList',$commentList);
		$this->render('manageCommentIndex');
	}
}