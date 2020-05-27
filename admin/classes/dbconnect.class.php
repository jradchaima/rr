<?php

class DBConnection
{
    private $host = 'localhost';
    private $dbname = 'gestion_des_congés';
    private $user = 'postgres';
    private $pwd = 'chouchou';

    public $conn = null;

        public function connectDB()
        {
            try {
                $this->conn = new PDO('pgsql:host='.$this->host.';dbname='.$this->dbname.';', $this->user, $this->pwd, [
                                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                                ]);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            return $this->conn;
        }
}
