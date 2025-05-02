<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Gerenciamento de Produtos</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
  <div class="container">
    <h1>Gerenciamento de Produtos</h1>

    <form id="form-produto" action="#" method="post">
      <h2>Cadastrar Produto</h2>
      <input type="text" name="txtnome" placeholder="Nome do Produto" required>
      <input type="text" name="txtcodigo" placeholder="Código" required>
      <input type="text" name="txtcategoria" placeholder="Categoria" required>
      <input type="number" name="txtestoque" placeholder="Estoque Inicial" required>
      <input type="number" step="0.01" name="txtpreco" placeholder="Preço Unitário" required>
      <select name="tipo">
        <option value="fisico">Físico</option>
        <option value="digital">Digital</option>
      </select>
      <button type="submit">Cadastrar</button>
    </form>
>

    <div class="acoes">
      <h2>Ações</h2>
      <button>Adicionar Estoque</button>
      <button>Reduzir Estoque</button>
      <button>Consultar Estoque</button>
      <button>Exibir Produto</button>
      <button>Calcular Imposto</button>
      <button>Aplicar Desconto</button>
    </div>

    <div id="resultado">

      <?php 
      if($_SERVER["REQUEST_METHOD"] == "POST" ){
        
        require("produto.php");
        
        
        $nome = $_POST["txtnome"];
        $codigo = $_POST["txtcodigo"];
        $estoque = $_POST ["txtestoque"];
        $categoria = $_POST ["txtcategoria"];
        $precoUnitario = $_POST ["txtpreco"];
        
        
        $P1 = new Produto ($nome,$codigo,$precoUnitario,$estoque,$categoria);
        
      
      }
            
    
    ?>
</div>
</div>
</body>
</html>


