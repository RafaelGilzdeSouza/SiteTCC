<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <title>Perfil do Médico</title>
</head>

<body>

    <?php
    require "menu.php";
    include 'consulta_agendar.php';

    // Verificar se as chaves existem no array $_GET
    $id_medico = isset($_GET['id_medico']) ? $_GET['id_medico'] : null;
    $nome = isset($_GET['nome']) ? urldecode($_GET['nome']) : '';
    $especialidade = isset($_GET['especialidade']) ? urldecode($_GET['especialidade']) : '';
    $email = isset($_GET['email']) ? urldecode($_GET['email']) : '';
    $img_url = isset($_GET['img_url']) ? urldecode($_GET['img_url']) : '';
    $endereco = isset($_GET['endereco']) ? urldecode($_GET['endereco']) : '';
    $telefone = isset($_GET['tell']) ? urldecode($_GET['tell']) : '';
    $crm = isset($_GET['crm']) ? urldecode($_GET['crm']) : '';
    ?>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <!-- Imagem à esquerda do texto -->
                <img src="img/medico.jpg" alt="Imagem do Médico" style="width: 100%; max-width: 300px;">
            </div>
            <div class="col-md-6">
                <!-- Texto à direita da imagem -->
                <h5><?= $nome ?></h5>
                <p>Especialidade: <?= $especialidade ?></p>
                <p>Email: <?= $email ?></p>
                <p>Endereço: <?= $endereco ?></p>
                <p>Fone: <?= $telefone ?></p>
                <p>CRM: <?= $crm ?></p>
            </div>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Aviso</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Por favor, selecione uma data e hora antes de enviar o formulário.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Adicione a seção do datepicker fora do card -->
        <div class="mt-4">
            <h5>Agendar Consulta</h5>
            <form action="form_consulta.php" method="post">
                <!-- Selecione uma data -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="datepicker">Selecione uma data:</label>
                        <input type="text" class="form-control" id="datepicker" name="date" autocomplete="off">
                    </div>

                    <!-- Lista de seleção para horários disponíveis -->
                    <div class="form-group col-md-6">
                        <label for="horario">Horários disponíveis:</label>
                        <select class="form-control" id="horario" name="horario"></select>
                    </div>
                </div>

                <!-- Container para mostrar horários disponíveis -->
                <div id="horarios-disponiveis"></div>

        </div>
        <!-- Seção de Anamnese -->
        <h6>Anamnese</h6>

        <!-- Sintomas Atuais -->
        <div class="form-group">
            <label for="nivel_sintomas">Nível dos Sintomas Atuais:</label>
            <select class="form-control" id="nivel_sintomas" name="nivel_sintomas">
                <option value="nenhum">Nenhum</option>
                <option value="leve">Leve</option>
                <option value="moderado">Moderado</option>
                <option value="grave">Grave</option>
            </select>
        </div>

        <!-- Sintomas Atuais -->
        <div class="form-group row">
            <label class="col-md-2 col-form-label">Sintomas Atuais:</label>
            <div class="col-md-5">
                <div class="checkbox-list">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sintoma_dor" name="sintomas[]" value="Dor">
                        <label class="form-check-label" for="sintoma_dor">Dor</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sintoma_fadiga" name="sintomas[]" value="Fadiga">
                        <label class="form-check-label" for="sintoma_fadiga">Fadiga</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sintoma_febre" name="sintomas[]" value="Febre">
                        <label class="form-check-label" for="sintoma_febre">Febre</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sintoma_tontura" name="sintomas[]" value="Tontura ou Vertigem">
                        <label class="form-check-label" for="sintoma_tontura">Tontura ou Vertigem</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sintoma_nauseas" name="sintomas[]" value="Náuseas e Vômitos">
                        <label class="form-check-label" for="sintoma_nauseas">Náuseas e Vômitos</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sintoma_perda_peso" name="sintomas[]" value="Perda de Peso Inexplicada">
                        <label class="form-check-label" for="sintoma_perda_peso">Perda de Peso Inexplicada</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sintoma_alteracoes_apetite" name="sintomas[]" value="Alterações no Apetite">
                        <label class="form-check-label" for="sintoma_alteracoes_apetite">Alterações no Apetite</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sintoma_dificuldade_respiratoria" name="sintomas[]" value="Dificuldade Respiratória">
                        <label class="form-check-label" for="sintoma_dificuldade_respiratoria">Dificuldade Respiratória</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sintoma_tosse" name="sintomas[]" value="Tosse">
                        <label class="form-check-label" for="sintoma_tosse">Tosse</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sintoma_gastrointestinal" name="sintomas[]" value="Sintomas Gastrointestinais">
                        <label class="form-check-label" for="sintoma_gastrointestinal">Sintomas Gastrointestinais</label>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="checkbox-list">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sintoma_mudancas_miccao" name="sintomas[]" value="Mudanças na Micção">
                        <label class="form-check-label" for="sintoma_mudancas_miccao">Mudanças na Micção</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sintoma_neurologico" name="sintomas[]" value="Sintomas Neurológicos">
                        <label class="form-check-label" for="sintoma_neurologico">Sintomas Neurológicos</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sintoma_problemas_sono" name="sintomas[]" value="Problemas de Sono">
                        <label class="form-check-label" for="sintoma_problemas_sono">Problemas de Sono</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sintoma_alteracoes_comportamento" name="sintomas[]" value="Alterações no Humor ou Comportamento">
                        <label class="form-check-label" for="sintoma_alteracoes_comportamento">Alterações no Humor ou Comportamento</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sintoma_erupcoes_cutaneas" name="sintomas[]" value="Erupções Cutâneas ou Lesões na Pele">
                        <label class="form-check-label" for="sintoma_erupcoes_cutaneas">Erupções Cutâneas ou Lesões na Pele</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sintoma_visuais_auditivos" name="sintomas[]" value="Problemas Visuais ou Auditivos">
                        <label class="form-check-label" for="sintoma_visuais_auditivos">Problemas Visuais ou Auditivos</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sintoma_sangramento_anormal" name="sintomas[]" value="Sangramento Anormal">
                        <label class="form-check-label" for="sintoma_sangramento_anormal">Sangramento Anormal</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sintoma_problemas_menstruais" name="sintomas[]" value="Problemas Menstruais">
                        <label class="form-check-label" for="sintoma_problemas_menstruais">Problemas Menstruais</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sintoma_dor_articulacoes_musculos" name="sintomas[]" value="Dor nas Articulações ou Músculos">
                        <label class="form-check-label" for="sintoma_dor_articulacoes_musculos">Dor nas Articulações ou Músculos</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sintoma_respiratorios" name="sintomas[]" value="Sintomas Respiratórios">
                        <label class="form-check-label" for="sintoma_respiratorios">Sintomas Respiratórios</label>
                    </div>
                </div>
            </div>

        </div>
        <div class="form-group row">
            <label class="col-md-2 col-form-label">Outros Sintomas:</label>
            <div class="col-md-10">
                <textarea class="form-control" id="outros_sintomas" name="outros_sintomas" rows="3"></textarea>
            </div>
        </div>

        <div class="form-row">
            <!-- História Médica Pregressa -->
            <div class="form-group col-md-6">
                <label for="historia_medica">História Médica Pregressa:</label>
                <select class="form-control" id="historia_medica" name="historia_medica">
                    <option value="nenhuma">Nenhuma</option>
                    <option value="cirurgia">Cirurgia</option>
                    <option value="hospitalizacao">Hospitalização</option>
                    <option value="alergias">Alergias Conhecidas</option>
                </select>
            </div>

            <!-- Medicamentos Atuais -->
            <div class="form-group col-md-6">
                <label for="medicamentos">Medicamentos Atuais:</label>
                <select class="form-control" id="medicamentos" name="medicamentos">
                    <option value="nenhum">Nenhum</option>
                    <option value="prescricao">Prescrição</option>
                    <option value="sem_prescricao">Sem Prescrição</option>
                    <option value="suplementos">Suplementos Vitamínicos</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <!-- Histórico Familiar -->
            <div class="form-group col-md-6">
                <label for="historico_familiar">Histórico Familiar:</label>
                <select class="form-control" id="historico_familiar" name="historico_familiar">
                    <option value="nenhum">Nenhum</option>
                    <option value="doenca_cardiaca">Doença Cardíaca</option>
                    <option value="cancer">Câncer</option>
                    <option value="diabetes">Diabetes</option>
                </select>
            </div>

            <!-- Estilo de Vida -->
            <div class="form-group col-md-6">
                <label for="estilo_vida">Estilo de Vida:</label>
                <select class="form-control" id="estilo_vida" name="estilo_vida">
                    <option value="sedentario">Sedentário</option>
                    <option value="ativo">Ativo</option>
                </select>
            </div>
        </div>

        <!-- Vacinação -->
        <div class="form-group">
            <label for="vacinas">Vacinação:</label>
            <select class="form-control" id="vacinas" name="vacinas">
                <option value="completa">Completa</option>
                <option value="incompleta">Incompleta</option>
                <option value="nao_vacinado">Não Vacinado</option>
            </select>
        </div>
        <!-- Campos ocultos para id_usuario e id_medico -->
        <div class="form-group">
            <input type="hidden" name="id_usuario" value="<?php echo isset($_SESSION['id_usuario']) ? htmlspecialchars($_SESSION['id_usuario']) : ''; ?>">
            <input type="hidden" name="id_medico" value="<?php echo isset($_GET['id_medico']) ? htmlspecialchars($_GET['id_medico']) : ''; ?>">
        </div>
        

<!-- Adicione o evento onclick ao seu botão -->
<button type="submit" class="btn btn-primary" onclick="return validarEnvio()">Cadastro</button>
        </form>    
        <script>
            $(document).ready(function() {
                $('#datepicker').datepicker({
                    format: 'yyyy/mm/dd',
                    autoclose: true,
                    todayHighlight: true,
                    startDate: new Date()
                });

                $('#datepicker').on('changeDate', function(e) {
                    var dataSelecionada = $('#datepicker').val();
                    console.log('Data Selecionada:', dataSelecionada);

                    $.ajax({
                        type: "POST",
                        url: "obter_horarios.php",
                        data: {
                            data: dataSelecionada
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log('Resposta da AJAX:', response);

                            // Preencha a lista de seleção com os horários disponíveis
                            var horarioSelect = $('#horario');
                            horarioSelect.empty();
                            $.each(response, function(index, value) {
                                horarioSelect.append('<option value="' + value + '">' + value + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Erro na AJAX:', error);
                        }
                    });
                });
                
            });
            function validarEnvio() {
    var data = document.getElementById('datepicker').value;
    var horario = document.getElementById('horario').value;

    // Verifique se a data e o horário foram selecionados
    if (data === '' || horario === '') {
      // Se não foram selecionados, exiba o modal
      $('#myModal').modal('show');
      return false; // Impede o envio do formulário
    }
    $('#successModal').modal('show');
    // Se a data e o horário foram selecionados, permita o envio do formulário
    return true;
  }
        </script>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

</body>

</html>
<?php require "rodape.php"; ?>