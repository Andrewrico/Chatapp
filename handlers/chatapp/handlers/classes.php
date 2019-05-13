<?php

class user {
    private $userid,$username,$usermail,$userpassword;
    public function getUserId() {
        return $this->userid;
    }
    public function setUserId($userid) {
        $this->userid=$userid;
    }
    public function getUserName() {
        return $this->username;
    }
    public function setUserName($username) {
        $this->username=$username;
    }
    public function getUserMail() {
        return $this->usermail;
    }
    public function setUserMail($usermail) {
        $this->usermail=$usermail;
    }
    public function getUserPassword() {
        return $this->userpassword;
    }
    public function setUserPassword($userpassword) {
        $this->userpassword=$userpassword;
    }
    public function insertUser(){
        include "config.php";
        $req = $db-> prepare ("INSERT INTO user(username,usermail,userpassword) VALUES(:iusername,:iusermail,:iuserpassword)");
        $req->execute(array(
            'iusername' => $this->getUserName(),
            'iusermail' => $this->getUserMail(),
            'iuserpassword' => $this->getUserPassword()
        ));
    }

    public function userLogin() {
        include "config.php";
        $req=$db->prepare("SELECT * FROM user WHERE usermail=:iusermail AND userpassword=:iuserpassword");
        $req->execute(array(
            'iusermail' => $this->getUserMail(),
            'iuserpassword' => $this->getUserPassword()
        ));
        if($req->rowCount()==0){
            header("Location: ../index.php?error=1");
            return false;
        } else {
            while($data=$req->fetch()){
                $this->setUserId($data['userid']);
                $this->setUserName($data['username']);
                $this->setUserPassword($data['userpassword']);
                $this->setUserMail($data['usermail']);
                header("Location: ../home.php");
                return true;
            }
        }
    }
}
?>