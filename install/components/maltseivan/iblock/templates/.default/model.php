<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

\Bitrix\Main\Page\Asset::getInstance()->addCss("https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css");

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */ ?>

<div class="container" style="margin-top: 45px; margin-bottom: 45px">
    <? $APPLICATION->IncludeComponent(
        'maltseivan:iblock.model',
        '',
        Array(
            'SECTION'  => $arResult['VARIABLES'],
            'SEF_MODE' => $arParams['SEF_MODE']
        ),
        $component
    ); ?>
</div>
