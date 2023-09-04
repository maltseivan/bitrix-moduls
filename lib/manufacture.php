<?php
/**
 * Created by phpStorm
 * User: maltseivan
 * Date: 25.03.2023
 * Time: 1:47
 **/

namespace Maltseivan\Ibs;

use \Bitrix\Main\Entity\DataManager,
    \Bitrix\Main\Entity,
    \Bitrix\Main\ORM\Fields\Relations\OneToMany;

/**
 * Class ManufactureTable
 * @package Maltseivan\Ibs
 */
class ManufactureTable extends DataManager{

    public static function getTableName():string{
        return  'ibs_manufacture';
    }

    public static function getMap():array{
        return [
            (new Entity\IntegerField('ID'))
                ->configurePrimary()
                ->configureAutocomplete(),
            (new Entity\StringField('NAME'))
                ->configureTitle('NAME')
                ->configureRequired(),
            (new Entity\StringField('CODE'))
                ->configureTitle('CODE')
                ->configureRequired(),
            (new OneToMany(
                'MODEL',
                '\Maltseivan\Ibs\ModelTable',
                'MANUFACTURE'
            )),
        ];
    }

}