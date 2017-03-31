<?php 
$pageName = "Formula";
include "include/header.php";

?>

  <!-- =========================main content starts=======================-->
<section>
<div class="col-md-9" id="main-content">
  <a class="btn btn-info btn-block" style="text-align:center;border-radius:20px 0px 20px 0px" id="nolink"><strong>Category of formula</strong></a>
      <div class="panel panel-primary" style="border-radius:20px 0px 20px 0px">
                    
        <div class="panel-body">
                        <?php 
                        $eqn= new Equations();
                        $i=0;
                        foreach ($eqn->readEqnCategories() as $key => $value) {
                        $i++;
                        ?>        
                        
            <div class="col-md-3"><ul class="list-type4">
              <?php 
              $cat=$value["category"];
              $space_cat = str_replace(' ', '%20', $cat);

              echo "<a class=categorylist href=show_equations.php?category=";echo $space_cat;echo ">"; ?>

              <li><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>&nbsp&nbsp<?php echo ucwords($value["category"]); ?></li></a></ul></div>
   
                        <?php
                        }
                        ?>
          </div> 
      </div>
</div>
</section>
  <!--end of main content-->

  <!-- ========================sidebar starts===========================-->

<?php 

include "include/sidebar.php"; 

?>

  <!--end of sidebars-->



 <!--start of footer-->

<?php 

include "include/footer.php"; 

?>

  </body>

</html>
