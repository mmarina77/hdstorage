<?php

require_once 'init.php';
echo "**** createdb.php **** <br>";
try {
	$tableRestProxy->createTable('tasks');
} catch(ServiceException $e) {
	echo $e->getCode() . ' ' . $e->getMessage();
}
?>
