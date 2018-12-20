<?php

namespace Eklektos\Eklektos\Model;

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TreeDropdownField;
use Eklektos\Eklektos\Model\FooterColumn;
use SilverStripe\CMS\Model\SiteTree;

class FooterColumnLink extends DataObject
{

	/**
	 * @var string
	 * @config
	 */
	private static $table_name = 'FooterColumnLink';

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
		'FooterColumn' => FooterColumn::class,
		'PageLink'  => SiteTree::class
	);

	/**
	 * @var array
	 * @config
	 */
	private static $summary_fields = array (
		'Title' => 'Title',
		'PageLink.Title' => 'Link'
	);

	/**
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = new FieldList(
			TextField::create('Title', 'Title'),
			TreeDropdownField::create(
				'PageLinkID',
				'What page does this link to?',
				SiteTree::class
			)
		);
		return $fields;
	}

}
