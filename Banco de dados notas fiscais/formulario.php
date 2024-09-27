<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orçamento Geral Consorcio Requalifica Salvador</title>
    <!-- Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
            font-family: 'Josefin Sans', sans-serif;/* Adiciona a fonte Roboto */
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
    font-size: 32px; /* Aumenta o tamanho da fonte */
    font-weight: 700; /* Aumenta o peso da fonte para negrito */
    text-align: center;
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 1px; /* Adiciona um espaçamento entre as letras para melhor legibilidade */
    font-family: 'Roboto', sans-serif;
}

    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h3 class="card-title">Cadastramento Orçamentario Consorcio Requalifica</h3>
        <form method="post" action="inserir_nota.php">
            <div class="input-field">
                <i class="material-icons prefix">receipt</i>
                <input id="numero_nota" type="text" name="numero_nota" required>
                <label for="numero_nota">Número da Nota</label>
            </div>
            <div class="input-field">
                <i class="material-icons prefix">list_alt</i>
                <input id="Produto" type="text" name="Produto" required>
                <label for="Produto">Produto</label>
            </div>
            <div class="input-field">
                <i class="material-icons prefix">date_range</i>
                <input id="data_emissao" type="text"  name="data_emissao" required>
                <label for="data_emissao">Data de Emissão</label>
            </div>
            <div class="input-field">
                <i class="material-icons prefix">store</i>
                <input id="fornecedor" type="text" name="fornecedor" required>
                <label for="fornecedor">Fornecedor</label>
            </div>
            <div class="input-field">
                <i class="material-icons prefix">attach_money</i>
                <input id="valor_unitario" type="text" name="valor_unitario"  required>
                <label for="valor_unitario">Valor Unitario</label>
            </div>
            <div class="input-field center-align">
                <!-- Botão Enviar -->
                <button class="btn waves-effect waves-light" type="submit" name="enviar">Enviar
                    <i class="material-icons right">send</i>
                </button>
                <!-- Botão Buscar Nota, agora com a classe 'blue' para a cor -->
            
            </div>
            <div>
            <a href="busca.php" class="btn waves-effect waves-light blue">
    Buscar Fornecedor
    <i class="material-icons right">search</i>
</a>
    </div>
        </form>
    </div>
</div>

<!-- Materialize JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.datepicker');
        var instances = M.Datepicker.init(elems, {
            format: 'dd/mm/yyyy'
        });
    });
</script>
</body>
</html