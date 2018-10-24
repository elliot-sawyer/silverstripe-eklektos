<?php

namespace Eklektos\Eklektos\Model;

use SilverStripe\ORM\DataObject,
    SilverStripe\Assets\Image,
    SilverStripe\AssetAdmin\Forms\UploadField,
    SilverStripe\Forms\TextField,
    SilverStripe\Forms\TextAreaField,
    SilverStripe\Forms\TreeDropdownField,
    SilverStripe\CMS\Model\SiteTree,
    Eklektos\Eklektos\PageTypes\ComponentsPage,
    Eklektos\Eklektos\PageTypes\HomePage;

class CardItem extends DataObject
{

    /**
     * @var string
     * @config
     */
    private static $table_name = 'CardItem';

    /**
     * @var string
     * @config
     */
    private static $default_sort = 'SortOrder';

    /**
     * @var array
     * @config
     */
    private static $db = array(
        'SortOrder' => 'Int',
        'Title' => 'Varchar(255)',
        'Content' => 'Varchar(255)'
    );

    /**
     * @var array
     * @config
     */
    private static $has_one = array(
        'HomePage' => HomePage::class,
        'ComponentsPage' => ComponentsPage::class,
        'Image' => Image::class,
        'InternalURL' => SiteTree::class
    );

    /**
     * @var array
     * @config
     */
    private static $summary_fields = array(
        'ImageThumb' => 'Image',
        'Title' => 'Title',
        'Content' => 'Content'
    );

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeFieldFromTab('Root.Main', 'ComponentsPageID');
        $fields->removeFieldFromTab('Root.Main', 'HomePageID');
        $fields->removeFieldFromTab('Root.Main', 'SortOrder');
        $fields->removeFieldFromTab('Root.Main', 'Title');
        $fields->removeFieldFromTab('Root.Main', 'Content');
        $fields->removeFieldFromTab('Root.Main', 'InternalURLID');

        $fields->addFieldsToTab(
            'Root.Main',
            [
                UploadField::create('Image', 'Card Image')
                    ->setDescription('Image size: 640 x 480')
                    ->setAllowedFileCategories('image')
                    ->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'))
                    ->setFolderName('CardImages'),
                TextField::create('Title','Title'),
                TextAreaField::create('Content','Content')
            ]
        );

        $fields->addFieldsToTab('Root.Main', TreeDropdownField::create(
            'InternalURLID',
            'Page link',
            SiteTree::class
        ));

        return $fields;
    }

    /**
     * @return string
     */
    public function Link()
    {
        if (!$this->InternalURL()->exists()) {
            return '';
        }

        return $this->InternalURL()->Link();
    }

    /**
     * @return image
     */
    public function getImageThumb()
    {
        if($this->Image()->exists()) {
            return $this->Image()->ScaleWidth(100);
        }

        return "(No image)";
    }

    /**
     * @return string
     */
    public function onAfterWrite()
    {
        $this->Image()->publishSingle();
    }

}
