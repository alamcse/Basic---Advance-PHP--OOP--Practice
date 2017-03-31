<?php 
$pageName = "Formula";
include "../../../include/header.php"; 

//calculation

class ArithmeticMeanFreq{

	private $number_of_input;
	private $arr_input;
	private $result= 0.0;
	private $array_x;
	private $array_f;
	private $wrong_arr_input;
	private $array_input;
	private $total;
	
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

	function calculate($array_x,$array_f){

		$this->array_x=$array_x;
		$this->array_f=$array_f;
		$the_array_sum_f = array_sum($this->array_f);
		$this->total = array_map(function($x, $y) { return $x*$y; },
        $this->array_x , $this->array_f);
		
  		$the_array_sum_fx = array_sum($this->total);

		//calculate the mean

		$this->the_result = $the_array_sum_fx/$the_array_sum_f;
		return $this->the_result;
	}

}



if(isset($_POST['send']))
{
	if(isset($_POST['value'])&&$_POST['value1'])
		{

			$x = $_POST['value']; 
			$arr_x = explode(",",$x);
			$f = $_POST['value1'];
			$arr_f = explode(",",$f);
			$arr_x = array_values(array_filter($arr_x));
			$arr_f = array_values(array_filter($arr_f));

			//variable and initializations

			$number_of_x=count($arr_x);
			$number_of_f=count($arr_f);


//===========error checking===============

		$errorChk_x = new ArithmeticMeanFreq();

			$arr_x= $errorChk_x->errorCheck($number_of_x,$arr_x);
			if (gettype($arr_x)=='string') {
				$wrong_arr_x=$arr_x;
			}
			elseif (gettype($arr_x)=='array') {
				$array_x=$arr_x;
			}

		$errorChk_f = new ArithmeticMeanFreq();

			$arr_f= $errorChk_f->errorCheck($number_of_f,$arr_f);
			if (gettype($arr_f)=='string') {
				$wrong_arr_f=$arr_f;
			}
			elseif (gettype($arr_f)=='array') {
				$array_f=$arr_f;
			}


//================== result calculate==================

			if(($number_of_f==$number_of_x) && empty($wrong_arr_x) && empty($wrong_arr_f))
			{
				$getResult = new ArithmeticMeanFreq();
				$the_result = $getResult->calculate($array_x,$array_f);
				
			}
			else
			{
				if(empty($wrong_arr_x)&&empty($wrong_arr_f)){

					$_GLOBALS['var_freq_num']="Number of variable and frequency do not match.";
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
        <a class="btn btn-success btn-block" id="nolink"><strong>Arithmatic mean (Frequency distribution)</strong></a>
        <div class="panel-body">

<!--=====================error show starts=======================-->

		<?php if (isset($_GLOBALS['var_freq_num'])) { ?>
			
			<div class="alert alert-danger">
	            <a href=# class=close data-dismiss="alert" aria-label="close">&times;</a><strong><?php echo $_GLOBALS['var_freq_num']; ?></strong>
	        </div>

		<?php } 

			 if (isset($wrong_arr_x)) { ?>
			
			<div class="alert alert-danger">
	            <a href=# class=close data-dismiss="alert" aria-label="close">&times;</a>Variable:&nbsp&nbsp<strong><?php echo $wrong_arr_x; ?></strong>&nbsp&nbspnot valid.
	        </div>

		<?php } 

			 if (isset($wrong_arr_f)) { ?>
			
			<div class="alert alert-danger">
	            <a href=# class=close data-dismiss="alert" aria-label="close">&times;</a>Frequency:&nbsp&nbsp<strong><?php echo $wrong_arr_f; ?></strong>&nbsp&nbspnot valid.
	        </div>

		<?php } ?>

<!--=====================error show ends=======================-->

			<div class="col-md-6">
				<form class = "bs-example bs-example-form" id="myForm" role = "form" action="equations/statistics/eqn/arithmeticmean_frequency.php" method="post">
				    <div class = "input-group">
				        <span class ="input-group-addon"></span>
				        <input type ="text" class = "form-control" name="value" required placeholder="Variable" onkeypress="return CPOnlyAlphaNumeric(this);" 
						onkeyup="return CPOnlyAlphaNumeric(this);" value="<?php if(isset($_POST['value'])){echo $_POST['value'];} ?>">
				    </div>					
			      	<br>
			      	<div class = "input-group">
			      		<span class = "input-group-addon"></span>
			        	<input type = "text" class="form-control" name="value1" required placeholder="Frequency" onkeypress="return CPOnlyAlphaNumeric(this);" 
						onkeyup="return CPOnlyAlphaNumeric(this);" value="<?php if(isset($_POST['value1'])){echo $_POST['value1'];} ?>">  
			      	</div>					
			      	<br>
			        <button  type="submit" class ="btn btn-info" name="send">Calculate</button>&nbsp&nbsp&nbsp
			        <input class ="btn btn-info" onclick="clear_form_elements(this.form)" type="button" value="Clear all" />
			   	</form>
			</div>

<!--=======================Result starts===================-->

			<div class="col-md-6">

				<?php if(isset($the_result)){ ?>

				<div class="alert alert-success">
				      <a href=# class=close data-dismiss="alert" aria-label="close">&times;</a><strong>Result:&nbsp&nbsp<?php echo $the_result ?></strong>
				</div>

				<?php  } ?>

			</div>

<!--=======================Result ends===================-->
        
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
