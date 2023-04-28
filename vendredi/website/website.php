<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <link rel="stylesheet" href="website.css">
</head>
<body>
    <div class="main-parent">
        <div class="user-website">
            <h1>Création du site</h1>
            <br>
            <form method="POST" action="website.php">
                <input type='text' name='new_site' placeholder="Website"/>
                <input type='text' name='user_name' placeholder="User Name"/>
                <input type='submit' value="Valider" class="submit"/>
            </form>       
        </div>
    </div>
    <p>Création d'un utilisateur <a href="../connexion/connexion.php">Créer un utilisateur</a></p>
    <p>Backup <a href="../backup/backup.php">S'occuper des backups</a></p>
    <p>Mémoire d'un utilisateur <a href="../disque/disque.php">Espace disque</a></p>
    <p>Création d'une DB <a href="../database/database.php">Créer une DB</a></p>
</body>
</html>
<?php
$new_site = $_POST["new_site"];
$name = $_POST["user_name"];

if($new_site && $name){
    new_site($new_site,$name);
}

function new_site($new_site,$name){
    exec("sudo /var/www/script/new_site.sh ".$name." ".$new_site);
}

?>