<?php
App::uses('ManageController', 'Controller');
class LinkManageController extends ManageController {
	
	public $uses = array('LinkModel');
		
	public function beforeFilter(){
		parent::beforeFilter();
	}
	
	public function linkIndex(){
		$linkList = $this->LinkModel->getLinkList();
		$this->set('linkList',$linkList);
		$this->render('manageLinkIndex');
	}
	
	public function createLink(){
		if($this->isGetRequest()){
			$this->toErrMessagePage(MSG_0003);
			return;
		}
		
		$link = array();
		
		$link['site_name'] = $this->getParameterByPost("SITE_NAME");
		
		$link['site_url'] = $this->getParameterByPost("SITE_URL");
		
		$link['description'] = $this->getParameterByPost("DESCRIPTION");
		
		$link['taxis'] = $this->getParameterByPost("TAXIS");
		
		$this->LinkModel->saveLink($link);
		
		$linkList = $this->LinkModel->getLinkList();
		$this->set('linkList',$linkList);
		$this->render('manageLinkIndex');
	}
	
	public function deleteLinkBySid($sid = '0'){
		$this->LinkModel->deleteLinkBySid($sid);
		$linkList = $this->LinkModel->getAllLinkList();
		$this->set('linkList',$linkList);
		$this->render('manageLinkIndex');
	}
	
	public function deleteLinkBySids(){
		if($this->isGetRequest()){
			$this->toErrMessagePage(MSG_0003);
		}
		$sidList = $this->getParameterValuesByPost("SIDS");
		if(count($sidList) > 0){
			$sids = implode($sidList,',');
			$this->LinkModel->deleteLinkBySids($sids);
		}
		$linkList = $this->LinkModel->getAllLinkList();
		$this->set('linkList',$linkList);
		$this->render('manageLinkIndex');
	}
	
	public function shieldLinkBySid($sid = '0'){
		$this->LinkModel->updateLinkHideBySid($sid,'y');
		$linkList = $this->LinkModel->getAllLinkList();
		$this->set('linkList',$linkList);
		$this->render('manageLinkIndex');
	}
	
	public function passLinkBySid($sid = '0'){
		$this->LinkModel->updateLinkHideBySid($sid,'n');
		$linkList = $this->LinkModel->getAllLinkList();
		$this->set('linkList',$linkList);
		$this->render('manageLinkIndex');
	}
	
}