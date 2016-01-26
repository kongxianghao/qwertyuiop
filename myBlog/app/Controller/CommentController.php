<?php
App::uses('AppController', 'Controller');

class CommentController extends AppController {

	public $helpers = array('Html', 'Form');
	
	public $components = array('Session','RequestHandler' ); 
	
	var $autoLayout = false; 

	public $uses = array('CommentModel');

	public function index() {
		
	}
}
