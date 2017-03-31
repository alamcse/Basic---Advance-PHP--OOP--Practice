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
                        <h4 style="text-align:center;">Books</h4>
                    </div>
                    <div class="panel-body" style="overflow-y: scroll;height:450px;">
                    	<a href="add_e-book.php" class="btn btn-success pull-right"> Add a Book</a>
                    	<br><br>
                    	<h4 style="text-align:center;color:#4c0f36">List of Books</h4>
                    	<table class="table table-hover table-bordered">
                    		<thead>
                    			<th>SL No</th>
                    			<th>Books</th>
                    			<th>Book Title</th>
                    			<th>Action</th>
                    		</thead>
                    		<tbody>
                    			<?php
									$i=0;
									$statement=$db->prepare("select * from ebook order by book_id desc ");
									$statement->execute();
									$result=$statement->fetchAll(PDO::FETCH_ASSOC);
									foreach ($result as $row)
									 {
										$i++;
								?>
                    			<tr>
                    				<td><?php echo $i; ?></td>
                    				<td><?php echo $row['books'];?></td>
                                        <td><?php echo $row['book_size']." KB";?></td>

                    				<td>
                                             <a href="view_e-book.php?nid=<?php echo $row['book_id'];?>"> View</a>
                                             |
                    				      <a href="edit_e-book.php?nid=<?php echo $row['book_id'];?>">Edit</a>
                    					|
                    					<a href="delete_e-book.php?nid=<?php echo $row['book_id'];?>">Delete</a>
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
	

		   
		   
		   
		   
		   

		
		
		
		
		
		


