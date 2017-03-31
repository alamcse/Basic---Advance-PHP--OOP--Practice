<?php

	ob_start();
	session_start();
	if($_SESSION['name']!='admin'){
		header('location:login.php');
	}
	include('../config.php');

?>


<?php include'admin_includes/header.php';?>
<?php include'admin_includes/left_side.php';?>

<div class="col-xs-6 col-sm-12 col-md-4 col-lg-6"style="background:#F5F5F5;min-height:510px">

			 <div class="panel panel-default"style="margin-left:0px;">
                    <div class="panel-heading"style="padding:1px 15px">
                        <h4 style="text-align:center;">Manage Upload Image</h4>
                    </div>
                    <div class="panel-body" style="overflow-y: scroll;height:450px;">
                    	
                    	<br><br>
                    	
                    	<table class="table table-hover table-bordered"style="text-align:center">

                    		<tbody>
                                  <tr>
                                   <td><a class="btn" href="insert_image.php">Insert Image </a></td>
                                   <td><a class="btn" href="view_image.php">View Image</a></td>
                                  </tr>
                                  <tr>
                                   <td><a class="btn" href="insert_slider_image.php">Insert Slider Image </a></td>
                                   <td><a class="btn" href="view_slider_image.php">View Image</a></td>
                                  </tr>
                                  <tr>
                                   <td><a class="btn" href="insert_banner_image.php">Insert Banner Image </a></td>
                                   <td><a class="btn" href="view_banner_image.php">View Image</a></td>
                                  </tr>
                                  <tr>
                                   <td><a class="btn" href="insert_logo_image.php">Insert Logo Image </a></td>
                                   <td><a class="btn" href="view_logo_image.php">View Image</a></td>
                                  </tr>

                    			
                    		</tbody>
                    	</table>
						

					
                    </div>
                </div>
		
</div>
<?php include'admin_includes/right_side.php';?>
<?php include'admin_includes/footer.php';?>
	

		   
		   
		   
		   
		   

		
		
		
		
		
		


