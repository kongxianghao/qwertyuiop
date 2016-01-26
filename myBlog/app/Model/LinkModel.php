<?php
App::uses('Model', 'Model');
class LinkModel extends Model {
	var $useTable = false;
	
	public function getLinkList(){
		$sql = " select ";
		$sql = $sql." sid, site_name,site_url,description, hide, taxis from kongxh_link where hide = 'n' order by taxis";
		$data = $this->query($sql);
		$linkList = array();
		if(count($data) > 0){
			foreach($data as $key=>$val){
				$linkList[$key]= $val['kongxh_link'];
			}
		}
		return $linkList;
	}
	
	public function getAllLinkList(){
		$sql = " select ";
		$sql = $sql." sid, site_name,site_url,description, hide, taxis from kongxh_link order by taxis";
		$data = $this->query($sql);
		$linkList = array();
		if(count($data) > 0){
			foreach($data as $key=>$val){
				$linkList[$key]= $val['kongxh_link'];
			}
		}
		return $linkList;
	}
	
	public function updateLinkBySid($link){
		$site_name = $link['site_name'];
		$site_url = $link['site_url'];
		$description = $link['description'];
		$taxis = $link['taxis'];
		$sid = $link['sid'];
		$sql = " update ";
		$sql = $sql." kongxh_link set site_name = '$site_name',site_url = '$site_url',description = '$description',taxis = '$taxis' where sid = $sid ";
		$data = $this->query($sql);
		
	}
	
	
	public function updateLinkHideBySid($linkSid,$hide){
		$sql = " update ";
		$sql = $sql." kongxh_link set hide = '$hide' where sid = $linkSid ";
		$data = $this->query($sql);
	}
	
	public function saveLink($link){
		$site_name = $link['site_name'];
		$site_url = $link['site_url'];
		$description = $link['description'];
		$taxis = $link['taxis'];
		$sql = " insert kongxh_link (site_name,site_url, description,taxis) value";
		$sql = $sql."('$site_name','$site_url','$description','$taxis')";
		
		$data = $this->query($sql);
	}
	
	public function deleteLinkBySid($sid){
		$sql = " delete ";
		$sql = $sql." from kongxh_link where sid = $sid ";
		$data = $this->query($sql);
	}
	
	public function deleteLinkBySids($sids){
		$sql = " delete ";
		$sql = $sql." from kongxh_link where sid in ($sids) ";
		$data = $this->query($sql);
	}
	
}
