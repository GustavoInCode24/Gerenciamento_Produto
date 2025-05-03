<?php
interface Funcoes
{
    public function adicionarEstoque($quantidade);
    public function reduzirEstoque($quantidade);
    public function consultarEstoque();
    public function exibirProduto();
    public function calcularImposto();
}

abstract class Produto implements Funcoes
{

    private $nome;
    private $codigo;
    private $precoUnitario;
    private $estoque;
    private $categoria;

    //CONSTRUTOR
    public function __construct($nome, $codigo, $precoUnitario, $estoque, $categoria)
    {
        $this->nome = $nome;
        $this->codigo = $codigo;
        $this->precoUnitario = $precoUnitario;
        $this->estoque = $estoque;
        $this->categoria = $categoria;
    }

    //ADICIONAR
    public function adicionarEstoque($quantidade)
    {
        $this->estoque += $quantidade;
    }

    //REDUZIR
    public function reduzirEstoque($quantidade)
    {
        if ($quantidade <= $this->estoque) {
            $this->estoque -= $quantidade;
        } else {
            echo "quantidade insuficiente no estoque";
        }
    }

    //CONSULTAR
    public function consultarEstoque()
    {
        return $this->estoque;
    }

    //EXIBIR
    public function exibirProduto()
    {

        echo "Nome Produto: " . $this->nome .
            "<br> Código: " . $this->codigo .
            "<br> Categoria: " . $this->categoria .
            "<br> Estoque: " . $this->estoque .
            "<br> Preço: R$ " . number_format($this->precoUnitario, 2, ',', '.');
    }

    //exibir valor unitario

    public function getPrecoUnitario()
    {
        return $this->precoUnitario;
    }

    abstract function calcularImposto();
}

trait Desconto
{

    public function calcularDesconto($percentual)
    {
        $percentual /= 100;

        $desconto = $this->getPrecoUnitario() * $percentual;
        $desconto = $this->getPrecoUnitario() - $desconto;

        return $desconto;
    }
}


//PRODUTO FISICO
class ProdutoFisico extends Produto
{

    use Desconto;

    public function calcularImposto()
    {

        return $this->getPrecoUnitario() * 0.10;
    }
}

//PRODUTO DIGITAL
class ProdutoDigital extends Produto
{

    use Desconto;


    public function calcularImposto()
    {
        return $this->getPrecoUnitario() * 0.05;
    }
}
