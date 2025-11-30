<?php

require_once('manager.php');

class UserManager extends Manager{

    public function emailExist($email){

        $bdd = $this->connection();

        $request = $bdd->prepare('SELECT COUNT(*) AS numberMail FROM users WHERE email =?');
        $request->execute([$email]);
        $result = $request->fetch();

        return $result['numberMail'] !=0;
    }

    public function createUser($email, $password){

        $bdd = $this->connection();

        $password = "aq1" . sha1($password . "123") . "25";

        $secret = sha1($email) . time();
        $secret = sha1($secret) . time();

        $insert = $bdd->prepare('INSERT INTO users(email, password, secret) VALUES (?,?,?)');
        $insert->execute([$email, $password, $secret]);
    }

    public function getUserByEmail($email){

        $bdd = $this->connection();
        $request = $bdd->prepare('SELECT * FROM users WHERE email=?');
        $request->execute([$email]);
        $user = $request->fetch();

        return $user;
    }
}