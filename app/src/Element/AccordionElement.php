<?php

namespace Eklektos\Eklektos\Element;

use DNADesign\Elemental\Models\BaseElement,

//	WebsiteRedesigns\Dragon\Element\AccordionElementItem,

	SilverStripe\Forms\GridField\GridField,
	SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor,
	UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

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
