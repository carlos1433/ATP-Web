<?php
    session_start();
    include('connect.php');
    include('session_check.php');
    $id = $_SESSION['userID'];
    

    $sql = "SELECT COUNT(*) AS ITEMS FROM items WHERE item_owner_ID = $id";
    $result = mysqli_query($connection, $sql);
    $items_total = mysqli_fetch_assoc($result)["ITEMS"];

    $sql = "SELECT item_name, item_loan_date, item_loan_contact FROM items WHERE item_owner_ID = $id";
    $result = mysqli_query($connection, $sql);
    $items_data = mysqli_fetch_all($result);
    var_dump($items_data);

    // echo $item_names[0][0];   [item_total][item_data]
    // echo $item_names[0][1];
    // echo $item_names[0][2];

    // echo $item_names[1][0];
    // echo $item_names[1][1];
    // echo $item_names[1][2];


?>
<table>
<tr>
    <th>Item</th>
    <th>Data Empréstimo</th>
    <th>Contato Destinatário</th>
    <th>Data Devolução</th>
    <th>Devolvido</th>
</tr>

<?php 
    for ($i = 0; $i < $items_total; $i++):
?>

<tr>
    <?php 
        for ($j = 0; $j < 3; $j++):
    ?>
    <td><?php echo $items_data[$i][$j] ?></td>
    <?php endfor; ?>
    <td><input type="checkbox" value=""></td>
</tr>
<?php endfor; ?>
</table>