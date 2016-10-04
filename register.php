<?php 

include ('conf/top.php');

$error = "";
$success = "";

if (isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['birthdate'])){

	if ($_POST['pseudo'] == ""){
		$error .= "You have to enter a pseudo.<br/>";
	}
	if ($_POST['password'] == ""){
		$error .= "You have to enter a password.<br/>";
	}
	if ($_POST['birthdate'] == ""){
		$error .= "You have to enter a birthdate<br/>";
	}

	if ($error == ""){
		$member = new Member();
		$member->setPseudo(htmlspecialchars($_POST['pseudo']));
		$member->setPassword(htmlspecialchars($_POST['password']));
		$member->setBirthdate(htmlspecialchars($_POST['birthdate']));

		$result = $member->insert();

		if ($result){
			$success .= "You have been successfully registered. You can now <a href='login.php'>login</a><br/>";
		}
		else {
			$error .= "This pseudo is already taken";
		}
	}
}

include('templates/header.tpl.php');

include('templates/register.tpl.php');

include('templates/footer.tpl.php');


?>