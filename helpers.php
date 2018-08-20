<?php
	function dd( $var )
	{
		echo "<pre><br />";
		var_dump( $var );
		echo "</pre>";
	}

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

	function getRestricciones()
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
			//$temp[$i][] = (int)$_GET['s' . $i];
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

	function getSoluciones()
	{
		$temp = [];

		for ( $i = 0; $i < $_GET['r']; $i ++ ) 
		{ 
			$temp[] = $_GET['s' . $i];
		}

		return $temp;
	}
?>