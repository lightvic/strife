<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="disque.css">
</head>
<body>
<form method="POST" action="disque.php">
        <input type="text" name="user_place" placeholder="Identifiant"/>
        <input name="exec" type='submit' value="OK"/>
</form>
<p>Création de site <a href="../website/website.php">Créer un site</a></p>

</body>
</html>

<?php
$user_place = $_POST["user_place"];
if($user_place){
    show_place($user_place);
}
function show_place($user_place){
    echo($user_place);
    echo(" place du compte: ");
    echo(exec("du -sh /var/lib/mysqld/".$user_place." | awk '{print $1}'"));
    echo(" place DB: ");
    echo(exec("du -sh /home/".$user_place." | awk '{print $1}'"));


}
?>