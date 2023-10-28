<?php
class db {
  public static $con;
  private static $isCon = false;
  
  // Define database connection properties
  private static $hostname = '207.148.79.97';
  private static $username = 'production'; // Replace with your database username
  private static $password = 'dragon'; // Replace with your database password
  private static $database_name = 'apha_web';
  private static $charset = 'utf8';
  
  public static function connect() {
    if (self::$isCon) return;
    // Establish a database connection using class properties
    self::$con = mysqli_connect(self::$hostname, self::$username, self::$password, self::$database_name);
    
    // Check for connection errors
    if (mysqli_connect_errno()) {
      die("Database connection failed: " . mysqli_connect_error());
    }
    // echo 'connected successfully '; 
    // Set character set
    mysqli_set_charset(self::$con, self::$charset);
    
    self::$isCon = true;
  }
  public static function get_connection() {
    return self::$con;
}
  public static function disconnect() {
    if (!self::$isCon) return;
    mysqli_close(self::$con);
    self::$isCon = false;
  }
}

// Call the connect method to establish a database connection
db::connect();

// Now you can use db::$con to access the database connection
?>