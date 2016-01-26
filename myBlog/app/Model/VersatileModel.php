<?php
App::uses('Model', 'Model');
class VersatileModel extends Model {
	var $useTable = false;
	
	public function createVersatile($versatile){
		$flag = true;
		try{
			$versatile_cd = $versatile['versatile_cd'] ;
			$versatile_nm = $versatile['versatile_nm'] ;
			$remarks = $versatile['remarks'] ;
			$text_1_title = $versatile['text_1_title'] ;
			$text_2_title = $versatile['text_2_title'] ;
			$text_3_title = $versatile['text_3_title'] ;
			$text_4_title = $versatile['text_4_title'] ;
			$text_5_title = $versatile['text_5_title'] ;
			
			$decimal_1_title = $versatile['decimal_1_title'] ;
			$decimal_2_title = $versatile['decimal_2_title'] ;
			$decimal_3_title = $versatile['decimal_3_title'] ;
			$decimal_4_title = $versatile['decimal_4_title'] ;
			$decimal_5_title = $versatile['decimal_5_title'] ;
			
			$bool_1_title = $versatile['bool_1_title'] ;
			$bool_2_title = $versatile['bool_2_title'] ;
			$bool_3_title = $versatile['bool_3_title'] ;
			$bool_4_title = $versatile['bool_4_title'] ;
			$bool_5_title = $versatile['bool_5_title'] ;
			
			$date_1_title = $versatile['date_1_title'] ;
			$date_2_title = $versatile['date_2_title'] ;
			$date_3_title = $versatile['date_3_title'] ;
			$date_4_title = $versatile['date_4_title'] ;
			$date_5_title = $versatile['date_5_title'] ;
			
			
			$sql = " insert kongxh_versatile (";
			$sql = $sql." versatile_cd,versatile_nm,remarks, text_1_title, text_2_title, text_3_title,text_4_title,text_5_title, ";
			$sql = $sql." decimal_1_title, decimal_2_title,decimal_3_title,decimal_4_title, decimal_5_title, ";
			$sql = $sql." bool_1_title, bool_2_title,bool_3_title,bool_4_title, bool_5_title, ";
			$sql = $sql." date_1_title, date_2_title,date_3_title,date_4_title, date_5_title  ";
			$sql = $sql.") value(";
			$sql = $sql." '$versatile_cd','$versatile_nm','$remarks', '$text_1_title', '$text_2_title', '$text_3_title','$text_4_title','$text_5_title', ";
			$sql = $sql." '$decimal_1_title', '$decimal_2_title','$decimal_3_title','$decimal_4_title', '$decimal_5_title', ";
			$sql = $sql." '$bool_1_title', '$bool_2_title','$bool_3_title','$bool_4_title','$bool_5_title', ";
			$sql = $sql." '$date_1_title', '$date_2_title','$date_3_title','$date_4_title', '$date_5_title') ";
			
			$this->query($sql);
		}catch(Exception $e){
			$flag = false;
		}
		return $flag;
	}
	
	public function getVersatileList(){
  
		$sql = " select ";
		$sql = $sql." sid, versatile_cd,versatile_nm,remarks, text_1_title, text_2_title, text_3_title,text_4_title,text_5_title,";
		$sql = $sql." decimal_1_title, decimal_2_title,decimal_3_title,decimal_4_title, decimal_5_title, ";
		$sql = $sql." bool_1_title, bool_2_title,bool_3_title,bool_4_title, bool_5_title, ";
		$sql = $sql." date_1_title, date_2_title,date_3_title,date_4_title, date_5_title ";
		$sql = $sql."  from kongxh_versatile ";
		$data = $this->query($sql);
		$versatileList = array();
		if(count($data) > 0){
			foreach($data as $key=>$val){
				$versatileList[$key]= $val['kongxh_versatile'];
			}
		}
		return $versatileList;
	}
	
	public function getVersatileByVersatileCd($versatile_cd){
		$sql = " select ";
		$sql = $sql." sid, versatile_cd,versatile_nm,remarks, text_1_title, text_2_title, text_3_title,text_4_title,text_5_title,";
		$sql = $sql." decimal_1_title, decimal_2_title,decimal_3_title,decimal_4_title, decimal_5_title, ";
		$sql = $sql." bool_1_title, bool_2_title,bool_3_title,bool_4_title, bool_5_title, ";
		$sql = $sql." date_1_title, date_2_title,date_3_title,date_4_title, date_5_title ";
		$sql = $sql."  from kongxh_versatile where versatile_cd = '$versatile_cd'";
		$data = $this->query($sql);
		$versatile = $data[0]['kongxh_versatile'];
		return $versatile;
	}
	
	public function updateVersatile($versatile){
		try{
			$versatile_cd = $versatile['versatile_cd'] ;
			$versatile_nm = $versatile['versatile_nm'] ;
			$remarks = $versatile['remarks'] ;
			$text_1_title = $versatile['text_1_title'] ;
			$text_2_title = $versatile['text_2_title'] ;
			$text_3_title = $versatile['text_3_title'] ;
			$text_4_title = $versatile['text_4_title'] ;
			$text_5_title = $versatile['text_5_title'] ;
			
			$decimal_1_title = $versatile['decimal_1_title'] ;
			$decimal_2_title = $versatile['decimal_2_title'] ;
			$decimal_3_title = $versatile['decimal_3_title'] ;
			$decimal_4_title = $versatile['decimal_4_title'] ;
			$decimal_5_title = $versatile['decimal_5_title'] ;
			
			$bool_1_title = $versatile['bool_1_title'] ;
			$bool_2_title = $versatile['bool_2_title'] ;
			$bool_3_title = $versatile['bool_3_title'] ;
			$bool_4_title = $versatile['bool_4_title'] ;
			$bool_5_title = $versatile['bool_5_title'] ;
			
			$date_1_title = $versatile['date_1_title'] ;
			$date_2_title = $versatile['date_2_title'] ;
			$date_3_title = $versatile['date_3_title'] ;
			$date_4_title = $versatile['date_4_title'] ;
			$date_5_title = $versatile['date_5_title'] ;
			
			$sql = " update kongxh_versatile set ";
			$sql = $sql." versatile_nm = '$versatile_nm' ,remarks = '$remarks', text_1_title = '$text_1_title', text_2_title = '$text_2_title' , text_3_title = '$text_3_title' ,text_4_title = '$text_4_title',text_5_title = '$text_5_title', ";
			$sql = $sql." decimal_1_title = '$decimal_1_title' , decimal_2_title = '$decimal_2_title' ,decimal_3_title = '$decimal_3_title' ,decimal_4_title = '$decimal_4_title' , decimal_5_title = '$decimal_5_title', ";
			$sql = $sql." bool_1_title = '$bool_1_title' , bool_2_title = '$bool_2_title' ,bool_3_title = '$bool_3_title' ,bool_4_title ='$bool_4_title', bool_5_title = '$bool_5_title', ";
			$sql = $sql." date_1_title = '$date_1_title', date_2_title = '$date_2_title' ,date_3_title = '$date_3_title' ,date_4_title = '$date_4_title', date_5_title = '$date_5_title' ,modify_date = now(),create_date = now()";
			
			$sql = $sql." where versatile_cd = '$versatile_cd' ";
			
			$this->query($sql);
		}catch(Exception $e){
			echo $e;
		}
	}
	
	public function getVersatileDetailListByVersatileCd($versatile_cd){
		$sql = " select ";
		$sql = $sql." sid, versatile_cd,versatile_kbn,master_start_date ,master_end_date ,remarks, text_value_1 , text_value_2, text_value_3,text_value_4,text_value_5,";
		$sql = $sql." decimal_value_1, decimal_value_2,decimal_value_3,decimal_value_4, decimal_value_5, ";
		$sql = $sql." bool_value_1, bool_value_2,bool_value_3,bool_value_4, bool_value_5, ";
		$sql = $sql." date_value_1, date_value_2,date_value_3,date_value_4, date_value_5 ";
		$sql = $sql."  from kongxh_versatile_detail where versatile_cd = '$versatile_cd'";
		$data = $this->query($sql);
		$versatileList = array();
		if(count($data) > 0){
			foreach($data as $key=>$val){
				$versatileList[$key]= $val['kongxh_versatile_detail'];
			}
		}
		return $versatileList;
	}
	
	public function getVersatileDetailBySid($sid){
		$sql = " select ";
		$sql = $sql." sid, versatile_cd,versatile_kbn,master_start_date ,master_end_date ,remarks, text_value_1 , text_value_2, text_value_3,text_value_4,text_value_5,";
		$sql = $sql." decimal_value_1, decimal_value_2,decimal_value_3,decimal_value_4, decimal_value_5, ";
		$sql = $sql." bool_value_1, bool_value_2,bool_value_3,bool_value_4, bool_value_5, ";
		$sql = $sql." date_value_1, date_value_2,date_value_3,date_value_4, date_value_5 ";
		$sql = $sql."  from kongxh_versatile_detail where sid = '$sid'";
		$data = $this->query($sql);
		
		$versatileDetail = $data[0]['kongxh_versatile_detail'];
		return $versatileDetail;
	}
	
	public function updateVersatileDetail($versatileDetail){
		//try{
			$sid = $versatileDetail['sid'] ;
			
			$versatile_cd = $versatileDetail['versatile_cd'] ;
			$versatile_kbn = $versatileDetail['versatile_kbn'] ;
			$master_start_date = $versatileDetail['master_start_date'] ;
			$master_end_date = $versatileDetail['master_end_date'] ;
			
			$remarks = $versatileDetail['remarks'] ;
			
			$text_value_1 = $versatileDetail['text_value_1'] ;
			$text_value_2 = $versatileDetail['text_value_2'] ;
			$text_value_3 = $versatileDetail['text_value_3'] ;
			$text_value_4 = $versatileDetail['text_value_4'] ;
			$text_value_5 = $versatileDetail['text_value_5'] ;
			
			$decimal_value_1 = $versatileDetail['decimal_value_1'] ;
			$decimal_value_2 = $versatileDetail['decimal_value_2'] ;
			$decimal_value_3 = $versatileDetail['decimal_value_3'] ;
			$decimal_value_4 = $versatileDetail['decimal_value_4'] ;
			$decimal_value_5 = $versatileDetail['decimal_value_5'] ;
			
			$bool_value_1 = $versatileDetail['bool_value_1'] ;
			$bool_value_2 = $versatileDetail['bool_value_2'] ;
			$bool_value_3 = $versatileDetail['bool_value_3'] ;
			$bool_value_4 = $versatileDetail['bool_value_4'] ;
			$bool_value_5 = $versatileDetail['bool_value_5'] ;
			
			$date_value_1 = $versatileDetail['date_value_1'] ;
			$date_value_2 = $versatileDetail['date_value_2'] ;
			$date_value_3 = $versatileDetail['date_value_3'] ;
			$date_value_4 = $versatileDetail['date_value_4'] ;
			$date_value_5 = $versatileDetail['date_value_5'] ;
			
			$sql = " update kongxh_versatile_detail set ";
			$sql = $sql." versatile_cd ='$versatile_cd',versatile_kbn = '$versatile_kbn' ,master_start_date = '$master_start_date' , master_end_date = '$master_end_date' , remarks = '$remarks',";
			$sql = $sql." text_value_1 = '$text_value_1', text_value_2 = '$text_value_2' , text_value_3 = '$text_value_3' ,text_value_4 = '$text_value_4',text_value_5 = '$text_value_5', ";
			$sql = $sql." decimal_value_1 = '$decimal_value_1' , decimal_value_2 = '$decimal_value_2' ,decimal_value_3 = '$decimal_value_3' ,decimal_value_4 = '$decimal_value_4' , decimal_value_5 = '$decimal_value_5', ";
			$sql = $sql." bool_value_1 = '$bool_value_1' , bool_value_2 = '$bool_value_2' ,bool_value_3 = '$bool_value_3' ,bool_value_4 ='$bool_value_4', bool_value_5 = '$bool_value_5', ";
			$sql = $sql." date_value_1 = '$date_value_1', date_value_2 = '$date_value_2' ,date_value_3 = '$date_value_3' ,date_value_4 = '$date_value_4', date_value_5 = '$date_value_5' ";
			
			$sql = $sql." where sid = '$sid' ";
			
			$this->query($sql);
		//}catch(Exception $e){
		//	echo $e;
		//}
	}
}
