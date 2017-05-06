<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Log In Chat</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>

  <script type="text/javascript">
    $(function(){

      //inscription
      $("#formsignin").on("submit", function(e){
        e.preventDefault()
        data = {
          nom : $("#nom").val(),
          prenom : $("#prenom").val(),
          pseudo : $("#pseudo").val(),
          password : $("#password").val()
        }
        $.ajax({
          method : "POST",
          url : "inscriptionchat.php",
          data : data,
          success : function(resultat){
            if(resultat=="0"){
              window.location.href="chat.php";
            }
            else if(resultat=="1"){
              alert("pseudo déjà pris");
              $("#pseudo").focus().val("");
            }
            else if(resultat=="2"){
              alert("remplir le formulaire")
            }
            else{
              alert("Erreur")
            }
          }
        })
      })

      //login
      $("#formlogin").on("submit", function(e){
        e.preventDefault()
        datalog = {
          pseudo : $("#pseudolog").val(),
          password : $("#passwordlog").val(),
        }
        $.ajax({
          method : "POST",
          url : "login.php",
          data : datalog,
          success : function(resultat){
            if(resultat==false){
              alert("Erreur pseudo ou mdp");
            }
            else{
              window.location.href="chat.php";
            }
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
    <div class="col-lg-3 col-lg-offset-3">
      <h2>Inscription</h2>
      <form action="" method="POST" id="formsignin">
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
      <form action="" method="POST" id="formlogin">
        <input type="text" name="pseudo" id="pseudolog" placeholder="Pseudo"><br>
        <input type="password" name="password" id="passwordlog" placeholder="Password"><br>
        <input type="submit" name="submit">
        <input type="reset">
      </form>
    </div>
  </div>
</body>
</html>
