<?php 
    session_start();
    include("connect.php");

    $name = mysqli_real_escape_string($connection, trim($_POST['nameField']));
    $login = mysqli_real_escape_string($connection, trim($_POST['loginField']));
    $pw = mysqli_real_escape_string($connection, trim(md5($_POST['pwField'])));

    $sql = "SELECT COUNT(*) AS TOTAL FROM users WHERE user_login = '$login'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    
    if ($row == 1){
        $_SESSION['userExists'] = true;
        header('Location: registerUser.php');
        exit();
    }
    $sql = "INSERT INTO users (user_name, user_login, user_pw) VALUES ('$name', '$login', '$pw')";
    if($connection->query($sql) === TRUE){
        $_SESSION['registerSuccess'] = true;
    }
    $connection->close();

    header('Location: registerUser.php');
    exit();
?>
