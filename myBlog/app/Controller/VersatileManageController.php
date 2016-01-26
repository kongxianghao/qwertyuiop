<?php
App::uses('ManageController', 'Controller');
class VersatileManageController extends ManageController {
	
	public $uses = array('VersatileModel');
	
	public function beforeFilter(){
		parent::beforeFilter();
	}
	
	public function toVersatileUpdate($versatile_cd = '0'){
	
		$versatile = $this->VersatileModel->getVersatileByVersatileCd($versatile_cd);
		if(!$this->checkCount($versatile)){
			
			$this->toErrMessagePage(MSG_0001);
			
			return;
		}
		
		$versatileList = $this->VersatileModel->getVersatileList();
		
		$this->set('versatile',$versatile);
		$this->set('versatileList',$versatileList);
		$this->render('manageVersatileIndex');
	}
	
	public function toVersatileDetailUpdate($versatile_cd){
	
		$versatileDetailList = $this->VersatileModel->getVersatileDetailListByVersatileCd($versatile_cd);
		if(!$this->checkCount($versatileDetailList)){
			
			$this->toErrMessagePage(MSG_0001);
			
			return;
		}
		$this->set('versatileDetailList',$versatileDetailList);
		
		$this->render('manageVersatileDetail');
	}
	
	public function toVersatileDetailEdit(){
		if($this->isGetRequest()){
			$this->toErrMessagePage(MSG_0003);
			return;
		}
		
		$for_update_versatile_cd = $this->getParameterByPost("for_update_versatile_cd");
		
		$for_update_versatile_sid = $this->getParameterByPost("for_update_versatile_sid");
		
		$versatileDetailList = $this->VersatileModel->getVersatileDetailListByVersatileCd($for_update_versatile_cd);
	
		$versatileDetail = $this->VersatileModel->getVersatileDetailBySid($for_update_versatile_sid);
		
		$this->set('versatileDetail',$versatileDetail);
		
		$this->set('versatileDetailList',$versatileDetailList);
		
		$this->render('manageVersatileDetail');
	}
	
	public function versatileDetailSave(){
		if($this->isGetRequest()){
			$this->toErrMessagePage(MSG_0003);
			return;
		}
		$versatileDetail = array();
		
		$versatileDetail['sid'] = $this->getParameterByPost("sid");
		
		$versatileDetail['versatile_cd'] =  $this->getParameterByPost("versatile_cd"); 
		
		$versatileDetail['versatile_kbn'] = $this->getParameterByPost("versatile_kbn"); 
		
		$versatileDetail['remarks'] =  $this->getParameterByPost("remarks"); 
		
		$versatileDetail['master_start_date'] = $this->getParameterByPost("master_start_date");
		
		$versatileDetail['master_end_date'] = $this->getParameterByPost("master_end_date");
		
		$versatileDetail['text_value_1'] =  $this->getParameterByPost("text_value_1");
		
		$versatileDetail['text_value_2'] = $this->getParameterByPost("text_value_2");
		
		$versatileDetail['text_value_3'] = $this->getParameterByPost("text_value_3");
		
		$versatileDetail['text_value_4'] = $this->getParameterByPost("text_value_4");
		
		$versatileDetail['text_value_5'] = $this->getParameterByPost("text_value_5");
		
		$versatileDetail['decimal_value_1'] = $this->getParameterByPost("decimal_value_1");
		
		$versatileDetail['decimal_value_2'] = $this->getParameterByPost("decimal_value_2");
		
		$versatileDetail['decimal_value_3'] = $this->getParameterByPost("decimal_value_3");
		
		$versatileDetail['decimal_value_4'] = $this->getParameterByPost("decimal_value_4");
		
		$versatileDetail['decimal_value_5'] = $this->getParameterByPost("decimal_value_5");
		
		$versatileDetail['bool_value_1'] = $this->getParameterByPost("bool_value_1");
		
		$versatileDetail['bool_value_2'] = $this->getParameterByPost("bool_value_2");
		
		$versatileDetail['bool_value_3'] = $this->getParameterByPost("bool_value_3");
		
		$versatileDetail['bool_value_4'] = $this->getParameterByPost("bool_value_4");
		
		$versatileDetail['bool_value_5'] = $this->getParameterByPost("bool_value_5");
		
		$versatileDetail['date_value_1'] =  $this->getParameterByPost("date_value_1");
		
		$versatileDetail['date_value_2'] = $this->getParameterByPost("date_value_2");
		
		$versatileDetail['date_value_3'] =  $this->getParameterByPost("date_value_3");
		
		$versatileDetail['date_value_4'] = $this->getParameterByPost("date_value_4");
		
		$versatileDetail['date_value_5'] = $this->getParameterByPost("date_value_5");
		
		$this->VersatileModel->updateVersatileDetail($versatileDetail);
		
		$versatileDetailList = $this->VersatileModel->getVersatileDetailListByVersatileCd($versatileDetail['versatile_cd']);
	
		$vd = $this->VersatileModel->getVersatileDetailBySid($versatileDetail['sid']);
		$this->set('versatileDetail',$vd);
		$this->set('versatileDetailList',$versatileDetailList);
		$this->render('manageVersatileDetail');
	}
	
	public function saveVersatile(){
		if($this->isGetRequest()){
			$this->toErrMessagePage(MSG_0003);
			return;
		}
		$versatile = array();
		
		$versatile['versatile_cd'] = $this->getParameterByPost("versatile_cd");
		
		$versatile['versatile_nm'] = $this->getParameterByPost("versatile_nm");
		
		$versatile['remarks'] = $this->getParameterByPost("remarks"); 
		
		$versatile['text_1_title'] = $this->getParameterByPost("text_1_title");
		
		$versatile['text_2_title'] =  $this->getParameterByPost("text_2_title");
		
		$versatile['text_3_title'] =  $this->getParameterByPost("text_3_title");
		
		$versatile['text_4_title'] =  $this->getParameterByPost("text_4_title");
		
		$versatile['text_5_title'] =  $this->getParameterByPost("text_5_title");
		
		$versatile['decimal_1_title'] = $this->getParameterByPost("decimal_1_title");
		
		$versatile['decimal_2_title'] = $this->getParameterByPost("decimal_2_title");
		
		$versatile['decimal_3_title'] = $this->getParameterByPost("decimal_3_title");
		
		$versatile['decimal_4_title'] = $this->getParameterByPost("decimal_4_title");
		
		$versatile['decimal_5_title'] = $this->getParameterByPost("decimal_5_title");
		
		$versatile['bool_1_title'] = $this->getParameterByPost("bool_1_title");
		
		$versatile['bool_2_title'] = $this->getParameterByPost("bool_2_title");
		
		$versatile['bool_3_title'] = $this->getParameterByPost("bool_3_title");
		
		$versatile['bool_4_title'] = $this->getParameterByPost("bool_4_title");
		
		$versatile['bool_5_title'] = $this->getParameterByPost("bool_5_title");
		
		$versatile['date_1_title'] = $this->getParameterByPost("date_1_title");
		
		$versatile['date_2_title'] =  $this->getParameterByPost("date_2_title");
		
		$versatile['date_3_title'] = $this->getParameterByPost("date_3_title");
		
		$versatile['date_4_title'] = $this->getParameterByPost("date_4_title");
		
		$versatile['date_5_title'] = $this->getParameterByPost("date_5_title");
		
		$this->VersatileModel->updateVersatile($versatile);
		
		$versatileList = $this->VersatileModel->getVersatileList();
		$this->set('versatileList',$versatileList);
		$this->render('manageVersatileIndex');
	}
	
	public function versatileIndex(){
		$versatileList = $this->VersatileModel->getVersatileList();
		$this->set('versatileList',$versatileList);
		$this->render('manageVersatileIndex');
	}
}