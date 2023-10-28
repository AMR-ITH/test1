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
//$_GET['date'] = '2023-10-19';

if (isset($_GET['date'])) {
// Get the date parameter from the request (replace 'date' with the actual parameter name)

$date = date("Y-m-d", strtotime($_GET['date']));


// Assuming created_date is stored as 'Y-m-d' format
$articleQuery = "SELECT id, news_title, author_name, thumbnail, pdf_url  FROM trending_topics_news WHERE DATE(created_date) = DATE('$date') LIMIT 1";
$articleResult = mysqli_query(db::$con, $articleQuery);
$randomArticle = mysqli_fetch_assoc($articleResult);
// Retrieve a random video
//$videoQuery = "SELECT id, video_loc, video_des, thumb, media_url FROM videos WHERE day = $date) LIMIT 1";
$videoQuery = "SELECT * FROM apha_web.videos WHERE DATE(FROM_UNIXTIME(day)) = DATE('$date') LIMIT 1";

//$videoQuery = "SELECT *
// FROM apha_web.videos
// WHERE DATE_FORMAT(FROM_UNIXTIME(day), '%Y-%m-%d'))";

$videoResult = mysqli_query(db::$con, $videoQuery);
$randomVideo = mysqli_fetch_assoc($videoResult);

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

    $socialMediaQuery = "SELECT * FROM $socialMediaTable WHERE add_time = '$date' LIMIT 1";
    $socialMediaResult = mysqli_query($dbConnection, $socialMediaQuery);
    
    // Check if data was retrieved and if it's not NULL
    if ($socialMediaResult) {
        $row = mysqli_fetch_assoc($socialMediaResult);
        if ($row !== null) {
            $randomSocialMediaPost = $row;
            break; // Exit the loop once valid data is found
        }
    }

}






// Close the database connections
db::disconnect();
db_fb::disconnect();
db_insta::disconnect();

// Prepare the response
$response = [
    'article' => $randomArticle,
    'video' => $randomVideo,
    'social_media' => $randomSocialMediaPost,
];

// Convert the response to JSON and send it
header('Content-Type: application/json');
echo json_encode($response, JSON_PRETTY_PRINT);

}
?>