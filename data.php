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
							<small id="emailHelp" class="form-text text-muted">Objetivo de la función</small>
						</div>

						z = 

						<div class="form-group col">
							<div class="input-group input-group-sm mb-3">
								<input type="text" class="form-control" name="variables[]" required>

								<div class="input-group-append">
									<span class="input-group-text" id="basic-addon2">
										x
										<sub>
											0
										</sub>
									</span>
								</div>
							</div>
						</div>
					</div>

					<h4 class="text-muted mb-3">
						<small>
							Restricciones
						</small>
					</h4>

					<div class="form-row">
						<div class="input-group mb-3 col">
							<input type="text" class="form-control" name="r[]" required>
							<div class="input-group-append">
								<span class="input-group-text" id="basic-addon2">
									x
									<sub>
										0
									</sub>
								</span>
							</div>
						</div>

						<div class="form-group col-1">
							<select id="restricciones" name="restricciones[]" class="form-control form-control-sm text-center" tabindex="-1">
								<option name="<" selected>≤</option>
								<option name=">">≥</option>
								<option name="=">=</option>
							</select>
						</div>

						<div class="form-group mb-3 col">
							<input type="text" class="form-control" name="r[]">
						</div>
					</div>

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