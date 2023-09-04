<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

\Bitrix\Main\Page\Asset::getInstance()->addCss("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css");
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

<div class="container" style="margin-top: 45px; margin-bottom: 45px;">
    <? $res = $APPLICATION->IncludeComponent(
        'maltseivan:iblock.laptop',
        '',
        Array(
            'SECTION_CODE' => $arResult['VARIABLES'],
            'SEF_MODE' => $arParams['SEF_MODE']
        ),
        $component
    ); ?>
</div>
