<?php

require_once 'init.php';

$result = $tableRestProxy->queryEntities('tasks', 'PartitionKey eq "'.$_GET['pk'].'" and RowKey eq "'.$_GET['rk'].'"');
$entities = $result->getEntities();
$entity = $entities[0];

$entity->setPropertyValue('complete', ($_GET['complete'] == 'true') ? 'true' : 'false');

try {
	$result = $tableRestProxy->updateEntity('tasks', $entity);
} catch(ServiceException $e) {
	echo $e->getCode() . ': ' . $e->getMessage().'<br />';
}
header('Location: index.php');
?>
