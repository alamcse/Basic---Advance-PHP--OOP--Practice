<?php

class Blogposts{
	private $table = 'blog_posts';
	private $jointable = 'blog_ans';
	private $post_id;
	private $id;
	private $ur_post;
	private $post_status=0;
	private $category='statistics';

	public function readBlogPosts(){
		$sql		= "select * from $this->table  where post_status=1 and category=? order by created_at desc limit 10";
		$stmt 		= DB::prepare($sql);
		$stmt->bindParam(1,$this->category);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function readBlogCategories(){
		$sql		= "select distinct category from $this->table";
		$stmt 		= DB::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function setPostId($post_id){
		$this->post_id=$post_id;

	}

	public function readOnePost(){
		$sql		= "select * from $this->table where id=?";
		$stmt 		= DB::prepare($sql);
		$stmt->bindParam(1,$this->post_id);
		$stmt->execute();
		return $stmt->fetchAll();

	}

	public function readCommentNumber($id){
		$this->id   =$id;
		$sql		= "select * from blog_posts inner join blog_ans on $this->table.id=$this->jointable.post_id where $this->table.id=$this->id&&$this->jointable.ans_status=1";
		$stmt 		= DB::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function setYourPost($ur_post){
		$this->ur_post=$ur_post;
	}

	public function insertPost(){
		$sql		= "insert into $this->table(posts,posts) values (:ur_post)";
		$stmt 		= DB::prepare($sql);
		$stmt->bindParam(':ur_post', $this->ur_post);
		return $stmt->execute();
	}



}




?>