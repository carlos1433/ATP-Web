<?php
session_start();
include('connect.php');
include('session_check.php');
$id = $_SESSION['userID'];


$sql = "SELECT COUNT(*) AS ITEMS FROM items WHERE item_owner_ID = $id";
$result = mysqli_query($connection, $sql);
$items_total = mysqli_fetch_assoc($result)["ITEMS"];
$_SESSION['items_total'] = $items_total;

$sql = "SELECT item_ID, item_name, item_loan_date, item_loan_contact, item_return_date, item_returned 
            FROM items 
            WHERE item_owner_ID = $id 
            ORDER BY item_returned, item_loan_date";
$result = mysqli_query($connection, $sql);
$items_data = mysqli_fetch_all($result);
$_SESSION['items_data'] = $items_data;

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
    <form action="myItemsUpdate.php" method="post">
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
                for ($i = 0; $i < $items_total; $i++) {
                    echo '<tr>';

                    for ($j = 1; $j < 6; $j++) {
                        if ($items_data[$i][$j] === null) {
                            echo '<td>Item não devolvido</td>';
                        } else if ($items_data[$i][$j] == 0) {
                            echo sprintf('<td><input type="checkbox" value="%s" name="isReturned[]"></td>', $items_data[$i][0]);
                        } else if ($items_data[$i][$j] == 1) {
                            echo '<td>Item devolvido!</td>';
                        } else {
                            echo sprintf('<td>%s</td>', $items_data[$i][$j]);
                        }
                    }
                    echo '</tr>';
                }
                ?>

            </table>
        </div>
        <div class="buttonWrapper">
            <button class="backButton">
                <a href="mainPage.php" class="buttonLink">Voltar</a>
            </button>
            <button class="saveButton" type="submit">
                Salvar
            </button>
            <button class="registerItemButton">
                <a href="registerItem.php" class="buttonLink">Cadastrar Item</a>
            </button>
        </div>
    </form>
</body>

</html>