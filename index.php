<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Lommeregner</title>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="calculator">
	<h1>King of Calculators</h1>
		<form action="<?=$_SERVER["PHP_SELF"]?>" method="get">
			<input class="input1" type="number" name="val1" value="<?=$_GET["val1"]??""?>" required placeholder="Indtast et tal" autocomplete="off"/>
			<br><br>
			<input class="input2" type="number" name="val2" value="<?=$_GET["val2"]??""?>" required placeholder="Indtast et tal" autocomplete="off"/>
			<br><br>
			<button type="submit" name="operator" value="add">+</button>
			<button type="submit" name="operator" value="sub">-</button>
			<button type="submit" name="operator" value="mul">x</button>
			<button type="submit" name="operator" value="div">÷</button>
			<button type="submit" name="operator" value="mod">%</button>
			<br><br>
		</form>
	<?php 
		$op = $_GET["operator"];
		if (!empty($op) ){
		$v1 = filter_input(INPUT_GET, "val1", FILTER_VALIDATE_INT);
		if ($v1 === false) {die("missing or illegal val1 parameter");}
		$v2 = filter_input(INPUT_GET, "val2", FILTER_VALIDATE_INT);
		if ($v2 === false) {die("missing or illegal val2 parameter");}
		
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
			case "mod":
				$res = $v1%$v2;
				$opchar = "%";
				break;
			default: 
				$res = "Unknown operator".$op."";
		}
		}
	?>
	<form>
  		<output class="output"><?php echo $v1." ".$opchar." ".$v2." = ".$res; ?></output>
	</form>
	<br>
	<form action="<?=$_SERVER["PHP_SELF"]?>" method="get">
		<button type="submit">Clear</button>
	</form>
</div>
</body>
</html>