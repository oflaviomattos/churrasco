<!DOCTYPE html>
<html>
<head>
	<title>Churrasco da Virada </title>
	<!-- Adicione o link para o arquivo CSS do Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1>Churrasco da Virada - 2024 + Aniversário do Kadu</h1>
		<form action="process.php" method="post">
			<div class="form-group">
				<label for="num_homem">Número de homens:</label>
				<input type="number" class="form-control" id="num_homem" name="num_homem">
			</div>

			<div class="form-group">
				<label for="num_mulher">Número de mulheres:</label>
				<input type="number" class="form-control" id="num_mulher" name="num_mulher">
			</div>

			<div class="form-group">
				<label for="num_crianca">Número de crianças:</label>
				<input type="number" class="form-control" id="num_crianca" name="num_crianca">
			</div>

			<button type="submit" class="btn btn-primary">Calcular</button>
		</form>
	</div>

	<!-- Adicione o link para o arquivo JavaScript do Bootstrap -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
