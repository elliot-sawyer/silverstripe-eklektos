<?php

namespace {

	use SilverStripe\CMS\Model\SiteTree;
	use SilverStripe\Forms\TextAreaField;
	use Eklektos\Eklektos\PageType\LandingPage;

	class Page extends SiteTree
	{
		/**
		 * @var array
		 * @config
		 */
		private static $db = array(
			'LandingPageSummary' => 'Varchar(255)'
		);

		private static $has_one = [];

		/**
		 * @return FieldList
		 */
		public function getCMSFields() {
			$fields = parent::getCMSFields();
			if ($this->Parent() instanceof LandingPage) {
				$fields->addFieldsToTab('Root.Main', array(
					TextAreaField::create('LandingPageSummary', 'Landing Page Summary')
				));
			}
			return $fields;
		}

	}
}
