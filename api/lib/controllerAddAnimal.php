<?php
error_reporting(0);
require_once 'model.php';
use Lib\addToFileJSON;
$type=$_GET['type'];
$quantity=$_GET['quantity'];

for ($count=1;$count<=$quantity;$count++)
{
    $arAnimals=new addToFileJSON($type);
    $arAnimals=$arAnimals->addData();
}


