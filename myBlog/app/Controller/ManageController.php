<?php
App::uses('BaseController', 'Controller');

class ManageController extends BaseController {

	public $helpers = array('Html', 'Form');
	
	public $components = array('Session','RequestHandler','Common'); 
	
	public $autoLayout = true; 
	
	public $layout = 'manage_common'; 
	
	//过滤所有请求
	public function beforeFilter(){
		if ( $this->action == 'js' || $this->action == 'css' || $this->action == 'images' ) {
			return;
		}
		if(!$this->Session->check('user')){
			$this->autoLayout = false;
			$this->redirect(array('controller' => 'login', 'action' => 'index'));
			return ;
		}
		$this->set('title_for_layout',  COMMON_MSG_0003);
	}
	

}
