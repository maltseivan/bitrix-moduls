<?php
/**
 * Created by phpStorm
 * User: maltseivan
 * Date: 26.03.2023
 * Time: 23:09
 * class.php
 **/

use \Bitrix\Main\Loader,
    \Bitrix\Main\Localization\Loc,
    \Maltseivan\Ibs\ModelTable,
    \Maltseivan\Ibs\ManufactureTable;

class ModelClass extends CBitrixComponent{

    protected function checkModules()
    {
        if (!Loader::includeModule('maltseivan.ibs'))
        {
            ShowError(Loc::getMessage('Модуль не подключился!'));
            return false;
        }

        return true;
    }

    public function executeComponent(){

        $this -> includeComponentLang('class.php');

        if($this -> checkModules()) {

            $arFilter = [
                'MANUFACTURE_ID' => $this->__getManufacture()
            ];

            $res  =   ModelTable::getList(['filter'=>$arFilter,'select'=>['*'],'order'=>[]]);

            while ($arFields = $res->fetch()){

                $this->arResult['MODEL'][$arFields['CODE']] = $arFields;

                if ($this->arParams['SEF_MODE'] === 'N'){
                    $this->arResult['MODEL'][$arFields['CODE']]['URL'] = '?LAPTOP_ID='.$arFields['ID'];
                } elseif ($this->arParams['SEF_MODE'] === 'Y'){
                    $this->arResult['MODEL'][$arFields['CODE']]['URL'] = $arFields['CODE'].'/';
                }

            }

            $this->includeComponentTemplate();
        }
    }

    private function __getManufacture():int{

        if ($this->arParams['SECTION']['MODEL_ID']){
            $arFilter   =   [
                'ID' => $this->arParams['SECTION']['MODEL_ID']
            ];
        } elseif ($this->arParams['SECTION']['SECTION_CODE']){
            $arFilter   =   [
                'CODE' => $this->arParams['SECTION']['SECTION_CODE']
            ];
        }

        $res  = ManufactureTable::getList(['filter'=>$arFilter,'select'=>['*'],'order'=>[]])->fetchAll()[0];



        return $res['ID'];

    }
}