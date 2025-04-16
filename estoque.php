<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciameto de estoque</title>
</head>
<body>

    <header>
        <h1>Gerenciamento de estoque</h1>
    </header>

    <main>

    <form action="">

    </form>


    </main>

</body>
</html>

<?php 

    if($_SERVER["REQUEST_METHOD"] == "POST" ){

        require("produto.php");


        $Produto1 = new Produto ($nome,$codigo,$precoUnitario,$estoque,$categoria);

    }



?>