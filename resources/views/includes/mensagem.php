<?php 
// SESSÃO 
  session_start();
  if(empty($_SESSION['mensagem'])) { ?>
    <script>
      window.onload = function() {
        M.toast({html: "<?php echo $_SESSION['mensagem']; ?>", classes: 'rounded' });
      };
    </script>
<?php
  $_SESSION['mensagem'] = "";
} else { 
  if(isset($mensagem)) { ?>
      <script>
        window.onload = function() {
          M.toast({html: "<?php echo $mensagem; ?>", classes: 'rounded' });
        };
      </script>
<?php
    $mensagem = "";
    }
  }
// session_unset();
?>