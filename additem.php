<?php

require_once 'init.php';

use WindowsAzure\Table\Models\Entity;
use WindowsAzure\Table\Models\EdmType;


$entity = new Entity();
$entity->setPartitionKey('p1');
$entity->setRowKey(('string')microtime(true));

$entity->addProperty('name', EdmType::STRING, $_POST['itemname']);
$entity->addProperty('category', EdmType::STRING, $_POST['category']);
$entity->addProperty('date', EdmType::STRING, $_POST['date']);
$entity->addProperty('complete', EdmType::BOOLEAN, false);

try {
	$tableRestProxy->insertEntity('tasks', $entity);
} catch(ServiceException $e) {
	echo $e->getCode() . ': ' . $e->getMessage().'<br />';
}
header('Location: index.php');
?>