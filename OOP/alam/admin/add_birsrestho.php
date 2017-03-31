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
	
		
			if(empty($_POST['bname'])){
				throw new Exception('Birsrestho Name Can not be empty');
				
			}
			if(empty($_POST['baddress'])){
				throw new Exception('Birsrestho Address Can not be empty');
				
			}
			if(empty($_POST['bdate_of_birth'])){
				throw new Exception('Birsrestho Date of Birth Can not be empty');
				
			}
			
			if(empty($_POST['brank'])){
				throw new Exception('Birsrestho Rank Can not be empty');
				
			}
			if(empty($_POST['bsector'])){
				throw new Exception('Birsrestho Sector Can not be empty');
				
			}
			if(empty($_POST['bdescription'])){
				throw new Exception('Birsrestho Description Can not be empty');
				
			}
			
		

                              
            $statement=$db->prepare("select * from sectors where sid=? ");
            $statement->execute(array($_POST['bsector']));
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row)
            {
            	$bsector= $row['sector_name'];
            }

                                                  
                                             


		
			$statement=$db->prepare("show table status like 'birsrestho'");
			$statement->execute();
			$result=$statement->fetchAll();
			foreach($result as $row)
			$new_id=$row[10]; 
				
				
			$up_filename=$_FILES["bphoto"]["name"];
			$file_basename=substr($up_filename,0,strripos($up_filename,'.')); //strip extention
			$file_ext=substr($up_filename,strripos($up_filename,'.')); //strip name
			$f1=$new_id.$file_ext;
				
			if(($file_ext!='.png')&&($file_ext!='.jpg')&&($file_ext!='.jpeg')&&($file_ext!='.gif'))
			throw new Exception('Only png,jpg,jpeg and gif format images are allowed to upload.');
			move_uploaded_file($_FILES["bphoto"]["tmp_name"],"../img/birsrestho/".$f1); 



			$statement=$db->prepare("insert into birsrestho(bname,baddress,bdate_of_birth,bsector,brank,bdescription,bphoto)
				 value(?,?,?,?,?,?,?)");

			$statement->execute(array($_POST['bname'],$_POST['baddress'],$_POST['bdate_of_birth'],$bsector,$_POST['brank'],$_POST['bdescription'],$f1));

			$success_message='Birsrestho Information has been successfully inserted';
			
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
              <h4 style="text-align:center;">Add a Birsrestho Information</h4>
        </div>
         <div class="panel-body" style="overflow-y: scroll;height:450px;">
         	<?php 
				
				if(isset($error_message)){ echo $error_message; }
				if(isset($success_message)){ echo $success_message; }
				
				
			?>
		<form action="" method="post" enctype="multipart/form-data">

			

			<table>

				<tr>
					<th><h5>Birsrestho's Name:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="bname" ></td>
				</tr>
				<tr>
					<th><h5>Birsrestho District:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="baddress" ></td>
				</tr>
				<tr>
					<th><h5>Fighters Date of Birth:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="bdate_of_birth" ></td>
				</tr>
				<tr>
					<th><h5>Select a Sector:</h5></th>
				</tr>
				<tr>
					<td> 
						<select name="bsector">
							<option value="">------------------</option>
							
							<?php
							$i=0;
							$statement=$db->prepare("select * from sectors order by sector_name asc ");
							$statement->execute();
							$result=$statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
							?>
							<option value="<?php echo $row['sid']; ?>"><?php echo $row['sector_name']; ?></option>
							<?php
							}
							?>
							
						</select>
					</td>
				</tr>





				<tr>
					<th><h5>Birsrestho Rank:</h5></th>
				</tr>
				<tr>
					<td><input type="text" name="brank" ></td>
				</tr>
				<tr>
				
					<th><h5>Birsrestho Description</h5></th>
				</tr>
				<tr>
					<td>

					<textarea class="ckeditor" id="editor" name="bdescription"cls="30" rows="10"> </textarea>
					</td>
				</tr>
				<tr>
					<td>Birsrestho Image</td>
		
				</tr>
				<tr>
					<td><input type="file" name="bphoto" value"Upload"> </td>
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
					var editor = CKEDITOR.replace( 'bdescription' );
					//editor.setData( '<p>Just click the <b>Image</b> or <b>Link</b> button, and then <b>&quot;Browse Server&quot;</b>.</p>' );
				}

				</script>
				<br>
		
        </div>
	</div>
		
</div>
<?php include'admin_includes/right_side.php';?>
<?php include'admin_includes/footer.php';?>
	

		   
		   
		   
		   
		   

		
		
		
		
		
		


