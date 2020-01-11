<?php
namespace Lib;

class Farm{
  public $arAnimals;

  //конструктор выпоняет роль  регистратора  животных в хлеве
  function __construct($arAnimals)
  {
      $this->arAnimals=$arAnimals;
  }

  //метод getResultSumProduct производит подсчет продукции собранного с животного
  // и выдает результат в виде массива с количеством молока и яиц
  function getResultSumProduct()
      {
          $milk=0;
          $eggs=0;
          foreach ($this->arAnimals as $arAnimal)
              {
                  switch ($arAnimal['TypeOfAnimal'])
                  {
                      case 'Cow':
                          $milk+=$arAnimal['ProductQuantity'];
                          break;
                      case 'Chicken':
                          $eggs+=$arAnimal['ProductQuantity'];
                          break;
                  }
              }
          return ['milk'=>$milk, 'eggs'=>$eggs];
      }
}

class farmAnimal
{

     public $typeOfAnimal;

     function __construct($typeOfAnimal)
         {

             $this->typeOfAnimal=$typeOfAnimal;

         }
     function animal()
         {
             if ($this->typeOfAnimal=='Cow')
                {
                 $animal=
                     [
                         'Id'              =>  'id_'.uniqid(),
                         'TypeOfAnimal'    =>  $this->typeOfAnimal,
                         'ProductQuantity' =>  random_int ( 8 , 12 )
                     ];
                }
             elseif ($this->typeOfAnimal=='Chicken')
                {
                    $animal=
                        [
                            'Id'              =>  'id_'.uniqid(),
                            'TypeOfAnimal'    =>  $this->typeOfAnimal,
                            'ProductQuantity' =>  random_int ( 0 , 1 )
                        ];
                }
             return $animal;
         }
}
class addToFileJSON
    {
        public $type;

        function __construct($type)
        {
            $this->type=$type;
        }

        function addData()
        {
            $json  = file_get_contents('listAnimals.json', true);
            if ($json!='')
            {
                $json  = substr($json, 0, -1);
                $fjson = fopen('listAnimals.json' ,"w");
                fwrite($fjson,$json);
                fclose($fjson);
                $newAnimal=new farmAnimal($this->type);
                $newAnimal=json_encode($newAnimal->animal(), JSON_PRETTY_PRINT);
                $fp = fopen('listAnimals.json' ,"a");
                fwrite($fp,',');
                fwrite($fp,$newAnimal);
                fwrite($fp,']');
                fclose($fp);
                $json  = file_get_contents('listAnimals.json', true);
            }
            else
            {
                $newAnimal=new farmAnimal($this->type);
                $newAnimal=json_encode($newAnimal->animal(), JSON_PRETTY_PRINT);
                $fp = fopen('listAnimals.json' ,"a");
                fwrite($fp,'[');
                fwrite($fp,$newAnimal);
                fwrite($fp,']');
                fclose($fp);
            }

        }

}
class getData
{
    function returnData()
    {
        $arAnimals  = file_get_contents('listAnimals.json', true);
        $arAnimals  = json_decode($arAnimals,true);
        return $arAnimals;
    }
}
