<html>
<head>
	<title>Harmonic mean</title>
</head>
<body>

		<center>
		<form action="harmonicmean.php" method="post">

				<table border="2px" style="font-size:35px";>
				<tr>
				<td><lable style="color:blue">Harmonic mean</lable></td>
				</tr>
				<tr>
				<td><input type="text" name="value" required placeholder="Numbers" style="width:100%;height:30px"></td>
				</tr>
				<tr>
				<td><input type="submit" name="send" id="send" value="Calculate" ></td>
				</tr>
				</table>
		</form>
		</center>


<?php

function harmonic_mean($a) 
	{
		 $sum = 0;
		 foreach($a as $n) $sum += 1 / $n;
		 return (1/$sum)*count($a);
	}


if(isset($_POST['send']))

		{
			if(isset($_POST['value']))
				{
					$str = $_POST['value'];
					$a = explode(",",$str);

					//calculate the mean
					$the_result = harmonic_mean($a);
					echo "<center>"."The harmonic mean value is ".$the_result."</center>";
		}
	else
		{
			echo "No value";
		}

}

else
{
	echo "";
}
	


?> 
</body>
</html>