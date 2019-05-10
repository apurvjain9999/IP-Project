<?php
session_start();
require_once "login.php";
class FbChatMock {
  public function __construct() {
    $this->dbConnection = new mysqli($hn,$un,$pw,$db);
    if ($this->dbConnection->connect_error) {
      die('Connection error.');
    }
  }
  public function getMessages() {
    $messages = array();
    $query = "
        SELECT 
          `chat`.`message`, 
          `chat`.`sent_on`,
          `users`.`id`, 
          `users`.`username`
        FROM `users`
        JOIN `chat`
          ON `chat`.`user_id` = `users`.`id`
        ORDER BY `sent_on`";

    // Execute the query
    $resultObj = $this->dbConnection->query($query);
    // Fetch all the rows at once.
    while ($row = $resultObj->fetch_assoc()) {
      $messages[] = $row;
    }
    
    return $messages;
  }

  public function addMessage($userId, $message) {
    $addResult = false;
    
    $cUserId = (int) $userId;

    $cMessage = $this->dbConnection->real_escape_string($message);
    
    $query = "
      INSERT INTO `chat`(`user_id`, `message`, `sent_on`)
      VALUES ({$cUserId}, '{$cMessage}', UNIX_TIMESTAMP())";
    $result = $this->dbConnection->query($query);
    
    if ($result !== false) {
      $addResult = $this->dbConnection->insert_id;
    } else {
      echo $this->dbConnection->error;
    }
    
    return $addResult;
  }

}
?>