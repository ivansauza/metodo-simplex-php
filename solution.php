<?php
require 'helpers.php';
require 'class/simplex.class.php';

session_start();

$simplex = new Simplex( 
	getObjetivo(), 
	getZ(), 
	generateRestricciones(), 
	getDesigualdades() );
$simplex->ejecutar();

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
			$temp[$i][] = $_GET['r' . $i . '_' . $j];
		}

		//Agregamos el valor final a la restriccion
		$temp[$i][] = $_GET['s' . $i];
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