<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

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

<div class="container" style="margin-bottom: 45px; margin-top: 45px">
    <? $APPLICATION->IncludeComponent(
        'maltseivan:iblock.manufacture',
        '',
        Array(
            'SEF_MODE' => $arParams['SEF_MODE']
        ),
        $component
    );?>
</div>
