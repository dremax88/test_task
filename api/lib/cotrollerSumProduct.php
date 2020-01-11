<?php
error_reporting(0);
require_once 'model.php';
use Lib\Farm;
use Lib\getData;

$arAnimals=new getData();
$arAnimals=$arAnimals->returnData();

$getResult=new Farm($arAnimals);

echo json_encode($getResult->getResultSumProduct());



