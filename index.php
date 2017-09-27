<?php
$db = new PDO('mysql:host=127.0.0.1;dbname=FamiliesDb', 'root', '');
$db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

//task1
$query = $db -> prepare("SELECT `children`.`name` FROM `children` 
INNER JOIN `colors` ON `children`.`f_color` = `colors`.`id` 
WHERE `colors`.`color` = 'red';");
$query -> execute();

$result = $query -> fetch();

echo 'task1: ';
var_dump($result);

//task2
$query = $db -> prepare("SELECT `children`.`name` FROM `children`
INNER JOIN `adults` ON `adults`.`child1` = `children`.`id`
WHERE `adults`.`pet_name` = 'Syd'
GROUP BY `children`.`id`;");
$query -> execute();

$result = $query -> fetch();

echo '<br> task2: ';
var_dump($result);

//task3
$query = $db -> prepare("SELECT `children`.`name`, `adults`.`pet_name` FROM `children`
INNER JOIN `adults` ON `adults`.`child1` = `children`.`id`
WHERE `adults`.`DOB` > '1985-01-01';");
$query -> execute();

$result = $query -> fetch();

echo '<br> task3: ';
var_dump($result);


//task4
$query = $db -> prepare("SELECT `colors`.`color` FROM `children`
INNER JOIN `colors` ON `colors`.`id` = `children`.`f_color`
INNER JOIN `adults` ON `children`.`id` = `adults`.`child1`
WHERE `adults`.`DOB` >= '1991-01-01'
GROUP BY `colors`.`id`
ORDER BY COUNT(`colors`.`id`) DESC
LIMIT 1;");
$query -> execute();

$result = $query -> fetch();

echo '<br> task4: ';
var_dump($result);
?>