<?php 
if(!isset($_SESSION['logged'])) {
    session_start();
    echo "Sessão iniciada.";
}
// Mensagem
include_once 'includes/mensagem.php';
// HEADER -->
include_once 'includes/header.php';

?>

    <div class="container">
      <div class="row">
          <div class="col m12">
              <h2 class="center-align">Login</h2>
              <div class="row">
                  <form class="col s12" action="/" method="POST">
                      <div class="row">
                          <div class="input-field col s12">
                              <input id="email" type="email" name="email" class="validate">
                              <label for="email">Email</label>
                          </div>
                      </div>
                      <div class="row">
                          <div class="input-field col s12">
                              <input id="pass" type="password" name="pass" class="validate">
                              <label for="pass">Password</label>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col m2">
                              <p class="right-align">
                                  <button class="btn btn-large waves-effect waves-light" type="submit" name="btn-logar">Login</button>
                              </p>
                          </div>
                          <div class="col m2">
                              <p class="right-align">
                                  <a href="/cadastrar" class="btn btn-large waves-effect waves-light blue">Cadastrar</a>
                              </p>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>

<?php 
// FOOTER
include_once 'includes/footer.php';
?>