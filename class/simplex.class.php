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
			//Eliminar el ultimo elemento de la reestriccion
			$solucion = array_pop( $this->re[$key] );

			switch ( $desigualdad ) 
			{
				case 'mayor':
					//Añadir la variable de holgura mas la variable artificial
					$this->re[$key]['s' . $key] = -1;
					$this->re[$key]['a' . $key] = 1;

					break;

				case 'igual':
					//Añadir la variable artificial
					$this->re[$key]['a' . $key] = 1;

					break;
				
				default:
					//Añadir la variable de holgura
					$this->re[$key]['s' . $key] = 1;

					break;
			}

			// Añadir el ultimo numero
			array_push( $this->re[$key], $solucion );
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
