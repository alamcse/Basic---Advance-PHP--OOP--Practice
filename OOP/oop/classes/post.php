<?php
class Post{
	private $table='post';
	private $post_name;
	private $post_description;
	


public function setPost($pname,$pdescription){
	$this->post_name=$pname;
	$this->post_description=$pdescription;
	
}

public function addPost(){
	$sql="insert into $this->table(post_title,post_description) value(:post_name,:post_description)";
	$statement=DB::prepare($sql);
	$statement->bindParam(':post_name',$this->post_name,':post_description',$this->post_description);
	$statement->execute();
	return $statement->fetchAll();
	
	
}
public function viewPost(){
	$sql="select * from $this->table";
	$statement=DB::prepare($sql);
	$statement->execute();
	return $statement->fetchAll();

}
}

?>