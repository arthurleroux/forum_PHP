<?php
header("Location:index.php");

include ('conf/top.php');

if(isset ($_GET["id"])) {
    $topic = new Topic(htmlspecialchars($_GET["id"]));
    $topic->delete();
}

?>

