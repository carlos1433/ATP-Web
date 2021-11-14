<?php 
    session_start();
    include('connect.php');
    include('session_check.php');

    $item_name = mysqli_real_escape_string($connection, trim($_POST['itemName']));
    $loan_date = mysqli_real_escape_string($connection, $_POST['loanDate']);
    $loan_contact = mysqli_real_escape_string($connection, trim($_POST['loanContact']));
    $return_date = isset($_POST['returnDate'])?mysqli_real_escape_string($connection, $_POST['returnDate']):null;
    $login = $_SESSION['loginField'];

    $sql = "SELECT userID FROM users WHERE user_login = '$login'";
    $query = mysqli_query($connection, $sql);
    $owner_id = mysqli_fetch_assoc($query)['userID'];

    var_dump($item_name, $loan_date, $loan_contact, $return_date,$owner_id);

    if($return_date != null){
        $sql = "INSERT INTO items (item_name, item_loan_date, item_loan_contact, item_return_date, item_owner_ID) VALUES ('$item_name', '$loan_date', '$loan_contact', '$return_date', '$owner_id')";
        if($connection->query($sql) === TRUE){
            $_SESSION['itemRegistered'] = true;
            header('Location: registerItem.php');
            exit();
        }
    }else{
        $sql = "INSERT INTO items (item_name, item_loan_date, item_loan_contact, item_owner_ID) VALUES ('$item_name', '$loan_date', '$loan_contact', '$owner_id')";
        if($connection->query($sql) === TRUE){
            $_SESSION['itemRegistered'] = true;
            header('Location: registerItem.php');
            exit();
        }
    }
    

?>