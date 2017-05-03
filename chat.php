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

// echo '<div id="chat">';
// $chat=$PDO->prepare("SELECT * FROM messages INNER JOIN users ON messages.user_id=users.id");
// $chat->execute();
// $afficher=$chat->fetchAll();
// foreach($afficher as $value){
//   echo "<div class='msgchat'><p>De: ".$value->pseudo."</p><p>".$value->message."</p><p>le: ".$value->créé."</p></div>";
// }
//
// echo "</div>"

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Chat</title>
  <link rel="stylesheet" href="css/main.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script type="text/javascript">
  $(function(){
    $.ajax({
      url : "affmsg.php",
      success : function(refresh){
        $("#chat").html(refresh);
      }
    })
  },60000)
  </script>
</head>
<body>
  <div id="chat">
  </div>
  <form action="chat.php" method="POST">
    <input type="text" name="message" id="message" placeholder="message">
    <input type="submit" name="submit">
    <input type="reset">
  </form>
  <a href="inscriptionchat.php">Inscription</a>
  <a href="loginchat.php">Log In</a>
  <a href="logout.php">Log Out</a>
</body>
</html>
