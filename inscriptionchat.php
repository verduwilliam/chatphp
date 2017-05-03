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

  if($_POST["nom"]!="" && $_POST["prenom"]!="" && $_POST["pseudo"]!="" && $_POST["password"]!=""){
    $verif=$PDO->prepare("SELECT pseudo FROM users WHERE pseudo=:pseudo");
    $verif->bindValue(":pseudo", $_POST["pseudo"]);
    $verif->execute();
    $test=$verif->fetch();

    if($test!=""){
      echo "pseudo déjà pris";
    }
    else{
      $req=$PDO->prepare("INSERT INTO users (nom, prenom, pseudo, password) VALUES (:nom, :prenom, :pseudo, :password)");
      $req->bindValue(":nom", $_POST["nom"]);
      $req->bindValue(":prenom", $_POST["prenom"]);
      $req->bindValue(":pseudo", $_POST["pseudo"]);
      $req->bindValue(":password", sha1($_POST["password"]));

      if($req->execute()){
        echo "compte enrengistré";
      }
      else{
        echo "erreur";
      }
    }

  }
  else{
    echo "remplir le formulaire";
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Inscription Chat</title>
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <form action="inscriptionchat.php" method="POST">
    <input type="text" name="nom" id="nom" placeholder="Nom"><br>
    <input type="text" name="prenom" id="prenom" placeholder="Prénom"><br>
    <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo"><br>
    <input type="password" name="password" id="password" placeholder="Password"><br>
    <input type="submit" name="submit">
    <input type="reset">
  </form>
  <a href="chat.php">Chat</a>
  <a href="loginchat.php">Log in</a>
  <a href="logout.php">Log Out</a>
</body>
</html>
