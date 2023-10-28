<?php
header("Content-type: application/json; charset=utf-8");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

include '../db/db_insta.php'; 

class SocialMediaPosts {
    public static function getPosts($page, $pageSize) {
        $list = array();
        
        
        $offset = ($page - 1) * $pageSize;
        
        
        $query = "SELECT caption, media_url, add_time
                  FROM social_media_insta.caption_comments_count
                  WHERE channel_id IN (2, 7)
                  ORDER BY add_time DESC
                  LIMIT ?, ?";
        
        
        $countQuery = "SELECT COUNT(*) AS total
                       FROM social_media_insta.caption_comments_count
                       WHERE channel_id IN (2, 7)";
        
       
        $stmtCount = db_insta::$con->prepare($countQuery);
        $stmtCount->execute();
        $resultCount = $stmtCount->get_result();
        
        if ($resultCount === false) {
            die("Count query failed: " . mysqli_error(db_insta::$con));
        }
        
       
        $totalCount = $resultCount->fetch_assoc()['total'];
        
      
        $totalPages = ceil($totalCount / $pageSize);
        
        
        $stmt = db_insta::$con->prepare($query);
        $stmt->bind_param('ii', $offset, $pageSize);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result === false) {
            die("Query failed: " . mysqli_error(db_insta::$con));
        }
        
        $today = new DateTime(); // Current date
        $startAPHA = new DateTime('2023-11-12'); // APHA start date
        
        while ($row = $result->fetch_assoc()) {
            // Calculate the day number based on the post's add_time
            $postDate = new DateTime($row["add_time"]);
            $postDayNumber = $postDate->diff($startAPHA)->days + 1;
        
            $list[] = array(
                "day" => $postDayNumber <= 0 ? $postDayNumber : -$postDayNumber, // Use negative day number for future dates
                "message" => $row["caption"],
                "full_picture" => $row["media_url"],
                "add_time" => $row["add_time"]
            );
        }
        
        
        
        $stmt->close();
        $stmtCount->close();
        
        
        return array(
            "posts" => $list,
            "currentPage" => $page,
            "totalPages" => $totalPages,
            
        );
    }
}

if (isset($_GET['page'])) {
    $page = intval($_GET['page']);
} else {
    $page = 1;
}

$pageSize = 24; 

// Assuming that SocialMediaPosts::getPosts($page, $pageSize) returns an array or object
$posts = SocialMediaPosts::getPosts($page, $pageSize);

// Pretty-print the JSON output directly in the echo statement
echo json_encode($posts, JSON_PRETTY_PRINT);
?>
