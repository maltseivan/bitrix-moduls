<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

if (!CModule::IncludeModule('iblock')) {
    return;
}

$arComponentParameters = array(
    'GROUPS' => array(
        'POPULAR_SETTINGS' => array(
            'NAME' => 'Настройки главной страницы',
            'SORT' => 800
        ),
        'SECTION_SETTINGS' => array(
            'NAME' => 'Настройки страницы раздела',
            'SORT' => 900
        ),
        'ELEMENT_SETTINGS' => array(
            'NAME' => 'Настройки страницы элемента',
            'SORT' => 1000
        ),
    ),
    'PARAMETERS' => array(
        'ADD_SECTIONS_CHAIN' => Array(
            'PARENT' => 'BASE',
            'NAME' => 'Включать родителей в цепочку навигации',
            'TYPE' => 'CHECKBOX',
            'DEFAULT' => 'Y',
        ),
        'VARIABLE_ALIASES' => array(
            'MODEL_ID' => array('NAME' => 'Идентификатор раздела'),
            'ELEMENT_ID' => array('NAME' => 'Идентификатор элемента'),
            'LAPTOP_ID' => array('NAME' => 'Символьный код'),
        ),
        'SEF_MODE' => array(
            'manufacture' => array(
                'NAME' => 'Страница производиттелей',
                'DEFAULT' => '',
            ),
            'model' => array(
                'NAME' => 'Страница моделей',
                'DEFAULT' => '#SECTION_CODE#/',
            ),
            'laptop' => array(
                'NAME' => 'Страница ноутбуков',
                'DEFAULT' => '#SECTION_CODE#/#ELEMENT_CODE#/',
            ),
            'element' => array(
                'NAME' => 'Страница элемента',
                'DEFAULT' => '#SECTION_CODE#/detail/#ELEMENT_CODE#/',
            ),
        ),
    ),
);
