<?php 


            spl_autoload_register(function($class){
              include "classes/".$class.".php";
            });
		
?>
<?php
	if(isset($_POST['form1']))
	{
	$post=new Post();
	$p1=$_post['post_name'];
	$p2=$_post['post_description'];
	$post->setPost($this->p1,$this->p2);
	$post->addPost();
	}

?>
<html>
<body>
			<form action="" method="post">
				
				<table>
					<tr>
						<td>Post Name</td>
						<td> <input type="text" name="post_name"></td>
					</tr>
					<tr>
						<td>Post Description</td>
						<td><input type="text" name="post_description"></td>
					</tr>
					
					<tr>
						<td></td>
						<td><input type="submit" name="form1" value="Submit"></td>
					</tr>
				</table>
			
			</form>
			<table>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td></td>
				</tr><tr>
					<td></td>
				</tr>
				<tr>
					<td></td>
				</tr>
			</table>
			
</body>
</html>