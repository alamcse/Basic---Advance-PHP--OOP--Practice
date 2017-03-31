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
                        <h4 style="text-align:center;">Notices</h4>
                    </div>
                    <div class="panel-body" style="overflow-y: scroll;height:450px;">
                    	<a href="add_notice.php" class="btn btn-success pull-right"> Add a Notice</a>
                    	<br><br>
                    	<h4 style="text-align:center;color:#4c0f36">List of Notices</h4>
                    	<table class="table table-hover table-bordered">
                    		<thead>
                    			<th>SL No</th>
                    			<th>Notice Title</th>
                    			<th>Time-Date</th>
                    			<th>Action</th>
                    		</thead>
                    		<tbody>
                    			<?php
									$i=0;
									$statement=$db->prepare("select * from notice order by nid desc ");
									$statement->execute();
									$result=$statement->fetchAll(PDO::FETCH_ASSOC);
									foreach ($result as $row)
									 {
										$i++;
								?>
                    			<tr>
                    				<td><?php echo $i; ?></td>
                    				<td><?php echo $row['notice_title'];?></td>
                                        <td><?php echo $row['ndate'];?></td>

                    				<td>
                                             <a href="view_notice.php?nid=<?php echo $row['nid'];?>"> View</a>
                                             |
                    				      <a href="edit_notice.php?nid=<?php echo $row['nid'];?>">Edit</a>
                    					|
                    					<a href="delete_notice.php?nid=<?php echo $row['nid'];?>">Delete</a>
                                        </td>
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
	

		   
		   
		   
		   
		   

		
		
		
		
		
		


