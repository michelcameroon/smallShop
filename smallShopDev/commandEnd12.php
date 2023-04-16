<?php

//echo '<br>begin buyProduct1<br>';
$post = $_POST;
$price = $post['price'];
$howMany = $post['howMany'];

$commandTotalGiven = $post['commandTotalGiven'];
$commandTotal = $post['commandTotal'];

print_r ($post);

//exit();
//$idProduct = $post['idProduct'];
$fkProduct = $post['fkProduct'];
//$howMany = $post['howMany'];
//$fkCommandId = $post['fkCommand'];
$fkCommand = $post['fkCommand'];

//print ($commandTotalGiven);
//print ($commandTotal);


$rest = $commandTotalGiven - $commandTotal;
print ("<form action= 'buyProduct.php' method= 'POST' >");            
print ('customer gives ' . $commandTotalGiven);
print ('commandTotal ' . $commandTotal);
print ('balance ' . $rest);
print ("<input type='hidden' name='commandTotal' value=$commandTotal />");
print ("<input type='hidden' name='fkCommand' value=$fkCommand />");
print ("<input type='submit' value='finish command' />");
print ("</form>");



?>
