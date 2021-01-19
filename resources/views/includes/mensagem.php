<?php 
  if(isset($_SESSION['mensagem'])) { ?>
    <script>
      window.onload = function() {
        M.toast({html: "<?php echo $_SESSION['mensagem']; ?>", classes: 'rounded' });
      };
    </script>
<?php
  } else { 
    if(isset($mensagem)) { ?>
      <script>
        window.onload = function() {
          M.toast({html: "<?php echo $mensagem; ?>", classes: 'rounded' });
        };
      </script>
<?php
    }
  } 
?>