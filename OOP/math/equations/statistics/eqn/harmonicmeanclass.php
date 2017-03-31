<html>
<head>
	<title>Harmonic mean</title>
</head>
<body>

		<center>
		<form action="harmonicmeanclass.php" method="post">

				<table border="2px" style="font-size:35px";>
				<tr>
				<td><lable style="color:blue">Harmonic mean (Class interval)</lable></td>
				</tr>
				<tr>
				<td><input type="text" name="value" required placeholder="Initial values of class interval" style="width:100%;height:30px"></td>
				</tr>
				<tr>
				<td><input type="text" name="value1" required placeholder="Final values of class interval" style="width:100%;height:30px"></td>
				<tr>
				<td><input type="text" name="value2" required placeholder="Frequency" style="width:100%;height:30px"></td>
				</tr>
				<tr>
				<td><input type="submit" name="send" id="send" value="Calculate" ></td>
				</tr>
				</table>
		</form>
		</center>



<?php

if(isset($_POST['send']))
{
	if(isset($_POST['value'])&&$_POST['value1']&&$_POST['value2'])
		{
			$initial = $_POST['value'];
			$array_initial = explode(",",$initial);
			$final = $_POST['value1'];
			$array_final = explode(",",$final);
			$frequency = $_POST['value2'];
			$array_frequency = explode(",",$frequency);


			//variable and initializations
			$the_result = 0.0;
			$number_of_initial=count($array_initial);
			$number_of_final=count($array_final);
			$number_of_frequency=count($array_frequency);

			if($number_of_initial==$number_of_final&&$number_of_final==$number_of_frequency)
			{
			
			$midpoint = array_map(function($x, $y) { return (($x+$y)/2); },
                  $array_initial , $array_final);
			$f_by_x = array_map(function($m, $n) { return ($m/$n); },
                  $array_frequency , $midpoint);
		
  			$array_sum_frequency = array_sum($array_frequency);
  			$array_sum_f_by_x = array_sum($f_by_x);

			//calculate the mean
			$the_result = $array_sum_frequency/$array_sum_f_by_x;
			echo "<center>"."The harmonic mean value is ".$the_result."</center>";
			}

			else
			{
				echo "<center>"."Number of class interval and frequency do not match."."</center>";
			}
		}
	else
		{
			echo "No result";
		}

}

else
{
	echo "";
}
	
?> 


</body>
</html>