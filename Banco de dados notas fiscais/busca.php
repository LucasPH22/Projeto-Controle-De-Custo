<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Notas</title>
    <!-- Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
            font-family: 'Josefin Sans', sans-serif; /* Adiciona a fonte Roboto */
        }
        .container {
            margin-top: 50px;
        }
        .card {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            background-color: #fff;
        }
        .card-title {
            color: #333;
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            text-transform: uppercase;
        }
        .nota-list {
            list-style-type: none;
            padding: 0;
        }
        .nota-item {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .nota-item:hover {
            background-color: #e0e0e0;
        }
        .notas {
           
    border: 2px solid white; 
    border-radius: 10px;     
    padding: 25px;           
}
     
.header
{
    align-items: center;
    display: flex;
}



    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h3 class="card-title">Orçamentos</h3>
        <form method="post" action="">
            <div class="input-field">
                <i class="material-icons prefix">store</i>
                <input id="fornecedor" type="text" name="fornecedor" required >
                <label for="fornecedor">Fornecedor</label>
            </div>
            <div class="input-field">
                <i class="material-icons prefix">list_alt</i>
                <input id="numero_pedido" type="text" name="numero_pedido" >
                <label for="numero_pedido">Produto</label>
            </div>
            <div class="input-field center-align">
                <!-- Botão Buscar Nota -->
                <button class="btn waves-effect waves-light blue" type="submit" name="buscar">Buscar 
                    <i class="material-icons right">search</i>
                </button>
            </div>
        </form>
    
 <div class="notas z-depth-2 rounded ">
    
    <?php
    
    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verifica se o campo fornecedor foi preenchido
        if (!empty($_POST['fornecedor'])) {
            // Conecta-se ao banco de dados
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "notas";
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verifica conexão
            if ($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }

            // Prepara a consulta SQL
            $fornecedor = $_POST['fornecedor'];
            $sql = "SELECT * FROM notas_fiscais WHERE fornecedor LIKE '%$fornecedor%'";

            // Adiciona o filtro do número do pedido, se fornecido
            if (isset($_POST['Produto']) && !empty($_POST['Produto'])) {
                $Produto = $_POST['Produto'];
                $sql .= " AND Produto LIKE '%$Produto%'";
            }

            $result = $conn->query($sql);
     
            // Verifica se há resultados
            if ($result->num_rows > 0) {
                // Título da seção
                echo "<h2 class='header'>Notas do fornecedor: $fornecedor</h2>";
                
                // Início da tabela
                echo "<table class='highlight'>";
                echo "<thead>";
                echo "<tr><th>Número da Nota</th><th>Produto</th><th>Valor Unitario</th><th>Data de Emissão</th></tr>";
                echo "</thead>";
                echo "<tbody>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['numero_nota']) . "</td>";
                     echo "<td>" . htmlspecialchars($row['Produto']) . "</td>";
                    echo "<td>R$ " . htmlspecialchars($row['valor_unitario']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['data_emissao']) . "</td>";

                    


                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<p class='red-text'>Nenhum orçamento encontrado para o fornecedor: $fornecedor</p>";
            }
            

            // Fecha a conexão
            $conn->close();
        } else {
            echo "<p>Por favor, insira o nome do fornecedor.</p>";
        }
    }
    ?>
     <a href="formulario.php" class="btn waves-effect waves-light ">
    Voltar Ao Formulario
    <i class="material-icons right">keyboard_backspace</i>
</a>

</div>

<!-- Materialize JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>