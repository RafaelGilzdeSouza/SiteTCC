<!DOCTYPE html>
<html>

<head>
    <title>Formulário de Cadastro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="jquery.inputmask.min.js"></script>

</head>

<body>
    <div class="container">
        <h2>Formulário de Cadastro</h2>
        <form>
            <div class="form-group">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 ">
                    <label for="inputPassword4">Senha</label>
                    <input type="password" class="form-control larger-input" id="inputPassword4" placeholder="Senha">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Confirmar Senha</label>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="Senha">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Endereço</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="Rua dos Bobos, nº 0">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Cidade</label>
                    <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputEstado">Estado</label>
                    <select id="inputEstado" class="form-control">
                        <option selected>
                            <script>
                                var estados = ["AC", "AL", "AM", "AP", "BA", "CE", "DF", "ES", "GO", "MA", "MG", "MS", "MT", "PA", "PB", "PE", "PI", "PR", "RJ", "RN", "RO", "RR", "RS", "SC", "SE", "SP", "TO"];

                                estados.forEach(function(estado) {
                                    document.write('<option value="' + estado + '">' + estado + '</option>');
                                });
                            </script>
                        </option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputCEP">CEP</label>
                    <input type="text" class="form-control" id="inputCEP" placeholder="0000-0000">
                </div>
            </div>

            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Sexo:</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="opcao1" checked>
                            <label class="form-check-label" for="gridRadios1">
                                Masculino
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="opcao2">
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
            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
    </div>

    <!-- Seu formulário vai aqui -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>