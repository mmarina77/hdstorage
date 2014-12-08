<?php

require_once 'init.php';

$tableRestProxy->deleteEntities('tasks', $_GET['pk'], $_GET['rk']);
header('Location: index.php');
?>