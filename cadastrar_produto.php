<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Avaliacao-PHP-MYSQL</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">			
				<img src="img/logo.png" width="30" height="30" class="d-inline-block">		
					Avaliacao-PHP-MYSQL
				</a>
			</div>
		</nav>

		<?php if( isset($_GET['inclusao']) && $_GET['inclusao'] == 1) {?>
			<div class="bg-success pt-2 text-white d-flex justify-content-center">
				<h5>Produto inserido com sucesso!</h5>
			</div>
		<?php } ?>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">						
						<li class="list-group-item"><a href="cadastrar_produto.php">Cadastrar Produto</a></li>		
						<li class="list-group-item"><a href="todos_produtos.php">Todos Produtos</a></li>					
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Novo produto</h4>
								<hr />

								<form method="POST" action="produto_controller.php?acao=inserir">
									<div class="form-group">
										<label>Descrição do produto:</label>
										<input type="text" name="nome" class="form-control" placeholder="Exemplo: Bolacha trakinas">
									</div>
									<div class="form-group">
										<label>Preço do produto:</label>
										<input type="text" name="preco" class="form-control" placeholder="Exemplo: 10,00">
									</div>
									<div class="form-group">
										<label>Cor do produto:</label>
										<input type="text" name="cor" class="form-control" placeholder="Exemplo: Azul">
									</div>

									<button class="btn btn-success">Cadastrar</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>