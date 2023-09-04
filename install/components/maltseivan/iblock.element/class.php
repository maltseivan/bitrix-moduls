<?php
/**
 * Created by phpStorm
 * User: maltseivan
 * Date: 27.03.2023
 * Time: 1:15
 * class.php
 **/

use \Bitrix\Main\Loader,
    \Bitrix\Main\Localization\Loc,
    \Maltseivan\Ibs\LaptopTable;


class ElementClass extends CBitrixComponent{

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

            if ($this->arParams['SEF_MODE'] == 'N'){
                $arFilter = [
                    'ID' => $this->arParams['SECTION_CODE']['ELEMENT_ID']
                ];
            } elseif ($this->arParams['SEF_MODE'] == 'Y') {
                $arFilter = [
                    'CODE' => $this->arParams['SECTION_CODE']['ELEMENT_CODE']
                ];
            }

            $arSelect = [
                '*',
                'OPTION_ID'     => 'OPTION.ID',
                'OPTION_NAME'   => 'OPTION.OPTION.NAME',
                'OPTION_VALUE'  => 'OPTION.OPTION.VALUE'
            ];

            $res  =   LaptopTable::getList(['filter'=>$arFilter,'select'=>$arSelect,'order'=>[]]);

            while ($arFields = $res->fetch()){

                $this->arResult['LAPTOP'] = ['NAME' => $arFields['NAME'], 'YEAR' => $arFields['YEAR'], 'PRICE' => $arFields['PRISE']];
                $this->arResult['OPTIONS'][] = ['ID' => $arFields['OPTION_ID'], 'NAME' => $arFields['OPTION_NAME'], 'VALUE' => $arFields['OPTION_VALUE']];

            }

            $this->includeComponentTemplate();
        }
    }
}