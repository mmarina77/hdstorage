<?php

require_once 'init.php';

try {
	$tableRestProxy->createTable('tasks');
} catch(ServiceException $e) {
	echo $e->getCode() . ' ' . $e->getMessage();
}
?>