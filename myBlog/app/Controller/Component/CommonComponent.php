<?php
class CommonComponent extends Component {
	public $initialized = false;
	
	public function createPaginationArray($currentPage,$theTotalNumberOfPages){
		$paginationArray = array();
		if($theTotalNumberOfPages <= 5){
			for($i = 0;$i < $theTotalNumberOfPages ; $i++){
				$paginationArray['page'.($i+1)] = $i+1;
			}
		}else{
			$page1 = $currentPage - 2;
			$page2 = $currentPage - 1;
			$page3 = $currentPage ;
			$page4 = $currentPage + 1;
			$page5 = $currentPage + 2;
			
			if($page1 <= 0){
				$page1 = 1;;
				$page2 = 2;
				$page3 = 3 ;
				$page4 = 4;
				$page5 = 5;
			}
			
			if($page5 > $theTotalNumberOfPages){
				$page1 = $theTotalNumberOfPages - 4;;
				$page2 = $theTotalNumberOfPages - 3;
				$page3 = $theTotalNumberOfPages - 2 ;
				$page4 = $theTotalNumberOfPages - 1;
				$page5 = $theTotalNumberOfPages;
			}
			$paginationArray= array(
				'page1' => $page1,
				'page2' => $page2,
				'page3' => $page3,
				'page4' => $page4,
				'page5' => $page5,
			
			);
		}
		return $paginationArray;
	}
	
	function guid(){
		if (function_exists('com_create_guid')){
			return com_create_guid();
		}else{
			mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
			$charid = strtoupper(md5(uniqid(rand(), true)));
			$hyphen = chr(45);// "-"
			$uuid = chr(123)// "{"
			.substr($charid, 0, 8).$hyphen
			.substr($charid, 8, 4).$hyphen
			.substr($charid,12, 4).$hyphen
			.substr($charid,16, 4).$hyphen
			.substr($charid,20,12)
			.chr(125);// "}"
			return $uuid;
		}
	}
}

?>