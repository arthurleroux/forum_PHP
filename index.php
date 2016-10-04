<?php

include ('conf/top.php');

include('templates/header.tpl.php');

$topics = Topic::getAll();

$members = Member::getAll();

foreach ($topics as $topic) {
    $author = new Member($topic->getAuthorId());
}

include('templates/index.tpl.php');

include('templates/footer.tpl.php');

?>

