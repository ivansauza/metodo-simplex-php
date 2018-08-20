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
		$this->elejirFilaPivote();
		$this->elejirColumnaPivote();

		$this->imprimirTabla();
	}

	private function elejirFilaPivote()
	{
		$menorPosicion = 0; // Elejir el primero elemento de z como el menor/mayor

		// Extraer el numero mas menor de z
		foreach ( $this->z as $key => $value ) 
		{
			if ( $value <= $this->z[$menorPosicion] ) 
			{
				$menorPosicion = $key;
			}
		}

		//Extraer el numero mas menor de las variables de Holgura

		$this->filaPivote = $menorPosicion;
	}

	private function elejirColumnaPivote()
	{
		$menorPosicion = 0;

		// Extraer el array de cada restricción
		foreach ( $this->restricciones as $i => $restriccion ) 
		{
			// Recorrer los elementos de la restricción
			foreach ( $restriccion as $j => $value ) 
			{
				// Comprobar que se esta haciendo en la Fila Pivote
				if ( $j == $this->filaPivote ) 
				{
					//Comprobar si el elemento es menor al menor actual
					$x = ( $this->soluciones[$i] / $value );
					$y = ( $this->soluciones[$menorPosicion] / $value );

					if ( $x <= $y ) 
					{
						$menorPosicion = $i;
					}
				}
			}
		}

		$this->columnaPivote = $menorPosicion;
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
					foreach ( $this->z as $key => $value ) 
					{
						//Colorear la Fila Pivote
						if ( $key == $this->filaPivote ) 
						{
							echo '<th scope="row" class="text-warning">' . $value . '</th>';	
						} else {
							echo '<th scope="row">' . $value . '</th>';	
						}
					}

					for ( $i = 0; $i < count( $this->variablesHolgura ) + 1; $i ++ ) 
					{ 
						echo '<th scope="row">0</th>';	
					}

				echo '</tr>';

				// Imprimir las variables no basicas verticales
				for ( $i = 0; $i < count( $this->restricciones ); $i ++) 
				{ 
					echo '<tr>';
						echo '<th scope="row">s' . $i . '</th>';
						
						// Imprimir los valores de cada restriccion
						for ( $j = 0; $j < count( $this->restricciones[$i] ); $j ++ ) 
						{ 
							// Colorear la Columna Pivote

							if ( $i == $this->columnaPivote AND $j == $this->filaPivote ) 
							{
								echo '<th scope="row" class="text-success">' . $this->restricciones[$i][$j] . '</th>';
							} else {
								echo '<th scope="row">' . $this->restricciones[$i][$j] . '</th>';
							}
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
