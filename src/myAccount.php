<?php 
    session_start();
    include('connect.php');
    include('session_check.php')
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/imgs/ca.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <title>userName - Minha Conta</title>
</head>
<body>
    <div>
        <h2>Usuário: <?php echo $_SESSION['loginField'] ?></h2>
        <?php if(isset($_SESSION['updatedPw'])): ?>
        <button class="newUserSuccessButton">Senha alterada com sucesso!</button>
        <?php 
            endif;
            unset($_SESSION['updatedPw']);
        ?>
        <?php if(isset($_SESSION['pwIsDifferent'])): ?>
        <button class="newUserFailButton">Senha não confere!</button>
        <?php
        endif;
        unset($_SESSION['pwIsDifferent']);
        ?>
        <form action="changePassword.php" method="POST">
            <div class="inputTable">
                <label for="oldPw">Senha atual: </label>
                <input type="password" class="changePw" name="currentPw">
                <label for="newPw">Nova senha:</label>
                <input type="password" class="changePw" name="newPw">
                <label for="newPw">Nova senha:</label>
                <input type="password" class="changePw" name="newPwSameCheck">
                
                <button type="button" class="inputTableBackButton">
                    <a href="mainPage.php">
                            Voltar
                    </a>
                </button>
                <button type="submit" class="inputTableSaveButton">Salvar</button>
            </div>
        </form>
    </div> 
</body>
</html>