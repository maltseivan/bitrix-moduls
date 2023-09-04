<?php
/**
 * Created by phpStorm
 * User: maltseivan
 * Date: 25.03.2023
 * Time: 23:39
 **/

namespace Maltseivan\Ibs\Classes;

use \Bitrix\Main\Localization\Loc,
    \Maltseivan\Ibs\ManufactureTable,
    \Maltseivan\Ibs\ModelTable,
    \Maltseivan\Ibs\LaptopTable,
    \Maltseivan\Ibs\OptionTable,
    \Maltseivan\Ibs\LaptopOptionUsTable;

Loc::loadMessages(__FILE__);

/**
 * Class DataBase
 * @package Maltseivan\Ibs\Classes
 */

class DataBase{

    private array $_Result  =  [];
    private array $_arData  =  [
        'MANUFACTURE' => [
            0   => ['ID' => 1, 'NAME' => 'DELL', 'CODE' => 'dell'],
            1   => ['ID' => 2, 'NAME' => 'APPLE', 'CODE' => 'apple'],
            2   => ['ID' => 3, 'NAME' => 'HP', 'CODE' => 'hp'],
            3   => ['ID' => 4, 'NAME' => 'SAMSUNG', 'CODE' => 'samsung'],
            4   => ['ID' => 5, 'NAME' => 'HUAWEI', 'CODE' => 'huawei'],
            5   => ['ID' => 6, 'NAME' => 'LENOVO', 'CODE' => 'lenovo'],
            6   => ['ID' => 7, 'NAME' => 'ASER', 'CODE' => 'aser'],
            7   => ['ID' => 8, 'NAME' => 'ASUS', 'CODE' => 'asus'],
            8   => ['ID' => 9, 'NAME' => 'MSI', 'CODE' => 'msi'],
            9   => ['ID' => 10, 'NAME' => 'Raser', 'CODE' => 'raser'],
            10  => ['ID' => 11, 'NAME' => 'Microsoft Surfase', 'CODE' => 'microsoft-surfase']
        ],
        'MODEL' => [
            0   => ['ID' => 1, 'NAME' => 'MakBook', 'CODE' => 'makbook', 'MANUFACTURE_ID' => 2],
            1   => ['ID' => 2, 'NAME' => 'MakBookAir', 'CODE' => 'makbookair', 'MANUFACTURE_ID' => 2],
            2   => ['ID' => 3, 'NAME' => 'ZenBook', 'CODE' => 'zenbook', 'MANUFACTURE_ID' => 8],
            3   => ['ID' => 4, 'NAME' => 'Ultrabook', 'CODE' => 'ultrabook', 'MANUFACTURE_ID' => 5],
            4   => ['ID' => 5, 'NAME' => 'NetBook', 'CODE' => 'netbook', 'MANUFACTURE_ID' => 5],
            5   => ['ID' => 6, 'NAME' => 'FunctionBook', 'CODE' => 'functionbook', 'MANUFACTURE_ID' => 1],
            6   => ['ID' => 7, 'NAME' => 'LiteBook', 'CODE' => 'litebook', 'MANUFACTURE_ID' => 4]
        ],
        'LAPTOP' => [
            0   => ['ID' => 1, 'NAME' => 'Acer Extensa 15 EX215-22-R8E3', 'CODE' => 'acer-extensa-15', 'MODEL_ID' => 1, 'YEAR' => '2022', 'PRISE' => '100 000'],
            1   => ['ID' => 2, 'NAME' => 'Asus VivoBook 15 OLED K513EA', 'CODE' => 'asus-vivobook-15', 'MODEL_ID' => 3 , 'YEAR' => '2023', 'PRISE' => '80 000'],
            2   => ['ID' => 3, 'NAME' => 'MateBook D 15', 'CODE' => 'matebook-d-15', 'MODEL_ID' => 1, 'YEAR' => '2020', 'PRISE' => '70 000'],
            3   => ['ID' => 4, 'NAME' => 'HUAWEI MateBook D 15', 'CODE' => 'ultrabook', 'MODEL_ID' => 3, 'YEAR' => '2023', 'PRISE' => '110 000'],
            4   => ['ID' => 5, 'NAME' => 'Acer TravelMate P2 TMP215-41-G2', 'CODE' => 'acer-travelmate-p2', 'MODEL_ID' => 6, 'YEAR' => '2020', 'PRISE' => '60 000'],
            5   => ['ID' => 6, 'NAME' => 'Apple MacBook Air 13 2022', 'CODE' => 'apple-macBook-air-13', 'MODEL_ID' => 6, 'YEAR' => '2021', 'PRISE' => '101 000'],
            6   => ['ID' => 7, 'NAME' => 'Asus TUF Gaming F15 FX506HCB', 'CODE' => 'asus-tuf-gaming-f15', 'MODEL_ID' => 5, 'YEAR' => '2021', 'PRISE' => '160 000'],
            7   => ['ID' => 8, 'NAME' => 'MSI GF63 Thin 11UD', 'CODE' => 'msi-gf63', 'MODEL_ID' => 3, 'YEAR' => '2021', 'PRISE' => '100 120'],
            8   => ['ID' => 9, 'NAME' => 'MSI Pulse GL76 11UEK', 'CODE' => 'msi-pulse-gl76', 'MODEL_ID' => 3, 'YEAR' => '2020', 'PRISE' => '65 000'],
            9   => ['ID' => 10, 'NAME' => 'HP Victus 16-e', 'CODE' => 'hp-victus', 'MODEL_ID' => 5, 'YEAR' => '2020', 'PRISE' => '100 000'],
            10  => ['ID' => 11, 'NAME' => 'ASUS ROG Strix G15 G513', 'CODE' => 'asus-rog-strix', 'MODEL_ID' => 3, 'YEAR' => '2021', 'PRISE' => '50 000'],
            11  => ['ID' => 12, 'NAME' => 'Lenovo Legion 5 15', 'CODE' => 'lenovo-legion-5', 'MODEL_ID' => 3, 'YEAR' => '2020', 'PRISE' => '50 000'],
            12  => ['ID' => 13, 'NAME' => 'HP 17-cn0113ur', 'CODE' => 'hp-17-cn0113ur', 'MODEL_ID' => 3, 'YEAR' => '2020', 'PRISE' => '130 000']
        ],
        'OPTIONASLAPTOP' => [
            1   => ['ID' => 1, 'LAPTOP_ID' => 1, 'OPTION_ID' => 11],
            2   => ['ID' => 2, 'LAPTOP_ID' => 1, 'OPTION_ID' => 9],
            3   => ['ID' => 3, 'LAPTOP_ID' => 1, 'OPTION_ID' => 6],
            4   => ['ID' => 4, 'LAPTOP_ID' => 1, 'OPTION_ID' => 1],
            5   => ['ID' => 5, 'LAPTOP_ID' => 2, 'OPTION_ID' => 3],
            6   => ['ID' => 6, 'LAPTOP_ID' => 2, 'OPTION_ID' => 4],
            8   => ['ID' => 7, 'LAPTOP_ID' => 2, 'OPTION_ID' => 5],
            9   => ['ID' => 8, 'LAPTOP_ID' => 3, 'OPTION_ID' => 6],
            10  => ['ID' => 10, 'LAPTOP_ID' => 3, 'OPTION_ID' => 7],
            11  => ['ID' => 11, 'LAPTOP_ID' => 3, 'OPTION_ID' => 1],
            12  => ['ID' => 12, 'LAPTOP_ID' => 3, 'OPTION_ID' => 3],
            13  => ['ID' => 13, 'LAPTOP_ID' => 4, 'OPTION_ID' => 5],
            14  => ['ID' => 14, 'LAPTOP_ID' => 5, 'OPTION_ID' => 8],
            15  => ['ID' => 15, 'LAPTOP_ID' => 6, 'OPTION_ID' => 9],
            16  => ['ID' => 16, 'LAPTOP_ID' => 8, 'OPTION_ID' => 11],
            17  => ['ID' => 17, 'LAPTOP_ID' => 7, 'OPTION_ID' => 12],
            18  => ['ID' => 18, 'LAPTOP_ID' => 9, 'OPTION_ID' => 1],
            19  => ['ID' => 19, 'LAPTOP_ID' => 10, 'OPTION_ID' => 4],
            20  => ['ID' => 20, 'LAPTOP_ID' => 10, 'OPTION_ID' => 5],
            21  => ['ID' => 21, 'LAPTOP_ID' => 11, 'OPTION_ID' => 7]
        ],
        'OPTION' => [
            0   => ['ID' => 1, 'NAME' => 'Вес', 'VALUE' => '15 кг'],
            1   => ['ID' => 2, 'NAME' => 'Вес', 'VALUE' => '25 кг'],
            2   => ['ID' => 3, 'NAME' => 'Вес', 'VALUE' => '5 кг'],
            3   => ['ID' => 4, 'NAME' => 'Клавиатура', 'VALUE' => 'Механика'],
            4   => ['ID' => 5, 'NAME' => 'Клавиатура', 'VALUE' => 'Мембранная'],
            5   => ['ID' => 6, 'NAME' => 'Клавиатура', 'VALUE' => 'AMD Ryzen'],
            6   => ['ID' => 7, 'NAME' => 'Клавиатура', 'VALUE' => 'Intel'],
            7   => ['ID' => 8, 'NAME' => 'Оперативка', 'VALUE' => '8 гб'],
            8   => ['ID' => 9, 'NAME' => 'Оперативка', 'VALUE' => '16 гб'],
            9   => ['ID' => 10, 'NAME' => 'Экран', 'VALUE' => '1920x1080'],
            10  => ['ID' => 11, 'NAME' => 'Тип памяти', 'VALUE' => 'DDR5'],
            11  => ['ID' => 12, 'NAME' => 'Тип памяти', 'VALUE' => 'DDR4'],
            12  => ['ID' => 13, 'NAME' => 'Диагональ', 'VALUE' => '16.1 "'],
            13  => ['ID' => 14, 'NAME' => 'Диагональ', 'VALUE' => '14.1 "']
        ],
    ];

    /**
     * PublicVacancy constructor
     */
    function __construct(){
        $this->addDataManufacture();
        $this->addDataModel();
        $this->addDataLaptop();
        $this->addDataOption();
        $this->addDataOptionUsLaptop();
    }


    public function dataBase():bool{

        if (in_array(false, $this->_Result, true)) {
            return false;
        }

        return true;

    }

    private function addDataManufacture():void{

        foreach ($this->_arData['MANUFACTURE'] as $elem){

            $arAdd = [
                'ID'      => $elem['ID'],
               'NAME'     => $elem['NAME'],
               'CODE'     => $elem['CODE']
           ];

           $result = ManufactureTable::add($arAdd);

        }

        $this->_Result[] = true;

    }

    private function addDataModel():void{

        foreach ($this->_arData['MODEL'] as $elem){

            $arAdd = [
                'ID'            => $elem['ID'],
                'NAME'          => $elem['NAME'],
                'CODE'          => $elem['CODE'],
                'MANUFACTURE_ID'=> $elem['MANUFACTURE_ID'],
            ];

            $result = ModelTable::add($arAdd);

        }

        $this->_Result[] = true;

    }

    private function addDataLaptop():void{

        foreach ($this->_arData['LAPTOP'] as $elem){

            $arAdd = [
                'ID'       => $elem['ID'],
                'NAME'     => $elem['NAME'],
                'CODE'     => $elem['CODE'],
                'MODEL_ID' => $elem['MODEL_ID'],
                'YEAR'     => $elem['YEAR'],
                'PRISE'    => $elem['PRISE'],
            ];

            $result = LaptopTable::add($arAdd);

        }

        $this->_Result[] = true;

    }

    private function addDataOption():void{

        foreach ($this->_arData['OPTION'] as $elem){

            $arAdd = [
                'ID'     => $elem['ID'],
                'NAME'   => $elem['NAME'],
                'VALUE'  => $elem['VALUE']
            ];

            $result = OptionTable::add($arAdd);

        }

        $this->_Result[] = true;

    }

    private function addDataOptionUsLaptop():void{

        foreach ($this->_arData['OPTIONASLAPTOP'] as $elem){

            $arAdd = [
                'ID'        => $elem['ID'],
                'LAPTOP_ID' => $elem['LAPTOP_ID'],
                'OPTION_ID' => $elem['OPTION_ID']
            ];

            $result = LaptopOptionUsTable::add($arAdd);

        }

        $this->_Result[] = true;

    }

}