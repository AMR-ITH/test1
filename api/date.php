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

class db_fb {
    public static $con;
    private static $isCon = false;

    public static function connect() {
        if (self::$isCon) return;
        self::$con = mysqli_connect('45.76.160.28','db_bot','dragon','social_media_fb');
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

class db_insta {
    public static $con;
    private static $isCon = false;

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
// Create separate connections to your databases
db::connect();
db_fb::connect();
db_insta::connect();


// Assuming created_date is stored as 'Y-m-d' format
$articleQuery = "SELECT DISTINCT  created_date FROM trending_topics_news";
$articleResult = mysqli_query(db::$con, $articleQuery);

while ($row = mysqli_fetch_assoc($articleResult)) {
    $unique_dates_list1[] = $row['created_date']; 
}

//$randomArticle = mysqli_fetch_assoc($articleResult);
// Retrieve a random video
//$videoQuery = "SELECT id, video_loc, video_des, thumb, media_url FROM videos WHERE day = $date) LIMIT 1";
$videoQuery = "SELECT DISTINCT DATE(FROM_UNIXTIME(day)) AS unique_formatted_date FROM apha_web.videos";
$videoResult = mysqli_query(db::$con, $videoQuery);

while ($row = mysqli_fetch_assoc($videoResult)) {
    $unique_dates_list2[] = $row['unique_formatted_date']; 
}

//$randomVideo = mysqli_fetch_assoc($videoResult);

// Check if video_loc is NULL


// Create an array of social media databases
$socialMediaDatabases = [db_fb::$con, db_insta::$con];

// Shuffle the array so that we select a random social media database
shuffle($socialMediaDatabases);

// Initialize the variable to store the result
$randomSocialMediaPost = null;

foreach ($socialMediaDatabases as $dbConnection) {
    // Check which social media database was selected and fetch data accordingly
    if ($dbConnection === db_fb::$con) {
        $socialMediaTable = "social_media_fb.post_insights";
    } else {
        $socialMediaTable = "social_media_insta.caption_comments_count";
    }

    $socialMediaQuery = "SELECT DISTINCT add_time FROM $socialMediaTable";
    $socialMediaResult = mysqli_query($dbConnection, $socialMediaQuery);

    while ($row = mysqli_fetch_assoc($socialMediaResult)) {
        $unique_dates_list3[] = $row['add_time']; 
    }
    
   
}

// Close the database connections
db::disconnect();
db_fb::disconnect();
db_insta::disconnect();


$dates_list = array_merge($unique_dates_list1, $unique_dates_list2, $unique_dates_list3);
$unique_dates_list = array_unique($dates_list);
$datefinal = sort($unique_dates_list);
// Prepare the response
// $response = [
//     'date1' => $unique_dates_list1,
//     'date2' => $unique_dates_list2,
//     'date3' => $unique_dates_list3,
// ];
$response = [
    'date' => array_reverse($unique_dates_list)    
];

// Convert the response to JSON and send it
header('Content-Type: application/json');
echo json_encode($response, JSON_PRETTY_PRINT);
?>