<?php

include ('conf/top.php');

$error = "";
$success = "";

if (isset($_POST['title']) && isset($_POST['content'])){

    if ($_POST['title'] == ""){
        $error .= "You have to enter a title.<br/>";
    }
    if ($_POST['content'] == ""){
        $error .= "You have to enter a content.<br/>";
    }

    if ($error == ""){
        $topic = new Topic();
        $topic->setTitle(htmlspecialchars($_POST['title']));
        $topic->setContent(htmlspecialchars($_POST['content']));
        $topic->setAuthorId(htmlspecialchars($_SESSION['id']));

        $result = $topic->insert();

        if ($result){
            $success .= "You have successfully created your topic";
        }
        else {
            $error .= "This topic already exists";
        }
    }

}

include('templates/header.tpl.php');

include('templates/new_topic.tpl.php');

include('templates/footer.tpl.php');


?>