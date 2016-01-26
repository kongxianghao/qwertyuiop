<?php
App::uses('AppController', 'Controller');

class InitSystemController extends AppController {

	public $helpers = array('Html', 'Form');
	
	public $components = array('Session','RequestHandler'); 
	
	public $autoLayout = false; 
	
	public $layout = 'blog_common'; 

	public $uses = array('DBModel');
	
	function beforeFilter(){
		if ( $this->action == 'js' || $this->action == 'css' || $this->action == 'images' ) {
			return;
		}
	}
	
	public function initDb(){
		$this->DBModel->createTable();
		$this->DBModel->initDataToTable();
		$this->render('index');
	}
	//mysqldump -uroot -pLwh3Sn3eBhAhb5Pc -h127.0.0.1 -P3306 --routines --default-character-set=utf8 --databases test_k > C:\a\myblog.sql 备份
	//mysql -uroot -pLwh3Sn3eBhAhb5Pc -h127.0.0.1 -P3306 --default-character-set=utf8  < C:\a\myblog.sql
}
