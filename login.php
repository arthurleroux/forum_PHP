<?php 

include ('conf/top.php');

$error = "";
$success = "";

if (isset($_POST['pseudo']) && isset($_POST['password'])){

	if ($_POST['pseudo'] == ""){
		$error .= "You have to enter a pseudo.<br/>";
	}
	if ($_POST['password'] == ""){
		$error .= "You have to enter a password.<br/>";
	}

	if ($error == ""){
		$member = new Member();
		$member->setPseudo(htmlspecialchars($_POST['pseudo']));
		$member->setPassword(htmlspecialchars($_POST['password']));

		$result = $member->login();

		if ($result){
			$success .= "You have been successfully logged in. You can now go to the <a href='index.php'>home</a><br/>";
		}
		else {
			$error .= "Bad pseudo or password";
		}
	}
}

include('templates/header.tpl.php');

include('templates/login.tpl.php');

include('templates/footer.tpl.php');


?>