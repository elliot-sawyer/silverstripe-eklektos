<?php

namespace Eklektos\Eklektos\PageType;

use Page;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use Eklektos\Eklektos\Model\GalleryPageImage;

class GalleryPage extends Page
{
	/**
	 * @var string
	 * @config
	 */
	private static $table_name = 'GalleryPage';

	/**
	 * @var string
	 * @config
	 */
	private static $icon = 'app/icons/gallery.png';

	/**
	 * @var array
	 * @config
	 */
	private static $db = array(
		'MegamenuDescription' => 'Varchar(255)'
	);

	/**
	 * @var array
	 * @config
	 */
	private static $has_many = array(
		'Gallery' => GalleryPageImage::class
	);

	/**
	 * @var array
	 * @config
	 */
	private static $owns = array(
		'Gallery'
	);

	/**
	 * @var string
	 * @config
	 */
	private static $description = 'Gallery page.';

	/**
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->removeFieldFromTab("Root.Main", "Metadata");
		$fields->removeFieldFromTab("Root.Main", "Content");

		if($this->Parent()->ID){
			$fields->addFieldToTab('Root.Main', $uploadField = new UploadField('AlbumImage', 'Album Image'));
			$uploadField->setDescription('Image size: 640 x 480');
			$uploadField->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'));
		}

		$fields->addFieldsToTab(
			'Root.Main',
			array(
				GridField::create(
					'Gallery',
					'Gallery',
					$this->Gallery(),
					GridFieldConfig_RecordEditor::create()
						->addComponent(new GridFieldSortableRows('SortOrder'))
				)
			)
		);

		return $fields;
	}
}
