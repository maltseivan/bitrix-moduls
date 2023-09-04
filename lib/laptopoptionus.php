<?php
/**
 * Created by phpStorm
 * User: maltseivan
 * Date: 25.03.2023
 * Time: 14:46
 * laptopoptionus.php
 **/

namespace Maltseivan\Ibs;

use \Bitrix\Main\Entity\DataManager,
    \Bitrix\Main\Entity;

/**
 * Class LaptopOptionUsTable
 * @package Maltseivan\Ibs
 */
class LaptopOptionUsTable extends DataManager{

    public static function getTableName():string{
        return  'ibs_laptop_us_option';
    }

    public static function getMap():array{
        return [
            (new Entity\IntegerField('ID'))
                ->configurePrimary()
                ->configureAutocomplete(),
            (new Entity\IntegerField('LAPTOP_ID')),
            (new Entity\ReferenceField('LAPTOP',
                '\Maltseivan\Ibs\LaptopTable',
                ['=this.LAPTOP_ID'=>'ref.ID']
            ))->configureTitle('LAPTOP'),
            (new Entity\IntegerField('OPTION_ID')),
            (new Entity\ReferenceField('OPTION',
                '\Maltseivan\Ibs\OptionTable',
                ['=this.OPTION_ID'=>'ref.ID']
            ))->configureTitle('OPTION')
        ];
    }
}