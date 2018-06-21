<?php
/**
 * 
 */
class Simplex
{
	protected $ob; // Objetivo del problema, minimzar o maximizar
	protected $z;  // Valores de Z
	protected $re; // Restricciones
	protected $de; // Desigualdades o Igualdades de las restricciones
	protected $fn; // Variable para decidir si se ah terminado el problema

	protected $pivote;
	protected $filaPivote;
	protected $columnaPivote;


	function __construct( $objetivo, $variables, $restricciones, $desigualdades )
	{
		$this->ob = $objetivo;
		$this->z  = $variables;
		$this->re = $restricciones;
		$this->de = $desigualdades;
		$this->fn = false;
	}

	public function execute()
	{
		
	}
}
