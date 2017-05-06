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

$login=$PDO->prepare("SELECT * FROM users WHERE pseudo=:pseudo AND password=:password");
$login->bindValue(":pseudo", $_POST["pseudo"]);
$login->bindValue(":password", sha1($_POST["password"]));
$login->execute();
$compte=$login->fetch();

if($compte==""){
  echo false;
}else{
  session_start();
  $_SESSION['id'] = $compte->id;
  $_SESSION['pseudo'] = $compte->pseudo;
  echo true;
}

?>
