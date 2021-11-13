<?php 
    session_start();
    include('connect.php');
    include('session_check.php');

    $pw = mysqli_real_escape_string($connection, trim(md5($_POST['currentPw'])));
    $new_pw = mysqli_real_escape_string($connection, trim(md5($_POST['newPw'])));
    $new_pw2 = mysqli_real_escape_string($connection, trim(md5($_POST['newPwSameCheck'])));

    if($new_pw != $new_pw2){
        $_SESSION['pwIsDifferent'] = true;
        header('Location: myAccount.php');
        exit();
    }
    



?>