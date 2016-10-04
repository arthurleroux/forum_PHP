<?php
include ('conf/top.php');

$error = "";
$success = "";

if(isset ($_GET["id_message"])) {
    $message = new Message(htmlspecialchars($_GET["id_message"]));
}

if (isset($_POST['content'])){

    if ($_POST['content'] == ""){
        $error .= "You have to enter a content.<br/>";
    }

    if ($error == ""){
        $message->setContent(htmlspecialchars($_POST['content']));

        $result = $message->edit();


        if ($result){
            $success .= "You have successfully updated your message";
        }
        else {
            $error .= "Error";
        }
    }
    $topic_id = $message->getTopicId();
    header("Location:single_topic.php?id=$topic_id");
}


include('templates/header.tpl.php');

include('templates/edit_message.tpl.php');

include('templates/footer.tpl.php');


?>