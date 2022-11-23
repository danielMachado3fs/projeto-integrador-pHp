<div class="flex-container">
    <div class="imagem"></div>
    <div class="form-container">
        <div src="img">
            <div class="logo">
                <img src="images/logosimbolo.svg">
            </div>
            <form action="/autenticar" method="POST">
                <div class="form">
                    <div>
                        <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Usuário" required>
                    </div>
                    <div>
                        <input type="password" name="senha" class="form-control" id="senha" placeholder="Senha" required>
                    </div>
                    <div>
                        <button class="btn-entrar" type="submit">Entrar</button>
                    </div>
                    <?php if ($this->view->login == 'erro') { ?>
                        <div class="row">
                            <div class="col mt-2">
                                <small style="font-size:14px" class="text text-danger">Usuário ou senha inválidos!</small>
                            </div>
                        </div>
                    <?php } ?>
                    <br>
                    <div>
                        <a href="#">Esqueceu a senha?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>