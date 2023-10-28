<?php
include '/var/www/heroes-of-public-health/php/db/db_class.php';

db::connect();
// $_GET['articletype']='apha';
$pageSize = 24;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$articleType = isset($_GET['articletype']) ? $_GET['articletype'] : 'all';

if (strcasecmp($articleType, 'apha') === 0) {
    $articleType = 'apha';
}

// Remove this line, so that the "daily" parameter is correctly parsed from the request
$_GET['daily']=true;

$trending = isset($_GET['trending']) ? true : false; 
$daily = isset($_GET['daily']) ? true : false;
$highlight = isset($_GET['highlight']) ? true : false;

$offset = ($page - 1) * $pageSize;

$query = ""; // Initialize the query variable

if ($articleType === 'apha') {
    $query = "SELECT news_title, thumbnail, created_date, author_name, pdf_url FROM apha_web.trending_topics_news WHERE article_type LIKE 'apha' OR article_type LIKE '%apha%'";
} elseif ($articleType === 'all') {
    $query = "SELECT news_title, thumbnail, created_date, author_name, pdf_url FROM apha_web.trending_topics_news";
}

// Modify the query for "trending" to order by viewCount
if ($trending || $highlight) {
    $query .= " ORDER BY viewCount DESC";
} else {
    $query .= " ORDER BY created_date DESC";
}

$query .= " LIMIT ?, ?";

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

$articles = array();
$todayArticles = array();
$yesterdayArticles = array();

while ($row = $result->fetch_assoc()) {
    $article = array(
        "news_title" => $row["news_title"],
        "thumbnail" => $row["thumbnail"],
        "created_date" => $row["created_date"],
        "author_name" => $row["author_name"],
        "pdf_url" => $row["pdf_url"]
    );

    // Calculate the difference in days between today and the article's creation date
    $daysDifference = floor((strtotime(date('Y-m-d')) - strtotime($row["created_date"])) / (60 * 60 * 24));

    if ($daysDifference == 0) {
        // Article was created today
        $todayArticles[] = $article;
    } elseif ($daysDifference == 1) {
        // Article was created yesterday
        $yesterdayArticles[] = $article;
    }

    $articles[] = $article; // Add the article to the main articles array
}

// Calculate the total pages using the provided code snippet
if ($articleType === 'apha') {
    $countQuery = "SELECT COUNT(*) AS total FROM apha_web.trending_topics_news WHERE article_type LIKE 'apha' OR article_type LIKE '%apha%'";
} else {
    $countQuery = "SELECT COUNT(*) AS total FROM apha_web.trending_topics_news";
}

// Modify the count query for "trending" and "highlight" to order by viewCount
if ($trending || $highlight) {
    $countQuery .= " ORDER BY viewCount DESC";
} else {
    $countQuery .= " ORDER BY created_date DESC";
}

$result = db::$con->query($countQuery);

if (!$result) {
    die("Query failed: " . db::$con->error);
}

$totalArticles = $result->fetch_assoc()['total'];

$totalPages = ceil($totalArticles / $pageSize);

$stmt->close();
db::disconnect();

if ($daily) {
    $response = [
        'currentPage' => $page,
        'totalPages' => $totalPages,
        'todayArticles' => $todayArticles,
        'yesterdayArticles' => $yesterdayArticles,
        'articles' => $articles,
    ];
} elseif ($highlight) {
    $response = [
        'currentPage' => $page,
        'totalPages' => $totalPages,
        'todayHighlightArticles' => $todayArticles,
        'yesterdayHighlightArticles' => $yesterdayArticles,
        'articles' => $articles,
    ];
} else {
    $response = [
        'currentPage' => $page,
        'totalPages' => $totalPages,
        'todayArticles' => $todayArticles,
        'yesterdayArticles' => $yesterdayArticles,
        'articles' => $articles,
    ];
}

header('Content-Type: application/json');
echo json_encode($response,JSON_PRETTY_PRINT);
?>
