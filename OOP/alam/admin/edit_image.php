<?php

	ob_start();
	session_start();
	if($_SESSION['name']!='admin'){
		header('location:login.php');
	}
	include('../config.php');

?>

<?php
if(!isset($_REQUEST['id'])){
	header('location:image.php');
}
else{
	$id=$_REQUEST['id'];
}

?>

<?php
if(isset($_POST['form1'])) 
{
	
	try {
	
		
			if(empty($_POST['image_title'])){
				throw new Exception('Image Title Can not be empty');
				
			}
			if(empty($_POST['image_caption'])){
				throw new Exception('Image Caption Can not be empty');
				
			}
			

			if(empty($_FILES["image"]["name"])){

				
			$statement=$db->prepare("update tbl_image set image_title=?,image_caption=? where image_id=?");
			$statement->execute(array($_POST['image_title'],$_POST['image_caption'],$id));

			}

			else{

			$up_filename=$_FILES["image"]["name"];
			$file_basename=substr($up_filename,0,strripos($up_filename,'.')); //strip extention
			$file_ext=substr($up_filename,strripos($up_filename,'.')); //strip name
			$f1=$id.$file_ext;
				
			if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!='.gif'))
			throw new Exception('Only png,jpg,jpeg and gif format images are allowed to upload.');

			$statement=$db->prepare("select * from tbl_image where image_id=?");
			$statement->execute(array($id));
			$result=$statement->fetchAll(PDO::FETCH_ASSOC);
			foreach ($result as $row) 
			{
				$real_path="../img/upload/".$row['image'];
				unlink($real_path);

			}


			move_uploaded_file($_FILES["image"]["tmp_name"],"../img/upload/".$f1); 
				

			$statement=$db->prepare("update tbl_image set image_title=?,image_caption=?,image=? where image_id=?");
			$statement->execute(array($_POST['image_title'],$_POST['image_caption'],$f1,$id));



			}

			$success_message='Image has been successfully updated';
			
		}
		
			catch(Exception $e) {
				$error_message = $e->getMessage();
		}
	
}

?>

<?php
			$statement=$db->prepare("select * from tbl_image where image_id=?");
			$statement->execute(array($id));
			$result=$statement->fetchAll(PDO::FETCH_ASSOC);
			foreach ($result as $row) {
				$image_title=$row['image_title'];
				$image_caption=$row['image_caption'];
				$image=$row['image'];
						
			}

?>


<?php include'admin_includes/header.php';?>
<?php include'admin_includes/left_side.php';?>

<div class="col-xs-12 col-sm-12 col-md-4 col-lg-6"style="background:#F5F5F5;min-height:510px">
	<div class="panel panel-default"style="margin-left:0px;">
        <div class="panel-heading"style="padding:1px 15px">
              <h4 style="text-align:center;">Update Birsrestho Information</h4>
        </div>
         <div class="panel-body" style="overflow-y: scroll;height:450px;">
         	<?php 
				
				if(isset($error_message)){ echo $error_message; }
				if(isset($success_message)){ echo $success_message; }
				
				
			?>
		<form action="" method="post" enctype="multipart/form-data">

			

			<table>

				<tr>
					<th><h5>Image Title:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="image_title"value="<?php echo $image_title?>"></td>
				</tr>
				<tr>
					<th><h5>Image Caption:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="image_caption"value="<?php echo $image_caption?>"></td>
				</tr>
				
				<tr>
					<td>Previous Photo Preview</td>
		
				</tr>
				<tr>
					<td><img src="../img/upload/<?php echo $image; ?>" alt="" width="30%"></td>
		
				</tr>
				<tr>
					<td>Insert a New Image</td>
		
				</tr>
				<tr>
					<td><input type="file" name="image" value="Upload"> </td>
				</tr>
					
				<tr>
						<td><input type="submit" name="form1" value="Save"></td>
				</tr>
		</table>

	</form>
		
		
        </div>
	</div>
		
</div>
<?php include'admin_includes/right_side.php';?>
<?php include'admin_includes/footer.php';?>
	