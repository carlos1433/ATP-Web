<?php
    session_start();
    include('connect.php');

    if(empty($_POST['loginField']) || empty($_POST['pwField'])){
        header('Location: index.php');
        exit();
    }   

    $login = mysqli_real_escape_string($connection, trim($_POST['loginField']));
    $pw = mysqli_real_escape_string($connection, trim($_POST['pwField']));
    $name = mysqli_query($connection, "SELECT `user_name` FROM `users` WHERE `user_login` = '{$login}' AND `user_pw` = md5('{$pw}')");
    $name_display = $name->fetch_row();
    

    $query = "SELECT userID, user_login FROM users WHERE user_login = '$login' AND user_pw = md5('$pw')";

    $result = mysqli_query($connection, $query);
    $id = mysqli_fetch_assoc($result)['userID'];
    $row = mysqli_num_rows($result);

    if($row == 1){
        $_SESSION['loginField'] = $login;
        $_SESSION['userName'] = $name_display[0];
        $_SESSION['userID'] = $id;
        header('Location: mainPage.php');
        exit();
    }else{
        $_SESSION['unauth'] = true;
        header('Location: index.php');
        exit();
    }
?>
