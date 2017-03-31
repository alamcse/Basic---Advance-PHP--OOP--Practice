<?php 
$pageName = "Home";
include "include/header.php";

?>

        

  <!-- =========================main content starts=======================-->
<section>
<div class="col-md-9">
  <div class="panel panel-info">
        <div class="btn-group btn-group-justified">
                 <a class="btn btn-danger" id="nolink"></a>
                  <a class="btn btn-success" id="nolink"></a>
                </div>
        <div class="panel-body">

<?php 

        $operarors = array( '+', '-', '*' );
        $operator = $operarors[rand(0,2)];
        $leftop = rand(0,10);
        $rightop = rand(0,10);

        echo "the math: $leftop $operator $rightop = ??";
?>


        </div>
  </div>
</div>
</section>

  <!--end of main content-->

<?php 

include "include/sidebar.php";  

?>
  <!--end of sidebars-->

 <?php 

include "include/footer.php"; 

?>


 <!--start of footer-->






  </body>


</html>
