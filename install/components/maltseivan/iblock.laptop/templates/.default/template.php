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
/** @var CBitrixComponent $component */ ?>

<div class="container">
    <div class="row">
        <?if($arResult['LAPTOP']){?>
            <div class="jsContent row">
                <?foreach ($arResult['LAPTOP'] as $elem){?>
                    <div class="card__" style="width: 18rem; margin: 10px">
                        <img src="https://avatars.mds.yandex.net/i?id=949953ab731b6f7309311a8631fb72a5c7ae47e5-9227066-images-thumbs&n=13"width="100%" alt="...">
                        <div class="card-body" style="padding: 25px">
                            <h5 class="card-title"><?=$elem['NAME']?></h5>
                            <p class="card-text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
                            <p class="card-text"><b>Цена: </b><?=$elem['PRISE']?> р.</p>
                            <p class="card-text"><b>Год: </b><?=$elem['YEAR']?></p>
                            <a href="<?=$elem['URL']?>" class="btn btn-primary">Смотреть</a>
                        </div>
                    </div>
                <?}?>
            </div>
        <?} else {?>
            <div align="center" class="col-12">
                <h5>У производителя нет ноутбуков :(</h5>
            </div>
        <?}?>
    </div>
</div>
