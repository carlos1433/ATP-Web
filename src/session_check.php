<?php 
    session_start();
    if(!$_SESSION['loginField']) {        
        header('Location: index.php');
        exit();
    }else{
        $login = $_SESSION['loginField'];
    }
?>