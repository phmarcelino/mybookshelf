<?php

class Verify
{

    public static $conn;

    public static function setConn( PDO $conn)
    {
        self::$conn = $conn;
    }

    public static function getUser($parameter)
    {
        $sql = get_object_vars($parameter);
        return $sql['user'];
    }

    public static function authentication($parameter, $password)
    {
        $sql = "SELECT * FROM user where email = '$parameter' and user_pass = '$password'";
        $result = self::$conn->query($sql);
        return $result->fetchObject(__CLASS__);
    }

}

?>