<?php

namespace Eklektos\Eklektos\Element;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;
use Eklektos\Eklektos\Model\AccordionElementItem;

class AccordionElement extends BaseElement
{
	private static $table_name = 'Accordion';
	private static $icon = 'font-icon-block-content';
	private static $singular_name = 'Accordion block';
	private static $plural_name = 'Accordion blocks';
	private static $description = 'Accordion block';

	/**
	 * @var array
	 * @config
	 */
	private static $has_many = array(
		'Accordion' => AccordionElementItem::class
	);

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();
		$fields->removeByName('Accordion');
		$fields->addFieldsToTab(
			'Root.Main',
			array(
				GridField::create(
					'Accordion',
					'Accordion',
					$this->Accordion(),
					GridFieldConfig_RecordEditor::create()
						->addComponent(new GridFieldSortableRows('SortOrder'))
				)
			)
		);
		return $fields;
	}

	public function getType()
	{
		return 'Accordion';
	}

}
