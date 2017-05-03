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
  $login=$PDO->prepare("SELECT * FROM users WHERE pseudo=:pseudo AND password=:password");
  $login->bindValue(":pseudo", $_POST["pseudo"]);
  $login->bindValue(":password", sha1($_POST["password"]));
  $login->execute();
  $compte=$login->fetch();

  if($compte==""){
    echo "Erreur mdp ou pseudo";
  }else{
    session_start();
    $_SESSION['id'] = $compte->id;
    $_SESSION['pseudo'] = $compte->pseudo;
    echo "Bienvenue ".$_SESSION['pseudo']." !";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Log In Chat</title>
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <form action="loginchat.php" method="POST">
    <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo"><br>
    <input type="password" name="password" id="password" placeholder="Password"><br>
    <input type="submit" name="submit">
    <input type="reset">
  </form>
  <a href="logout.php">Log Out</a>
  <a href="inscriptionchat.php">Inscription</a>
  <a href="chat.php">Chat</a>
</body>
</html>
