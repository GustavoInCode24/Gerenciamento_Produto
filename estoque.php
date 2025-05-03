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

      <!-- NOVA SEÇÃO DE GERENCIAMENTO DE PRODUTO -->
      <section class="card form-section">
        <h2><i class="fas fa-cogs"></i> Gerenciar Produto</h2>
        <form method="post" action="acoes.php">
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
            <input type="number" step="0.01" name="valor" required>
            <label>Quantidade / Percentual</label>
          </div>

          <button type="submit"><i class="fas fa-play"></i> Executar Ação</button>
        </form>
      </section>

      <section class="card result-section">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["txtnome"])) {
          require("produto.php");

          $nome = $_POST["txtnome"];
          $codigo = $_POST["txtcodigo"];
          $estoque = $_POST["txtestoque"];
          $categoria = $_POST["txtcategoria"];
          $precoUnitario = $_POST["txtpreco"];

          $P1 = new Produto($nome, $codigo, $precoUnitario, $estoque, $categoria);
          echo "<p><i class='fas fa-check-circle'></i> Produto <strong>$nome</strong> cadastrado com sucesso!</p>";
        }
        ?>
      </section>
    </main>
  </div>
</body>
</html>
