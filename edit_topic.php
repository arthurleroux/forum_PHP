<?php
include ('conf/top.php');

$error = "";
$success = "";

if(isset ($_GET["id"])) {
    $topic = new Topic(htmlspecialchars($_GET["id"]));
}

if (isset($_POST['title']) && isset($_POST['content'])){

    if ($_POST['title'] == ""){
        $error .= "You have to enter a title.<br/>";
    }
    if ($_POST['content'] == ""){
        $error .= "You have to enter a content.<br/>";
    }

    if ($error == ""){
        $topic->setTitle(htmlspecialchars($_POST['title']));
        $topic->setContent(htmlspecialchars($_POST['content']));

        $result = $topic->edit();

        if ($result){
            $success .= "You have successfully updated your topic";
        }
        else {
            $error .= "Error";
        }
    }
    header("Location:index.php");
}


include('templates/header.tpl.php');

include('templates/edit_topic.tpl.php');

include('templates/footer.tpl.php');


?>