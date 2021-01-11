<?php 
// CONEXÃO
include_once 'php_action/db_connect.php';
// HEADER
include_once 'includes/header.php';
// SELECT
if(isset($_GET['id'])):
    $id = mysqli_escape_string($connect, $_GET['id']);

    $sql = "SELECT * FROM clientes WHERE id = '$id'";
    $result = mysqli_query($connect, $sql);
    $data = mysqli_fetch_array($result);
endif;
?>
<div class="row">
  <div class="col s12 m6 push-m3">
  <h3 class="light">Editar Cliente</h3> 
    <form action="/editar" method="POST">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <div class="input-field col s12">
            <input type="text" name="nome" id="nome" value="<?php echo $data['nome']; ?>">
            <label for="nome"> Nome </label>
        </div>

        <div class="input-field col s12">
            <input type="text" name="sobrenome" id="sobrenome"  value="<?php echo $data['sobrenome']; ?>">
            <label for="sobrenome"> Sobrenome </label>
        </div>

        <div class="input-field col s12">
            <input type="text" name="email" id="email"  value="<?php echo $data['email']; ?>">
            <label for="email"> E-mail </label>
        </div>

        <div class="input-field col s12">
            <input type="text" name="idade" id="idade"  value="<?php echo $data['idade']; ?>">
            <label for="idade"> Idade </label>
        </div>

        <button type="submit" name="btn-editar" class="btn"> Cadastrar </button>
        <a href="index.php" class="btn green"> Lista de Clientes </a>
    </form>
  </div>
</div>
<?php
include_once 'includes/footer.php';
?>