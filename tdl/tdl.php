<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>To Do List</title>
</head>
<body>
    <header>
        <div class="side-menu" onclick="">
            <li><span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span></li>
            
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="#">Mon Profil</a>
            </div>
        </div>
        <div class="title">
            <h1>Mon planificateur de tâches</h1>
        </div>
        <div class="liste">
            <li><a href="deconnexion.php"><img src="Images/button-power.png" width="75px" height="75px"></a></li>
        </div>
    </header>

    <?php 
       session_start();       
       if (!isset($_SESSION) || !isset($_SESSION['logUsername']) || !isset($_SESSION['logPassword']) || !isset($_SESSION['id'])){
        header('location:warning.php'); 
       }
       elseif ($_SESSION['loggedin'] = true) {
        echo ("<h2>Bienvenue ". $_SESSION['logUsername']." <img src='Images/1f642.png' width=25px height=25px> </h2>");
       }
    ?>
    <div class="how-to">
        <p>Pour ajouter une liste, veuillez remplir le formulaire et cliquer sur le bouton qui sert à l'ajouter. 
            Pour la supprimer il suffit de cliquer deux fois sur la liste ajoutée.</p>
    </div>

    <div class="containers">
    
    <div class="todo-container" id="todo-container">
        <br>
        <div class="hourglass-logo"><img src="Images/sablier.png" width="20px" height="20px"></div>
        <div class="number-current-todo" id="current-number-todo"><h2>0</h2></div>
        <div class="label-box">Tâches en cours</div> 
        <br>
    </div>

    <div class="add-new-todo">
        <br>
        <div class="new-todo-title"><b>Nouvelle tâche</b></div>
        <br>
        <div>
            <input class="input-field" type="text" placeholder="Exemple: Faire les courses" id="My-inputfield">
        </div>
        <button class="button-add-todo">
            <div>
                <img src="Images/Logo-plus.png" width="25px" height="25px">
            </div>
            <div class="text-add-todo" id="text-add-todo" onmouseout="default_color_add_todo_text(this)" onmouseover="change_color_add_todo_text(this)">
                <b>Ajouter ma nouvelle tâche</b>
            </div>   
        </button>
    </div>

    <div class="old-container">
        <br>
        <div class="heart-logo"><img src="Images/check-mark.png" width="20px" height="20px"></div>
        <div class="number-old-todo"><h2>0</h2></div>
        <div class="label-box">Tâches finies</div> 
        <br>
    </div>

    </div>

    <script src="script.js"></script>
</body>
</html>