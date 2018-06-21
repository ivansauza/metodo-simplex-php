<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container mt-3">
		<div class="row">
			<div class="col">
				<?php require'header.php' ?>

				<form method="GET" action="data.php" autocomplete="on">
					<div class="form-row">
						<div class="form-group col-sm col-xs-12">
							<label for="variablesDesicion">
								¿Cuántas <b>variables de desición</b> hay en el problema?	
							</label>

							<input type="number" min="1" class="form-control" id="variablesDesicion" name="variablesDesicion" required>
						</div>

						<div class="form-group col-sm col-xs-12">
							<label for="restricciones">
								¿Cuántas <b>restricciones</b> hay en el problema?	
							</label>

							<input type="number" min="1" class="form-control" id="restricciones" name="restricciones" required>
						</div>
					</div>

					<button type="submit" class="btn btn-primary btn-block">
						Siguiente
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