<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

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
    <h2>Модели</h2>
    <div class="row">
        <?if ($arResult['MODEL']){?>
            <?foreach ($arResult['MODEL'] as $elem){?>
                <div class="card__model card col-lg-3 col-md-6 col-sm-12" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?=$elem['NAME']?></h5>
                        <p class="card-text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
                        <a href="<?=$elem['URL']?>" class="card-link">Смотреть</a>
                    </div>
                </div>
            <?}?>
        <?} else {?>
            <div align="center" class="col-12">
                <h5>У производителя нет ноутбуков :(</h5>
            </div>
        <?}?>
    </div>
</div>

