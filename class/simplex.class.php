<?php

require_once 'normal.class.php';
require_once 'dosFases.class.php';

/**
 * 
 */
class Simplex
{
	public $objetivo; // Objetivo del problema, minimzar o maximizar
	public $z;  // Valores de Z
	public $restricciones; // Restricciones
	public $desigualdades; // Desigualdades o Igualdades de las restriccione
	public $soluciones;    // Soluciones de cada restricción

	public $pivote;
	public $filaPivote;
	public $columnaPivote;


	function __construct( $objetivo, $z, $restricciones, $desigualdades, $soluciones )
	{
		$this->z             = $z;
		$this->objetivo      = $objetivo;
		$this->restricciones = $restricciones;
		$this->desigualdades = $desigualdades;
		$this->soluciones    = $soluciones;
	}

	protected function despejarZ()
	{
		foreach ( $this->z as $key => $value ) 
		{
			$this->z[$key] = $value - ( $value * 2 );
		}
	}
}
