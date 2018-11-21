<?php

namespace Eklektos\Eklektos\Element;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;
use SilverStripe\Forms\DropdownField;
use	Eklektos\Eklektos\Model\CarouselElementItem;

class CarouselElement extends BaseElement
{
	/**
	 * @var array
	 * @config
	 */
	private static $db = array(
		'CarouselArrows' => 'Boolean',
		'CarouselIndicators' => 'Boolean',
		'CarouselColumns' => 'Varchar(255)'
	);

	private static $table_name = 'Carousel';
	private static $icon = 'font-icon-block-carousel';
	private static $singular_name = 'Carousel block';
	private static $plural_name = 'Carousel blocks';
	private static $description = 'Carousel block';

	/**
	 * @var array
	 * @config
	 */
	private static $has_many = array(
		'Carousel' => CarouselElementItem::class
	);

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$fields->removeByName('Carousel');
		$fields->addFieldsToTab(
			'Root.Main',
			array(
				GridField::create(
					'Carousel',
					'Carousel',
					$this->Carousel(),
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
				)
			)
		);
		return $fields;
	}

	public function getType()
	{
		return 'Carousel';
	}

}
