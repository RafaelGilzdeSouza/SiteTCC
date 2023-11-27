<!DOCTYPE html>
<html lang="en">

<head>
<?php require 'header.php';    ?>
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Cadastro de Médico
                    </div>
                    <div class="card-body">
                    <form method="post" action="processa_cadastro_medico.php" enctype="multipart/form-data">
                            <!-- Nome e Sobrenome -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sobrenome">Sobrenome</label>
                                    <input type="text" class="form-control" id="sobrenome" name="sobrenome" required>
                                </div>
                            </div>

                            <!-- Data de Nascimento, Sexo e E-mail -->
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="data_nascimento">Data de Nascimento</label>
                                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="sexo">Sexo</label>
                                    <select class="form-control" id="sexo" name="sexo">
                                        <option value="M">Masculino</option>
                                        <option value="F">Feminino</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>

                            <!-- Telefone e CRM -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="telefone">Telefone</label>
                                    <input type="tel" class="form-control" id="telefone" name="telefone">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="crm">CRM</label>
                                    <input type="text" class="form-control" id="crm" name="crm" required>
                                </div>
                            </div>

                            <!-- Especialidade, Endereço, Cidade e Estado -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="especialidade">Especialidade</label>
                                    <input type="text" class="form-control" id="especialidade" name="especialidade">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="endereco">Endereço</label>
                                    <input type="text" class="form-control" id="endereco" name="endereco">
                                </div>
                            </div>

                            <!-- Cidade, Estado, CEP e URL da Imagem -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="cidade">Cidade</label>
                                    <input type="text" class="form-control" id="cidade" name="cidade">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="estado">Estado</label>
                                    <input type="text" class="form-control" id="estado" name="estado" maxlength="2">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="cep">CEP</label>
                                    <input type="text" class="form-control" id="cep" name="cep">
                                </div>
                            </div>
                            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Senha</label>
                    <input name="senha" type="password" class="form-control" id="inputPassword4" placeholder="Senha">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputConfirmPassword4">Confirmar Senha</label>
                    <input name="confirmar_senha" type="password" class="form-control" id="inputConfirmPassword4"
                        placeholder="Confirmar Senha" oninput="validarSenha()">
                    <small id="senhaHelpBlock" class="form-text text-muted">
                        As senhas devem ser iguais.
                    </small>
                </div>
            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="Foto_de_Perfil">Foto de Perfil</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFileLang" name="imagem" accept="image/*">
                                        <label class="custom-file-label" for="customFileLang">Selecionar Arquivo</label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary" id="btnCadastro" disabled>Cadastrar </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function validarSenha() {
        var senha = document.getElementById("inputPassword4").value;
        var confirmarSenha = document.getElementById("inputConfirmPassword4").value;
        var senhaHelpBlock = document.getElementById("senhaHelpBlock");
        var botaoCadastro = document.getElementById("btnCadastro");

        if (senha === confirmarSenha) {
            senhaHelpBlock.style.color = "green";
            senhaHelpBlock.style.backgroundColor = "#00FF00";
            senhaHelpBlock.innerHTML = "Senhas coincidem!";
            botaoCadastro.disabled = false;
        } else {
            senhaHelpBlock.style.color = "red";
            senhaHelpBlock.style.backgroundColor = "#f8d7da"; 
            senhaHelpBlock.innerHTML = "Senhas não coincidem.";
            botaoCadastro.disabled = true;
        }
    }
</script>

</body>

</html>