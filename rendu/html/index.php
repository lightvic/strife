<div>AJOUTER USER </div>
<form method="POST" action="index.php">
	<input type="text" name="name"/>
	<input type="password" name="password"/>
	<input name="exec" type='submit' value="OK"/>
</form>
<br/>

<div>NOUVEAU SITE </div>
<form method="POST" action='index.php'>
	<input type='text' name='new_site' />
	<input type='text' name='user_name' />
	<input type='submit' value="Nouveau site" />
</form>
<br/>

<div>NOuVELLE DB </div>
<form method="POST" action='index.php'>
	<div> identifiant</div>
        <input type='text' name='user_db' />
	<div>Mot de passe</div>
        <input type='password' name='db_password' />
	<div>Nom database</div>
	<input type='text' name='new_db' />
        <input type='submit' value="Nouvelle db" />
</form>
<br/>

<div>BACKUP</div>
<form method="post" action='index.php'>
	<input type='text' name='user_backup'>
	<input type='submit' value='backup'>
</form>
<br/>

<div> CHANGEMENT DE MDP </div>
<form method="POST" action="index.php">
	<input type="text" name="password_user"/>
        <input type="password" name="change_password"/>
        <input name="exec" type='submit' value="OK"/>
</form>
<br/>

<div> TELECHARGEMENT BACKUP </div>
<form method="POST" action="index.php">
	<input type="text" name="user_backup"/>
	<input type='text' name="backup"/>
        <input type="text" name="path"/>
        <input name="exec" type='submit' value="OK"/>
</form>
<br/>

<div> ESPACE OCCUPEE </div>
<form method="POST" action="index.php">
        <input type="text" name="user_place"/>
        <input name="exec" type='submit' value="OK"/>
</form>
<br/>

<?php

$user_name = $_POST["name"];
$name = $_POST["user_name"];
$password = $_POST["password"];
$new_site = $_POST["new_site"];

$user_db = $_POST["user_db"];
$new_db = $_POST["new_db"];
$db_password = $_POST["db_password"];
$user_place = $_POST["user_place"];


$user_backup=$_POST["user_backup"];

$password_user = $_POST["password_user"];
$new_password = $_POST["change_password"];

$user_backup = $_POST["user_backup"];
$path = $_POST["path"];
$backup = $_POST["backup"];

if($user_name && $password){
	add_user($user_name,$password);
}

if($new_site && $name){
	new_site($new_site,$name);
}

if($new_db && $user_db && $db_password){
	add_db($new_db,$user_db,$db_password);
	}
if($user_backup){
	exec("sudo /var/www/script/add_backup.sh $user_backup");

}
if($password_user && $new_password){
	change_password($password_user,$new_password);
}
if($user_backup && $path){
	download_backup($user_backup,$path);
}
if($user_place){
	show_place($user_place);
}

function add_user($user_name,$password){
	exec("sudo /var/www/script/add_user.sh ".$password." ".$user_name);
}

function new_site($new_site,$name){
	 exec("sudo /var/www/script/new_site.sh ".$name." ".$new_site);
}

function add_db($new_db,$user_db,$db_password){
	exec("sudo /var/www/script/add_db.sh $new_db $user_db $db_password");
} 

function change_password($password_user,$new_password){
	var_dump($password_user);
	var_dump($new_password);
	exec("sudo /var/www/script/change_password.sh $password_user $new_password");
}

function download_backup($user_backup,$path,$backup){
	exec("sudo /var/www/script/download.sh $user_backup $path $backup");
}
function show_place($user_place){
	echo($user_place);
	echo(" place du compte: ");
	echo(exec("du -sh /var/lib/mysqld/".$user_place." | awk '{print $1}'"));
	echo(" place DB: ");
	echo(exec("du -sh /home/".$user_place." | awk '{print $1}'"));


}
?>
