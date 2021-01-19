<?php 
if(!isset($_SESSION['logged'])) {
  session_start();
  echo "Sessão iniciada.";
}
// HEADER -->
include_once 'includes/header.php';
// Menu
include_once 'includes/menu.php';

?>


<div class="row">
  <div class="col s12 m6 push-m3">
  <h3 class="light">Novo Classificado</h3> 
    <form action="/classificado/adicionar" method="POST">
      <div class="row">
        <div class="input-field col s2">
            <input type="text" name="id_morador" id="id_morador">
            <label for="id_morador"> Morador </label>
        </div>

        <div class="input-field col s2">
            <input type="text" name="titulo_classificado" id="titulo_classificado">
            <label for="titulo_classificado"> Titulo </label>
        </div>

        <div class="input-field col s8">
            <input type="text" name="descricao_classificado" id="descricao_classificado">
            <label for="descricao_classificado"> Descrição </label>
        </div>

        <button type="submit" name="btn-cadastrar" class="btn"> Cadastrar </button>
        <a href="/home" class="btn green"> Home </a>
      </div>
    </form>
  </div>
</div>
<?php
include_once 'includes/footer.php';
?>