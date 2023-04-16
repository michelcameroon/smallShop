<?php
echo 'begin commandEnd.php<br>';


$post = $_POST;
$price = $post['price'];
$howMany = $post['howMany'];
$commandTotal = $post['commandTotal'];
$id = $post['fkCommand'];

print_r ($post);


//echo '<br>begin buy<br>';
include_once 'menu.php';
include_once 'databaseClass/DatabaseClass.php';
//include_once 'databaseClass/ArrTb.php';

print ('<h1>buyProduct1</h1>');


$pwd = '';
$pwd = getcwd();
//print ($pwd);
chdir('databaseClass');
$pwd = getcwd();
//print ($pwd);


$db1 = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname);


$sql = 'update command set total = ' .  $commandTotal .  ' where id = ' . $id ;

print ($sql);

$commandLineInsertId = $db1->Update($sql);


print ("<form action= 'commandEnd1.php' method= 'POST' >");            
print ("<input type='text' name='commandTotalGiven' value=$commandTotal />");
print ("<input type='hidden' name='commandTotal' value=$commandTotal />");
print ("<input type='hidden' name='id' value=$id />");
print ("<input type='submit' value='paid' />");
print ("</form>");

?>
