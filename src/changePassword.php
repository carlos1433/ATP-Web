<?php 
    session_start();
    include('connect.php');
    include('session_check.php');

    $pw = mysqli_real_escape_string($connection, trim(md5($_POST['currentPw'])));
    $new_pw = mysqli_real_escape_string($connection, trim(md5($_POST['newPw'])));
    $new_pw2 = mysqli_real_escape_string($connection, trim(md5($_POST['newPwSameCheck'])));
    $login = $_SESSION['loginField'];

    $sql = "SELECT user_pw FROM users WHERE user_login = '$login'";
    $result = mysqli_query($connection, $sql);
    $db_pw = mysqli_fetch_assoc($result);

    if($pw != $db_pw['user_pw'] || $new_pw != $new_pw2){
        $_SESSION['pwIsDifferent'] = true;
        header('Location: myAccount.php');
        exit();
    }else{
        $sql = "UPDATE users SET user_pw = '$new_pw' WHERE user_login = '$login'";
        if($connection->query($sql) === TRUE){
            $_SESSION['updatedPw'] = true;
            header('Location: myAccount.php');
            exit();
        }
    }
    



?>