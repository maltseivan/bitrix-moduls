<?php
/**
 * Created by phpStorm
 * User: maltseivan
 * Date: 26.03.2023
 * Time: 22:12
 * class.php
 **/

use \Bitrix\Main\Loader,
    \Bitrix\Main\Localization\Loc,
    \Maltseivan\Ibs\ManufactureTable;

class ManufactureClass extends CBitrixComponent{

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

        if($this -> checkModules())
        {

            $res  =   ManufactureTable::getList(['filter'=>[],'select'=>['*',],'order'=>[]]);

            while ($arFields = $res->fetch()){

                $this->arResult['MANUFACTURE'][$arFields['CODE']] = $arFields;

                if ($this->arParams['SEF_MODE'] === 'N'){
                    $this->arResult['MANUFACTURE'][$arFields['CODE']]['URL'] = '?MODEL_ID='.$arFields['ID'];
                } elseif ($this->arParams['SEF_MODE'] === 'Y'){
                    $this->arResult['MANUFACTURE'][$arFields['CODE']]['URL'] = $arFields['CODE'].'/';
                }

            }

            $this->includeComponentTemplate();
        }
    }
};

