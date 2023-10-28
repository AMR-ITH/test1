<?php
include '../db/dbf.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

session_start();
class dbLog extends dbf {
  private static $sessID;
  private static $dbName = "apha_web";
  
  public static function pageLog() {
    //$_SESSION["sessionID"]="$sid";
    // print_r($_SESSION);
    if (!isset($_SESSION["sessionID"]))
      $_SESSION["sessionID"] = self::setupLog();
    self::$sessID = $_SESSION["sessionID"];
    self::updateLastActive();

    echo self::$dbName.".72DragonsAtAPHALogsPage";
    $logPage = self::$con->prepare("INSERT INTO ".self::$dbName.".72DragonsAtAPHALogsPage (sessionID, refURL, curURL, getParams) VALUES (?,?,?,?)");
    
    $logPage->bind_param("ssss", self::$sessID, $_SERVER['HTTP_REFERER'], $_SERVER['REQUEST_URI'], json_encode($_GET));
    $logPage->execute();
    $logPage->close();
  }
  
  private static function updateLastActive() {
    echo 'updated';
    self::$con->query("UPDATE ".self::$dbName.".72DragonsAtAPHALogsSession SET lastActive = CURRENT_TIMESTAMP WHERE sessionID = ".self::$sessID);
  }
  
  private static function setupLog() {
    echo "test";
    echo  self::$dbName.".72DragonsAtAPHALogsSession";

    $setSession = self::$con->prepare("INSERT INTO ".self::$dbName.".72DragonsAtAPHALogsSession (ipv4, useragent) VALUES (?,?)");
    $setSession->bind_param("ss", $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']);
    $setSession->execute();
    $sessionID = $setSession->insert_id;
    $setSession->close();
    return $sessionID;
  }

  public static function loginAttempt($status, $result) {
    switch ($status) {
      case 'IU':
        $addAttempt = self::$con->prepare("INSERT INTO ".self::$dbName."Login (sessionID, gotLoggedIn, invalidUsername, falseUsername, invalidPassword) VALUES (?, 0, 1, ?, 0)");
        $addAttempt->bind_param('ss', self::$sessID, $result);
        $addAttempt->execute();
        $addAttempt->close();
        break;
      case 'IP':
        $addAttempt = self::$con->prepare("INSERT INTO ".self::$dbName."Login (sessionID, gotLoggedIn, invalidUsername, falseUsername, invalidPassword) VALUES (?, 0, 0, ?, 1)");
        $addAttempt->bind_param('ss', self::$sessID, $result);
        $addAttempt->execute();
        $addAttempt->close();
        break;
      case 'LI':
        $addAttempt = self::$con->prepare("INSERT INTO ".self::$dbName."Login (sessionID, gotLoggedIn, loggedInAs) VALUES (?, 1, ?)");
        $addAttempt->bind_param('ss', self::$sessID, $result);
        $addAttempt->execute();
        $addAttempt->close();
        break;
    }
  }
}


dbLog::pageLog();
// if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
//   dbLog::pageLog($sid);
// }


?>