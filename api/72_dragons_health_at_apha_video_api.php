<?php
// Include your database connection configuration here // 
require '/var/www/heroes-of-public-health/php/db/db_class.php';

// Call the connect method from the db class //
db::connect();
// $_GET['daily']=true;
// Parameters //

$pageSize = 24; // Number of videos per page //
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$videoType = isset($_GET['videotype']) ? $_GET['videotype'] : 'all';
$daily = isset($_GET['daily']) ? $_GET['daily'] : false; // Check for the "daily" parameter //
$trending = isset($_GET['trending']) ? $_GET['trending'] : false; // Check for the "trending" parameter //

// Calculate the offset based on the current page //
$offset = ($page - 1) * $pageSize;

// Prepare the query to count total videos //
if ($daily) {
    $countQuery = "SELECT COUNT(*) AS total FROM apha_web.videos WHERE DATE(day) >= CURDATE() - INTERVAL 1 DAY";
} elseif ($videoType == 'apha') {
    $countQuery = "SELECT COUNT(*) AS total FROM apha_web.videos WHERE videotype = 'apha'";
} elseif ($videoType == 'all') {
    $countQuery = "SELECT COUNT(*) AS total FROM apha_web.videos";
} else {
    die("Invalid videotype parameter.");
}

$result = db::$con->query($countQuery);

if (!$result) {
    die("Query failed: " . db::$con->error);
}

$totalVideos = $result->fetch_assoc()['total'];

// Calculate total pages //
$totalPages = ceil($totalVideos / $pageSize);

// Prepare the query to fetch videos //
if ($daily) {
    $query = "SELECT id, video_loc, video_des, thumb, day FROM apha_web.videos  ORDER BY day DESC LIMIT ?, ?";
} elseif ($trending) {
    $query = "SELECT id, video_loc, video_des, thumb, day FROM apha_web.videos ORDER BY viewCount DESC LIMIT ?, ?";
} elseif ($videoType == 'apha') {
    $query = "SELECT id, video_loc, video_des, thumb, day FROM apha_web.videos WHERE videotype = 'apha' ORDER BY day DESC LIMIT ?, ?";
} elseif ($videoType == 'all') {
    $query = "SELECT id, video_loc, video_des, thumb, day FROM apha_web.videos ORDER BY day DESC LIMIT ?, ?";
} else {
    die("Invalid videotype parameter.");
}

// Prepare and execute the statement //
$stmt = db::$con->prepare($query);

if (!$stmt) {
    die("Prepare failed: " . db::$con->error);
}

$stmt->bind_param('ii', $offset, $pageSize);
$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
    die("Query failed: " . db::$con->error);
}

// Create arrays to store the results //
$todayVideos = array();
$yesterdayVideos = array();
$recentVideos = array();
$videos = array(); // For trending or all videos //

// Fetch and format the data //
while ($row = $result->fetch_assoc()) {
    $video = array(
        "video_loc" => $row["video_loc"],
        "video_des" => $row["video_des"],
        "thumb" => $row["thumb"],
        "id" => $row["id"],
        "day" => $row["day"]
    );

    // Calculate the difference in days between today and the video's publication date //
    $daysDifference = floor((strtotime(date('Y-m-d')) - strtotime($row["day"])) / (60 * 60 * 24));

    if ($daily) {
        if ($daysDifference === 0) {
            // Video was published today //
            $todayVideos[] = $video;
        } elseif ($daysDifference === 1) {
            // Video was published yesterday //
            $yesterdayVideos[] = $video;
        } else {
            // Video is a recent video (not today or yesterday) //
            $recentVideos[] = $video;
        }
    } else {
        // For trending or all videos, store in the $videos array //
        $videos[] = $video;
    }
}

// Close the statement and database connection //
$stmt->close();
db::disconnect();

// Create a response array based on the parameter //
if ($daily) {
    $response = [
        'currentPage' => $page,
        'totalPages' => $totalPages,
        'todayVideos' => $todayVideos,
        'yesterdayVideos' => $yesterdayVideos,
        'recentVideos' => $recentVideos,
    ];
} 
else if ($trending) {
    $response = [
        'currentPage' => $page,
        'totalPages' => $totalPages,
        'trendingVideos' => $videos,
    ];
} 
else {
    $response = [
        'currentPage' => $page,
        'totalPages' => $totalPages,
        'videos' => $videos,
    ];
}

header('Content-Type: application/json');
echo json_encode($response);
?>
