<?php
/**
 * Created by phpStorm
 * User: maltseivan
 * Date: 25.03.2023
 * Time: 3:10
 * option.php
 **/

namespace Maltseivan\Ibs;

use \Bitrix\Main\Entity\DataManager,
    \Bitrix\Main\Entity,
    \Bitrix\Main\ORM\Fields\Relations\OneToMany;

/**
 * Class OptionTable
 * @package Maltseivan\Ibs
 */
class OptionTable extends DataManager{

    public static function getTableName():string{
        return  'ibs_option';
    }

    public static function getMap():array{
        return [
            (new Entity\IntegerField('ID'))
                ->configurePrimary()
                ->configureAutocomplete(),
            (new Entity\StringField('NAME'))
                ->configureTitle('NAME')
                ->configureRequired(),
            (new Entity\StringField('VALUE'))
                ->configureTitle('VALUE')
                ->configureRequired(),
            (new OneToMany(
                'LAPTOP',
                '\Maltseivan\Ibs\LaptopOptionUsTable',
                'OPTION'
            )),
        ];
    }
}