<?php
    session_start();
    include "classes.php";

    $user = new user();
    $user->setUserMail($_POST['usermaillogin']);
    $user->setUserPassword($_POST['userpasswordlogin']);
    if($user->userLogin()==true) {
        $_SESSION['userid']=$user->getUserId();
        $_SESSION['username']=$user->getUserName();
        $_SESSION['usermail']=$user->getUserMail();
    }
?>