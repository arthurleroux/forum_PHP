<?php


include ('conf/top.php');

if(isset ($_GET["id_message"])) {
    $message = new Message(htmlspecialchars($_GET["id_message"]));
    $message->delete();

    $topic_id = $message->getTopicId();
    header("Location:single_topic.php?id=$topic_id");
}

?>