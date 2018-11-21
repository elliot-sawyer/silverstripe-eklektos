<?php

namespace Eklektos\Eklektos\PageType;

use Page;
use SilverStripe\Forms\DropdownField;

class LandingPage extends Page
{
	/**
	 * @var string
	 * @config
	 */
	private static $table_name = 'LandingPage';

	/**
	 * @var string
	 * @config
	 */
	private static $description = 'Generic landing page. Allows visibility of children pages.';

	/**
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();
		return $fields;
	}
}
