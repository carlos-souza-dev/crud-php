<?php 
include_once 'includes/header.php';
?>
<div class="row">
  <div class="col s12 m6 push-m3">
  <h3 class="light">Novo Morador</h3> 
    <form action="/cadastrar" method="POST">
        <div class="row">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome">
                <label for="nome"> Nome </label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="sobrenome" id="sobrenome">
                <label for="sobrenome"> Sobrenome </label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="email" id="email">
                <label for="email"> E-mail </label>
            </div>

            <div class="input-field col s6">
                <input type="password" name="pass" id="pass">
                <label for="pass"> Senha </label>
            </div>
            <div class="input-field col s6">
                <input type="password" name="confirmpass" id="confirmpass">
                <label for="confirmpass"> Confirmar Senha </label>
            </div>

            <div class="input-field col s6">
                <input type="text" name="idade" id="idade">
                <label for="idade"> Idade </label>
            </div>

            <div class="input-field col s3">
                <input type="text" name="bloco" id="bloco">
                <label for="bloco"> Bloco </label>
            </div>

            <div class="input-field col s3">
                <input type="text" name="apto" id="apto">
                <label for="apto"> Apartamento </label>
            </div>
        </div>

        <button type="submit" name="btn-cadastrar" class="btn"> Salvar </button>
        <a href="/" class="btn red"> Voltar </a>
    </form>
  </div>
</div>
<?php
include_once 'includes/footer.php';
?>