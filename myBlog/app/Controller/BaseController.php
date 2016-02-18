<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize','Utility');
class BaseController extends AppController {
	
	public function getParameterByPost($name,$defultValue = ""){	
		$parameter = $defultValue;
		if ($this->request->is('post')) {
			if(array_key_exists($name, $_POST)){
				$parameter = $this->request->data[$name];
			}
		}
		return $parameter;
	}
	
	public function getParameterByPostEscape($name,$defultValue = ""){
		$parameter = $defultValue;
		if ($this->request->is('post')) {
			if(array_key_exists($name, $_POST)){
				$parameter = $this->request->data[$name];
				$parameter = Sanitize::escape($parameter);
			}
		}
		return Sanitize::html($parameter);;
	}
	
	public function getStringByEscape($str){
		return Sanitize::escape($str === null ? "" : $str);
	}
	
	public function isGetRequest(){
		return $this->request->is('get');
	}
	
	public function getParameterByPostParanoid($name,$defultValue = "",$allow = null){
		//当从请求中取不到值
		//取到的值为  '' 
		//会得到 $defultValue 的值
		$parameter = $defultValue;
		if ($this->request->is('post')) {
			if(array_key_exists($name, $_POST)){
				$parameter = $this->request->data[$name];
				if($allow != null){
					$parameter = Sanitize::paranoid($parameter,$allow);
				}else{
					$parameter = Sanitize::paranoid($parameter);
				}
			}
		}
		return $parameter;
	}
	
	public function getParameterValuesByPost($name,$defultValueArray = array(),$allow = null){
		//当从请求中取不到值
		//取到的值为  '' 
		//会得到 $defultValueArray 的值
		$parameter = $defultValueArray;
		if ($this->request->is('post')) {
			if(array_key_exists($name, $_POST)){
				$parameter = $this->request->data[$name];
			}
		}
		return $parameter;
	}
	
	
	public function isEmpty($str_key){
		if($str_key === null || trim($str_key) === '' || $str_key === ''){
			return true;
		}
		return false;
	}
	
	public function isEmail($str_key){
		$pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
		 if (preg_match( $pattern, $str_key )){
		 	return true;
		 }
		return false;
	}
	
	public function isNumeric($str_key){
		 if (is_numeric($str_key)){
		 	return true;
		 }
		return false;
	}
	
	public function isEmptyArray($str_Array){
		if(count($str_Array) > 0){
			return false;
		}
		return true;
	}
	
	public function checkCount($val){
		if(count($val) > 0){
			return true;
		}
		return false;
	}
	
	public function toErrMessagePage($err){
		$this->autoLayout = false;
		$this->set('common_err',$err);
		$this->render('commonErr');
	}
	
}