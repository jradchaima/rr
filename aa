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

    public function register($username, $email, $password,$firstname,$lastname,$ville,$sexe,$telephone,$date,$departement)
    {
        try {
            $sql = "INSERT INTO employees(username,email,password,sexe,departementname,city,first_name,last_name,telephone,date_naissance)
                    VALUES (:username,:email,:password,:sexe,:departement,:ville,:firstname,:lastname,:telephone,:date)";
            $query = $this->pdo->prepare($sql);
            $query->bindparam(":username", $username);
            $query->bindparam(":email", $email);
            $query->bindparam(":password", $password);
            $query->bindparam(":sexe", $sexe);
            $query->bindparam(":departement", $departement);
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
    public function update($fname,$lname,$department,$address,$sexe,$mobileno,$eid,$date,$username){

        $sql="update employees set first_name=:fname,last_name=:lname,sexe=:sexe,departementname=:department,city=:address,telephone=:mobileno,date_naissance=:date,username=:username where email=:eid";
        $query = $this->pdo->prepare($sql);
        $query->bindParam(':fname',$fname,PDO::PARAM_STR);
        $query->bindParam(':lname',$lname,PDO::PARAM_STR);
        $query->bindParam(':sexe',$sexe,PDO::PARAM_STR);
        $query->bindParam(':department',$department,PDO::PARAM_STR);
        $query->bindParam(':address',$address,PDO::PARAM_STR);
        $query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
        $query->bindParam(':eid',$eid,PDO::PARAM_STR);
        $query->bindParam(':date',$date,PDO::PARAM_STR);
        $query->bindParam(':username',$username,PDO::PARAM_STR);
        $query->execute();
            }
            public function select($eid){
                $sql = "SELECT * from  employees where email=:eid";
        $query = $this->pdo->prepare($sql);
        $query -> bindParam(':eid',$eid, PDO::PARAM_STR);
        $query->execute();
        return $query;
        
        
        }

        public function departement(){
            $sql = "SELECT depname from  tbldepartments ";
                  $query = $this->pdo->prepare($sql);
                  $query->execute();
        return $query;



        }


        public function typeconge(){
             $sql = "SELECT  nomtypeconge from typeconge";
$query = $this->pdo->prepare($sql);
  $query->execute();
  return $query;
        }

        public function demande($leavetype,$todate,$fromdate,$description,$status,$isread,$eid){

            $sql="INSERT INTO demandeconge(nomtypeconge,datedebut,datefin,description,status,vu,empid) VALUES(:leavetype,:todate,:fromdate,:description,:status,:isread,:empid)";
            $query = $this->pdo->prepare($sql);
            $query->bindParam(':leavetype',$leavetype,PDO::PARAM_STR);
            $query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
            $query->bindParam(':todate',$todate,PDO::PARAM_STR);
            $query->bindParam(':description',$description,PDO::PARAM_STR);
            $query->bindParam(':status',$status,PDO::PARAM_STR);
            $query->bindParam(':isread',$isread,PDO::PARAM_STR);
            $query->bindParam(':empid',$eid,PDO::PARAM_STR);
  
            $query->execute();
      
        }


        public function lid(){
            $lastInsetId = $this->pdo->lastInsertId();
            return $lastInsetId;
            
        }

        public function history($eid){
            $sql = "SELECT nomtypeconge,datedebut,datefin,description,datedemande,adminremarque,status from demandeconge where empid=:eid";
$query = $this->pdo->prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
return $query;
        }


        public function change_password($email){

    $sql ="SELECT password FROM employees WHERE email=:email";
$query= $this->pdo->prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
return $query;

        }

        public function change_password1($email,$newpassword){
$sql="update employees set password=:newpassword where email=:email";
$chngpwd1 = $this->pdo->prepare($sql);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
return $chngpwd1;


        }
}
