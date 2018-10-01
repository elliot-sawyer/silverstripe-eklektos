<?php

namespace Eklektos\Eklektos\PageTypes;

use Page,
    SilverStripe\Forms\GridField\GridField,
    SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor,
    SilverStripe\Forms\CheckboxField,
    Eklektos\Eklektos\Model\CarouselItem,
    Eklektos\Eklektos\Model\GalleryItem;

class ComponentsPage extends Page
{

    /**
     * @var string
     * @config
     */
    private static $table_name = 'ComponentsPage';

    /**
     * @var array
     * @config
     */
    private static $db = array(
        'Arrows' => 'Boolean',
        'Indicators' => 'Boolean'
    );

    /**
     * @var array
     * @config
     */
    private static $has_many = array(
        'CarouselItems' => CarouselItem::class,
        'GalleryItems' => GalleryItem::class
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

        $fields->addFieldsToTab(
            'Root.Gallery',
            array(
                GridField::create(
                    'GalleryItems',
                    'Gallery Items',
                    $this->GalleryItems(),
                    GridFieldConfig_RecordEditor::create()
                )
            )
        );

        return $fields;
    }
}
