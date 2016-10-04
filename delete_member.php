<?php
header("Location:members_list.php");

include ('conf/top.php');

if(isset ($_GET["id"])) {
    $topic = new Member(htmlspecialchars($_GET["id"]));
    $topic->delete();
}

?>

