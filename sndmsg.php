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
if($_SESSION["id"]==""){
  header("location:loginchat.php");
}
else{
  if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])){

    if($_POST["message"]!=""){

      $req=$PDO->prepare("INSERT INTO messages (user_id, message) VALUES (:id, :message)");
      $req->bindValue(":id", $_SESSION['id']);
      $req->bindValue(":message", htmlentities($_POST["message"]));

      if($req->execute()){
        echo "message envoyé";
      }
      else{
        echo "erreur";
      }
    }
    else{
      echo "1";
    }
  }
}

?>
