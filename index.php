<?php
$db = new PDO('mysql:host=127.0.0.1;dbname=families', 'root', '');
$db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query = $db -> prepare("SELECT `children`.`name` FROM `children` 
INNER JOIN `colors` ON `children`.`f_color` = `colors`.`id` 
WHERE `colors`.`color` = 'red';");
$query -> execute();

$result = $query -> fetch();

var_dump($result);
?>