<?php

require_once 'simplex.class.php';

/**
 * 
 */
class Normal extends Simplex
{
	public $variablesHolgura = [];

	function __construct( $objetivo, $z, $restricciones, $desigualdades, $soluciones )
	{
		parent::__construct( $objetivo, $z, $restricciones, $desigualdades, $soluciones );
	}

	public function ejecutar()
	{
		$this->despejarZ();
		$this->agregarVariablesDeHolgura();
		$this->imprimirTabla();
	}

	private function agregarVariablesDeHolgura()
	{
		for ( $i = 0; $i < count( $this->restricciones ); $i ++ ) 
		{
			$this->variablesHolgura[] = 1;
		}
	}

	private function imprimirTabla()
	{
		echo '<table class="table table-striped table-bordered table-hover">';

			echo '<thead>';
				echo '<tr>';
					echo '<th scope="col"></th>';
					// Imprimir las variables basicas
					for ( $i = 0; $i < count( $this->z ); $i ++) 
					{ 
						echo '<th scope="col">x' . $i . '</th>';
					}

					// Imprimir las variables no basicas
					for ( $i = 0; $i < count( $this->restricciones ); $i ++) 
					{ 
						echo '<th scope="col">s' . $i . '</th>';
					}

					echo '<th scope="col">Solución</th>';
				echo '</tr>';
			echo '</thead>';

			echo '<tbody>';
				echo '<tr>';
					echo '<th scope="row">z</th>';
				// Imprimir los valores de z
					
				echo '</tr>';

				// Imprimir las variables no basicas verticales
				for ( $i = 0; $i < count( $this->restricciones ); $i ++) 
				{ 
					echo '<tr>';
						echo '<th scope="row">s' . $i . '</th>';
						// Imprimir los valores de cada restriccion
						for ( $j = 0; $j < count( $this->restricciones[$i] ); $j ++ ) 
						{ 
							echo '<th scope="row">' . $this->restricciones[$i][$j] . '</th>';
						}

						// Imprimir las variables de holgura de cada restricción
						foreach ( $this->variablesHolgura as $key => $value ) 
						{
							if ( $key === $i ) 
							{
								echo '<th scope="row">' . $this->variablesHolgura[$key] . '</th>';
							} else {
								echo '<th scope="row">0</th>';
							}
						}

						// Imprimir la solución de cada restricción
						echo '<th scope="row">' . $this->soluciones[$i] . '</th>';

					echo '</tr>';
				}
			echo '</tbody>';

		echo '</table>';
	}
}
