<?php
session_start();

if (isset($_POST['msg'])) {
  require_once "FbChatMock.php";
  
  $userId = (int) $_SESSION['id'];
  $msg = htmlentities($_POST['msg'],  ENT_NOQUOTES);
  
  $chat = new FbChatMock();
  $result = $chat->addMessage($userId, $msg);
}
?>
