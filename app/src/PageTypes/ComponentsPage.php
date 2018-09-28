<?php

namespace Eklektos\Eklektos\PageTypes;

use Page,
    SilverStripe\Forms\GridField\GridField,
    SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor,
    Eklektos\Eklektos\Model\CarouselItem;

class ComponentsPage extends Page
{

    private static $table_name = 'ComponentsPage';

    /**
     * @var array
     * @config
     */
    private static $db = array(
    );

    /**
     * @var array
     * @config
     */
    private static $has_one = array(
    );

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
                    'CarouselItems',
                    $this->CarouselItems(),
                    GridFieldConfig_RecordEditor::create()
                )
            )
        );

        return $fields;
    }
}
