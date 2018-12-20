<?php

namespace Eklektos\Eklektos\Model;

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

class FooterColumn extends DataObject
{

	/**
	 * @var string
	 * @config
	 */
	private static $table_name = 'FooterColumn';

	/**
	 * @var string
	 * @config
	 */
	private static $default_sort = "SortOrder";

	/**
	 * @var array
	 * @config
	 */
	private static $db = array(
		'Title' => 'Varchar(100)',
		'SortOrder'=>'Int'
	);

	/**
	 * @var array
	 * @config
	 */
	private static $has_one = array (
		'SiteConfig' => SiteConfig::class
	);

	/**
	 * @var array
	 * @config
	 */
	private static $has_many = array (
		'FooterColumnLink'  => FooterColumnLink::class
	);

	/**
	 * @var array
	 * @config
	 */
	private static $summary_fields = array (
		'Title' => 'Title',
	);

	/**
	 * @return FieldList
	 */
	public function getCMSFields() {

		$fields = new FieldList(
			TextField::create('Title', 'Title'),
			GridField::create(
				'FooterColumnLink',
				'Footer column link',
				$this->owner->FooterColumnLink(),
				GridFieldConfig_RecordEditor::create()
				->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		);
		return $fields;
	}

}
