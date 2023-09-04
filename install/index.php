<?php
/**
 * Created by phpStorm
 * User: maltseivan
 * Date: 24.03.2023
 * Time: 22:38
 * index.php
 **/

use \Bitrix\Main\Localization\Loc,
    \Bitrix\Main\Config as Conf,
    \Bitrix\Main\Config\Option,
    \Bitrix\Main\Loader,
    \Bitrix\Main\Entity\Base,
    \Bitrix\Main\Application;

Loc::LoadMessages(_FILE_);

Class maltseivan_ibs extends CModule{

    function __construct(){

        $arVersion = [];
        include(_DIR_.'version.php');

        $this->MODULE_ID            = 'maltseivan.ibs';
        $this->MODULE_VERSION       = $arVersion['VERSION'];
        $this->MODULE_VERSION_DATE  = $arVersion['VERSION_DATE'];
        $this->MODULE_NAME          = 'Модуль магазин ноутбуков!';
        $this->MODULE_DESCRIPTION   = 'Тестовое задание в IBS, разработка модуля: магазин ноутбуков.';

    }

    function DoInstall(){

        global $APPLICATION;
        $request = Application::getInstance()->getContext()->getRequest();

        if($this->isVersionD7()){

            \Bitrix\Main\ModuleManager::registerModule($this->MODULE_ID);

            //$APPLICATION->IncludeAdminFile('Устновка модуля! Магазин ноутбуков', $this->GetPath().'/install/step1.php');

            $this->InstallDB();
            $this->InstallFiles();

            $addData  =   new \Maltseivan\Ibs\Classes\DataBase();

            if ($addData->dataBase()){
                //code;
                return true;
            }

        } else {
            $APPLICATION->ThrowException('Модуль не может быть установлен! Не поддерживается ядро D7 :(');
        }

        $APPLICATION->IncludeAdminFile('Устновка модуля! Магазин ноутбуков', $this->GetPath().'/install/step2.php');

    }

    function DoUninstall(){

        global $APPLICATION;

        $request = Application::getInstance()->getContext()->getRequest();

        Loader::includeModule($this->MODULE_ID);

        \Bitrix\Main\ModuleManager::unRegisterModule($this->MODULE_ID);

        //$APPLICATION->IncludeAdminFile('Удаление модуля', $this->GetPath()."/install/unstep1.php");

        $this->UnInstallDB();
        $this->UnInstallFiles();

        $APPLICATION->IncludeAdminFile('Удаление модуля', $this->GetPath()."/install/unstep2.php");
    }

    function InstallDB(){

        Loader::includeModule($this->MODULE_ID);

        if(!Application::getConnection()->isTableExists(Base::getInstance('\Maltseivan\Ibs\ManufactureTable')->getDBTableName())){
            Base::getInstance('\Maltseivan\Ibs\ManufactureTable')->createDbTable();
        }
        if(!Application::getConnection()->isTableExists(Base::getInstance('\Maltseivan\Ibs\ModelTable')->getDBTableName())){
            Base::getInstance('\Maltseivan\Ibs\ModelTable')->createDbTable();
        }
        if(!Application::getConnection()->isTableExists(Base::getInstance('\Maltseivan\Ibs\LaptopTable')->getDBTableName())){
            Base::getInstance('\Maltseivan\Ibs\LaptopTable')->createDbTable();
        }
        if(!Application::getConnection()->isTableExists(Base::getInstance('\Maltseivan\Ibs\OptionTable')->getDBTableName())){
            Base::getInstance('\Maltseivan\Ibs\OptionTable')->createDbTable();
        }
        if(!Application::getConnection()->isTableExists(Base::getInstance('\Maltseivan\Ibs\LaptopOptionUsTable')->getDBTableName())){
            Base::getInstance('\Maltseivan\Ibs\LaptopOptionUsTable')->createDbTable();
        }

    }

    function UnInstallDB(){

        Loader::includeModule($this->MODULE_ID);

        Application::getConnection()->queryExecute('drop table if exists '.Base::getInstance('\Maltseivan\Ibs\ManufactureTable')->getDBTableName());
        Application::getConnection()->queryExecute('drop table if exists '.Base::getInstance('\Maltseivan\Ibs\ModelTable')->getDBTableName());
        Application::getConnection()->queryExecute('drop table if exists '.Base::getInstance('\Maltseivan\Ibs\LaptopTable')->getDBTableName());
        Application::getConnection()->queryExecute('drop table if exists '.Base::getInstance('\Maltseivan\Ibs\OptionTable')->getDBTableName());
        Application::getConnection()->queryExecute('drop table if exists '.Base::getInstance('\Maltseivan\Ibs\LaptopOptionUsTable')->getDBTableName());
    }

    function InstallFiles(){

        CopyDirFiles($this->GetPath().'/install/components', $_SERVER['DOCUMENT_ROOT'].'/local/components', true, ttrue);

    }

    function UnInstallFiles(){

       \Bitrix\Main\IO\Directory::deleteDirectory($_SERVER['DOCUMENT_ROOT'].'/local/components/maltseivan/');

    }

    private function isVersionD7():bool{
        return CheckVersion(\Bitrix\Main\ModuleManager::getVersion('main'), '14.00.00');
    }

    private function GetPath($notDocumentRoot=false):string{
        if($notDocumentRoot){
            return str_ireplace(Application::getDocumentRoot(),'',dirname(__DIR__));
        } else {
            return dirname(__DIR__);
        }
    }
}
