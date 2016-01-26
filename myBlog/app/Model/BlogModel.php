<?php
App::uses('Model', 'Model');
class BlogModel extends Model {
	var $useTable = false;
	
	public function getBlogListForManage($whereList,$currentPage = 1,$pageSize = 5){
	
		$blogList = array();
		$start = ($currentPage -1) * $pageSize;
		//try{
			$sql =" select * from ( ";
			$sql = $sql." select blogs.*,";
			$sql = $sql." blog_type.blog_type_name ";
			$sql = $sql." from";
			$sql = $sql."( select ";
			$sql = $sql." sid,";
			$sql = $sql." blog_title,";
			$sql = $sql." blog_create_date ,"; 
			$sql = $sql." blog_excerpt,";
			$sql = $sql." blog_alias,";
			$sql = $sql." blog_author,";
			$sql = $sql." blog_type,";
			$sql = $sql." blog_top,";
			$sql = $sql." blog_views,";
			$sql = $sql." blog_hide ";
			$sql = $sql." from kongxh_blog ";
			$sql = $sql." where " ;
			
			if($whereList){
				if(isset($whereList['blog_hide']) && $whereList['blog_hide'] != ''){
					$sql = $sql." kongxh_blog.blog_hide = '".$whereList['blog_hide']."' " ;
				}else{
					$sql = $sql." kongxh_blog.blog_hide = 'n' " ;
				}
				if(isset($whereList['blog_type']) && $whereList['blog_type'] != ''){
					$sql = $sql." and blog_type = '".$whereList['blog_type']."'" ;
				}
				if(isset($whereList['keywords']) && $whereList['keywords'] != ''){
					$sql = $sql." and (blog_content like '%".$whereList['keywords']."%' || blog_excerpt like '%".$whereList['keywords']."%')" ;
				}
			}
			$sql = $sql." order by sid desc limit $start,$pageSize  ) blogs " ;
			$sql = $sql." left join  " ;
			$sql = $sql."  kongxh_blog_type  blog_type" ; 
			$sql = $sql."  on blogs.blog_type = blog_type.blog_type_id  " ;
			$sql = $sql." ) bloglist order by sid desc" ;
			$data = $this->query($sql);
		
			if(count($data) > 0){
				foreach($data as $key=>$val){
					$blogList[$key]= $val['bloglist'];
				}
			}
		//	print $sql;
		//}catch(Exception $e){
		//}
		return $blogList;
	}
	
	public function getBlogList($whereList,$currentPage = 1,$pageSize = 5){
		$blogList = array();
		$start = ($currentPage -1) * $pageSize;
		try{
			$sql =" select * from ( ";
			$sql = $sql." select blogs.*,";
			$sql = $sql." case when blog_comment_count.comment_count is null then 0 else blog_comment_count.comment_count end  comment_count, ";
			$sql = $sql." blog_type.blog_type_name,";
			$sql = $sql." bolg_new.is_new";
			$sql = $sql." from";
			$sql = $sql."( select ";
			$sql = $sql." sid,";
			$sql = $sql." blog_title,";
			$sql = $sql." blog_create_date ,"; 
			$sql = $sql." blog_excerpt,";
			$sql = $sql." blog_alias,";
			$sql = $sql." blog_author,";
			$sql = $sql." blog_type,";
			$sql = $sql." blog_top,";
			$sql = $sql." blog_views,";
			$sql = $sql." blog_hide ";
			$sql = $sql." from kongxh_blog ";
			$sql = $sql." where " ;
			$sql = $sql." kongxh_blog.blog_hide = 'n' " ;
			
			if($whereList){
				
				if(isset($whereList['blog_type']) && $whereList['blog_type'] != ''){
					$sql = $sql." and blog_type = '".$whereList['blog_type']."'" ;
				}
				if(isset($whereList['keywords']) && $whereList['keywords'] != ''){
					$sql = $sql." and (blog_content like '%".$whereList['keywords']."%' || blog_excerpt like '%".$whereList['keywords']."%')" ;
				}
			}
			$sql = $sql." order by sid desc limit $start,$pageSize  ) blogs " ;
			$sql = $sql." left join  " ;
			$sql = $sql." (  " ;
			$sql = $sql." select blog_id,count(1) comment_count from kongxh_blog_comment where kongxh_blog_comment.comment_hide = 'n' group by blog_id " ;
			$sql = $sql." ) blog_comment_count " ;
			$sql = $sql."  on blogs.sid = blog_comment_count.blog_id  " ;
			$sql = $sql." left join  " ;
			$sql = $sql."  (select kongxh_blog.sid , 't' is_new  from kongxh_blog order by kongxh_blog.blog_create_date desc ,sid desc limit 0,5 ) bolg_new   " ; 
			$sql = $sql."  on blogs.sid = bolg_new.sid  " ;
			
			$sql = $sql." left join  " ;
			$sql = $sql."  kongxh_blog_type  blog_type" ; 
			$sql = $sql."  on blogs.blog_type = blog_type.blog_type_id  " ;
			
			$sql = $sql." ) bloglist order by sid desc" ;
			
			$data = $this->query($sql);
			if(count($data) > 0){
				foreach($data as $key=>$val){
					$blogList[$key]= $val['bloglist'];
				}
			}
		}catch(Exception $e){
			
		}
		return $blogList;
	}
	
	public function getBlogTotalNumberOfPagesForManage($pageSize,$whereList){
		$total = 0;
		try{
			$sql = " select ";
			$sql = $sql." count(1) count ";
			$sql = $sql." from kongxh_blog ";
			$sql = $sql." where  " ;
			
			if($whereList){
				if(isset($whereList['blog_hide']) && $whereList['blog_hide'] != ''){
					$sql = $sql." kongxh_blog.blog_hide = '".$whereList['blog_hide']."' " ;
				}else{
					$sql = $sql." kongxh_blog.blog_hide = 'n' " ;
				}
				if(isset($whereList['blog_type']) && $whereList['blog_type'] != ''){
					$sql = $sql." and blog_type = '".$whereList['blog_type']."'" ;
				}
				if(isset($whereList['keywords']) && $whereList['keywords'] != ''){
					$sql = $sql." and (blog_content like '%".$whereList['keywords']."%' || blog_excerpt like '%".$whereList['keywords']."%')" ;
				}
			}
			$data = $this->query($sql);
			if(count($data) > 0){
				$count = $data['0']['0']['count'];
				$total =ceil($count/$pageSize);
			}
		}catch(Exception $e){
		}
		return $total;
	}

	
	public function getBlogTotalNumberOfPages($pageSize,$whereList){
		$total = 0;
		try{
			$sql = " select ";
			$sql = $sql." count(1) count ";
			$sql = $sql." from kongxh_blog ";
			$sql = $sql." where  " ;
			$sql = $sql." kongxh_blog.blog_hide = 'n' " ;
			if($whereList){
				if(isset($whereList['blog_type']) && $whereList['blog_type'] != ''){
					$sql = $sql." and blog_type = '".$whereList['blog_type']."'" ;
				}
				if(isset($whereList['keywords']) && $whereList['keywords'] != ''){
					$sql = $sql." and (blog_content like '%".$whereList['keywords']."%' || blog_excerpt like '%".$whereList['keywords']."%')" ;
				}
			}
			$data = $this->query($sql);
			if(count($data) > 0){
				$count = $data['0']['0']['count'];
				$total =ceil($count/$pageSize);
			}
		}catch(Exception $e){
		}
		return $total;
	}
	
	public function getNewBlogs(){
		$blogList = array();
		try{
			$sql = " select sid, blog_title from kongxh_blog where kongxh_blog.blog_hide = 'n' order by sid desc limit 0,5 ";
			$data = $this->query($sql);
			
			if(count($data) > 0){
				foreach($data as $key=>$val){
					$blogList[$key]= $val['kongxh_blog'];
				}
			}
		}catch(Exception $e){
		}
		return $blogList;
	}
	
		
	public function getBlogTypeAndCount(){
		$blogList = array();
		try{
			$sql = " select * from (";
			$sql = $sql." select ";
			$sql = $sql." blogcount.* ,";
			$sql = $sql." kongxh_blog_type.blog_type_name ";
			$sql = $sql." from ";
			$sql = $sql."(select blog_type , count(1) count  from kongxh_blog where kongxh_blog.blog_hide = 'n' group by blog_type) blogcount ";
			
			$sql = $sql."left join ";
			
			$sql = $sql." kongxh_blog_type ";
			
			$sql = $sql." on ";
			$sql = $sql." blogcount.blog_type = kongxh_blog_type.blog_type_id ";	
			$sql = $sql.") blog_type_and_count";		
			$data = $this->query($sql);
			
			if(count($data) > 0){
				foreach($data as $key=>$val){
					$blogList[$key]= $val['blog_type_and_count'];
				}
			}
			
		}catch(Exception $e){
		}
		return $blogList;
	}

	public function getBlogBySid($sid){
		$blog  = array();
		//try{
			$sql = " select * from (select ";
			$sql = $sql." kongxh_blog.sid,";
			$sql = $sql." blog_title,";
			$sql = $sql." blog_create_date ,"; // from_unixtime(1306857599)
			$sql = $sql." blog_content,";
			$sql = $sql." blog_excerpt,";
			$sql = $sql." blog_alias,";
			$sql = $sql." blog_author,";
			$sql = $sql." blog_type,";
			$sql = $sql." blog_views,";
			$sql = $sql." blog_type_name,";
			$sql = $sql." blog_top,";
			$sql = $sql." blog_hide ";
			$sql = $sql." from kongxh_blog left join ";
			$sql = $sql." kongxh_blog_type on kongxh_blog.blog_type = kongxh_blog_type.blog_type_id ";
			$sql = $sql." where kongxh_blog.sid = '$sid') kongxh_blog_detail  ";
			$data = $this->query($sql);
			if(count($data) > 0){
				$blog = $data[0]['kongxh_blog_detail'];
			}
		//}catch(Exception $e){
		//}
		//print $sql;
		return $blog;
	}
	
	public function updateBlog($blog){
		$flag = true;
		try{
			$blog_title = $blog['blog_title'] ;
			$blog_content = $blog['blog_content'] ;
			$blog_excerpt = $blog['blog_excerpt'] ;
			$blog_type = $blog['blog_type'] ;
			$blog_alias = $blog['blog_alias'] ;
			$sid = $blog['sid'] ;
			$sql = " update kongxh_blog set " ;
			$sql = $sql." blog_title = '$blog_title' ," ;
			$sql = $sql." blog_type = '$blog_type' ," ;
			$sql = $sql." blog_excerpt = '$blog_excerpt' ," ;
			$sql = $sql." blog_alias = '$blog_alias' ," ;
			$sql = $sql." blog_content = '$blog_content' " ;
			$sql = $sql." where sid = '$sid' " ;
			$flag = $this->query($sql);
		}catch(Exception $e){
			$flag = false;
		}
		return $flag;
	}
	
		
	public function updateBlogView($sid){
		$flag = true;
		try{
			$sql = " update kongxh_blog set blog_views = blog_views + 1  where sid = $sid  " ;
			$this->query($sql);
		}catch(Exception $e){
			$flag = false;
		}
		return $flag;
	}
	
	public function deleteBlogBySid($sid){
		$flag = true;
		try{
			$sql = " delete from kongxh_blog where sid = $sid " ;
			$this->query($sql);
		}catch(Exception $e){
			$flag = false;
		}
		return $flag;
	}
	
	public function deleteBlogBySids($sids){
		$flag = true;
		try{
			$sql = " delete from kongxh_blog where sid in ($sids) " ;
			$this->query($sql);
		}catch(Exception $e){
			$flag = false;
		}
		return $flag;
	}
	
	public function draftBlogBySids($sids){
		$flag = true;
		try{
			$sql = " update kongxh_blog set blog_hide = 'y' where sid in ($sids) " ;
			$this->query($sql);
		}catch(Exception $e){
			$flag = false;
		}
		return $flag;
	}
	
	public function publishBlogBySids($sids){
		$flag = true;
		try{
			$sql = " update kongxh_blog set blog_hide = 'n' where sid in ($sids) " ;
			$this->query($sql);
		}catch(Exception $e){
			$flag = false;
		}
		return $flag;
	}
	
	public function updateBlogHideBySid($sid,$blogHide){
		$flag = true;
		try{
			$sql = " update kongxh_blog set blog_hide = '$blogHide' where sid = '$sid' " ;
			$this->query($sql);
		}catch(Exception $e){
			$flag = false;
		}
		return $flag;
	}
	
	public function saveBlog($blog){
		$flag = true;
		try{
			$blog_title = $blog['blog_title'];
			$blog_content = $blog['blog_content'] ;
			$blog_excerpt = $blog['blog_excerpt'] ;
			$blog_alias = $blog['blog_alias'] ;
			$blog_type = $blog['blog_type'] ;
			$blog_hide = $blog['blog_hide'] ;
			$sql = " insert kongxh_blog (blog_title,blog_create_date, blog_content,blog_excerpt,blog_alias,blog_author,blog_type,blog_top,blog_hide) value";
			$sql = $sql."('$blog_title',now(),'$blog_content','$blog_excerpt','$blog_alias','1','$blog_type','n','$blog_hide')";
			$this->query($sql);
		}catch(Exception $e){
			$flag = false;
		}
		return $flag;
	}
}
