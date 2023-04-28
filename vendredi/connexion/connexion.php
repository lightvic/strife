<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="connexion.css">
</head>
<body>
    <div class="main-parent">
        <div class="form-wrap">
            <form method="POST" action="connexion.php">
                <h1>Formulaire d'inscription</h1>
                <div class="user-form">      
                    <input type="text" name="name" placeholder="Identifiant"/>
	                <input type="password" name="password" placeholder="Password"/>
                    <input type="submit" class="submit">
                </div>
                <p>Création de site <a href="../website/website.php">Créer un site</a></p>
            </form>
        </div> 
    </div>
</body>
</html>

<?php
$user_name = $_POST["name"];
$password = $_POST["password"];

if($user_name && $password){
    add_user($user_name,$password);
}

function add_user($user_name,$password){
    exec("sudo /var/www/script/add_user.sh ".$password." ".$user_name);
}
?>