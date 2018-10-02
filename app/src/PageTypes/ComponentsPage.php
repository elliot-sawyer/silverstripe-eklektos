<?php

namespace Eklektos\Eklektos\PageTypes;

use Page,
    SilverStripe\Forms\GridField\GridField,
    SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor,
    SilverStripe\Forms\CheckboxField,
    Eklektos\Eklektos\Model\CarouselItem,
    Eklektos\Eklektos\Model\GalleryItem,
    Eklektos\Eklektos\Model\AccordionItem,
    Eklektos\Eklektos\Model\CardItem;

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
        'Indicators' => 'Boolean',
        'FirstAccordionOpen' => 'Boolean'
    );

    /**
     * @var array
     * @config
     */
    private static $has_many = array(
        'CarouselItems' => CarouselItem::class,
        'GalleryItems' => GalleryItem::class,
        'AccordionItems' => AccordionItem::class,
        'CardItems' => CardItem::class
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

        $fields->addFieldsToTab(
            'Root.Accordion',
            array(
                GridField::create(
                    'AccordionItems',
                    'Accordion Items',
                    $this->AccordionItems(),
                    GridFieldConfig_RecordEditor::create()
                ),
                CheckboxField::create('FirstAccordionOpen', 'Make the first accordion opened')
            )
        );

        $fields->addFieldsToTab(
            'Root.Cards',
            array(
                GridField::create(
                    'CardItems',
                    'Card Items',
                    $this->CardItems(),
                    GridFieldConfig_RecordEditor::create()
                )
            )
        );

        return $fields;
    }
}
