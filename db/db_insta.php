<?php
class db_insta {
    public static $con;
    private static $isCon = false;
    private static $addUserAttempt = 0;


    public static function connect() {
        if (self::$isCon) return;
        self::$con = mysqli_connect('45.76.160.28','db_bot','dragon','social_media_insta');
        if (self::$con->connect_errno) {
            echo "Failed to connect to MySQL: (".self::$con->connect_errno.")".self::$con->connect_error;
        }
        mysqli_set_charset(self::$con, "utf-8");
        self::$isCon = true;
    }
    public static function disconnect() {
        if (!self::$isCon) return;
        mysqli_close(self::$con);
        self::$isCon = false;
    }



}

db_insta::connect();

?>
