<?php
session_start();
require_once 'conexao.php';

class ConsultaAgendar
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function renderCards()
    {
        // Verificar se a conexão é válida
        if ($this->conn->connect_error) {
            echo "Falha na conexão: " . $this->conn->connect_error;
            return;
        }

        try {
            $sql = "SELECT id, nome, sobrenome, especialidade, img_data, email, telefone, CRM, especialidade, endereco, cidade, estado, cep FROM Medico";
            $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo $this->renderCard($row);
                }
            } else {
                echo "Nenhum médico encontrado.";
            }
        } catch (Exception $e) {
            echo "Erro na busca dos dados: " . $e->getMessage();
        }
    }

    private function renderCard($medicoData)
    {
        $nomeSobrenome = urlencode($medicoData['nome'] . ' ' . $medicoData['sobrenome']);
        $especialidade = urlencode($medicoData['especialidade']);
        $emails = urlencode($medicoData['email']);
        $endereco = urlencode($medicoData['endereco'] . ' ' . $medicoData['cidade'] . ' ' . $medicoData['estado'] . ' ' . $medicoData['cep']);
        $telefone = urlencode($medicoData['telefone']);
        $crm = urlencode($medicoData['CRM']);
        
        // Converte os dados binários da imagem para uma string base64
        $imgBase64 = ($medicoData['img_data']);

return '
    <div class="col-md-4 mb-4">
        <div class="card" style="width: 18rem;">
            <img src="' . $imgBase64 . '" class="card-img-top" alt="Imagem do Médico">
            <div class="card-body">
                <h5 class="card-title">' . $medicoData['nome'] . ' ' . $medicoData['sobrenome'] . '</h5>
                <p class="card-text">Especialidade: ' . $medicoData['especialidade'] . '</p>
                <a href="formulario.php?id_medico=' . $medicoData['id'] . '&nome=' . $nomeSobrenome . '&especialidade=' . $especialidade .'&email=' . $emails . '&endereco=' . $endereco . '&img_data=' . $imgBase64 . '&tell=' . $telefone . '&crm=' . $crm .'" class="btn btn-primary">Agendar</a>
            </div>
        </div>
    </div>';
    }
}
?>
