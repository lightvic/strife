<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
    <link rel="stylesheet" href="database.css">
</head>
<body>
    <div class="main-parent">
        <div class="user-db">
            <h1>Création de la base de données</h1>
            <br>
            <form method="POST" action="database.php">
                <input type='text' name='new_db' placeholder="Identifiant"/>
                <input type='password' name='db_password' placeholder="Password"/>
                <input type='text' name='user_db' placeholder="Name database"/>
                <input type='submit' value="Valider" class="submit"/>
            </form>
        </div>
    </div>
    <p>Création de site <a href="../website/website.php">Créer un site</a></p>
</body>
</html>

<?php
$user_db = $_POST["user_db"];
$new_db = $_POST["new_db"];
$db_password = $_POST["db_password"];

if($new_db && $user_db && $db_password){
    add_db($new_db,$user_db,$db_password);
}

function add_db($new_db,$user_db,$db_password){
    exec("sudo /var/www/script/add_db.sh $new_db $user_db $db_password");
}

?>