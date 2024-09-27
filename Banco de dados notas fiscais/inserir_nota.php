<?php
$servername = "localhost";
$username = "root"; // Seu nome de usuário do banco de dados
$password = ""; // Sua senha do banco de dados
$dbname = "notas"; // Nome do seu banco de dados
$table = "notas_fiscais"; // Nome da sua tabela

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura a ação do formulário
    if (isset($_POST['enviar'])) {
        // Captura os dados do formulário
        $numeroNota = isset($_POST['numero_nota']) ? intval($_POST['numero_nota']) : 0; // Certifica que é um inteiro
        $Produto = isset($_POST['Produto']) ? $_POST['Produto'] : '';
        $dataEmissao = isset($_POST['data_emissao']) ? date('Y-m-d', strtotime($_POST['data_emissao'])) : ''; // Formata a data corretamente
        $fornecedor = isset($_POST['fornecedor']) ? $_POST['fornecedor'] : '';
        $valor = isset($_POST['valor_unitario']) ? floatval($_POST['valor_unitario']) : 0; // Converte para float

        // Verifica se todos os campos obrigatórios foram preenchidos
        if (!empty($numeroNota) && !empty($Produto) && !empty($dataEmissao) && !empty($fornecedor) && $valor > 0) {
            // Cria conexão
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verifica conexão
            if ($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }

            // Prepara a declaração de inserção
            $stmt = $conn->prepare("INSERT INTO $table (numero_nota, Produto, data_emissao, fornecedor, valor_unitario) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("isssd", $numeroNota, $Produto, $dataEmissao, $fornecedor, $valor); // "d" para valor (double)

            // Executa a declaração
            if ($stmt->execute()) {
                echo "Item Cadastrado Com Sucesso";
            } else {
                echo "Erro ao cadastrar o item: " . $stmt->error;
            }

            // Fecha a declaração e a conexão
            $stmt->close();
            $conn->close();
        } else {
            echo "Todos os campos são obrigatórios";
        }
    }
}
?>
