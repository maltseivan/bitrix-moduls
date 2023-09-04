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
/** @var CBitrixComponent $component */?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Ноутбук: <?=$arResult['LAPTOP']['NAME'];?></h2>
        </div>
        <div class="col-6">
            <img src="https://avatars.dzeninfra.ru/get-zen_doc/1872259/pub_6337c53e06655440f3c5f8af_6337c5db71a6914e4176eb94/scale_1200" width="100%">
        </div>
        <div class="col-6">
            <h6>Описание:</h6>
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
            <hr>
            <ul>
                <li>Цена: <?=$arResult['LAPTOP']['PRICE']?></li>
                <li>Год: <?=$arResult['LAPTOP']['YEAR']?></li>
            </ul>
        </div>
        <div class="col-12" style="margin-top: 20px">
            <h6>Опции</h6>
            <ul>
                <? foreach ($arResult['OPTIONS'] as $item) { ?>
                    <li><?=$item['NAME'].': '.$item['VALUE']?></li>
                <?}?>
            </ul>
        </div>
    </div>
</div>
