<?php

namespace Eklektos\Eklektos\PageTypes;

use Page,
	SilverStripe\Forms\GridField\GridField,
	SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor,
	UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows,
	SilverStripe\Forms\DropdownField,
	SilverStripe\Forms\CheckboxField,
	SilverStripe\Forms\NumericField,
	SilverStripe\Forms\TextareaField,
	SilverStripe\Forms\TextField,
	SilverStripe\Forms\TreeDropdownField,
	SilverStripe\Forms\HeaderField,
	SilverStripe\CMS\Model\SiteTree;

class ComponentsPage extends Page
{
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
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();
		return $fields;
	}
}
