<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Lommeregner</title>
</head>

<body>
	<h1>King of calculators</h1>
	
	<form action="<?=$_SERVER["PHP_SELF"]?>" method="get">
		<input type="number" name="val1" required/>
		<br><br>
		<input type="number" name="val2" required />
		<br><br>
		<button type="submit" name="operator" value="add">+</button>
		<button type="submit" name="operator" value="sub">-</button>
		<button type="submit" name="operator" value="mul">x</button>
		<button type="submit" name="operator" value="div">÷</button>
		<br><br>
		
		
	</form>
	
	<?php 
		$op = $_GET["operator"];
		// $v1 = $_GET["val1"];
		// $v2 = $_GET["val2"];
		$v1 = filter_input(INPUT_GET, "val1", FILTER_VALIDATE_INT) or die("missing or illegal val1 parameter");
		$v2 = filter_input(INPUT_GET, "val2", FILTER_VALIDATE_INT) or die("missing or illegal val2 parameter");  
		
		  
		switch($op){
			case "add":
				$res = $v1+$v2;
				$opchar = "+";
				break;
			case "sub":
				$res = $v1-$v2;
				$opchar = "-";
				break;
			case "mul":
				$res = $v1*$v2;
				$opchar = "x";
				break;
			case "div":
				$res = $v1/$v2;
				$opchar = "÷";
				break;
			default: 
				$res = "Unknown operator".$op."";
		}

		echo $v1." ".$opchar." ".$v2." = ".$res;
	?>
</body>
</html>
