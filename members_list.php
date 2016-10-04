<?php

include ('conf/top.php');

include('templates/header.tpl.php');

$members = Member::getAll();

include('templates/members_list.tpl.php');

include('templates/footer.tpl.php');

?>

