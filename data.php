<?php
require 'helpers.php';
require 'class/validator.class.php';

$variablesDesicion = $_GET['variablesDesicion'] ?? null;
$restricciones     = $_GET['restricciones'] ?? null;

validator( (int)$variablesDesicion, (int)$restricciones );


//Validar datos de entrada
function validator( $a, $b )
{
	if ( ! Validator::integer( $a ) ) 
		die( 'Error: no hay variables de desición.' );

	if ( ! Validator::max( $a, 0 ) ) 
		die( 'Error: las variables de desición deben ser mayores a 0.' );

	if ( ! Validator::integer( $b ) ) 
		die( 'Error: no hay restricciones.' );

	if ( ! Validator::max( $b, 0 ) ) 
		die( 'Error: las restricciones de desición deben ser mayores a 0.' );
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"  autocomplete="off">
</head>
<body>
	<div class="container mt-3">
		<div class="row">
			<div class="col">
				<form method="POST" action="solution.php" autocomplete="off">

					<a href="index.php" class="btn btn-outline-danger float-right">
						Regresar
					</a>

					<?php require'header.php' ?>

					<div class="form-row">
						<div class="form-group col-2">
							<select id="objetivo" name="objetivo" class="form-control form-control-sm">
								<option value="max" selected>Maximizar</option>
								<option value="min" >Minimizar</option>
							</select>
							<small class="form-text text-muted">Objetivo de la función</small>
						</div>

						z = 

						<?php for ( $i = 0; $i < $variablesDesicion; $i ++ ): ?>
							<div class="form-group col">
								<div class="input-group input-group-sm mb-3">
									<input type="text" class="form-control" name="variables[]" required>

									<div class="input-group-append">
										<span class="input-group-text" id="basic-addon2">
											x
											<sub>
												<?php echo $i ?>
											</sub>
										</span>
									</div>
								</div>
							</div>

							<?php if ( $i + 1 < $variablesDesicion ): ?>
								<?php echo ' + ' ?>
							<?php endif ?>

						<?php endfor ?>
					</div>

					<h4 class="text-muted mb-3">
						<small>
							Restricciones
						</small>
					</h4>

					<?php for ( $i = 0; $i < $restricciones; $i ++ ): ?>
						<div class="form-row">

							<?php for ( $j = 0; $j < $variablesDesicion; $j ++ ): ?>
								<div class="input-group mb-3 col">
									<input type="text" class="form-control" name="restricciones[]" required>
									<div class="input-group-append">
										<span class="input-group-text" id="basic-addon2">
											x
											<sub>
												<?php echo $j ?>
											</sub>
										</span>
									</div>
								</div>

								<?php if ( $j + 1 < $variablesDesicion ): ?>
									<?php echo ' + ' ?>
								<?php endif ?>

							<?php endfor ?>

							<div class="form-group col-1">
								<select id="desigualdades" name="desigualdades[]" class="form-control form-control-sm text-center" tabindex="-1">
									<option value="<" selected>≤</option>
									<option value=">">≥</option>
									<option value="=">=</option>
								</select>
							</div>

							<div class="form-group mb-3 col">
								<input type="text" class="form-control" name="restricciones[]">
							</div>
						</div>
					<?php endfor ?>

					<button type="submit" class="btn btn-primary btn-block mt-4">
						Resolver
					</button>
				</form>
			</div>
		</div>
	</div>

	<script src="jquery-3.3.1.min.js"></script>
	<script src="popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>