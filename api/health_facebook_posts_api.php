<?php
include '../db/db_fb.php';

class SocialMediaPosts {
    public static function getPosts($page, $pageSize) {
        $list = array();

        $offset = ($page - 1) * $pageSize;

        $query = "SELECT message, full_picture, add_time
                  FROM social_media_fb.post_insights
                  WHERE channel_id IN (7, 2)
                  ORDER BY add_time DESC
                  LIMIT ?, ?";

        $countQuery = "SELECT COUNT(*) AS total
                       FROM social_media_fb.post_insights
                       WHERE channel_id IN (7, 2)";

        $stmtCount = db_fb::$con->prepare($countQuery);
        $stmtCount->execute();
        $resultCount = $stmtCount->get_result();

        if ($resultCount === false) {
            die("Count query failed: " . mysqli_error(db_fb::$con));
        }

        $totalCount = $resultCount->fetch_assoc()['total'];

        $totalPages = ceil($totalCount / $pageSize);

        $stmt = db_fb::$con->prepare($query);
        $stmt->bind_param('ii', $offset, $pageSize);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result === false) {
            die("Query failed: " . mysqli_error(db_fb::$con));
        }

        $today = new DateTime(); // Current date
        $startAPHA = new DateTime('2023-11-12'); // APHA start date

        while ($row = $result->fetch_assoc()) {
            // Calculate the day number based on the post's add_time
            $postDate = new DateTime($row["add_time"]);
            $postDayNumber = $postDate->diff($startAPHA)->days + 1;

            $list[] = array(
                "day" => $postDayNumber <= 0 ? $postDayNumber : -$postDayNumber, // Use negative day number for future dates
                "message" => $row["message"],
                "full_picture" => $row["full_picture"],
                "add_time" => $row["add_time"]
            );
        }

        $stmt->close();
        $stmtCount->close();

        return array(
            "posts" => $list,
            "currentPage" => $page,
            "totalPages" => $totalPages
        );
    }
}

if (isset($_GET['page'])) {
    $page = intval($_GET['page']);
} else {
    $page = 1;
}

$pageSize = 24;

header("Content-type: application/json; charset=utf-8");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

// Assuming that SocialMediaPosts::getPosts($page, $pageSize) returns an array or object
$posts = SocialMediaPosts::getPosts($page, $pageSize);

// Pretty-print the JSON output
echo json_encode($posts, JSON_PRETTY_PRINT);


?>
