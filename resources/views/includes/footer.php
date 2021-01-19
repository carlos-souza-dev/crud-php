<!--JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
    <script>
        M.AutoInit();
    </script>
    </body>
    <?php 
        if(isset($_SESSION['mensagem'])){
            unset($_SESSION['mensagem']);
        }
    ?>
</html>