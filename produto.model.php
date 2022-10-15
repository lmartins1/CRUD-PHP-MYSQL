<?php 

	class Produto
	{
		
		private $id;		
		private $nome;
		private $preco;
		private $cor;

		public function __get($atributo){
			return $this->$atributo;
		}

		public function __set($atributo, $valor){
			$this->$atributo = $valor;			
		}
	}

?>