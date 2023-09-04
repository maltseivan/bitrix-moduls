<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */

if ($arParams['SEF_MODE'] == 'Y') {

    $arVariables    = [];
    $componentPage  = CComponentEngine::ParseComponentPath($arParams['SEF_FOLDER'], $arParams['SEF_URL_TEMPLATES'], $arVariables);

    if ($componentPage === false && parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == $arParams['SEF_FOLDER']) {
        $componentPage = 'manufacture';
    }

    if (empty($componentPage)) {
        \Bitrix\Iblock\Component\Tools::process404(
            trim($arParams['MESSAGE_404']) ?: 'Элемент или раздел инфоблока не найден',
            true,
            $arParams['SET_STATUS_404'] === 'Y',
            $arParams['SHOW_404'] === 'Y',
            $arParams['FILE_404']
        );
        return;
    }

    CComponentEngine::InitComponentVariables($componentPage, null, [], $arVariables);

    $arResult['VARIABLES'] = $arVariables;
    $arResult['FOLDER'] = $arParams['SEF_FOLDER'];
    $arResult['SECTION_URL'] = $arParams['SEF_FOLDER'].$arParams['SEF_URL_TEMPLATES']['model'];
    $arResult['S_URL'] = $arParams['SEF_FOLDER'].$arParams['SEF_URL_TEMPLATES']['laptop'];
    $arResult['ELEMENT_URL'] = $arParams['SEF_FOLDER'].$arParams['SEF_URL_TEMPLATES']['element'];

} else {

    $arVariables = array();

    CComponentEngine::InitComponentVariables(false, null, $arParams['VARIABLE_ALIASES'], $arVariables);

    $componentPage = '';
    if (isset($arVariables['ELEMENT_ID']) && intval($arVariables['ELEMENT_ID']) > 0){
        $componentPage = 'element';
    } elseif (isset($arVariables['MODEL_ID']) && intval($arVariables['MODEL_ID']) > 0){
        $componentPage = 'model';
    } elseif (isset($arVariables['LAPTOP_ID']) && intval($arVariables['LAPTOP_ID']) > 0){
        $componentPage = 'laptop';
    } else{
        $componentPage = 'manufacture';
    }

    $arResult['VARIABLES'] = $arVariables;

}

$this->IncludeComponentTemplate($componentPage);