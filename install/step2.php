<?php
/**
 * Created by phpStorm
 * User: maltseivan
 * Date: 24.03.2023
 * Time: 23:36
 * step1.php
 **/

use \Bitrix\Main\Localization\Loc;

global $APPLICATION;

if ($ex = $APPLICATION->GetException()) {
    echo CAdminMessage::ShovMessage([
        'TYPE' => 'ERROR',
        'MESSAGE' => 'Ошибка установки модуля!',
        'DETAILS' => $ex->GetString(),
        'HTML' => true
    ]);
} else {
    echo CAdminMessage::ShowNote('Модуль успешно установлен!');
} ?>
<form action="<?=$APPLICATION->GetCurPage()?>">
    <input type="hidden" name="lang" value="<?=LANGUAGE_ID?>">
    <input type="submit" value="Список модулей">
</form>