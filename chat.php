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
  echo "Bienvenue ".$_SESSION['pseudo']." !";
  if (isset($_POST["submit"]) && isset($_SESSION['id']) && isset($_SESSION['pseudo'])){

    if($_POST["message"]!=""){

      $req=$PDO->prepare("INSERT INTO messages (user_id, message) VALUES (:id, :message)");
      $req->bindValue(":id", $_SESSION['id']);
      $req->bindValue(":message", $_POST["message"]);

      if($req->execute()){
        echo "message envoyé";
      }
      else{
        echo "erreur";
      }
    }
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Chat</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
  <script type="text/javascript">
  $(function(){
    setInterval(function(){
      $.ajax({
        url : "affmsg.php",
        success : function(refresh){
          $("#chat").html(refresh);
        }
      })
    },5000)

    //même fonction, mais au chargement de la page
    $(function(){
      $.ajax({
        url : "affmsg.php",
        success : function(refresh){
          $("#chat").html(refresh);
        }
      })
    })
  })
  </script>
</head>
<body>
  <div class="container-fluid">
    <div class="col-lg-12">
      <h1>Chat en PHP</h1>
    </div>
    <div id="chat" class="col-lg-10 col-lg-offset-1">
    </div>
    <div class="col-lg-4 col-lg-offset-4">
      <form action="chat.php" method="POST">
        <input type="text" name="message" id="message" placeholder="message"><br>
        <input type="submit" name="submit" id="submitchat">
      </form>
    </div>
    <div class="col-lg-4 col-lg-offset-4 links">
      <form action="logout.php" method="POST">
        <input type="submit" id="logout" value="Log Out">
      </form>
    </div>
  </div>
</body>
</html>
