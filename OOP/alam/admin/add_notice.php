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
	
		
		if(empty($_POST['notice_title'])){
			throw new Exception('Notice Title Can not be empty');
			
		}
		if(empty($_POST['notice_description'])){
			throw new Exception('Notice Description Can not be empty');
			
		}

		$statement=$db->prepare("select * from notice where notice_title=?");
		$statement->execute(array($_POST['notice_title']));

		$total=$statement->rowCount();
		if($total>0){
			throw new Exception('Notice Title is already exist');
			
		}

		$ndate=date('Y-m-d');
		$ntime=time(date('Y-m-d'));

		$statement=$db->prepare("insert into notice(notice_title,notice_description,ntime,ndate) value(?,?,?,?)");
		$statement->execute(array($_POST['notice_title'],$_POST['notice_description'],$ntime,$ndate));
		$success_message='Notice has been successfully inserted';
			
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
              <h4 style="text-align:center;">Update Notice</h4>
        </div>
         <div class="panel-body" style="overflow-y: scroll;height:450px;">
		<form method="post" action="">

			<?php 
				
			if(isset($error_message)){ echo $error_message; }
			if(isset($success_message)){ echo $success_message; }
				
				
			?>

			<table>
				<tr>
					<th><h4>Notice Title:</h4></th>
				</tr>
				<tr>
					<td><input type="text" name="notice_title" ></td>
				</tr>
				<tr>
					<th><h4>Notice Description</h4></th>
				</tr>
				<tr>
					<td>

				<textarea class="ckeditor" id="editor" name="notice_description"cls="30" rows="10"> </textarea>
			</td>
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
					var editor = CKEDITOR.replace( 'notice_description' );
					//editor.setData( '<p>Just click the <b>Image</b> or <b>Link</b> button, and then <b>&quot;Browse Server&quot;</b>.</p>' );
				}

				</script>
				<br>
                </div>
            </div>
		
</div>
<?php include'admin_includes/right_side.php';?>
<?php include'admin_includes/footer.php';?>


	

		   
		   
		   
		   
		   

		
		
		
		
		
		



	

		   
		   
		   
		   
		   

		
		
		
		
		
		


