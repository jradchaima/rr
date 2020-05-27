<?php

include 'dbconnect.class.php';

class User
{
    private $pdo;

    public function __construct()
    {
        $dbconn = new DBConnection;
        $this->pdo = $dbconn->connectDB();
    }

    public function register($username,$email,$password,$firstname,$lastname,$ville,$sexe,$telephone,$date)
    {
        try {
            $sql = "INSERT INTO admine(username,email,password,sexe,city,first_name,last_name,telephone,date_naissance)
                    VALUES (:username,:email,:password,:sexe,:ville,:firstname,:lastname,:telephone,:date)";
            $query = $this->pdo->prepare($sql);
            $query->bindparam(":username", $username);
            $query->bindparam(":email", $email);
            $query->bindparam(":password", $password);
            $query->bindparam(":sexe", $sexe);
            $query->bindparam(":ville", $ville);
            $query->bindparam(":telephone",$telephone);
            $query->bindparam(":date",$date);
            $query->bindparam(":firstname",$firstname);
            $query->bindparam(":lastname",$lastname);
            $query->execute();
            return $query;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function login($email, $password)
    {
        try {
            $sql = "SELECT * FROM employees WHERE email= :email";
            $query = $this->pdo->prepare($sql);
            $query->bindparam(":email", $email);
            $query->execute();
            $user = $query->fetch();
            if (password_verify($password, $user['password'])) {
                return $user;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
}