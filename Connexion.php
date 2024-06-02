<?php
session_start();
if(isset($_POST['connexion'])){
  if(empty($_POST['pseudo'])){
    echo"Remplissez le champ pseudo";
  }else{
    if(empty($_POST['password'])){
      echo"Remplissez le champ password";
    }else{
      $pseudo = $_POST['pseudo'];
      $password = $_POST['password'];

      $mysqli=mysqli_connect("localhost","root","","Togohost");

      if(!$mysqli){
        echo "Erreur de connexion";
      }else{
        $_REQUEST =mysqli_query($mysqli,"SELECT * FROM clients utilisateurs WHERE pseudo ='".$pseudo."' AND password='".$password."'");
        if(mysqli_num_rows($_REQUEST)==0){
          echo "Le mot de passe ou le pseudo est incorrect.";
      }else{
        $_SESSION['pseudo']=$pseudo;
        echo "Vous êtes connecté à votre compte";
      }
      }
    }
  }
}
?>  



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page de Connexion</title>
  <link rel="icon" href="./Images/Univ.jpg"sizes="512x512">
  <link rel="stylesheet" href="./Public/Bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="./Public/">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <meta http-equiv="refresh"  content="10">
  <link rel="shortcut icon" type="image/x-icon" href="images/logo.jpeg" />
  <style>
    body {
      background-image: url(./Images/salon1.jpeg);
     background-size: cover;
     background-position: center;

    }

    .login-container {
      max-width: 400px;
      margin: auto;
      padding: 20px;
      margin-top: 100px;
      background-color: #ffffff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 5px;
    }

    Container{
      background-color: transparent;
    }


    .login-btn {
      width: 100%;
    }
  </style>
</head>
<body>
<marquee onmouseover="this.stop();" onmouseout="this.start();" >
    <ul class="list-unstyled marquee-list mt-2">
        <li class="text-info">
            <b class="text-white"> BIENVENUE SUR TOGO-HOST</b>
        </li>
    </ul>
</marquee>
  <div class="container">
 <!-- <h2 class="text-center mt-5">CONNECTER VOUS ICI !!!</h2> -->
    <div class="login-container">      
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>
        
        <div class="form-group">
          <label for="pseudo">Nom d'utilisateur :</label>
          <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Entrez votre nom d'utilisateur">
        </div>
        <div class="form-group">
          <label for="password">Mot de passe :</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe">
        </div><br>
        <div>
        <button type="submit" class="btn btn-primary login-btn">Se Connecter</button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>