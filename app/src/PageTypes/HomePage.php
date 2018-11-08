<?php

namespace Eklektos\Eklektos\PageTypes;

use Page,
    SilverStripe\Forms\GridField\GridField,
    SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor,
    SilverStripe\Forms\CheckboxField,
    Eklektos\Eklektos\Model\SliderItem,
    Eklektos\Eklektos\Model\PopularLink,
    Eklektos\Eklektos\Model\CardItem;

class HomePage extends Page
{

    /**
     * @var string
     * @config
     */
    private static $table_name = 'HomePage';

    /**
     * @var array
     * @config
     */
    private static $has_many = array(
        'SliderItems' => SliderItem::class,
        'PopularLinks' => PopularLink::class,
        'CardItems' => CardItem::class
    );

    /**
     * @return FieldList
     */
    public function getCMSFields() {

        $fields = parent::getCMSFields();

        $fields->addFieldsToTab(
            'Root.Slider',
            array(
                GridField::create(
                    'SliderItems',
                    'Slider Items',
                    $this->SliderItems(),
                    GridFieldConfig_RecordEditor::create()
                ),
                CheckboxField::create('Arrows', 'Arrows'),
                CheckboxField::create('Indicators', 'Indicators')
            )
        );

        $fields->addFieldsToTab(
            'Root.PopularLinks',
            array(
                GridField::create(
                    'PopularLinks',
                    'Popular Links',
                    $this->PopularLinks(),
                    GridFieldConfig_RecordEditor::create()
                )
            )
        );

        $fields->addFieldsToTab(
            'Root.Cards',
            array(
                GridField::create(
                    'CardItem',
                    'Card Items',
                    $this->CardItems(),
                    GridFieldConfig_RecordEditor::create()
                )
            )
        );

        return $fields;
    }
}
