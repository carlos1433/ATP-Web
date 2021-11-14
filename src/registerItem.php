<?php 
    session_start();
    include('session_check.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/src/Imagens/ca.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <title>userName - Minha Conta</title>
</head>
<body>
    <div>
        <?php if(isset($_SESSION['itemRegistered'])): ?>
        <button class="newUserSuccessButton">Item cadastrado com sucesso!</button>  
        <?php 
            endif;
            unset($_SESSION['itemRegistered']);
        ?>      
        <form action="registerNewItem.php" method="post">            
            <div class="inputTable">
                <label >Nome Item: </label>
                <input type="text" name="itemName" required>
                <label>Data Empréstimo: </label>
                <input type="date" name="loanDate" required>
                <label>Email Destinatário:</label>
                <input type="email" name="loanContact" required>
                <label for="">Data Devolução:</label>
                <input type="date" name="returnDate">
                <button type="button" class="inputTableBackButton">
                    <a href="myItems.html">
                    Voltar
                    </a>
                </button>
                <button type="submit" class="inputTableSaveButton" >Salvar</button>
            </div>      
        </form>
    </div> 
</body>
</html>