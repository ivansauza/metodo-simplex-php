<?php
require 'helpers.php';
require 'class/simplex.class.php';

session_start();

$simplex = new Simplex( 
	getObjetivo(), 
	getZ(), 
	generateRestricciones(), 
	getDesigualdades() );

function getObjetivo()
{
	return $_GET['objetivo'];
}

function getZ()
{
	$temp = [];

	for ( $i = 0; $i < $_GET['v']; $i ++ ) 
	{ 
		$temp[] = $_GET['x' . $i];
	}

	return $temp;
}

function generateRestricciones()
{
	$temp = [];

	//Anadimos los arreglos deacuerdo a cuantas restricciones existen
	for ( $i = 0; $i < $_GET['r']; $i ++ ) 
	{ 
		$temp[] = [];
	}

	//LLenamos las restricciones
	for ( $i = 0; $i < $_GET['r']; $i ++ ) 
	{ 
		for ( $j = 0; $j < $_GET['v']; $j ++ ) 
		{ 
			$temp[$i][] = (int)$_GET['r' . $i . '_' . $j];
		}

		//Agregamos el valor final a la restriccion
		$temp[$i][] = (int)$_GET['s' . $i];
	}
	return $temp;
}

function getDesigualdades()
{
	$temp = [];

	for ( $i = 0; $i < $_GET['r']; $i ++ ) 
	{ 
		$temp[] = $_GET['d' . $i];
	}

	return $temp;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container mt-3">
		<div class="row">
			<div class="col">
				<?php require'header.php' ?>

				<?php $simplex->execute() ?>
			</div>
		</div>
	</div>

	<script src="jquery-3.3.1.min.js"></script>
	<script src="popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>