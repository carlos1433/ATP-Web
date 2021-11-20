<?php
    session_start();
    include('connect.php');
    include('session_check.php');
    $id = $_SESSION['userID'];
    

    $sql = "SELECT COUNT(*) AS ITEMS FROM items WHERE item_owner_ID = $id";
    $result = mysqli_query($connection, $sql);
    $items_total = mysqli_fetch_assoc($result)["ITEMS"];

    $sql = "SELECT item_name, item_loan_date, item_loan_contact, item_return_date, item_returned FROM items WHERE item_owner_ID = $id ORDER BY item_loan_date";
    $result = mysqli_query($connection, $sql);
    $items_data = mysqli_fetch_all($result);
    #var_dump($items_data);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="/imgs/ca.ico" type="image/x-icon">
    <title>userName - Coisas Emprestadas</title>
</head>
<body>
    <form action="#">
        <div class="myItemsTableContainer">
            <table>
                <tr>
                    <th>Item</th>
                    <th>Data Empréstimo</th>
                    <th>Contato Destinatário</th>
                    <th>Data Devolução</th>
                    <th>Devolvido</th>
                </tr>
                <?php 
                for ($i = 0; $i < $items_total; $i++){
                ?>
                <tr>
                <?php 
                    for ($j = 0; $j < 5; $j++){
                        if($items_data[$i][$j] === null){
                ?>
                        <td><input type="date"></td>
                        <?php }else if($items_data[$i][$j] == 0){ ?>
                            <td><input type="checkbox" value="1"></td>
                        <?php }else if($items_data[$i][$j] == 1){ ?>
                            <td>Item devolvido!</td>
                        <?php }else{ ?>
                        <td><?php echo $items_data[$i][$j] ?></td>
                        <?php } ?>
                <?php } ?>
            <?php } ?>
            </tr>
            </table>
        </div>
        <div class="buttonWrapper">
            <button class="backButton">
                <a href="mainPage.php" class="buttonLink">Voltar</a>
            </button>
            <button class="saveButton" type="submit">
                <a href="#" class="buttonLink">Salvar</a>
            </button>
            <button class="registerItemButton">
                <a href="registerItem.php" class="buttonLink">Cadastrar Item</a>
            </button>
        </div>
    </form>
</body>
</html>