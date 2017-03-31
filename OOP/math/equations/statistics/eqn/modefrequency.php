<html>
<head>
	<title>Mode</title>
</head>
<body>

		<center>
		<form action="modefrequency.php" method="post">

				<table border="2px" style="font-size:35px";>
				<tr>
				<td><lable style="color:blue"><center>Mode</center>(continuous frequncy distribution)</lable></td>
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
			$largest_frequency = max($array_frequency);
			$position_of_largest_frequency=array_search($largest_frequency,$array_frequency);
			$magnitude= $array_initial[1]-$array_initial[0];

			$lower_limit= $array_initial[$position_of_largest_frequency];

			$preceding_frequency=$array_frequency[$position_of_largest_frequency-1];
			$succeeding_frequency=$array_frequency[$position_of_largest_frequency+1];


			//calculate the mode
			$the_result= $lower_limit+ ($magnitude*($largest_frequency-$preceding_frequency))/(2*$largest_frequency-$preceding_frequency-$succeeding_frequency);


			echo "<center>"."The mode is ".$the_result."</center>";
		}

	else
		{
			echo "<center>"."Number of class interval and frequency do not match."."</center>";
		}
		
		}
else
	{
		echo "";
	}
	
?> 


</body>
</html>