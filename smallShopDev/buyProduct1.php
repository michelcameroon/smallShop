<?php
echo '<br>begin buy1<br>';
$post = $_POST;
$price = $post['price'];
$howMany = $post['howMany'];

print_r ($post);
$idProduct = $post['idProduct'];
//$howMany = $post['howMany'];
$commandId = $post['commandId'];

//echo '<br>begin buy<br>';
include_once 'menu.php';
include_once 'databaseClass/DatabaseClass.php';
include_once 'databaseClass/ArrTb.php';

print ('<h1>buyProduct1</h1>');

//$GLOBALS['newCommand'] = True;

$pwd = '';
$pwd = getcwd();
//print ($pwd);
chdir('databaseClass');
$pwd = getcwd();
//print ($pwd);
//print ('<br>before new<br> ');
//print ('dbhost');
//print ($dbhost);
//print ('<br>');
//print ($dbuser);
//print ('dbuser');
$db1 = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname);
//$db1 = new DatabaseClass('localhost', 'smallShop', 'smallShop', 'smallShop');



// list commandLine
//$sql = 'select * from commandLine where fkCommand = ' . $db1->dbCommandId;
//$sql = 'select * from commandLine where fkCommand = ' . $dbCommandId;
$sql = 'select * from commandLine where fkCommand = ' . $commandId;

print ($sql);


//$db1->list
$commandLines = $db1->Select($sql);
print ('<br>commandLine<br>');
print_r ($commandLines);
/*
if (empty($commandLines)) {
    echo 'le basket est encore vide $var is either 0, empty, or not set at all';

    // create a new command
    $now1 = date('Y-m-d H:i:s');
    print ($now1);

    print ('now = ');
    print ($now1);
    //    $sql = 'insert into command (now, total) values (now(), 0)';
    //    $sql = "insert into command (now, total) values ('2022/05/05', 0)";
    $sql = "insert into command (now, total) values ('$now1', 0)";
    //    $sql = "insert into command (now, total) values ('2023-03-30 15:02:03>
    print ($sql);       
    $dbCommandId = $db1->Insert($sql);
    //$db1->dbCommandId = $db1->Insert($sql);
    $db1->dbCommandId = $dbCommandId;

    //$dbCoomandId = $db1->Insert($sql);
    //$db1->dbCommandId = $db1->Insert($sql);
    print ($dbCommandId);


}
*/

// insert in commandLine

$subTotal = $howMany * $price;
print ('<br>subtotal = <br>');
print ($subTotal);
 
$sql = "insert into commandLine (fkCommand, fkProduct, howMany, subtotal) values ($commandId, $idProduct, $howMany, $subTotal)"; 
print ($sql);
$commandLineInsertId = $db1->insert($sql);
print ('<br>commandLineInsertId = <br>'); 
print ($commandLineInsertId); 

// list commandLine
//$sql = 'select * from commandLine where fkCommand = ' . $db1->dbCommandId;
$sql = 'select * from commandLine where fkCommand = ' . $commandId;
//$sql = 'select * from commandLine where fkCommand = ' . $dbCommandId;

print ($sql);


//$db1->list
$commandLines = $db1->Select($sql);
print ('<br>commandLine<br>');

print ('commandLines = ');
print_r ($commandLines);



$commandId = $commandLines['fkCommand'];
print  ('commandId = <br>');
print  ($commandId);

print  ('<table border=1>');
print ( '<tr>');

print ('<td>');


print ('<table border=1');

//foreach ($this->arrs as $row)
foreach ($commandLines as $row)
{
  
    print ('<tr>');
    print ("<form action= 'buyUpdate.php' method= 'POST' >");            
            

    foreach ($row as $key => $value)
    {


        print ('<td>'); 
        if ($key== 'id')
        {
            $id = $value;
            //print ('<br>$id<br>');
        }
        else
        {
            //print ($value);
            if ($key == 'fkCommand')
            {
                $commandId = $value;
            }
            
            print ($value);
            print ('</td>');
        }
  

    }
    print ('<td>'); 
    //print ("<input type='text' name= 'quantity' value=1 />");
    print ('</td>'); 
    print ("<input type='hidden' name='idProduct' value=$id />");
    print ("<input type='hidden' name='commandId' value=$commandId />");
    print ('</td>'); 

    print ('<td>'); 

    print ("<input type='submit' value='update' />");
    print ("</form>");
    print ('</td>'); 

    print ('<td>'); 

    print ("<form action= 'buydelete.php' method= 'POST' >");            
    print ("<input type='hidden' name='idProduct' value=$id />");
    print ("<input type='submit' value='delete' />");
    print ("</form>");
    print ('</td>'); 


          
             


//        $str .= '</form>';

}
//print ('</tr>');
print ('</table>');

// new commandLine

print ('</td>');
print ('<td>');
print ('<br>new commandLine<br>');

$sql = 'select * from product';
//$sql = 'select * from commndLine';
$products = $db1->Select($sql);

print ('<table border=1');

//foreach ($this->arrs as $row)
$price = 0;
foreach ($products as $row)
{
  
    print ('<tr>');
    print ("<form action= 'buyProduct1.php' method= 'POST' >");            


    foreach ($row as $key => $value)
    {


        print ('<td>'); 
        if ($key== 'id')
        {
            $id = $value;
            //print ('<br>$id<br>');
        }
        else
        {
            if ($key == 'price')
            {

                $price = $value;
            }
            //print ($value);
            print ($value);
            print ('</td>');
        }







}
    print ('<td>'); 
    print ("<input type='hidden' name= 'price' value=$price />" );
    print ("<input type='text' name= 'howMany' value=1 />" );
    print ('</td>'); 
    print ("<input type='hidden' name='idProduct' value=$id />");
    print ("<input type='hidden' name='commandId' value=$commandId />");

    print ('<td>'); 

    print ("<input type='submit' value='buy' />");
    print ("</form>");
    print ('</td>'); 




//        $str .= '</form>';

}
print ('</tr>');
print ('</table>');


print ('</td>');
print ('</tr>');
print ('</table>');



/*
//$sql = 'select * from  product where id = ' . $id;
$sql = 'select * from product';
$products = $db1->Select($sql);


print ($id);
print ($sql);

$arrs = $db1->Select($sql);

print_r ($arrs);  

*/

?>
