<?php
    session_start();
    include('connect.php');

    if(empty($_POST['loginField']) || empty($_POST['pwField'])){
        header('Location: index.php');
        exit();
    }

    $login = mysqli_real_escape_string($connection, $_POST['loginField']);
    $pw = mysqli_real_escape_string($connection, $_POST['pwField']);
    $name = mysqli_query($connection, "SELECT `user_name` FROM `users` WHERE `user_login` = '{$login}' AND `user_pw` = '{$pw}'");
    $name_display = $name->fetch_row(0);
    

    $query = "SELECT userID, user_login FROM users WHERE user_login = '{$login}' AND user_pw = '{$pw}'";

    $result = mysqli_query($connection,$query);
    $row = mysqli_num_rows($result);

    if($row == 1){
        $_SESSION['loginField'] = $login;
        header('Location: mainPage.php');
        exit();
    }else{
        $_SESSION['unauth'] = true;
        header('Location: index.php');
        exit();
    }
?>
