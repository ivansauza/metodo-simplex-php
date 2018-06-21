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
		$this->despejarz();
		$this->agregarVariables();

		dd( $this->re );

	}

	protected function agregarVariables()
	{
		foreach ( $this->de as $key => $desigualdad ) 
		{
			switch ( $desigualdad ) 
			{
				case 'mayor':
					# code...
					break;

				case 'igual':
					# code...
					break;
				
				default:
					$this->re[$key][] = 1;
					break;
			}
		}
	}

	protected function despejarz()
	{
		foreach ( $this->z as $key => $value ) 
		{
			$this->z[$key] = $value - ( $value * 2 );
		}
	}
}
