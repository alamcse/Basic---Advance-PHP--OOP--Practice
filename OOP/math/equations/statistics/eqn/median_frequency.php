<?php 
$pageName = "Formula";
include "../../../include/header.php"; 


class MedianFrequency{

	function errorCheck($number_of_input,$arr_input){

		$this->number_of_input=$number_of_input;
		$this->arr_input=$arr_input;

		for ($i=0; $i <$this->number_of_input ; $i++) { 
				
			if (is_numeric($this->arr_input[$i])) {
				$this->array_input[$i]=$this->arr_input[$i];
			}
			else{
				$this->wrong_arr_input[$i]=$this->arr_input[$i];
				}
		}

		if(isset($this->wrong_arr_input)){
			$this->wrong_arr_input=implode(' , ', (array)$this->wrong_arr_input);
			return $this->wrong_arr_input;
		}
		else{
			return $this->array_input;
		}

	}



	function compare($array_cf,$half_the_array_sum_f){
		if($array_cf>$half_the_array_sum_f){
			return true;
		}
		else{
			return false;
		}
	}
}


if(isset($_POST['send']))
{
	if(isset($_POST['value'])&&$_POST['value1'])
		{
			$x = $_POST['value'];
			$array_x = explode(",",$x);
			$f = $_POST['value1'];
			$array_f = explode(",",$f);

			$array_x = array_values(array_filter($array_x));
			$array_f = array_values(array_filter($array_f));

			//variable and initializations
			$the_result = 0.0;
			$the_array_sum_f = array_sum($array_f);



			$number_of_f=count($array_f);
			$number_of_x=count($array_x);
			$half_the_array_sum_f=$the_array_sum_f/2;


//===========error checking===============

		$errorChk_x = new MedianFrequency();

			$array_x= $errorChk_x->errorCheck($number_of_x,$array_x);
			if (gettype($array_x)=='string') {
				$wrong_arr_x=$array_x;
			}
			elseif (gettype($array_x)=='array') {
				$array_x=$array_x;
			}

		$errorChk_f = new MedianFrequency();

			$array_f= $errorChk_f->errorCheck($number_of_f,$array_f);
			if (gettype($array_f)=='string') {
				$wrong_arr_f=$array_f;
			}
			elseif (gettype($array_f)=='array') {
				$array_f=$array_f;
			}

//===========error checking ends===============

			$compare= new MedianFrequency();

			if($number_of_f==$number_of_x)
			{

				$array_cf[0]=$array_f[0];

				for($i=1;$i<$number_of_f;$i++)
				{
					$array_cf[$i]=$array_cf[$i-1]+$array_f[$i];
					$comresult=$compare->compare($array_cf[$i],$half_the_array_sum_f);
					if ($comresult==false){
					}
					else{
						break;
					}
					
				}

				$the_result= $i+1;

			}
			else
			{
				$_GLOBALS['var_freq_num']="Number of class intervals and frequency do not match.";
			}

			
		}

}

	
?>


<section>
<div class="col-md-9" id="main-content">
      <div class="panel panel-info">
      	        
                  <a class="btn btn-success btn-block" id="nolink"><strong>Median (Frequency distribution)(Incomplete)</strong></a>
                
        <div class="panel-body">


<!--=====================error show starts=======================-->

		<?php if (isset($_GLOBALS['var_freq_num'])) { ?>
			
			<div class="alert alert-danger">
	            <a href=# class=close data-dismiss="alert" aria-label="close">&times;</a><strong><?php echo $_GLOBALS['var_freq_num']; ?></strong>
	        </div>

		<?php } 

			 if (isset($wrong_arr_x)) { ?>
			
			<div class="alert alert-danger">
	            <a href=# class=close data-dismiss="alert" aria-label="close">&times;</a>Initial values of class interval:&nbsp&nbsp<strong><?php echo $wrong_arr_init; ?></strong>&nbsp&nbspnot valid.
	        </div>

		<?php } 

			 if (isset($wrong_arr_f)) { ?>
			
			<div class="alert alert-danger">
	            <a href=# class=close data-dismiss="alert" aria-label="close">&times;</a>Final values of class interval:&nbsp&nbsp<strong><?php echo $wrong_arr_fin; ?></strong>&nbsp&nbspnot valid.
	        </div>

		<?php } ?>

<!--=====================error show ends=======================-->


<div class="col-md-6">
	<form class = "bs-example bs-example-form" id="myForm" role = "form" action="" method="post">
		<div class = "input-group">
         	<span class ="input-group-addon"></span>
         	<input type ="text" class = "form-control" name="value" required placeholder="Variable" onkeypress="return CPOnlyAlphaNumeric(this);" 
			onkeyup="return CPOnlyAlphaNumeric(this);" value="<?php if(isset($_POST['value'])){echo $_POST['value'];} ?>">
      	</div><br>

      	<div class = "input-group">
         	<span class ="input-group-addon"></span>
         	<input type ="text" class = "form-control" name="value1" required placeholder="Frequency" onkeypress="return CPOnlyAlphaNumeric(this);" 
			onkeyup="return CPOnlyAlphaNumeric(this);" value="<?php if(isset($_POST['value1'])){echo $_POST['value1'];} ?>">
      	</div><br>

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
