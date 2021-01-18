<?php 
// HEADER
include_once 'includes/header.php';
// MENSAGEM
include_once 'includes/mensagem.php';
?>

    <div class="container">
      <div class="row">
          <div class="col m12">
              <h2 class="center-align">Login</h2>
              <div class="row">
                  <form class="col s12" action="/morador/login" method="POST">
                      <div class="row">
                          <div class="input-field col s12">
                              <input id="email" type="email" class="validate">
                              <label for="email">Email</label>
                          </div>
                      </div>
                      <div class="row">
                          <div class="input-field col s12">
                              <input id="pass" type="password" class="validate">
                              <label for="pass">Password</label>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col m12">
                              <p class="right-align">
                                  <button class="btn btn-large waves-effect waves-light" type="button" name="action">Login</button>
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