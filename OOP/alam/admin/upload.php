<?php 
	include'admin_includes/header.php';
 	include'admin_includes/left_side.php';
 	include '../config.php';
?>

<div class="col-xs-6 col-sm-12 col-md-4 col-lg-6"style="background:#F5F5F5;min-height:180px">

<?php 
	if (isset($_POST['deed_upload'])) {
		try {
			$file 		= $_FILES['file']['name'];
		    $file_loc 	= $_FILES['file']['tmp_name'];
			$file_size 	= $_FILES['file']['size'];
			$folder		= "uploads/deed/";
			$file_ext	= end(explode('.', $file));
			// new file size in KB
			$new_size = $file_size/(1024*1024);  
			// new file size in KB

			if (($file_ext != 'pdf') && ($file_ext != 'doc') && ($file_ext != 'docx')) {
				throw new Exception("File must be pdf, doc or docx.");
			}
			// Check if file already exists
			/*if (file_exists($file)) {
				throw new Exception("Sorry, file already exists.");
    			$uploadOk = 0;
			}*/
			
			move_uploaded_file($file_loc,$folder.$file);
			$result	=	mysql_query("insert into tbl_deed(file,size) values('$file','$new_size')") or die(mysql_error());

			$success_message='File has been uploaded successfully.';


		} catch (Exception $e) {
			$error_message = $e->getMessage();
		}
	}
 ?>
<h3>Upload Deed</h3>

<?php 
	if (isset($error_message)) { echo $error_message."</br></br>"; } 
	if (isset($success_message)) { echo $success_message."</br></br>"; } 
?>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="file" name="file"  style="display: inline;"/>
		<button type="submit" name="deed_upload" style="width: 75px; height: 25px; cursor: pointer;">
			Upload
		</button>
	</form>
    <br /><br />

</div>
<?php include'admin_includes/right_side.php';?>
<?php include'admin_includes/footer.php';?>