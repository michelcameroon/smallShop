

<?php

echo '<br>begin buy1<br>';
$post = $_POST;
$price = $post['price'];
$howMany = $post['howMany'];

print_r ($post);




//echo '<br>begin buy<br>';
include_once 'menu.php';
include_once 'databaseClass/DatabaseClass.php';
include_once 'databaseClass/ArrTb.php';

print ('<h1>buy</h1>');

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

// insert command



$now1 = date('Y-m-d H:i:s');
print ($now1);

print ('now = ');
print ($now1);
    //    $sql = 'insert into command (now, total) values (now(), 0)';
    //    $sql = "insert into command (now, total) values ('2022/05/05', 0)";
$sql = "insert into command (now, total) values ('$now1', 0)";
    //    $sql = "insert into command (now, total) values ('2023-03-30 15:02:03>
print ($sql);       
$commandId = $db1->Insert($sql);
    //$db1->dbCommandId = $db1->Insert($sql);
$db1->dbCommandId = $commandId;

    //$dbCoomandId = $db1->Insert($sql);
    //$db1->dbCommandId = $db1->Insert($sql);
print ('commandId = ');
print ($commandId);





//$products = $db1->listProduct.php;
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

?>
