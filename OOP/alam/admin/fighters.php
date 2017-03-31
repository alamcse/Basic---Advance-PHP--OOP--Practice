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
                        <h4 style="text-align:center;">Fighters</h4>
                    </div>
                    <div class="panel-body" style="overflow-y: scroll;height:450px;">
                    	<a href="add_fighters.php" class="btn btn-success pull-right"> Add Fighters</a>
                    	<br><br>
                    	<h4 style="text-align:center;color:#4c0f36">List of Freedom Fighters</h4>
                    	<table class="table table-hover table-bordered">
                    		<thead>
                    			<th>SL No</th>
                    			<th>Photo</th>
                    			<th>Name</th>
                                   <th>District</th>
                                   <th>Sectors</th>
                    			<th>Action</th>
                    		</thead>
                    		<tbody>
                                   <?php
                                             $i=0;
                                             $statement=$db->prepare("select * from fighters order by fid asc ");
                                             $statement->execute();
                                             $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                                             foreach ($result as $row)
                                              {
                                                  $i++;
                                        ?>
                    			
                    			<tr>
                    				<td><?php echo $i;?></td>
                    				<td><img src="../img/fighters/<?php echo $row['fphoto']?>"style="width:50px;height:50px"></td>
                    				<td><?php echo $row['fname']?></td>
                                        <td><?php echo $row['fdistrict']?></td>
                                        
                                        <td><?php echo $row['fsector']?></td>
                                            
                                        <td>
                                             <a href="view_fighter.php?fid=<?php echo $row['fid'];?>">View</a>
                                             &nbsp;&nbsp;||&nbsp;&nbsp;
                    				     <a href="edit_fighter.php?fid=<?php echo $row['fid'];?>">Edit</a>
                    					&nbsp;&nbsp;||&nbsp;&nbsp;
                    					<a href="delete_fighter.php?fid=<?php echo $row['fid'];?>">Delete</a></td>
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
	

		   
		   
		   
		   
		   

		
		
		
		
		
		


