<?php

include ('conf/top.php');

include('templates/header.tpl.php');

if(isset ($_GET["id"])) {
    $topic = new Topic(htmlspecialchars($_GET["id"]));
}


$error = "";

if (isset($_POST['content'])){

    if ($_POST['content'] == ""){
        $error .= "You have to enter a message.<br/>";
    }

    if ($error == ""){
        $message = new Message();
        $message->setContent(htmlspecialchars($_POST['content']));
        $message->setAuthorId(htmlspecialchars($_SESSION['id']));
        $message->setTopicId(htmlspecialchars($_GET["id"]));

        $result = $message->insert();
    }
}

$messages = Message::getAll();

$members = Member::getAll();

include('templates/single_topic.tpl.php');

include('templates/footer.tpl.php');

?>

