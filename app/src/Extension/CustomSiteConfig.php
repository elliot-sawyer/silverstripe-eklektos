<?php

namespace Eklektos\Eklektos\Extension;

use SilverStripe\ORM\DataExtension;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;
use Eklektos\Eklektos\Model\HeaderContactDetail;
use Eklektos\Eklektos\Model\FooterLink;
use Eklektos\Eklektos\Model\FooterLinkColumnOne;
use Eklektos\Eklektos\Model\FooterLinkColumnTwo;
use Eklektos\Eklektos\Model\FooterLinkColumnThree;
use Eklektos\Eklektos\Model\FooterLinkColumnFour;
use SilverStripe\Forms\ToggleCompositeField;

class CustomSiteConfig extends DataExtension
{
	/**
	 * @var array
	 */
	private static $db = array(
		'GACode' => 'Varchar(16)',
		'AlertTitle' => 'Varchar(32)',
		'AlertType' => 'Varchar(255)',
		'AlertBody' => 'HTMLText',
		'AlertToggle' => 'Boolean',
		'SiteFacebook' => 'Text',
		'SiteTwitter' => 'Text',
		'SiteLinkedin' => 'Text',
		'SiteInstagram' => 'Text',
		'SiteYoutube' => 'Text',
		'SiteVimeo' => 'Text',
		'SiteNavigation' => 'Varchar(255)',
		'ColumnOneHeading' => 'Text',
		'ColumnTwoHeading' => 'Text',
		'ColumnThreeHeading' => 'Text',
		'ColumnFourHeading' => 'Text'
	);

	/**
	 * @var array
	 */
	private static $has_one = array(
		'SiteLogo' => Image::class
	);

	/**
	 * @var array
	 * @config
	 */
	private static $has_many = array(
		'HeaderContactDetail' => HeaderContactDetail::class,
		'FooterLink' => FooterLink::class,
		'FooterLinkColumnOne' => FooterLinkColumnOne::class,
		'FooterLinkColumnTwo' => FooterLinkColumnTwo::class,
		'FooterLinkColumnThree' => FooterLinkColumnThree::class,
		'FooterLinkColumnFour' => FooterLinkColumnFour::class
	);

	/**
	 * @return FieldList
	 */
	public function updateCMSFields(FieldList $fields)
	{
		$fields->addFieldsToTab('Root.Main', array(
			TextField::create('GACode', 'Google Analytics account')
				->setDescription('Account number to be used all across the site (in the format <strong>UA-XXXXX-X</strong>)')
		));

		$fields->addFieldsToTab('Root.Main', array(
			UploadField::create('SiteLogo', 'Logo')
				->setDescription('Logo, dimensions of 280x95 to appear in the top left.')
				->setAllowedExtensions(array('jpg','jpeg','png','gif'))
		));

		$fields->addFieldsToTab('Root.Alerts', [
			CheckboxField::create('AlertToggle', 'Show Customer Alert?'),
			TextField::create('AlertTitle', 'Title'),
			DropdownField::create(
				'AlertType',
				'Alert type',
				[
					'primary' => 'Primary',
					'secondary' => 'Secondary',
					'success' => 'Success',
					'danger' => 'Danger',
					'warning' => 'Warning',
					'info' => 'Info',
					'light' => 'Light',
					'dark' => 'Dark'
				],
				'primary'
			),
			HTMLEditorField::create('AlertBody', 'Body text')
				->setRows(10)
		]);

		$fields->addFieldsToTab('Root.Main', array(
			DropdownField::create(
				'SiteNavigation',
				'Navigation',
				[
					'Left' => 'Left',
					'Justified' => 'Justified',
					'Right' => 'Right',
					'Megamenu' => 'Megamenu'
				],
				'Left'
			)->setDescription('Style of the main site navigation.')
		));

		$fields->addFieldsToTab('Root.Header', array(
			GridField::create(
				'HeaderContactDetail',
				'Contact detail',
				$this->owner->HeaderContactDetail(),
				GridFieldConfig_RecordEditor::create()
				->addComponent(new GridFieldSortableRows('SortOrder'))
			)
		));

		$fields->addFieldToTab('Root.Footer',
			ToggleCompositeField::create('ColumnOneToggle', 'Column One',
			array(
				TextField::create('ColumnOneHeading', 'Heading'),
				GridField::create(
					'FooterLinkColumnOne',
					'',
					$this->owner->FooterLinkColumnOne(),
					GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
				)
			)
		));

		$fields->addFieldToTab('Root.Footer',
			ToggleCompositeField::create('ColumnTwoToggle', 'Column Two',
			array(
				TextField::create('ColumnTwoHeading', 'Heading'),
				GridField::create(
					'FooterLinkColumnTwo',
					'',
					$this->owner->FooterLinkColumnTwo(),
					GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
				)
			)
		));

		$fields->addFieldToTab('Root.Footer',
			ToggleCompositeField::create('ColumnThreeToggle', 'Column Three',
			array(
				TextField::create('ColumnThreeHeading', 'Heading'),
				GridField::create(
					'FooterLinkColumnThree',
					'',
					$this->owner->FooterLinkColumnThree(),
					GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
				)
			)
		));

		$fields->addFieldToTab('Root.Footer',
			ToggleCompositeField::create('ColumnFourToggle', 'Column Four',
			array(
				TextField::create('ColumnFourHeading', 'Heading'),
				GridField::create(
					'FooterLinkColumnFour',
					'',
					$this->owner->FooterLinkColumnFour(),
					GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
				)
			)
		));

		$fields->addFieldToTab('Root.Footer',
			ToggleCompositeField::create('BottomLeftToggle', 'Footer Navigation Links',
			array(
				GridField::create(
					'FooterLink',
					'Bottom footer links',
					$this->owner->FooterLink(),
					GridFieldConfig_RecordEditor::create()
					->addComponent(new GridFieldSortableRows('SortOrder'))
				)
			)
		));

		$fields->addFieldsToTab('Root.SocialMedia', array(
			TextField::create('SiteFacebook', 'Facebook')
				->setDescription('Facebook link (everything after the "https://facebook.com/", eg https://facebook.com/username or http://facebook.com/pages/108510539573)'),
			TextField::create('SiteTwitter', 'Twitter')
				->setDescription('Twitter username (eg, http://twitter.com/<b>username</b>)'),
			TextField::create('SiteLinkedin', 'Linked In')
				->setDescription('e.g. https://www.linkedin.com/231451 where 231451 is your Linked In page'),
			TextField::create('SiteGooglePlus', 'Google Plus')
				->setDescription('e.g. https://plus.google.com/<b>username</b>'),
			TextField::create('SiteInstagram', 'Instagram')
				->setDescription('e.g. https://www.instagram.com/423561 where 423561 is your Instagram page'),
			TextField::create('SiteYoutube', 'Youtube')
				->setDescription('e.g. https://www.youtube.com/753213 where 753213 is your Youtube page'),
			TextField::create('SiteVimeo', 'Vimeo')
				->setDescription('e.g. https://www.vimeo.com/876543 where 876543 is your Vimeo page')
		));

	}

	public function onBeforeWrite()
	{
		if($this->owner->SiteLogo() && $this->owner->SiteLogo()->exists()) {
			$this->owner->SiteLogo()->publishSingle();
		}
		parent::onBeforeWrite();
	}

}
