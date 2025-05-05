<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Gerenciamento de Produtos</title>
  <link rel="stylesheet" href="estilo.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="wrapper">
    <header>
      <h1><i class="fas fa-boxes"></i> Gerenciador de Produtos</h1>
    </header>

    <main>
      <!-- Formulário de cadastro de produto -->
      <section class="card form-section">
        <h2><i class="fas fa-plus-circle"></i> Cadastrar Produto</h2>
        <form method="post">
          <div class="form-group">
            <input type="text" name="txtnome" required>
            <label>Nome do Produto</label>
          </div>
          <div class="form-group">
            <input type="text" name="txtcodigo" required>
            <label>Código</label>
          </div>
          <div class="form-group">
            <input type="text" name="txtcategoria" required>
            <label>Categoria</label>
          </div>
          <div class="form-group">
            <input type="number" name="txtestoque" required>
            <label>Estoque Inicial</label>
          </div>
          <div class="form-group">
            <input type="number" step="0.01" name="txtpreco" required>
            <label>Preço Unitário</label>
          </div>
          <div class="form-group">
            <select name="tipo" required>
              <option value="" disabled selected hidden>Tipo do Produto</option>
              <option value="fisico">Físico</option>
              <option value="digital">Digital</option>
            </select>
          </div>
          <button type="submit"><i class="fas fa-check"></i> Cadastrar</button>
        </form>
      </section>

      <!-- Formulário para gerenciar produto -->
      <section class="card form-section">
        <h2><i class="fas fa-cogs"></i> Gerenciar Produto</h2>
        <form method="post">
          <div class="form-group">
            <input type="text" name="codigoProduto" required>
            <label>Código do Produto</label>
          </div>

          <div class="form-group">
            <select name="acao" required>
              <option value="" disabled selected hidden>Ação</option>
              <option value="adicionar">Adicionar Estoque</option>
              <option value="reduzir">Reduzir Estoque</option>
              <option value="consultar">Consultar Estoque</option>
              <option value="exibir">Exibir Produto</option>
              <option value="imposto">Calcular Imposto</option>
              <option value="desconto">Aplicar Desconto</option>
            </select>
          </div>

          <div class="form-group">
            <input type="number" step="0.01" name="valor">
            <label>Quantidade / Percentual</label>
          </div>

          <button type="submit"><i class="fas fa-play"></i> Executar Ação</button>
        </form>
      </section>

      <!-- Exibição das ações realizadas -->
      <section class="card result-section">
        <?php
        session_start();
        require("produto.php");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

          if (isset($_POST["txtnome"])) {


            $nome = $_POST["txtnome"];
            $codigo = $_POST["txtcodigo"];
            $estoque = $_POST["txtestoque"];
            $categoria = $_POST["txtcategoria"];
            $precoUnitario = $_POST["txtpreco"];
            $tipo = $_POST["tipo"];


            if ($tipo === "fisico") {
              $_SESSION["produto"] = serialize(new ProdutoFisico($nome, $codigo, $precoUnitario, $estoque, $categoria));
            } else {
              $_SESSION["produto"] = serialize(new ProdutoDigital($nome, $codigo, $precoUnitario, $estoque, $categoria));
            }
            echo "<p><i class='fas fa-check-circle'></i> Produto <strong>$nome</strong> cadastrado com sucesso!</p>";
          }


          if (isset($_POST["acao"])) {
            $codigo = $_POST["codigoProduto"];
            $acao = $_POST["acao"];
            $valor = $_POST["valor"];


            if ($produto->getCodigo() !== $codigo) {
              echo "<p><i class='fas fa-times-circle'></i> Código do produto incorreto</p>";
              return;
            }

            // ações
            switch ($acao) {
              case "exibir":
                $produto->exibirProduto();
                break;
              case "consultar":
                echo "<p><i class='fas fa-warehouse'></i> Estoque atual: " . $produto->consultarEstoque() . "</p>";
                break;
              case "imposto":
                echo "<p><i class='fas fa-coins'></i> Imposto: R$ " . number_format($produto->calcularImposto(), 2, ',', '.') . "</p>";
                break;
              case "desconto":
                echo "<p><i class='fas fa-tags'></i> Preço com desconto: R$ " . number_format($produto->calcularDesconto($valor), 2, ',', '.') . "</p>";
                break;
              case "adicionar":
                $produto->adicionarEstoque($valor);
                echo "<p><i class='fas fa-plus'></i> Novo estoque: " . $produto->consultarEstoque() . "</p>";
                break;
              case "reduzir":
                $produto->reduzirEstoque($valor);
                echo "<p><i class='fas fa-minus'></i> Novo estoque: " . $produto->consultarEstoque() . "</p>";
                break;
            }

            $_SESSION["produto"] = serialize($produto);
          }
        }
        ?>
      </section>
    </main>
  </div>
</body>

</html>