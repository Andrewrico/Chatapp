<?php
    include "classes.php";

    $user = new user();

    if(isset($_POST['username']) && isset($_POST['usermail']) && isset($_POST['userpassword'])){
        $user->setUserName($_POST['username']);
        $user->setUserMail($_POST['usermail']);
        $user->setUserPassword($_POST['userpassword']);
        $user->insertUser();

        header("Location: ../index.php?success=1");
    }

?>