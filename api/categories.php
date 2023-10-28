<?php
header("Content-type: application/json; charset=utf-8");
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

session_start();

require '/var/www/heroes-of-public-health/php/db/db_class.php';

class Categories
{
    public static function sayHello()
    {
        $response = array(
            "message" => "Hello, World!"
        );

        echo json_encode($response);
    }

    public static function viewcategories()
    {
        if (!isset($_GET['article_type'])) {
            echo json_encode(array("error" => "Missing 'article_type' parameter"));
            return;
        }

        $article_type = $_GET['article_type'];
        $list = [];

        $query = db::$con->query("SELECT id, thumbnail, news_title FROM apha_web.trending_topics_news WHERE article_type = '$article_type'");

        while ($get = $query->fetch_assoc()) {
            $list[] = $get;
        }

        echo json_encode($list);
    }


    //--------------- pagination with article-------------------------------------------------------------------------------

    public static function categoriespage()
    {
        if (!isset($_GET['article_type'])) {
            echo json_encode(array("error" => "Missing 'article_type' parameter"));
            return;
        }

        $page = $_GET['page'];
        $itemsPerPage = $_GET['items_per_page'];
        $offset = ($page - 1) * $itemsPerPage;

        $article_type = $_GET['article_type'];
        $list = [];

        $query = db::$con->query("SELECT id, thumbnail, news_title FROM apha_web.trending_topics_news WHERE article_type = '$article_type' LIMIT $itemsPerPage OFFSET $offset");

        while ($get = $query->fetch_assoc()) {
            $list[] = $get;
        }

        echo json_encode($list);
    }


    //---------------View tags with pagination -----------------------
 

    public static function viewtag()
    {
        if (!isset($_GET['tags'])) {
            echo json_encode(array("error" => "Missing 'tags' parameter"));
            return;
        }

        $page = $_GET['page'];
        $itemsPerPage = $_GET['items_per_page'];
        $offset = ($page - 1) * $itemsPerPage;

        $tags = $_GET['tags'];
        $list = [];

        $query = db::$con->query("SELECT * FROM apha_web.trending_topics_news WHERE tags LIKE '%$tags%'  LIMIT $itemsPerPage OFFSET $offset");

        while ($get = $query->fetch_assoc()) {
            $list[] = $get;
        }

        echo json_encode($list);
    }



}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json_data = file_get_contents("php://input");
    $details = json_decode($json_data, true);
} else {
    if (!empty($_GET['api'])) {
        if ($_GET['api'] == 'sayHello') {
            echo Categories::sayHello();
        } elseif ($_GET['api'] == 'viewcategories') {
            Categories::viewcategories();
        } elseif ($_GET['api'] == 'categoriespage') {
            Categories::categoriespage();
        } elseif ($_GET['api'] == 'viewtag') {
            Categories::viewtag();
        }
    }
}


?>