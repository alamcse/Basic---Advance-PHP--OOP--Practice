<?php

     ob_start();
     session_start();
     if($_SESSION['name']!='admin'){
          header('location:login.php');
     }
     include('../config.php');

?>


<?php

     if(isset($_REQUEST['fid']))
     {
          $fid=$_REQUEST['fid'];
     }
?>

<?php include'admin_includes/header.php';?>
<?php include'admin_includes/left_side.php';?>

 

            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">

                <div class="panel" style="min-height:500px;overflow-y: scroll;height:120px;">
                  <?php
                      $statement=$db->prepare("select * from fighters where fid=? ");
                      $statement->execute(array($fid));
                      $result=$statement->fetchAll(PDO::FETCH_ASSOC);
                      foreach ($result as $row)
                      {
                      
                      ?>
                    <div class="panel-heading"style="padding:1px 15px ">
                        <h4 style="text-align:center;">View Fighters <?php echo $row['fname']?> Details</h4>
                        <hr>
                    </div>
                    <div class="panel-body">
            <div class="row">
              <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
              <p>
                <h5><b>Name:</b><?php echo $row['fname']?></h5>
                <h5><b>District:</b><?php echo $row['fdistrict']?></h5>
                <h5><b>Date of Birth:</b><?php echo $row['fdate_of_birth']?></h5>
                <h5><b>Fighters National ID:</b><?php echo $row['fnational_id']?></h5>
                <h5><b>Fighters ID:</b><?php echo $row['fighter_id']?></h5>
                <h5><b>Sector No:</b><?php echo $row['fsector']?></h5>
                <h5><b>Sector Commander:</b><?php echo $row['fsector_commander']?></h5>
                
              </p>
              
              </div>
              <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <img src="../img/fighters/<?php echo $row['fphoto']?>" style="width:90%; height:60%;float:right">
              </div>
            </div>
            <hr>
            
                <?php echo $row['fdescription']?>
            
            </br>
            <hr>
            <h4><b>Dr. Ashraf Hossain's Video</b></h4>
            <br/>
            <div class="row">
              <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="<?php echo $row['fvideolink']?>" width="300" height="200" allowfullscreen=""></iframe>
                </div>
              </div>
              <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
              <p>
                <h5><b>Title:</b>Video of Dr. Ashraf Hossain </h5>
                <h5><b>Size:</b>15MB</h5>
                <h5><b>time:</b>10 Minutes</h5>
                <h5><b>Views:</b>1000</h5>
              </p>
              <a class="btn btn-small btn-success">Download</a>
              
              </div>
              
            </div>
            
        
                    </div> 

                    <?php
                    }
                  ?> 
                </div>
            </div>
          
<?php include'admin_includes/right_side.php';?>
<?php include'admin_includes/footer.php';?>