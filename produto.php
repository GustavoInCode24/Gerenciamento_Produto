<?php 

class Produto {

    private $nome;
    private $codigo;
    private $precoUnitario;
    private $estoque;
    private $categoria;


    public function __construct($nome,$codigo,$precoUnitario,$estoque,$categoria)
    {
        $this -> nome ;
        $this -> codigo ;
        $this -> precoUnitario ;
        $this -> estoque ;
        $this -> categoria ;
    }

    public function adicionarEstoque($quantidade){
        $this -> estoque += $quantidade;
    }
    public function reduzirEstoque($quantidade){
        if($quantidade <= $this -> estoque){
            $this -> estoque -= $quantidade;
        }
        else{
            echo "quantidade insuiciente no estoque";
        }
    }

    public function consultarEstoque(){

        return $this -> estoque;
    }

    public function exibirProduto(){

        echo "Nome: " . $this -> nome .
            "<br> Codigo: " . $this -> codigo .
            "<br> Categoria: " . $this -> categoria . 
            "<br> Estoque: " . $this -> estoque . 
            "<br> Preço: R$ " . number_format($this -> precoUnitario, 2, ',' , '.' );
    }
}

?>