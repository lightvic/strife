<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>Création de backup</div>
    <form method="post" action='backup.php'>
        <input type='text' name='user_backup'>
        <input type='submit' value='backup'>
    </form>
    <br/>
    <div> TELECHARGEMENT BACKUP </div>
    <form method="POST" action="backup.php">
        <input type="text" name="user_backup"/>
        <input type='text' name="backup"/>
        <input type="text" name="path"/>
        <input name="exec" type='submit' value="OK"/>
    </form>
    <br/>
    <p>Création de site <a href="../website/website.php">Créer un site</a></p>
</body>
</html>
<?php
$user_backup = $_POST["user_backup"];
$path = $_POST["path"];
$backup = $_POST["backup"];

if($user_backup){
    exec("sudo /var/www/script/add_backup.sh $user_backup");

}
if($user_backup && $path){
    download_backup($user_backup,$path);
}

function download_backup($user_backup,$path,$backup){
    exec("sudo /var/www/script/download.sh $user_backup $path $backup");
}

?>