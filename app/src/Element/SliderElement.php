<?php

namespace Eklektos\Eklektos\Element;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;
use	Eklektos\Eklektos\Model\SliderElementItem;

class SliderElement extends BaseElement
{
	/**
	 * @var array
	 * @config
	 */
	private static $db = array(
		'SliderArrows' => 'Boolean',
		'SliderIndicators' => 'Boolean'
	);

	private static $table_name = 'Slider';
	private static $icon = 'font-icon-block-banner';
	private static $singular_name = 'Slider block';
	private static $plural_name = 'Slider blocks';
	private static $description = 'Slider block';

	/**
	 * @var array
	 * @config
	 */
	private static $has_many = array(
		'Slider' => SliderElementItem::class
	);

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$fields->removeByName('Slider');
		$fields->addFieldsToTab(
			'Root.Main',
			array(
				GridField::create(
					'Slider',
					'Slider',
					$this->Slider(),
					GridFieldConfig_RecordEditor::create()
						->addComponent(new GridFieldSortableRows('SortOrder'))
				)
			)
		);
		return $fields;
	}

	public function getType()
	{
		return 'Slider';
	}

}
