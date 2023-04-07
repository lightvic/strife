<form method="POST" action="index.php">
	<input type="text" name="name"/>
	<input type="password" name="password"/>
	<input name="exec" type='submit' value="OK"/>
</form>
<br/>

<form method="POST" action='index.php'>
	<input type='text' name='new_site' />
	<input type='text' name='user_name' />
	<input type='submit' value="Nouveau site" />
</form>
<br/>

<form method="POST" action='index.php'>
	<div> identifiant</div>
        <input type='text' name='new_db' />
	<div>Mot de passe</div>
        <input type='password' name='db_password' />
	<div>Nom database</div>
	<input type='text' name='user_db' />
        <input type='submit' value="Nouvelle db" />
</form>

<?php
$user_name = $_POST["name"];
$name = $_POST["user_name"];

$password = $_POST["password"];
$new_site = $_POST["new_site"];

$user_db = $_POST["user_db"];
$new_db = $_POST["new_db"];
$db_password = $_POST["db_password"];
	if($user_name && $password){
	function add_user($user_name,$password){
		exec("sudo /usr/sbin/useradd -m -p" .$password." ".$user_name,$output);
		var_dump($output);
		}
	add_user($user_name,$password);
 }
	if($new_site && $name){

		function new_site($new_site,$name){
			$output = shell_exec("sudo /var/www/script/new_site.sh ".$new_site);
		}
		new_site($new_site,$name);
}

	if($new_db && $user_db && $db_password){
		function add_db($new_db,$user_db,$db_password){
		$output = shell_exec("sudo /var/www/script/add_db.sh $new_db $user_db $db_password");
		}
		add_db($new_db,$user_db,$db_password);
	}

?>
