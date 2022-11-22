<!-- <div class="row">
    <div class="col-sm">
    </div>
    <div class="col-sm mt-5">
        <h1>Login</h1>
        <form method="POST" action="/autenticar">
            <div class="form-group">
                <input type="text" name="email" class="form-control" id="usuario" placeholder="E-mail">

            </div>
            <div class="form-group">
                <input type="password" name="senha" class="form-control" id="senha" placeholder="Senha">
                <small id="ajudausuario" class="form-text text-muted">Esqueci minha senha</small>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
            <?php if ($this->view->login == 'erro') { ?>
                <div class="row">
                    <div class="col">
                        <span class="text text-danger">Usuário invalido</span>
                    </div>
                </div>
            <?php } ?>
        </form>
    </div>
    <div class="col-sm">
    </div>
</div> -->
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
                        <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Usuário">
                    </div>
                    <div>
                        <input type="password" name="senha" class="form-control" id="senha" placeholder="Senha">
                    </div>
                    <div>
                        <button class="btn-entrar" type="submit">Entrar</button>
                    </div>
                    <?php if ($this->view->login == 'erro') { ?>
                        <div class="row">
                            <div class="col">
                                <small class="text text-danger">Usuário ou senha inválidos</small>
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