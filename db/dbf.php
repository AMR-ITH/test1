<?php
class dbf {
    //Staff DB
    public static $con;
    public static $isCon = false;
    private static $addUserAttempt = 0;


    public static function connect() {
        if (self::$isCon) return;
        self::$con = mysqli_connect('207.148.79.97','production','dragon','apha_web');
        if (self::$con->connect_errno) {
            echo "Failed to connect to MySQL: (".self::$con->connect_errno.")".self::$con->connect_error;
        }
        //echo "con";
        mysqli_set_charset(self::$con, "utf8mb4");
        self::$isCon = true;
    }
    public static function disconnect() {
        if (!self::$isCon) return;
        mysqli_close(self::$con);
        self::$isCon = false;
    }



}

dbf::connect();

?>
