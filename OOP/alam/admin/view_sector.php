<?php

     ob_start();
     session_start();
     if($_SESSION['name']!='admin'){
          header('location:login.php');
     }
     include('../config.php');

?>


<?php

     if(isset($_REQUEST['sid']))
     {
          $sid=$_REQUEST['sid'];
     }
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

                     <?php
                          $i=0;
                          $statement=$db->prepare("select * from sectors where sid=? ");
                          $statement->execute(array($sid));
                          $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                         foreach($result as $row)
                         {
                              ?>


                     <h4 style="text-align:center;color:#4c0f36">Information of <?php echo $row['sector_name'];?></h4>

                     <h4 style="color:green">Description:</h4>
                     <?php echo $row['sector_description']; ?>

                     <?php
                         }
                     ?>
                    
						

					
                    </div>
                </div>
		
</div>
<?php include'admin_includes/right_side.php';?>
<?php include'admin_includes/footer.php';?>
	

		   
		   
		   
		   
		   

		
		
		
		
		
		


