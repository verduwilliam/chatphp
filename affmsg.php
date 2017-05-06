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
session_start();
$chat=$PDO->prepare("SELECT * FROM messages INNER JOIN users ON messages.user_id=users.id");
$chat->execute();
$afficher=$chat->fetchAll();
foreach($afficher as $value){
  if($value->pseudo==$_SESSION["pseudo"]){
    echo "<div class='msgchat'><p>de: <span style='font-weight:bold'>".$value->pseudo."</span> (you)</p><p>".$value->message."</p><p>le: ".$value->créé."</p></div>";
  }
  else{
    echo "<div class='msgchat'><p>de: <span style='font-weight:bold'>".$value->pseudo."</span></p><p>".$value->message."</p><p>le: ".$value->créé."</p></div>";
  }
}
?>
