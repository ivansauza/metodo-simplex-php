<?php
require 'helpers.php';
require 'class/simplex.class.php';

session_start();

$z 				= getZ();
$objetivo       = getObjetivo();
$reestricciones = getRestricciones();
$desigualdades  = getDesigualdades();
$soluciones     = getSoluciones();

$modelo = null;
$desicion = true;

//Ejecutar un modelo ya sea metodo normal o dos fases
foreach ( $desigualdades as $key => $desigualdad ) 
{
	$desicion = $desigualdad != "menor" ? false : true;
}

if ( $desicion ) 
{
	$modelo = new Normal( $objetivo, $z, $reestricciones, $desigualdades, $soluciones );
} else {
	$modelo = new DosFases( $objetivo, $z, $reestricciones, $desigualdades, $soluciones );
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

				<?php $modelo->ejecutar() ?>
			</div>
		</div>
	</div>

	<script src="jquery-3.3.1.min.js"></script>
	<script src="popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>