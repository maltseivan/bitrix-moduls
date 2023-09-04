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
    \Maltseivan\Ibs\LaptopTable;

class LaptopClass extends CBitrixComponent{

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

            if ($this->arParams['SECTION_CODE']['LAPTOP_ID']){
                $arFilter = [
                    'MODEL_ID' => $this->arParams['SECTION_CODE']['LAPTOP_ID']
                ];
            } else {
                $arFilter = [
                    'MODEL_ID' => $this->__getManufacture()
                ];
            }

            $res  =   LaptopTable::getList(['filter'=>$arFilter,'select'=>['*'],'order'=>[]]);

            while ($arFields = $res->fetch()){

                $this->arResult['LAPTOP'][$arFields['CODE']] = $arFields;

                if ($this->arParams['SEF_MODE'] === 'N'){
                    $this->arResult['LAPTOP'][$arFields['CODE']]['URL'] = '?ELEMENT_ID='.$arFields['ID'];
                } elseif ($this->arParams['SEF_MODE'] === 'Y'){
                    $this->arResult['LAPTOP'][$arFields['CODE']]['URL'] = '../detail/'.$arFields['CODE'].'/';
                }

            }

            $this->titleLaptop();
            $this->includeComponentTemplate();
        }
    }

    private function __getManufacture():int{

        $arFilter   =   [
            'CODE' => $this->arParams['SECTION_CODE']['ELEMENT_CODE']
        ];

        $res  = ModelTable::getList(['filter'=>$arFilter,'select'=>['*'],'order'=>[]])->fetchAll()[0];

        return $res['ID'];

    }

    private function titleLaptop(){?>

        <div class="container">
            <div class="row">
                <div class="col-2">
                    <h2 class="title">Ноутбуки</h2>
                </div>
                <div class="col-3">
                    <div class="row jsSortPrice" style="margin-top: 10px">
                        <div class="col-5">По цене:</div>
                        <div class="col jsIconSortPrice up">
                            <i class="fa fa-caret-square-o-down" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="row jsSortYear" style="margin-top: 10px">
                        <div class="col-5">По году:</div>
                        <div class="col jsIconSortYear up">
                            <i class="fa fa-caret-square-o-down" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="jsPageJsonData" style="display:none;">
            <?=json_encode([
                'data'  =>  $this->arResult
            ]);?>
        </div>
    <?}
};