<?php
if (isset($_GET['error'])) {
    $error_message = $_GET['error'];
    echo'<link rel="stylesheet" href="CSS/style.css" />';
    echo'<div class="login-page">';
    echo'<div class="form">';
    echo'<form class="register-form" action="classe/Cadastrese.php">';
    echo'<input type="text" name="cpf" id="cpf" placeholder="Cpf" required/>';
    echo'<input type="text" name="nome" id="nome" placeholder="Nome" required/>';
    echo'<input type="text" name="celular" id="celular" placeholder="Celular" required/>';
    echo'<input type="text" name="email" id="email" placeholder="email" required/>';
    echo'<input type="text" name="login" id="login" placeholder="Login" required/>';
    echo'<input type="password" name="senha" id="senha" placeholder="Senha" required/>';
    echo'<button>Criar</button>';
    echo'<p class="message">Já tem um Login? <a href="#">Login</a></p>';
    echo'</form>';
    echo'<form class="login-form" action="classe/Login.php">';
    echo'<input type="text" name="login" placeholder="Login" required/>';
    echo'<input type="password" name="senha" placeholder="Senha" required/>';
    echo'<p>' . $error_message . '</p>';
    echo'<button>login</button>';
    echo'<p class="message">';
    echo'Não é Registrado? <a href="#">Crie uma conta</a>';
    echo'</p>';
    echo'</form>';
    echo'</div>';
    echo'</div>';
    echo'<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>';
    echo'<script src="JS/script.js"></script>';
    exit();
} 
else{
    include("HTML/index.html");
}



?>