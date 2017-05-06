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

    //afficher messages toutes les 5s
    setInterval(function(){
      $.ajax({
        url : "affmsg.php",
        success : function(refresh){
          $("#chat").html(refresh);
        }
      })
    },5000)

    //afficher messages au chargement de la page
    $.ajax({
      url : "affmsg.php",
      success : function(getmsg){
        $("#chat").html(getmsg);
      }
    })

    //logout
    $("#formlogout").on("submit", function(e){
      e.preventDefault()
      $.ajax({
        url : "logout.php",
        success : function(lo){
          alert(lo);
          window.location.href="loginchat.php"
        }
      })
    })

    //dire bienvenue + verif login
    $.ajax({
      url : "bienvenue.php",
      success : function(bv){
        if(bv==false){
          window.location.href="loginchat.php";
        }
        else{
          alert(bv);
        }
      }
    })

    //envoyer messages
    $("#formmsg").on("submit", function(e){
      e.preventDefault()
      data = {
        message : $("#message").val()
      }
      $.ajax({
        method : "POST",
        url : "sndmsg.php",
        data : data,
        success : function(resultat){
          if(resultat=="erreur"){
            alert("Erreur envoie")
          }else if(resultat=="1"){
            alert("Entrez un message")
          }
          else{
            alert(resultat)
          }
        }
      })
      $("#message").val("")
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
      <form action="" method="POST" id="formmsg">
        <input type="text" name="message" id="message" placeholder="message"><br>
        <input type="submit" name="submit" id="submitchat">
      </form>
    </div>
    <div class="col-lg-4 col-lg-offset-4 links">
      <form action="" method="POST" id="formlogout">
        <input type="submit" id="logout" value="Log Out">
      </form>
    </div>
  </div>
</body>
</html>
