<?php 
  session_start();  
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/src/Imagens/ca.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <title>Coisas Emprestadas - Novo Usuário</title>
</head>
<body>
  <div>
    <?php 
      if(isset($_SESSION['registerSuccess'])):
    ?>
    <button class="newUserSuccessButton">Usuário cadastrado com sucesso!</button>
    <?php 
      endif;
      unset($_SESSION['registerSuccess']);
    ?>
    <?php 
      if(isset($_SESSION['userExists'])):
    ?>
    <button class="newUserFailButton">Usuário já existe! Tente Novamente!</button>
    <?php 
      endif;
      unset($_SESSION['userExists']);
    ?>
    <form action="registerNewUser.php" method="post" class="">
        <h2>Nome e Sobrenome</h2>
        <input type="text" name="nameField" placeholder="Nome e Sobrenome" required>
        <h2>Login</h2>
        <input type="text"  name="loginField"  placeholder="Digite seu login" required>
        <h2>Senha</h2>
        <input type="password" name="pwField" placeholder="Digite sua senha" required><br>
        <button type="submit" class="registerButton">Registrar</button>
    </form>
    <a href="index.php">
      <button class="inputTableBackButton">
        Voltar
      </button>
    </a>
</div>
</body>
</html>