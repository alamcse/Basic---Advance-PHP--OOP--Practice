<?php 
$pageName = "Formula";
include "../../../include/header.php"; 

?>

<section>
<div class="col-md-9" id="main-content">
      <div class="panel panel-info">
      	        
                  <a class="btn btn-success btn-block" id="nolink"><strong>Mean</strong></a>
                
        <div class="panel-body">




<?php
		if(isset($_POST['send']))

			{
				if(isset($_POST['value']))
					{
						$str = $_POST['value'];
						$a = explode(",",$str);
						$a = array_values(array_filter($a));

						$number_of_elements = count($a); //count the number of elements

						for ($i=0; $i <$number_of_elements ; $i++) { 
							
							if (is_numeric($a[$i])) {
								$array_x[$i]=$a[$i];
							}
							else{
								$wrong_arr_x[$i]=$a[$i];
							}


						}
						if (isset($wrong_arr_x)) {
							$wrong_arr_x=implode(' , ', $wrong_arr_x);
							echo "<div class=\"alert alert-danger\">
			                                <a href=# class=close data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Number:&nbsp&nbsp<strong>".$wrong_arr_x.
			                                "</strong>&nbsp&nbspnot valid.</div>";

						}

						if(empty($wrong_arr_x))
						{

						  //variable and initializations
							$the_result = 0.0;
							$the_array_sum = array_sum($array_x); //sum the elements


							//calculate the mean
							$the_result = $the_array_sum / $number_of_elements;
						

						}





					}
		}

?> 


<div class="col-md-6">
	<form class = "bs-example bs-example-form" id="myForm" role = "form" action="equations/statistics/eqn/mean.php" method="post">
      <div class = "input-group">
         <span class ="input-group-addon"></span>
         <input type ="text" class = "form-control" name="value" required placeholder="Numbers" onkeypress="return CPOnlyAlphaNumeric(this);" 
onkeyup="return CPOnlyAlphaNumeric(this);" value="<?php if(isset($_POST['value'])){echo $_POST['value'];} ?>">
      </div>
		
      <br>

         <button  type="submit" class ="btn btn-info" name="send">Calculate</button>&nbsp&nbsp&nbsp
         <input class ="btn btn-info" onclick="clear_form_elements(this.form)" type="button" value="Clear all" /> 

   </form>
 </div>

<div class="col-md-6">

<?php if(isset($the_result)){

echo "<br><div class=\"alert alert-success\">
      <a href=# class=close data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Result:&nbsp&nbsp".$the_result.
                                "</strong></div>";



 } ?>
</div>


        
          </div> 
      </div>
</div>


</section>




  <!-- ========================sidebar starts===========================-->
  
<?php 

include "../../../include/sidebar.php"; 

?>

  <!--end of sidebars-->



 <!--start of footer-->

<?php 

include "../../../include/footer.php"; 

?>

  </body>

</html>
