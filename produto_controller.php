<?php

	require "produto.model.php";
	require "produto.service.php";
	require "conexao.php";


	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

	if($acao == 'inserir' ) {
		$produto = new Produto();
		$produto->__set('nome', $_POST['nome']);
		$produto->__set('preco', $_POST['preco']);
		$produto->__set('cor', $_POST['cor']);

		$conexao = new Conexao();

		$produtoServico = new ProdutoService($conexao, $produto);
		$produtoServico->inserir();

		header('Location: cadastrar_produto.php?inclusao=1');
	
	} else if ($acao == 'recuperar'){
		$produto = new Produto();
		$conexao = new Conexao();

		$produtoServico = new ProdutoService($conexao, $produto);
		$produtos = $produtoServico->recuperar();

	} else if ($acao == 'atualizar'){
		$produto = new Produto();
		$produto->__set('id', $_POST['id_prod']);
		$produto->__set('nome', $_POST['nome']);

		$conexao = new Conexao();

		$produtoServico = new ProdutoService($conexao, $produto);
		if ($produtoServico->atualizar()){
			header('location: todos_produtos.php?atualizar=1');
		}

	} else if ($acao == 'remover'){
		$produto = new Produto();
		$produto->__set('id', $_GET['id']);
		
		$conexao = new Conexao();

		$produtoServico = new ProdutoService($conexao, $produto);
		$produtoServico->remover();

		header('location: todos_produtos.php?remover=1');

	}

	

?>