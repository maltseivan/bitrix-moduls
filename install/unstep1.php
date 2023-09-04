<?php
/**
 * Created by phpStorm
 * User: maltseivan
 * Date: 25.03.2023
 * Time: 0:02
 * unstep1.php
 **/

use \Bitrix\Main\Localization\Loc;

Loc::LoadMessages(_FILE_);

global $APPLICATION ?>

<form action="<?=$APPLICATION->GetCurPage()?>">
   <?=bitrix_sessid_post()?>
   <input type="hidden" name="lang" value="<?=LANGUAGE_ID?>">
   <input type="hidden" name="id" value="maltseivan.ibs">
   <input type="hidden" name="uninstall" value="Y">
   <input type="hidden" name="unstep" value="2">
   <?=CAdminMessage::ShowMessage('Модуль магазин ноутбуков будет удален!')?>
   <p style="color: green"><?='Сохранить данные модуля'?></p>
   <p><input type="checkbox" name="savedata" id="savedata" value="Y" checked><label for="savedata"><?='Сохранить таблицы в базе'?></label></p>
   <div style="display: flex; align-items: center">
       <input type="submit" name="" value="<?='Удалить'?>">
       <a style="margin-left: 15px" href="<?=$APPLICATION->GetCurPage()?>?lang=<?=LANGUAGE_ID?>">Назад</a>
   </div>
</form>