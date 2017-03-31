<?php

class CommentOfPosts{
	private $table = 'blog_ans';
	private $ans_of_post;
	private $post_id;
	private $ans_status=0;

	public function setAnsOfPost($ans_of_post,$post_id){
		$this->ans_of_post=$ans_of_post;
		$this->post_id=$post_id;
	}

	public function setPostId($post_id){
		$this->post_id=$post_id;
	}


	public function setVoteForAns($ans_of_post){
		

	}

	public function insertAns(){
		$sql		= "insert into $this->table(ans, post_id,ans_status) values (:ans_of_post,:post_id,:ans_status)";
		$stmt 		= DB::prepare($sql);
		$stmt->bindParam(':ans_of_post', $this->ans_of_post);
		$stmt->bindParam(':post_id', $this->post_id);
		$stmt->bindParam(':ans_status', $this->ans_status);
		return $stmt->execute();
	}

	public function readBlogAns(){
		$sql		= "select * from $this->table where post_id=$this->post_id && ans_status=1";
		$stmt 		= DB::prepare($sql);
		$stmt->bindParam(1, $this->post_id);
		$stmt->execute();
		return $stmt->fetchAll();
	}


}


?>