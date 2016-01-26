<?php
App::uses('BaseController', 'Controller');

class LoginController extends BaseController {

	public $helpers = array('Html', 'Form');
	
	public $components = array('Session','RequestHandler' ); 
	
	public $autoLayout = false; 
	
	function beforeFilter(){
		if ( $this->action == 'js' || $this->action == 'css' || $this->action == 'images' ) {
			return;
		}
		$this->set('title_for_layout',  COMMON_MSG_0002);
	}

	public function index() {
		if($this->Session->check('user')){
			$this->redirect(array('controller' => 'blogManage', 'action' => 'index'));
			return;
		}
		$this->render('index');
	}
	
	public function sign(){
		$username = $this->getParameterByPost("USER_NAME");
		$password = $this->getParameterByPost("USER_PASSWORD");
		
		//xh599017330 //ju5211314
		if(md5($username) == '83f724035c5f771e9e92f84b54d00216' && md5($password) == 'f5cb9b4a7cde4c6e51b524a1e0f58bea'){
			$user = array();
			$user['username'] = $username;
			$user['password'] = $password;
			$this->Session->write('user',$user);
			$this->redirect(array('controller' => 'blogManage', 'action' => 'index'));
		}else{
			$this->render('index');
		}
	}
	
	
	public function logout(){
		$this->Session->delete('user');
		$this->redirect(array('controller' => 'login', 'action' => 'index'));
	}
	
	
}
