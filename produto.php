<?php 
interface Funcoes{
    public function adicionarEstoque($quantidade);
    public function reduzirEstoque($quantidade);
    public function consultarEstoque();
    public function exibirProduto();
    public function calcularImposto();
}

abstract class Produto implements Funcoes {

    public $nome;
    public $codigo;
    public $precoUnitario;
    public $estoque;
    public $categoria;


    public function __construct($nome,$codigo,$precoUnitario,$estoque,$categoria)
    {
        $this -> nome = $nome ;
        $this -> codigo = $codigo;
        $this -> precoUnitario = $precoUnitario ;
        $this -> estoque = $estoque ;
        $this -> categoria = $categoria ;
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

        return $this->estoque;
    }

    public function exibirProduto(){

        echo "Nome Produto: " . $this -> nome .
            "<br> Código: " . $this -> codigo .
            "<br> Categoria: " . $this -> categoria . 
            "<br> Estoque: " . $this -> estoque . 
            "<br> Preço: R$ " . number_format($this -> precoUnitario, 2, ',' , '.' );
    }

     abstract function calcularImposto();
}

class ProdutoFisico extends Produto {

    public $imposto;

    public function calcularImposto(){
        
        $this->precoUnitario * $this->imposto * 0.10;
    }
    
    }




?>