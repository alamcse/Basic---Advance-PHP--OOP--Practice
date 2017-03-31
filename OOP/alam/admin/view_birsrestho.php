<?php

     ob_start();
     session_start();
     if($_SESSION['name']!='admin'){
          header('location:login.php');
     }
     include('../config.php');

?>


<?php

     if(isset($_REQUEST['bid']))
     {
          $bid=$_REQUEST['bid'];
     }
?>

<?php include'admin_includes/header.php';?>
<?php include'admin_includes/left_side.php';?>



            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">

                <div class="panel" style="min-height:500px;overflow-y: scroll;height:120px;">
                   <?php
                      $statement=$db->prepare("select * from birsrestho where bid=? ");
                      $statement->execute(array($bid));
                      $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                      foreach ($result as $row)
                      {
                      
                      ?>
                    <div class="panel-heading"style="padding:1px 15px ">
                        <h4 style="text-align:center;">View Birsrestho <?php echo $row['bname']?> Details</h4>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                <p>
                                  <h5><b>Name:</b><?php echo $row['bname']?></h5>
                                  <h5><b>District:</b><?php echo $row['baddress']?></h5>
                                  <h5><b>Date of Birth:</b><?php echo $row['bdate_of_birth']?></h5>
                                  <h5><b>Rank:</b><?php echo $row['brank']?></h5>
                                  <h5><b>Sector No:</b><?php echo $row['bsector']?></h5>
                                  
                                 </p>
                            
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                               <img src="../img/birsrestho/<?php echo $row['bphoto']?>" style="width:90%; height:60%;float:right">
                            </div>
                        </div>
                        <hr>
                          
                        <?php echo $row['bdescription']?>
                
                    
              
                    </div>
                    <?php
                   }
                   ?>
            
        
              </div>  
          </div>
          
<?php include'admin_includes/right_side.php';?>
<?php include'admin_includes/footer.php';?>