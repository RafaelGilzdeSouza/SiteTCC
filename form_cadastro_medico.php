<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Médico</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                                    <label for="senha">Senha</label>
                                    <input type="password" class="form-control" id="senha" name="senha" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="confirma_senha">Confirmação de Senha</label>
                                    <input type="password" class="form-control" id="confirma_senha" name="confirma_senha" required>
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

                            <button type="submit" class="btn btn-primary">Cadastrar Médico</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>