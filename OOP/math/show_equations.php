<?php 
$pageName = "Formula";
include "include/header.php"; 
                  
$category = $_GET['category'];
$eqn= new Equations();

?>

  <!-- =========================main content starts=======================-->


<section>
<div class="col-md-9" id="main-content">
      <div class="panel panel-info">
                    <a class="btn btn-success btn-block" style="text-align:center;" id="nolink"><strong><?php echo ucwords($category); ?>&nbspEquations</strong></a>

        <div class="panel-body">
        <table class="table" id="eqn_table">
                <tbody>
                    <tr>
                      	<?php 
                        $eqn->setEqnCategories($category);
                      	$i=0;
                      	foreach ($eqn->readEquations() as $key => $value) {
                      	$i++;
                      	?>        
			                  <td class="col-md-6"> 
                        <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>&nbsp&nbsp<?php echo $value[1]; ?><a href="#" class="mybutton darkred pull-right"><div class="light"></div>Details</a>
                    		    <a href="<?php echo $value[3]; ?>" class="mybutton purple pull-right"><div class="light"></div>Calculate</a>
                        </td>		

                  			<?php
                        if($i%2==0){

                        echo "</tr>";
                          	}
                      	}
                        ?>

                </tbody>
            </table>
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
