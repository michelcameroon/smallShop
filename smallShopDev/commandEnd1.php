<?php

//echo '<br>begin buyProduct1<br>';
$post = $_POST;
$price = $post['price'];
$howMany = $post['howMany'];

$commandTotalGiven = $post['commandTotalGiven'];
$commandTotal = $post['commandTotal'];

//print_r ($post);

//exit();
//$idProduct = $post['idProduct'];
$fkProduct = $post['fkProduct'];
//$howMany = $post['howMany'];
//$fkCommandId = $post['fkCommand'];
$fkCommand = $post['fkCommand'];

//print ($commandTotalGiven);
//print ($commandTotal);

print ('<table border=1');
print ( '<tr>');



$rest = $commandTotalGiven - $commandTotal;
 

print ("<form action= 'buyProduct.php' method= 'POST' >");            

//print ('customer gives ' . $commandTotalGiven);
print ('<td>'); 
print ('customer gives ');
print ('</td>'); 
print ('<td>'); 
print ($commandTotalGiven);
print ('</td>'); 

print ('</tr>'); 
print ('<tr>'); 
print ('<td>'); 

print ('commandTotal ');
print ('</td>'); 
print ('<td>'); 
print ($commandTotal);
print ('</td>'); 
print ('</tr>'); 
print ('<tr>'); 
print ('<td>'); 

print ('balance ');
print ('</td>'); 
print ('<td>'); 
print ($rest);
print ('</td>'); 

print ("<input type='hidden' name='commandTotal' value=$commandTotal />");
print ("<input type='hidden' name='fkCommand' value=$fkCommand />");
print ('<td>'); 

print ('</tr>'); 
print ('<tr>'); 
print ('<td>'); 

print ("<input type='submit' value='finish command' />");
print ('</td>'); 
print ("</form>");

//print('</td>');

print('</tr>');



print('</table>');
?>
