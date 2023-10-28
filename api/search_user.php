<?php
require '/var/www/heroes-of-public-health/php/db/db_class.php';

db::connect();

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';

$page = $_GET['page'];
$itemsPerPage = $_GET['items_per_page'];
$offset = ($page - 1) * $itemsPerPage;

$query = "SELECT title, category, created_on FROM apha_web.article_categories ";
$bindParams = array();

if (!empty($searchTerm) || !empty($category)) {
    $query .= " WHERE";
    if (!empty($searchTerm)) {
        $query .= " title LIKE ?";
        $bindParams[] = "%$searchTerm%";
    }
    if (!empty($searchTerm) && !empty($category)) {
        $query .= " AND";
    }
    if (!empty($category)) {
        $query .= " category = ?";
        $bindParams[] = $category;
    }
}

$query .= " LIMIT $itemsPerPage OFFSET $offset ORDER BY created_on DESC ";

$stmt = db::$con->prepare($query);

if (!$stmt) {
    die("Prepare failed: " . db::$con->error);
}

// Dynamically bind the parameters
$paramTypes = str_repeat('s', count($bindParams));
$stmt->bind_param($paramTypes, ...$bindParams);

$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
    die("Query failed: " . db::$con->error);
}

$articles = array();

while ($row = $result->fetch_assoc()) {
    $articles[] = array(
        "title" => $row["title"],
        "category" => $row["category"],
        "created_on" => $row["created_on"],
    );
}

$stmt->close();
db::disconnect();

$response = [
    'health_apha_articles' => $articles,
];

header('Content-Type: application/json');
echo json_encode($response, JSON_PRETTY_PRINT);
?>