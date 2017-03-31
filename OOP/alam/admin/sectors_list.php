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
                        <h4 style="text-align:center;">Sectors</h4>
                    </div>
                    <div class="panel-body" style="overflow-y: scroll;height:450px;">
                    	<a href="add_sector.php" class="btn btn-success pull-right"> Add a Sector</a>
                    	<br><br>
                    	<h4 style="text-align:center;color:#4c0f36">List of Sectors</h4>
                    	<table class="table table-hover table-bordered">
                    		<thead>
                    			<th>SL No</th>
                    			<th>Sector Name</th>
                    			<th>View Sector</th>
                    			<th>Action</th>
                    		</thead>
                    		<tbody>
                    			<?php
									$i=0;
									$statement=$db->prepare("select * from sectors order by sector_name asc ");
									$statement->execute();
									$result=$statement->fetchAll(PDO::FETCH_ASSOC);
									foreach ($result as $row)
									 {
										$i++;
								?>
                    			<tr>
                    				<td><?php echo $i; ?></td>
                    				<td><?php echo $row['sector_name'];?></td>
                    				<td><a href="view_sector.php?sid=<?php echo $row['sid'];?>">View <?php echo $row['sector_name'];?></a></td>
                    				<td><a href="edit_sector.php?sid=<?php echo $row['sid'];?>">Edit</a>
                    					&nbsp;&nbsp;||&nbsp;&nbsp;
                    					<a href="delete_sector.php?sid=<?php echo $row['sid'];?>">Delete</a></td>
                    			</tr>
                    			<?php
                    				}
                    			?>
                    			
                    		</tbody>
                    	</table>
						

					
                    </div>
                </div>
		
</div>
<?php include'admin_includes/right_side.php';?>
<?php include'admin_includes/footer.php';?>
	

		   
		   
		   
		   
		   

		
		
		
		
		
		


