<?php 

	class ProdutoService
	{

		private $conexao;
		private $produto;

		public function __construct(Conexao $conexao, Produto $produto){
			$this->conexao = $conexao->conectar();
			$this->produto = $produto;			
		}
		
		public function inserir(){
			$query = 'insert into produtos(nome, preco, cor)values(:nome, :preco, :cor)';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':nome', $this->produto->__get('nome'));
			$stmt->bindValue(':preco', $this->produto->__get('preco'));
			$stmt->bindValue(':cor', $this->produto->__get('cor'));			 
			$stmt->execute();
		}

		public function recuperar(){
			$query = 'select id_prod, nome, cor, preco 
				from produtos 
			';
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
			
		}

		public function atualizar(){
			$query = 'update produtos set nome = :nome where id_prod = :id_prod
			';
			$stmt =$this->conexao->prepare($query);
			$stmt->bindValue(':nome', $this->produto->__get('nome'));			 
			$stmt->bindValue(':id_prod', $this->produto->__get('id'));			 
			return $stmt->execute();
			
		}

		public function remover(){
			$query = 'delete from produtos where id_prod = :id_prod
			';
			$stmt =$this->conexao->prepare($query);			
			$stmt->bindValue(':id_prod', $this->produto->__get('id'));			 
			return $stmt->execute();
			
		}
		

		
	}

?>