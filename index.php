<html>
<head>
	<title>Index</title>
</head>
<body>
<h1>My ToDo List <span style="color:grey;">(powered by PHP and Azure Tables)</span></h1>
<?php
require_once 'init.php';
try {
	$result = $tableRestProxy->queryEntities('tasks');
} catch(ServiceException $e) {
	echo $e->getCode() . ': ' . $e->getMessage();
}
$entities = $result->getEntities();

		echo '<table border="1">
			<tr>
				<th>Name</th>
				<th>Category</th>
				<th>Date</th>
				<th>Mark Complete?</th>
				<th>Delete?</th>
			</tr>';
			
for($i = 0; $i < count($entities); $i++) {
	if($i == 0) {

	}
	echo '
		<tr>
			<td>'.$entities[$i]->getPropertyValue('name').'</td>
			<td>'.$entities[$i]->getPropertyValue('category').'</td>
			<td>'.$entities[$i]->getPropertyValue('date').'</td>';
			if($entities[$i]->getPropertyValue('complete') == false) 
				echo '<td><a href="markitem.php?complete=true&pk='.$entities[$i]->getPartitionKey().'&rk='.$entities[$i]->getRowKey().'">Mark Complete</a></td>';
			else 
				echo '<td><a href="markitem.php?complete=false&pk='.$entities[$i]->getPartitionKey().'&rk='.$entities[$i]->getRowKey().'">Unmark Complete</a></td>';
			echo '<td><a href="deleteitem.php?pk='.$entities[$i]->getPartitionKey().'&rk='.$entities[$i]->getRowKey().'">Delete</a></td>
		</tr>';
}	
	//if($i > 0) 
echo '</table>';
	//else
	//	echo '<h3>No item on list.</h3>';

?>
<hr />
<form action="additem.php" method="post">
	<table border="1">
		<tr>
			<th>Item: </th>
			<td><input name="itemname" type="text" /></td>
		</tr>
		<tr>
			<th>Category: </th>
			<td><input name="category" type="text" /></td>
		</tr>
		<tr>
			<th>Date: </th>
			<td><input name="date" type="text" /></td>
		</tr>
	</table>
	<input value="Add item" type="submit" />
</form>
</body>
</html>
