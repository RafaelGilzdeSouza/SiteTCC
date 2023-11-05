<!DOCTYPE html>
<html lang="en">

<head>
    <title>Formulário de Cadastro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="jquery.inputmask.min.js"></script>

</head>

<body>
    <div class="container">
        <h2>Formulário de Cadastro</h2>
        <form action="validador_de_cadastro.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputname4">Nome</label>
                    <input name="nome" type="text" class="form-control" placeholder="Nome">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputlastname4">Sobrenome</label>
                    <input name="sobrenome" type="text" class="form-control" placeholder="Sobrenome">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputTell4">Telefone</label>
                    <input name="telefone" type="tell" class="form-control" id="inputTell4" placeholder="(00)0000-0000">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Senha</label>
                    <input name="senha" type="password" class="form-control" id="inputPassword4" placeholder="Senha">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputConfirmPassword4">Confirmar Senha</label>
                    <input name="confirmar_senha" type="password" class="form-control" id="inputConfirmPassword4" placeholder="Confirmar Senha">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Endereço</label>
                <input name="endereco" type="text" class="form-control" id="inputAddress" placeholder="Rua dos Bobos, nº 0">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Cidade</label>
                    <input name="cidade" type="text" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputEstado">Estado</label>
                    <select name="estado" id="inputEstado" class="form-control">
                        <option selected disabled>Escolha um estado</option>
                        <?php
                            $estados = ["AC", "AL", "AM", "AP", "BA", "CE", "DF", "ES", "GO", "MA", "MG", "MS", "MT", "PA", "PB", "PE", "PI", "PR", "RJ", "RN", "RO", "RR", "RS", "SC", "SE", "SP", "TO"];
                            foreach ($estados as $estado) {
                                echo '<option value="' . $estado . '">' . $estado . '</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputCEP">CEP</label>
                    <input name="cep" type="text" class="form-control" id="inputCEP" placeholder="0000-0000">
                </div>
            </div>

            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Sexo:</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexo" id="gridRadios1" value="Masculino" checked>
                            <label class="form-check-label" for="gridRadios1">
                                Masculino
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexo" id="gridRadios2" value="Feminino">
                            <label class="form-check-label" for="gridRadios2">
                                Feminino
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>


            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Clique em mim
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Cadastro</button>
            
        </form>
    </div>

    <!-- Your form goes here -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
