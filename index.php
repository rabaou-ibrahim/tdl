<?php
  session_start();
  $regMessage = "";
  $logMessage = "";
  require_once('require/connexion_db.php');
  if (isset($_POST["registration-username"])){
    $regUsername = $_POST['registration-username'];
  }
  if (isset($_POST['registration-password'])){
    $regPassword = $_POST['registration-password'];
  }
  if (isset($_POST['registration-confirmed-password'])){
    $regConfirmedPassword = $_POST['registration-confirmed-password']; 
  }
  if (isset($_POST['login-username'])){
    $logUsername = $_POST['login-username'];
  }
  if (isset($_POST['login-password'])){
    $logPassword = $_POST['login-password'];
  }
  
  if (isset($_POST['Envoyer-registration'])){
    if (empty($regUsername) or empty($regPassword) or empty($regConfirmedPassword)) {
        $regMessage = "<p style='color:red'>Veuillez remplir tous les champs</p>";
    }
    elseif ($regPassword != $regConfirmedPassword) {
        $regMessage = "<p style='color:red'>Les mots de passes ne sont pas identiques</p>";
    }
    elseif (isset($_POST['registration-username']) && isset($_POST['registration-password']) && isset($_POST['registration-confirmed-password'])) {
        $req = mysqli_query($conn, "SELECT login FROM utilisateurs WHERE login = '$regUsername'"); 
        $num_rows = mysqli_num_rows($req); // Compter le nombre de ligne ayant rapport a la requette SQL
        if ($num_rows > 0){
            $regMessage = "<p style='color:red'>Login déjà pris</p>";
        }
        else {
            $req = mysqli_query($conn, "SELECT password FROM utilisateurs WHERE password = '$regPassword'"); 
            $num_rows = mysqli_num_rows($req); // Compter le nombre de ligne ayant rapport a la requette SQL
            if ($num_rows > 0){
                $regMessage = "<p style='color:red'>Mot de passe déjà pris</p>";
            }
            else {
                $sql = "INSERT INTO utilisateurs
                VALUES (NULL, '$regUsername', '$regPassword')";
                if ($conn->query($sql) === TRUE) {
                    $regMessage = "<p style='color:green'> Inscription réussie ! </p>";
                }
                else {
                    $regMessage = "<p style='color:red'> Erreur non identifiée ! </p>";
                } 
            }
        }
    }
  }

  elseif (isset($_POST['Envoyer-login'])){
    if (empty($logUsername) or empty($logPassword)) {
        $logMessage = "<p style='color:red'> Veuillez remplir tous les champs</p>";
    }
    elseif (isset($_POST['login-username']) && isset($_POST['login-password'])) {
        $sql = "SELECT * FROM utilisateurs WHERE login = '$logUsername' AND password = '$logPassword'";
        $result = mysqli_query($conn, $sql);
                
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            // Si la ligne contenant le bon login et le bon mot de passe est trouvée dans la bdd,
            if ($row['login'] === $logUsername && $row['password'] === $logPassword) {
                header("Location:tdl.php"); // On redirige l'utilisateur à la page welcome
                $_SESSION['loggedin'] = true;
                $_SESSION['logUsername'] = $logUsername; 
                $_SESSION['id'] = $row['id'];
                $_SESSION['logPassword'] = $logPassword;
            }
        }
        else {
            $logMessage = "<p style='color:red'>Login et/ou mot de passe incorrect/s</p>";
        }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="index.css" rel="stylesheet">
    <title>Index</title>
</head>
<body>
    <div class="container" id="container">

        <div class="form-container login-container" data-id="connexion_tab">
            <form action="index.php" method="post">
                <h2>Se connecter</h2>
                    <div id="login-error-message" class="login-error-message">
                        <?php echo $logMessage ?>
                    </div>
                    <input id="connexion-login-input" class="connexion-login-input" type="text" placeholder="Pseudo" name="login-username" autocomplete="off"/>
                    <input id="connexion-password-input" class="connexion-password-input" type="password" placeholder="Mot de passe" name="login-password" autocomplete="off"/>
                    <button id="connexion-submit-field" class="connexion-submit-field" type="submit" name="Envoyer-login" value="Confirmer">Me connecter</button>
            </form>
        </div>

        <div class="form-container sign-up-container">
            <form action="index.php" method="post">        
                <h2>S'inscrire</h2>
                    <div id="registration-error-message" class="registration-error-message">
                        <?php echo $regMessage ?>
                    </div>
                    <input id="registration-username-input" class="registration-username-input" type="text" placeholder="Pseudo" name="registration-username" autocomplete="off"/>
                    <input id="registration-password-input" class="registration-password-input" type="password" placeholder="Mot de passe" name="registration-password" autocomplete="off"/>
                    <input id="registration-confirmed-password-input" class="registration-confirmed-password-input" type="password" placeholder="Confirmation du mot de passe" name="registration-confirmed-password" autocomplete="off"/>
                    <button id="registration-submit-field" class="registration-submit-field" type="submit" name="Envoyer-registration" value="Confirmer">M'inscrire</button>
            </form>
        </div>                
    </div>
</body>
<script src="index.js"></script>
</html>