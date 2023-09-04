<?php
/**
 * Created by phpStorm
 * User: maltseivan
 * Date: 25.03.2023
 * Time: 3:00
 **/

namespace Maltseivan\Ibs;

use \Bitrix\Main\Entity\DataManager,
    \Bitrix\Main\Entity,
    \Bitrix\Main\ORM\Fields\Relations\OneToMany;

/**
 * Class ModelTable
 * @package Maltseivan\Ibs
 */
class ModelTable extends DataManager{

    public static function getTableName():string{
        return  'ibs_model';
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
            (new Entity\IntegerField('MANUFACTURE_ID'))
                ->configureRequired(),
            (new Entity\ReferenceField('MANUFACTURE',
                '\Maltseivan\Ibs\ManufactureTable',
                ['=this.MANUFACTURE_ID'=>'ref.ID']
            ))->configureTitle('MANUFACTURE'),
            (new OneToMany(
                'LAPTOP',
                '\Maltseivan\Ibs\LaptopTable',
                'MODEL'
            )),
        ];
    }
}
