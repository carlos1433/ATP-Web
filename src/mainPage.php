<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include('session_check.php') ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/imgs/ca.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <title>Coisas Emprestadas</title>
</head>
<body> 
    <div>
        <h1 class="mainPageGreetings">Olá <?php echo $_SESSION['userName'] ?>!</h1>
        <div class="mainPageButtonsContainer">
            <a href="myItemsTest.php">
                <button class="mainPageButton">
                    Meus Itens
                </button>
            </a>
            <a href="myAccount.php">
                <button class="mainPageButton">
                    Minha Conta
                </button>
            </a>
        </div>        
        <a href="logout.php">
            <button class="backButton">
                Sair
            </button>                
        </a>        
    </div>
</body>
</html>