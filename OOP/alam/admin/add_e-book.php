<?php

	ob_start();
	session_start();
	if($_SESSION['name']!='admin'){
		header('location:login.php');
	}
	include('../config.php');

?>
<?php
if(isset($_POST['form1'])) 
{
	
	try {
	
		
			

			$up_filename=$_FILES["books"]["name"];
			$file_basename=substr($up_filename,0,strripos($up_filename,'.')); //strip extention
			$file_ext=substr($up_filename,strripos($up_filename,'.')); //strip name
			//$f1=$new_id.$file_ext;
			$file_size=$_FILES['books']['size'];
			$new_size = $file_size/(1024); 
	
			if(($file_ext!='.pdf')&&($file_ext!='.doc')&&($file_ext!='.docx'))
			throw new Exception('Only pdf, doc and docx format file are allowed to upload.');
			move_uploaded_file($_FILES["books"]["tmp_name"],"../book/".$up_filename); 


		$statement=$db->prepare("insert into ebook(books,book_size) value(?,?)");
		$statement->execute(array($up_filename,$new_size));
		$success_message='Book has been successfully Uploaded';
			
	}
	
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
	
}

?>


<?php include'admin_includes/header.php';?>
<?php include'admin_includes/left_side.php';?>

<div class="col-xs-12 col-sm-12 col-md-4 col-lg-6"style="background:#F5F5F5;min-height:510px">
	<div class="panel panel-default"style="margin-left:0px;">
        <div class="panel-heading"style="padding:1px 15px">
              <h4 style="text-align:center;">Update Book</h4>
        </div>
         <div class="panel-body" style="overflow-y: scroll;height:450px;">
		<form action="" method="post" enctype="multipart/form-data">

			<?php 
				
			if(isset($error_message)){ echo $error_message; }
			if(isset($success_message)){ echo $success_message; }
				
				
			?>

			<table>
				<tr>
					<th><br><h4>Upload a Book</h4></th>
				</tr>
				<tr>
					<td><input type="file" name="books" ></td>
				</tr>
				
			
			<tr>
					<td><br><input type="submit" name="form1" value="Upload"></td>
			</tr>
		</table>

		</form>
		
				<br>
                </div>
            </div>
		
</div>
<?php include'admin_includes/right_side.php';?>
<?php include'admin_includes/footer.php';?>


	

		   
		   
		   
		   
		   

		
		
		
		
		
		



	

		   
		   
		   
		   
		   

		
		
		
		
		
		


