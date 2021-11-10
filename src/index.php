<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/imgs/ca.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <title>Coisas Emprestadas</title>
    
</head>
<body>     
    <div>
        
        <form action="loginCheck.php" method="post">
            <h2>Login</h2>
            <input type="text" name="loginField"  placeholder="Digite seu login" required>
            <h2>Senha</h2>
            <input type="password" name="pwField" placeholder="Digite sua senha" required><br>
            <button type="submit">Login</button>            
        </form><br>
        
        <a href="registerUser.html" class="registerLink" >Não tem uma conta? Registrar</a>
        <?php 
            if(isset($_SESSION['unauth'])):
        ?>
        <button class="userPwError">Usuário ou senha inválidos!</button>
        <?php
        endif;
        unset($_SESSION['unauth']);
        ?>
    </div>    
</body>
</html>
