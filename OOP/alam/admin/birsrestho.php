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
                    	<a href="add_birsrestho.php" class="btn btn-success pull-right"> Add Birsrestho</a>
                    	<br><br>
                    	<h4 style="text-align:center;color:#4c0f36">List of Birsrestho</h4>
                    	<table class="table table-hover table-bordered">
                    		<thead>
                    			<th>SL No</th>
                    			<th>Photo</th>
                    			<th>Name</th>
                                   <th>District</th>
                                   <th>Rank</th>
                    			<th>Action</th>
                    		</thead>
                    		<tbody>
                                   <?php
                                             $i=0;
                                             $statement=$db->prepare("select * from birsrestho order by bid asc ");
                                             $statement->execute();
                                             $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                                             foreach ($result as $row)
                                              {
                                                  $i++;
                                        ?>
                    			
                    			<tr>
                    				<td><?php echo $i;?></td>
                    				<td><img src="../img/birsrestho/<?php echo $row['bphoto']?>"style="width:50px;height:50px"></td>
                    				<td><?php echo $row['bname']?></td>
                                        <td><?php echo $row['baddress']?></td>
                                        
                                        <td><?php echo $row['brank']?></td>
                                            
                                        <td>
                                             <a href="view_birsrestho.php?bid=<?php echo $row['bid'];?>">View</a>
                                             &nbsp;&nbsp;||&nbsp;&nbsp;
                    				     <a href="edit_birsrestho.php?bid=<?php echo $row['bid'];?>">Edit</a>
                    					&nbsp;&nbsp;||&nbsp;&nbsp;
                    					<a href="delete_birsrestho.php?bid=<?php echo $row['bid'];?>">Delete</a></td>
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
	

		   
		   
		   
		   
		   

		
		
		
		
		
		


