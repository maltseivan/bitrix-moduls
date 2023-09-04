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

<div class="container">
    <h2 class="title">Производители</h2>
    <div class="row">
        <?foreach ($arResult['MANUFACTURE'] as $elem){?>
            <div class="card__" style="width: 18rem; margin: 10px">
                <img src="https://avatars.mds.yandex.net/i?id=726d4d0ddc15a918e9f992d16f371d4d2e25885e-7752980-images-thumbs&n=13" width="auto" class="card-img-top" alt="...">
                <div class="card-body" style="padding: 25px">
                    <h5 class="card-title"><?=$elem['NAME']?></h5>
                    <p class="card-text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit..."</p>
                    <a href="<?=$elem['URL']?>" class="btn btn-primary">Смотреть</a>
                </div>
            </div>
        <?}?>
    </div>
</div>
