<div class="row">
    <div class="col-sm">
    </div>
    <!--Utilizando espaçamento-->
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
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    <div class="col-sm">
    </div>
</div>