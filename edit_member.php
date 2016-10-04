<?php
include ('conf/top.php');

$error = "";
$success = "";

if(isset ($_GET["id"])) {
    $member = new Member(htmlspecialchars($_GET["id"]));
}


if (isset($_POST['admin'])){

    if ($_POST['admin'] == ""){
        $error .= "You have to enter a content.<br/>";
    }

    if ($error == ""){
        $member->setIsAdmin(htmlspecialchars($_POST['admin']));

        $result = $member->edit();

        if ($result){
            $success .= "You have successfully updated this member";
        }
        else {
            $error .= "Error";
        }
    }
}


include('templates/header.tpl.php');

include('templates/edit_member.tpl.php');

include('templates/footer.tpl.php');


?>