<?php
App::uses('Model', 'Model');
class DBModel extends Model {

	var $useTable = false;
	
	public function initDataToTable(){
		
		
		$sql = " insert kongxh_blog_type (";
			$sql = $sql." blog_type_id,blog_type_name ";
			$sql = $sql.") value(";
			$sql = $sql." '1','未分类') ";
		$this->exeSQL($sql);
		$sql = " insert kongxh_versatile (";
			$sql = $sql." versatile_cd,versatile_nm,remarks, text_1_title";
			$sql = $sql.") value(";
			$sql = $sql." 'SITE_TITLE','站点标题','站点标题内容', '站点标题') ";
		$this->exeSQL($sql);
		$sql = " insert kongxh_versatile (";
			$sql = $sql." versatile_cd,versatile_nm,remarks, text_1_title";
			$sql = $sql.") value(";
			$sql = $sql." 'SITE_URL','站点地址','站点地址', '站点地址') ";
		$this->exeSQL($sql);
		$sql = " insert kongxh_versatile (";
			$sql = $sql." versatile_cd,versatile_nm,remarks, text_1_title";
			$sql = $sql.") value(";
			$sql = $sql." 'ICP_NO','CP备案号','CP备案号', 'CP备案号') ";
		$this->exeSQL($sql);
		$sql = " insert kongxh_versatile_detail (";
			$sql = $sql." versatile_cd,versatile_kbn,remarks, text_value_1";
			$sql = $sql.") value(";
			$sql = $sql." 'SITE_TITLE','1','站点标题内容', '祥昊的图文') ";
		$this->exeSQL($sql);
		$sql = " insert kongxh_versatile_detail (";
			$sql = $sql." versatile_cd,versatile_kbn,remarks, text_value_1";
			$sql = $sql.") value(";
			$sql = $sql." 'SITE_URL','1','站点地址', 'www.kongxh.cn') ";
		$this->exeSQL($sql);
		$sql = " insert kongxh_versatile_detail (";
			$sql = $sql." versatile_cd,versatile_kbn,remarks, text_value_1";
			$sql = $sql.") value(";
			$sql = $sql." 'ICP_NO','1','ICP备案号', '沪ICP备13027011号') ";
			
		$this->exeSQL($sql);
	}
	
	public function exeSQL($sql){
		try {
			$this->query($sql);
		} catch (Exception $e) {
			
		}
	}
	
	public function createTable(){
		$sql = " CREATE TABLE IF NOT EXISTS `kongxh_blog` ( ";
		$sql = $sql." `sid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,";
		$sql = $sql." `blog_title` varchar(255) NOT NULL DEFAULT '', ";
		$sql = $sql." `blog_create_date` DATETIME NOT NULL , ";
		$sql = $sql." `blog_content` longtext NOT NULL , ";
		$sql = $sql." `blog_excerpt` longtext NOT NULL , ";
		$sql = $sql." `blog_alias` varchar(200) NOT NULL DEFAULT '', ";
		$sql = $sql." `blog_author` int(10) NOT NULL DEFAULT '1', ";
		$sql = $sql." `blog_type` varchar(20) NOT NULL DEFAULT '1',";
		$sql = $sql." `blog_views` mediumint(8) NOT NULL DEFAULT 0,";
		$sql = $sql." `blog_top` enum('n','y') NOT NULL DEFAULT 'n',";
		$sql = $sql." `blog_hide` enum('n','y') NOT NULL DEFAULT 'n',";
		$sql = $sql." PRIMARY KEY (`sid`) ";
		$sql = $sql.") ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;";
		
		$this->query($sql);
		
		$sql = " CREATE TABLE IF NOT EXISTS `kongxh_blog_comment` ( ";
		$sql = $sql." `sid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT, ";
		$sql = $sql." `blog_id` mediumint(8) unsigned NOT NULL , ";
		$sql = $sql." `guid` varchar(60) unique NOT NULL , ";
		$sql = $sql." `comment_date` DATETIME NOT NULL , ";
		$sql = $sql." `comment_poster` varchar(20) NOT NULL DEFAULT '', ";
		$sql = $sql." `comment_content` text NOT NULL , ";
		$sql = $sql." `comment_mail` varchar(60) NOT NULL DEFAULT '', ";
		$sql = $sql." `comment_hide` enum('n','y') NOT NULL DEFAULT 'n', ";
		$sql = $sql." PRIMARY KEY (`sid`) ";
		$sql = $sql." ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;";
		
		$this->query($sql);
		
		$sql = " CREATE TABLE IF NOT EXISTS `kongxh_blog_type` ( ";
		$sql = $sql." `sid` int(10) unsigned NOT NULL AUTO_INCREMENT, ";
		$sql = $sql." `blog_type_id` varchar(20) NOT NULL , ";
		$sql = $sql." `blog_type_name` varchar(255) NOT NULL DEFAULT '', ";
		$sql = $sql." PRIMARY KEY (`sid`) ";
		$sql = $sql." ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ; ";
		
		$this->query($sql);
		
		$sql = " CREATE TABLE IF NOT EXISTS `kongxh_link` ( ";
		$sql = $sql." `sid` smallint(4) unsigned NOT NULL AUTO_INCREMENT,";
		$sql = $sql." `site_name` varchar(30) NOT NULL DEFAULT '', ";
		$sql = $sql." `site_url` varchar(75) NOT NULL DEFAULT '', ";
		$sql = $sql." `description` varchar(255) NOT NULL DEFAULT '', ";
		$sql = $sql." `hide` enum('n','y') NOT NULL DEFAULT 'n', ";
		$sql = $sql." `taxis` smallint(4) unsigned NOT NULL DEFAULT '1', ";
		$sql = $sql."  PRIMARY KEY (`sid`)";
		$sql = $sql." ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ; ";
		
		$this->query($sql);
		
		
		$sql = " CREATE TABLE IF NOT EXISTS `kongxh_versatile` (";
		$sql = $sql." `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,";
		$sql = $sql." `versatile_cd` varchar(255) unique ,";
		$sql = $sql." `versatile_nm` varchar(255) NOT NULL DEFAULT '',";
		$sql = $sql." `remarks` varchar(255) NOT NULL DEFAULT '',";
		$sql = $sql." `text_1_title` varchar(255) NOT NULL DEFAULT '',";
		$sql = $sql." `text_2_title` varchar(255) NOT NULL DEFAULT '',";
		$sql = $sql." `text_3_title` varchar(255) NOT NULL DEFAULT '',";
		$sql = $sql." `text_4_title` varchar(255) NOT NULL DEFAULT '',";
		$sql = $sql." `text_5_title` varchar(255) NOT NULL DEFAULT '',";
		$sql = $sql." `decimal_1_title` varchar(255) NOT NULL DEFAULT '',";
		$sql = $sql." `decimal_2_title` varchar(255) NOT NULL DEFAULT '',";
		$sql = $sql." `decimal_3_title` varchar(255) NOT NULL DEFAULT '',";
		$sql = $sql." `decimal_4_title` varchar(255) NOT NULL DEFAULT '',";
		$sql = $sql." `decimal_5_title` varchar(255) NOT NULL DEFAULT '',";

		$sql = $sql." `bool_1_title` varchar(255) NOT NULL DEFAULT '',";
		$sql = $sql." `bool_2_title` varchar(255) NOT NULL DEFAULT '',";
		$sql = $sql." `bool_3_title` varchar(255) NOT NULL DEFAULT '',";
		$sql = $sql." `bool_4_title` varchar(255) NOT NULL DEFAULT '',";
		$sql = $sql." `bool_5_title` varchar(255) NOT NULL DEFAULT '',";

		$sql = $sql." `date_1_title` varchar(255) NOT NULL DEFAULT '',";
		$sql = $sql." `date_2_title` varchar(255) NOT NULL DEFAULT '',";
		$sql = $sql." `date_3_title` varchar(255) NOT NULL DEFAULT '',";
		$sql = $sql." `date_4_title` varchar(255) NOT NULL DEFAULT '',";
		$sql = $sql." `date_5_title` varchar(255) NOT NULL DEFAULT '',";

		$sql = $sql." `is_allow_insert` boolean NOT NULL DEFAULT true, ";
		$sql = $sql." `is_allow_update` boolean NOT NULL DEFAULT true, ";
		$sql = $sql." `is_allow_delete` boolean NOT NULL DEFAULT true,"; 
  
		$sql = $sql." `create_date` DATETIME NOT NULL ,"; //now()
		$sql = $sql." `create_user` varchar(255) NOT NULL DEFAULT '孔祥昊',";
		$sql = $sql." `modify_date` DATETIME NOT NULL ,"; //now()
		$sql = $sql." `modify_user` varchar(255) NOT NULL DEFAULT '孔祥昊',";
		$sql = $sql." PRIMARY KEY (`sid`)";
		$sql = $sql." ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;";

		$this->query($sql);
		
		
		$sql = " CREATE TABLE IF NOT EXISTS `kongxh_versatile_detail` (";
		$sql = $sql." `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,";
		$sql = $sql." `versatile_cd` varchar(255) NOT NULL DEFAULT '',";
		$sql = $sql." `versatile_kbn` varchar(255) NOT NULL DEFAULT '',";
		$sql = $sql." `master_start_date` DATETIME NOT NULL ,";
		$sql = $sql." `master_end_date` DATETIME NOT NULL ,";
		$sql = $sql." `text_value_1` varchar(255),";
		$sql = $sql." `text_value_2` varchar(255),";
		$sql = $sql." `text_value_3` varchar(255),";
		$sql = $sql." `text_value_4` varchar(255),";
		$sql = $sql." `text_value_5` varchar(255),";
		$sql = $sql." `decimal_value_1` numeric,";
		$sql = $sql." `decimal_value_2` numeric,";
		$sql = $sql." `decimal_value_3` numeric,";
		$sql = $sql." `decimal_value_4` numeric,";
		$sql = $sql." `decimal_value_5` numeric,";
		$sql = $sql." `bool_value_1` boolean,";
		$sql = $sql." `bool_value_2` boolean,";
		$sql = $sql." `bool_value_3` boolean,";
		$sql = $sql." `bool_value_4` boolean,";
		$sql = $sql." `bool_value_5` boolean,";
		$sql = $sql." `date_value_1` DATETIME,";
		$sql = $sql." `date_value_2` DATETIME,";
		$sql = $sql." `date_value_3` DATETIME,";
		$sql = $sql." `date_value_4` DATETIME, ";
		$sql = $sql." `date_value_5` DATETIME,";
		$sql = $sql." `remarks` varchar(255) NOT NULL DEFAULT '',";
  		$sql = $sql."  PRIMARY KEY (`sid`)";
		$sql = $sql."  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;";
		//INNODB
		//MyISAM 不支持事务
		$this->query($sql);
	}
	
	
	
}
