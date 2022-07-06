<?php

include '../config/database.php';

class Verify
{

    public $conn;

    public function __construct()
    {
        $this->conn = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }

    public function getUser($user)
    {
        $sql = get_object_vars($user);
        return $sql['user'];
    }

    public function authentication($email, $password)
    {
        $sql = $this->conn->prepare("SELECT * FROM user where email = ? and user_pass = ?");
        $sql->bindParam(1, $email, PDO::PARAM_STR);
        $sql->bindParam(2, $password, PDO::PARAM_STR);
        $sql->execute();
        return $sql->fetchObject();
    }

}
