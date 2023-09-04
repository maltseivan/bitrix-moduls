<?php
/**
 * Created by phpStorm
 * User: maltseivan
 * Date: 25.03.2023
 * Time: 3:02
 * laptop.php
 **/

namespace Maltseivan\Ibs;

use \Bitrix\Main\Entity\DataManager,
    \Bitrix\Main\Entity,
    \Bitrix\Main\ORM\Fields\Relations\OneToMany;

/**
 * Class LaptopTable
 * @package Maltseivan\Ibs
 */
class LaptopTable extends DataManager{

    public static function getTableName():string{
        return  'ibs_laptop';
    }

    public static function getMap():array{
        return [
            (new Entity\IntegerField('ID'))
                ->configurePrimary()
                ->configureAutocomplete(),
            (new Entity\StringField('NAME'))
                ->configureTitle('NAME')
                ->configureRequired(),
            (new Entity\IntegerField('YEAR'))
                ->configureTitle('YEAR')
                ->configureRequired(),
            (new Entity\IntegerField('PRISE'))
                ->configureTitle('PRISE')
                ->configureRequired(),
            (new Entity\StringField('CODE'))
                ->configureTitle('CODE')
                ->configureRequired(),
            (new Entity\IntegerField('MODEL_ID'))
                ->configureRequired(),
            (new Entity\ReferenceField('MODEL',
                '\Maltseivan\Ibs\ModelTable',
                ['=this.MODEL_ID'=>'ref.ID']
            ))->configureTitle('MODEL'),
            (new OneToMany(
                'OPTION',
                '\Maltseivan\Ibs\LaptopOptionUsTable',
                'LAPTOP'
            )),
        ];
    }
}
