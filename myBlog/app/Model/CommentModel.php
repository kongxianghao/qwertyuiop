<?php
App::uses('Model', 'Model');
class CommentModel extends Model {
	var $useTable = false;
	
	public function getCommentListByBlogSid($blogSid){
		$sql = " select ";
		$sql = $sql." sid, blog_id,comment_date,comment_poster, comment_content, comment_mail, comment_hide";
		$sql = $sql."  from kongxh_blog_comment where blog_id ='$blogSid' and comment_hide = 'n' ";
		$data = $this->query($sql);
		$commentList = array();
		if(count($data) > 0){
			foreach($data as $key=>$val){
				$commentList[$key]= $val['kongxh_blog_comment'];
			}
		}
		return $commentList;
	}
	
	public function updateCommentHideBySid($commentSid,$hide){
		$sql = " update ";
		$sql = $sql." kongxh_blog_comment set comment_hide = '$hide' where sid = $commentSid ";
		
		$data = $this->query($sql);
	}
	
	public function deleteCommentBySid($commentSid){
		$sql = " delete ";
		$sql = $sql." from kongxh_blog_comment where sid = $commentSid ";
		
		$data = $this->query($sql);
	}
	
	public function deleteCommentByBlogSid($blogSid){
		$sql = " delete ";
		$sql = $sql." from kongxh_blog_comment where blog_id = $blogSid ";
		$data = $this->query($sql);
	}
	
	public function deleteCommentByBlogSidList($sids){
		$sql = " delete ";
		$sql = $sql." from kongxh_blog_comment where blog_id in ($sids)";
		$data = $this->query($sql);
	}
	
	
	public function deleteAllCommentBySids($commentSids){
		$sql = " delete from kongxh_blog_comment where sid in ($commentSids) " ;
		$number = $this->query($sql);
		return $number;
	}
	
	public function getCommentList(){
		$sql = "select * from (select ";
		$sql = $sql." kongxh_blog_comment.sid, blog_id,kongxh_blog.blog_title ,comment_date,comment_poster, comment_content,comment_mail, comment_hide  ";
		$sql = $sql." from kongxh_blog_comment left join kongxh_blog on kongxh_blog_comment.blog_id = kongxh_blog.sid where comment_hide = 'n') commentList";

		$data = $this->query($sql);
		$commentList = array();
		if(count($data) > 0){
			foreach($data as $key=>$val){
				$commentList[$key]= $val['commentList'];
			}
		}
		return $commentList;
	}
	
	public function getCommentAllList(){
		$sql = "select * from (select ";
		$sql = $sql." kongxh_blog_comment.sid, blog_id,kongxh_blog.blog_title ,comment_date,comment_poster, comment_content,comment_mail, comment_hide  ";
		$sql = $sql." from kongxh_blog_comment left join kongxh_blog on kongxh_blog_comment.blog_id = kongxh_blog.sid ) commentList";

		$data = $this->query($sql);
		$commentList = array();
		if(count($data) > 0){
			foreach($data as $key=>$val){
				$commentList[$key]= $val['commentList'];
			}
		}
		return $commentList;
	}
	
	public function saveComment($comment){
		$flag = true;
		$comment_blog_id = $comment['blog_id'] ;
		$guid = $comment['guid'] ;
		
			$comment_poster = $comment['comment_poster'] ;
			$comment_content = $comment['comment_content'] ;
			$comment_mail = $comment['comment_mail'] ;
			$sql = " insert kongxh_blog_comment (blog_id,guid,comment_poster,comment_date, comment_content,comment_mail) value";
			$sql = $sql."('$comment_blog_id','$guid','$comment_poster',now(),'$comment_content','$comment_mail')";
			$this->query($sql);
		return $flag;
	}
	
}
