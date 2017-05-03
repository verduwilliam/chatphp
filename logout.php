<?php

define("MYSQL_HOST", "localhost");
define("MYSQL_USER", "root");
define("MYSQL_PASSWD", "Cw83ulkdUcuiJVwQ");
define("MYSQL_DB", "chat");

try {
  $PDO = new PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DB,MYSQL_USER,MYSQL_PASSWD);
  $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
} catch (PDOException $e) {
  $e->getMessage();
}

if (isset($_POST["submit"])){
  session_start();
  $_SESSION = array();
  session_destroy();
  echo "Bye";
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Log Out Chat</title>
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <form action="logout.php" method="POST">
    <input type="submit" name="submit" value="Logout">
  </form>
  <a href="inscriptionchat.php">Inscription</a>
  <a href="loginchat.php">Log In</a>
  <a href="chat.php">Chat</a>
</body>
</html>
