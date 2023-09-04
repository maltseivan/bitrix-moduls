<?php
/**
 * Created by phpStorm
 * User: maltseivan
 * Date: 24.03.2023
 * Time: 22:47
 * step.php
 **/

use \Bitrix\Main\Localization\Loc;

global $APPLICATION;

if ($ex = $APPLICATION->GetException()){
    echo CAdminMessage::ShovMessage([
        'TYPE'      => 'ERROR',
        'MESSAGE'   => 'Ошибка установки модуля!',
        'DETAILS'   => $ex->GetString(),
        'HTML'      => true
    ]);
}?>
<form action="<?=$APPLICATION->GetCurPage()?>">
    <?=bitrix_sessid_post()?>
    <input type="hidden" name="lang" value="<?=LANGUAGE_ID?>">
    <input type="hidden" name="step" value="2">
    <p style="color: green"><?='Удалить существующие таблицы и установить заново'?></p>
    <p><input type="checkbox" name="dbdelete" id="savedata" value="Y" checked><label for="savedata"><?='Да'?></label></p>
    <div style="display: flex; align-items: center">
        <input type="submit" name="" value="<?='Далее'?>">
        <a style="margin-left: 15px" href="<?=$APPLICATION->GetCurPage()?>?lang=<?=LANGUAGE_ID?>">Назад</a>
    </div>
</form>
