<?php 
// Mensagem
if(!isset($_SESSION['logged'])) {
    session_start();
    echo "Sessão iniciada.";
}
include_once 'mensagem.php';
?>
<div class="navbar-fixed">
    <nav>
        <div class="nav-wrapper">
        <a href="#" class="brand-logo" style="margin-left: 10px;">Logo</a>
        <div class="chip right black white-text" style="margin-top: 1%;">

            <?php echo $_SESSION['user'];?>
        </div>
        <i class="material-icons right black-text">person</i>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="/home">Home</a></li>
            <li><a href="/morador">Moradores</a></li>
            <li><a href="/classificado">Classificados</a></li>
            <li><a href="/api/fornecedor">API</a></li>
            <li><a href="/sair">Sair</a></li>
        </ul>
        </div>
    </nav>
</div>
