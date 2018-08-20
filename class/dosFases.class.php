<?php

require_once 'simplex.class.php';

/**
 * 
 */
class DosFases extends Simplex
{
	function __construct( $objetivo, $z, $restricciones, $desigualdades, $soluciones )
	{
		parent::__construct( $objetivo, $z, $restricciones, $desigualdades, $soluciones );
	}

	public function ejecutar()
	{
		echo "Ejecutando Metodo Dos Fases...";
	}
}
