<?php

	$acao = 'recuperar';
	require 'produto_controller.php';

	/*
	echo '<pre>';
	print_r($produtos);
	echo '</pre>';
	*/
	

?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Avaliacao-PHP-MYSQL</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

		<script>
			function editar(id_prod, txt_produto) {

				//criar um form de edição
				let form = document.createElement('form');
				form.action = 'produto_controller.php?acao=atualizar'
				form.method = 'post'
				form.className = 'row'

				//criar um input da descricao do produto
				let inputProduto = document.createElement('input');
				inputProduto.type = 'text'
				inputProduto.name = 'nome'
				inputProduto.className = 'col-9 form-control'
				inputProduto.value = txt_produto

				//criar input hidden pra guardar id do produto

				let inputId = document.createElement('input')
				inputId.type = 'hidden'
				inputId.name = 'id_prod'
				inputId.value = id_prod

				//criar botão para envio do form
				let button = document.createElement('button');
				button.type = 'submit'
				button.className = 'col-3 btn btn-info'
				button.innerHTML = 'Atualizar'

				//criar input no form
				form.appendChild(inputProduto)
				form.appendChild(inputId)
				form.appendChild(button)

				//console.log(form)

				let produto = document.getElementById('produto_'+id_prod)

				//limpar o nome do produto
				produto.innerHTML = ''

				produto.insertBefore(form, produto[0])			

			}

			function remover(id_prod) {
				location.href = 'todos_produtos.php?acao=remover&id='+id_prod;
			}		
		
		</script>

	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					Avaliacao-PHP-MYSQL
				</a>
			</div>
		</nav>

		<?php if( isset($_GET['remover']) && $_GET['remover'] == 1) {?>
			<div class="bg-success pt-2 text-white d-flex justify-content-center">
				<h5>Produto excluído com sucesso!</h5>
			</div>
		<?php } else if (isset($_GET['atualizar']) && $_GET['atualizar'] == 1) { ?>
			<div class="bg-success pt-2 text-white d-flex justify-content-center">
				<h5>Produto atualizado com sucesso!</h5>
			</div>
		<?php }?>

		<div class="container app">
			<div class="row">
				<div class="col-sm-3 menu">
					<ul class="list-group">						
						<li class="list-group-item"><a href="cadastrar_produto.php">Novo Produto</a></li>
						<li class="list-group-item active"><a href="#">Todos Produtos</a></li>
					</ul>
				</div>

				<div class="col-sm-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Produtos</h4>
								<hr />

								<?php foreach($produtos as $indice => $produto) { ?>									
									<div class="row mb-3 d-flex align-items-center produto">
										<div class="col-sm-9" id="produto_<?= $produto->id_prod ?>">											
											<?= $produto->nome ?>
										</div>
										<div class="col-sm-3 mt-2 d-flex justify-content-between">
											<i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $produto->id_prod ?>, '<?= $produto->nome ?>')"></i>
											<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $produto->id_prod ?>)"></i>

										</div>
									</div>

								<?php } ?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>