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
    header("location:chat.php");
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Log In Chat</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
  <div class="container-fluid">
    <div class="col-lg-12">
      <h1>Chat en PHP</h1>
    </div>
    <div class="col-lg-3 col-lg-offset-3">
      <h2>Inscription</h2>
      <form action="inscriptionchat.php" method="POST">
        <input type="text" name="nom" id="nom" placeholder="Nom"><br>
        <input type="text" name="prenom" id="prenom" placeholder="Prénom"><br>
        <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo"><br>
        <input type="password" name="password" id="password" placeholder="Password"><br>
        <input type="submit" name="submit">
        <input type="reset">
      </form>
    </div>
    <div class="col-lg-3">
      <h2>Log In</h2>
      <form action="loginchat.php" method="POST">
        <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo"><br>
        <input type="password" name="password" id="password" placeholder="Password"><br>
        <input type="submit" name="submit">
        <input type="reset">
      </form>
    </div>
  </div>
</body>
</html>
