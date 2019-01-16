<?php

namespace Eklektos\Eklektos\PageType;

use Page;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\DropdownField;
use Eklektos\Eklektos\Model\SliderItem;
use Eklektos\Eklektos\Model\CarouselItem;
use Eklektos\Eklektos\Model\GalleryItem;
use Eklektos\Eklektos\Model\AccordionItem;
use Eklektos\Eklektos\Model\CardItem;

class ComponentsPage extends Page
{

	/**
	 * @var string
	 * @config
	 */
	private static $icon = 'app/icons/components_page.png';

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
		'SliderArrows' => 'Boolean',
		'SliderIndicators' => 'Boolean',
		'CarouselArrows' => 'Boolean',
		'CarouselIndicators' => 'Boolean',
		'FirstAccordionOpen' => 'Boolean',
		'CarouselColumns' => 'Varchar(255)'
	);

	/**
	 * @var array
	 * @config
	 */
	private static $has_many = array(
		'SliderItems' => SliderItem::class,
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
			'Root.Slider',
			array(
				GridField::create(
					'SliderItems',
					'Slider Items',
					$this->SliderItems(),
					GridFieldConfig_RecordEditor::create()
						->addComponent(new GridFieldSortableRows('SortOrder'))
				),
				CheckboxField::create('SliderArrows', 'Arrows'),
				CheckboxField::create('SliderIndicators', 'Indicators')
			)
		);

		$fields->addFieldsToTab(
			'Root.Carousel',
			array(
				GridField::create(
					'CarouselItems',
					'Carousel Items',
					$this->CarouselItems(),
					GridFieldConfig_RecordEditor::create()
						->addComponent(new GridFieldSortableRows('SortOrder'))
				),
				DropdownField::create(
					'CarouselColumns',
					'Carousel Columns',
					[
						'1' => 'One Column',
						'2' => 'Two Columns',
						'3' => 'Three Columns',
						'4' => 'Four Columns'
					],
					'1'
				),
				CheckboxField::create('CarouselArrows', 'Arrows'),
				CheckboxField::create('CarouselIndicators', 'Indicators')
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
						->addComponent(new GridFieldSortableRows('SortOrder'))
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
						->addComponent(new GridFieldSortableRows('SortOrder'))
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
						->addComponent(new GridFieldSortableRows('SortOrder'))
				)
			)
		);

		return $fields;
	}
}
