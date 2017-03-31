<?php 
$pageName = "Formula";
include "../../../include/header.php"; 

//calculation

			class ArithmeticMeanClass{
				private $number_of_input;
				private $arr;
				private $array;
				private $wrong_arr;
				private $midpoint;
				private $array_sum_frequency;
				private $array_sum_fx;
				private $the_result = 0.0;

				function errorCheck($number_of_input,$arr){

					$this->number_of_input=$number_of_input;
					$this->arr=$arr;

					for ($i=0; $i <$this->number_of_input ; $i++) { 
						
						if (is_numeric($this->arr[$i])) {
							$this->array[$i]=$this->arr[$i];
						}
						else{
							$this->wrong_arr[$i]=$this->arr[$i];
						}
					}

					if(isset($this->wrong_arr)){	
						$this->wrong_arr=implode(' , ', (array)$this->wrong_arr);
						return $this->wrong_arr;
					}
					else{
						return $this->array;
					}				
				}

				function calculate($array_initial, $array_final, $array_frequency){

					$this->midpoint = array_map(function($x, $y) { return (($x+$y)/2); },
		                  $array_initial , $array_final);
					$fx = array_map(function($m, $n) { return ($m*$n); },
		                  $array_frequency , $this->midpoint);
				
		  			$this->array_sum_frequency = array_sum($array_frequency);
		  			$this->array_sum_fx = array_sum($fx);


					return $this->the_result = $this->array_sum_fx/$this->array_sum_frequency;
				}

			}



if(isset($_POST['send'])){

	if(isset($_POST['value'])&&$_POST['value1']&&$_POST['value2']){

			//variable and initializations

			$initial = $_POST['value'];
			$array_init = explode(",",$initial);
			$final = $_POST['value1'];
			$array_fin = explode(",",$final);
			$frequency = $_POST['value2'];
			$array_freq = explode(",",$frequency);
			$array_init = array_values(array_filter($array_init));
			$array_fin = array_values(array_filter($array_fin));
			$array_freq = array_values(array_filter($array_freq));


			//count

			$number_of_initial=count($array_init);
			$number_of_final=count($array_fin);
			$number_of_frequency=count($array_freq);



			
//===========error checking===============

		$errorChk_init = new ArithmeticMeanClass;

			$array_init= $errorChk_init->errorCheck($number_of_initial,$array_init);
			if (gettype($array_init)=='string') {
				$wrong_arr_init=$array_init;
			}
			elseif (gettype($array_init)=='array') {
				$array_initial=$array_init;
			}

		$errorChk_fin = new ArithmeticMeanClass;

			$array_fin= $errorChk_fin->errorCheck($number_of_final,$array_fin);
			if (gettype($array_fin)=='string') {
				$wrong_arr_fin=$array_fin;
			}
			elseif (gettype($array_init)=='array') {
				$array_final=$array_fin;
			}

		$errorChk_freq = new ArithmeticMeanClass;

			$array_freq= $errorChk_freq->errorCheck($number_of_frequency,$array_freq);
			if (gettype($array_freq)=='string') {
				$wrong_arr_freq=$array_freq;
			}
			elseif (gettype($array_freq)=='array') {
				$array_frequency=$array_freq;
			}


			//calculate the mean		


			if($number_of_initial==$number_of_final&&$number_of_final==$number_of_frequency&& empty($wrong_arr_init) && empty($wrong_arr_fin)&& empty($wrong_arr_freq)){

				$getresult= new ArithmeticMeanClass();
				$the_result= $getresult->calculate($array_initial, $array_final, $array_frequency);
			}
			else{

				if(empty($wrong_arr_init)&&empty($wrong_arr_fin)&&empty($wrong_arr_freq)){

					$_GLOBALS['var_freq_num']="Number of class intervals and frequency do not match.";
				}
				else{
					
				}
			}
	}

}

?> 

<section>
<div class="col-md-9" id="main-content">
      <div class="panel panel-info">
                  <a class="btn btn-success btn-block" id="nolink"><strong>Arithmatic mean (Class interval)</strong></a>
        <div class="panel-body">


<!--=====================error show starts=======================-->

		<?php if (isset($_GLOBALS['var_freq_num'])) { ?>
			
			<div class="alert alert-danger">
	            <a href=# class=close data-dismiss="alert" aria-label="close">&times;</a><strong><?php echo $_GLOBALS['var_freq_num']; ?></strong>
	        </div>

		<?php } 

			 if (isset($wrong_arr_init)) { ?>
			
			<div class="alert alert-danger">
	            <a href=# class=close data-dismiss="alert" aria-label="close">&times;</a>Initial values of class interval:&nbsp&nbsp<strong><?php echo $wrong_arr_init; ?></strong>&nbsp&nbspnot valid.
	        </div>

		<?php } 

			 if (isset($wrong_arr_fin)) { ?>
			
			<div class="alert alert-danger">
	            <a href=# class=close data-dismiss="alert" aria-label="close">&times;</a>Final values of class interval:&nbsp&nbsp<strong><?php echo $wrong_arr_fin; ?></strong>&nbsp&nbspnot valid.
	        </div>

		<?php } 

			 if (isset($wrong_arr_freq)) { ?>
			
			<div class="alert alert-danger">
	            <a href=# class=close data-dismiss="alert" aria-label="close">&times;</a>Frequency:&nbsp&nbsp<strong><?php echo $wrong_arr_freq; ?></strong>&nbsp&nbspnot valid.
	        </div>

		<?php }	?>

<!--=====================error show ends=======================-->


	<div class="col-md-6">
		<form class = "bs-example bs-example-form" id="myForm" role = "form" action="" method="post">
			<div class = "input-group">
			    <span class ="input-group-addon"></span>
			    <input type ="text" class = "form-control" name="value" required placeholder="Initial values of class interval" onkeypress="return CPOnlyAlphaNumeric(this);" 
				onkeyup="return CPOnlyAlphaNumeric(this);" value="<?php if(isset($_POST['value'])){echo $_POST['value'];} ?>">
			</div>

			<br>

      		<div class = "input-group">
      			<span class = "input-group-addon"></span>
        		<input type = "text" class="form-control" name="value1" required placeholder="Final values of class interval" onkeypress="return CPOnlyAlphaNumeric(this);" 
				onkeyup="return CPOnlyAlphaNumeric(this);" value="<?php if(isset($_POST['value1'])){echo $_POST['value1'];} ?>">  
      		</div>

      		<br>

      		<div class = "input-group">
      			<span class = "input-group-addon"></span>
        		<input type = "text" class="form-control" name="value2" required placeholder="Frequency" onkeypress="return CPOnlyAlphaNumeric(this);" 
				onkeyup="return CPOnlyAlphaNumeric(this);" value="<?php if(isset($_POST['value2'])){echo $_POST['value2'];} ?>">  
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
