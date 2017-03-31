<?php

	ob_start();
	session_start();
	if($_SESSION['name']!='admin'){
		header('location:login.php');
	}
	include('../config.php');

?>

<?php
if(!isset($_REQUEST['fid'])){
	header('location:fighters.php');
}
else{
	$fid=$_REQUEST['fid'];
}

?>

<?php
if(isset($_POST['form1'])) 
{
	
	try {
	
		
			if(empty($_POST['fname'])){
				throw new Exception('Fighters Name Can not be empty');
				
			}
			if(empty($_POST['fdistrict'])){
				throw new Exception('Fighters District Can not be empty');
				
			}
			if(empty($_POST['fdate_of_birth'])){
				throw new Exception('Fighters Date of Birth Can not be empty');
				
			}
			
			if(empty($_POST['fnational_id'])){
				throw new Exception('Fighters National Id Can not be empty');
				
			}
			if(empty($_POST['fighter_id'])){
				throw new Exception('Fighters Id Can not be empty');
				
			}
			if(empty($_POST['fsector'])){
				throw new Exception('Fighters Sector Can not be empty');
				
			}
			if(empty($_POST['fsector_commander'])){
				throw new Exception('Fighters Sector Commander Name Can not be empty');
				
			}
			
			if(empty($_POST['fdescription'])){
				throw new Exception('Fighters Description Can not be empty');
				
			}
			
			
			if(empty($_POST['fvideolink'])){
				throw new Exception('Fighters Video Can not be empty');
				
			}

			if(empty($_FILES["fphoto"]["name"])){

				
			$statement=$db->prepare("update fighters set fname=?, fdistrict=?,fnational_id=?, fighter_id=?,fdate_of_birth=?,fsector=?,fsector_commander=?,fdescription=?,fvideolink=? where fid=?");
			$statement->execute(array($_POST['fname'],$_POST['fdistrict'],$_POST['fdate_of_birth'],$_POST['fnational_id'],$_POST['fighter_id'],$_POST['fsector'],$_POST['fsector_commander'],$_POST['fdescription'],$_POST['fvideolink'],$fid));

			}

			else{

			$up_filename=$_FILES["fphoto"]["name"];
			$file_basename=substr($up_filename,0,strripos($up_filename,'.')); //strip extention
			$file_ext=substr($up_filename,strripos($up_filename,'.')); //strip name
			$f1=$fid.$file_ext;
				
			if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!='.gif'))
			throw new Exception('Only png,jpg,jpeg and gif format images are allowed to upload.');

			$statement=$db->prepare("select * from fighters where fid=?");
			$statement->execute(array($fid));
			$result=$statement->fetchAll(PDO::FETCH_ASSOC);
			foreach ($result as $row) 
			{
				$real_path="../img/fighters/".$row['fphoto'];
				unlink($real_path);

			}


			move_uploaded_file($_FILES["fphoto"]["tmp_name"],"../img/fighters/".$f1); 
				

			$statement=$db->prepare("update fighters set fname=?, fdistrict=?,fnational_id=?, fighter_id=?,fdate_of_birth=?,fsector=?,fsector_commander=?,fdescription=?,fphoto=?,fvideolink=? where fid=?");
			$statement->execute(array($_POST['fname'],$_POST['fdistrict'],$_POST['fdate_of_birth'],$_POST['fnational_id'],$_POST['fighter_id'],$_POST['fsector'],$_POST['fsector_commander'],$_POST['fdescription'],$f1,$_POST['fvideolink'],$fid));



			}

			$success_message='Fighters Information has been successfully updated';
			
		}
		
			catch(Exception $e) {
				$error_message = $e->getMessage();
		}
	
}

?>

<?php
			$statement=$db->prepare("select * from fighters where fid=?");
			$statement->execute(array($fid));
			$result=$statement->fetchAll(PDO::FETCH_ASSOC);
			foreach ($result as $row) {
				$fname=$row['fname'];
				$fdistrict=$row['fdistrict'];
				$fdate_of_birth=$row['fdate_of_birth'];
				$fnational_id=$row['fnational_id'];
				$fighter_id=$row['fighter_id'];
				$fsector=$row['fsector'];
				$fsector_commander=$row['fsector_commander'];
				$fdescription=$row['fdescription'];
				$fphoto=$row['fphoto'];
				$fvideolink=$row['fvideolink'];
				


						
			}

?>


<?php include'admin_includes/header.php';?>
<?php include'admin_includes/left_side.php';?>

<div class="col-xs-12 col-sm-12 col-md-4 col-lg-6"style="background:#F5F5F5;min-height:510px">
	<div class="panel panel-default"style="margin-left:0px;">
        <div class="panel-heading"style="padding:1px 15px">
              <h4 style="text-align:center;">Update Freedom Fighters Information</h4>
        </div>
         <div class="panel-body" style="overflow-y: scroll;height:450px;">
         	<?php 
				
				if(isset($error_message)){ echo $error_message; }
				if(isset($success_message)){ echo $success_message; }
				
				
			?>
		<form action="" method="post" enctype="multipart/form-data">

			

			<table>

				<tr>
					<th><h5>Freedom Fighter's Name:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="fname"value="<?php echo $fname?>"></td>
				</tr>
				<tr>
					<th><h5>District:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="fdistrict" value="<?php echo $fdistrict?>"></td>
				</tr>
				<tr>
					<th><h5>Fighters Date of Birth:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="fdate_of_birth" value="<?php echo $fdate_of_birth?>" ></td>
				</tr>
				<tr>
					<th><h5>Fighters National ID:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="fnational_id"value="<?php echo $fnational_id?>"></td>
				</tr>
				<tr>
					<th><h5>Fighters ID:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="fighter_id" value="<?php echo $fighter_id?>"></td>
				</tr>
				<tr>
					<th><h5>Select a Sector:</h5></th>
				</tr>
				<tr>
					<td> 
						<select name="fsector">
							<option value="">------------------</option>
							
							<?php  
								$statement=$db->prepare("select * from sectors order by sid asc");
								$statement->execute();
								$result=$statement->fetchAll(PDO::FETCH_ASSOC);
								foreach ($result as $row) 
								{
									if($row['sector_name']==$fsector){

										?><option value="<?php echo $row['sector_name']; ?>" selected> <?php echo $row['sector_name']; ?> </option> <?php
									}

									else{

									?><option value="<?php echo $row['sector_name']; ?>"> <?php echo $row['sector_name']; ?> </option><?php
									}

								}
								?>
							
						</select>
					</td>
				</tr>





				<tr>
					<th><h5>Sector's Commander Name:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="fsector_commander" value="<?php echo $fsector_commander?>"></td>
				</tr>
					
				<tr>
					<th><h5>Fighters Description</h5></th>
				</tr>
				<tr>
					<td>

					<textarea class="ckeditor" id="editor" name="fdescription"cls="30" rows="10"><?php echo $fdescription?> </textarea>
					</td>
				</tr>
				<tr>
					<td>Previous Photo Preview</td>
		
				</tr>
				<tr>
					<td><img src="../img/fighters/<?php echo $fphoto; ?>" alt="" width="30%"></td>
		
				</tr>
				<tr>
					<td>Fighters New Photo</td>
		
				</tr>
				<tr>
					<td><input type="file" name="fphoto" value="Upload"> </td>
				</tr>
				<tr>
					<th><h5>Video link:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="fvideolink" value="<?php echo $fvideolink?>" ></td>
				</tr>
					
				
				<tr>
						<td><input type="submit" name="form1" value="Save"></td>
				</tr>
		</table>

	</form>
		<script type="text/javascript">
				if ( typeof CKEDITOR == 'undefined' )
				{
					document.write(
						'<strong><span style="color: #ff0000">Error</span>: CKEditor not found</strong>.' +
						'This sample assumes that CKEditor (not included with CKFinder) is installed in' +
						'the "/ckeditor/" path. If you have it installed in a different place, just edit' +
						'this file, changing the wrong paths in the &lt;head&gt; (line 5) and the "BasePath"' +
						'value (line 32).' ) ;
				}
				else
				{
					var editor = CKEDITOR.replace( 'fdescription' );
					//editor.setData( '<p>Just click the <b>Image</b> or <b>Link</b> button, and then <b>&quot;Browse Server&quot;</b>.</p>' );
				}

				</script>
				<br>
		
        </div>
	</div>
		
</div>
<?php include'admin_includes/right_side.php';?>
<?php include'admin_includes/footer.php';?>
	

		   
		   
		   
		   
		   

		
		
		
		
		
		


