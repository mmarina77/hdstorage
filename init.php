<?php

require_once 'vendor/autoload.php';

echo "**** init.php **** <br>";
// name spaces list
use WindowsAzure\Common\ServicesBuilder;	// wrapper 
use WindowsAzure\Common\ServiceException;

// storage name = hdstorage123
// primary key = WSNmmY8iVisBrhVpQtk+iYdL1AyyLcFlei1gqFAf6o3Fn7XBBwJuColgYGFzW4cAj2yVf/BCCJHlhIrPl2+6cg==
// secondary key = CvZfAdWSOFLjStdQhb8GBkHtA/qag44OYJ/YOfa5wsjJ2V3u3izuYGk4BSQwKgQm4Dx+ufq7ynlnCkKa6FcqZA==

//$connectionString = "DefaultEndpointsProtocol=http;AccountName=hdstorage123;Account=WSNmmY8iVisBrhVpQtk+iYdL1AyyLcFlei1gqFAf6o3Fn7XBBwJuColgYGFzW4cAj2yVf/BCCJHlhIrPl2+6cg==";
$connectionString = "DefaultEndpointsProtocol=http;AccountName=hdstorage123;Account=WSNmmY8iVisBrhVpQtk+iYdL1AyyLcFlei1gqFAf6o3Fn7XBBwJuColgYGFzW4cAj2yVf/BCCJHlhIrPl2+6cg==";

$tableRestProxy = ServicesBuilder::getInstance()->createTableService($connectionString);
?>
