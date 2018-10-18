<?php

namespace Eklektos\Eklektos\PageTypes;

use Page,
    SilverStripe\Forms\GridField\GridField,
    SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor,
    SilverStripe\Forms\CheckboxField,
    Eklektos\Eklektos\Model\CarouselItem;

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
        'CarouselItems' => CarouselItem::class
    );

    /**
     * @return FieldList
     */
    public function getCMSFields() {

        $fields = parent::getCMSFields();

        $fields->addFieldsToTab(
            'Root.Carousel',
            array(
                GridField::create(
                    'CarouselItems',
                    'Carousel Items',
                    $this->CarouselItems(),
                    GridFieldConfig_RecordEditor::create()
                ),
                CheckboxField::create('Arrows', 'Arrows'),
                CheckboxField::create('Indicators', 'Indicators')
            )
        );

        return $fields;
    }
}
