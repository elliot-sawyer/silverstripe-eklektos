<?php

namespace Eklektos\Eklektos\Model;

use SilverStripe\ORM\DataObject,
    SilverStripe\Assets\Image,
    SilverStripe\AssetAdmin\Forms\UploadField,
    SilverStripe\Forms\TextField,
    SilverStripe\Forms\TextAreaField,
    Eklektos\Eklektos\PageTypes\ComponentsPage,
    Eklektos\Eklektos\PageTypes\HomePage;

class CarouselItem extends DataObject
{

    /**
     * @var string
     * @config
     */
    private static $table_name = 'CarouselItem';

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
        'Caption' => 'Varchar(255)'
    );

    /**
     * @var array
     * @config
     */
    private static $has_one = array(
        'ComponentsPage' => ComponentsPage::class,
        'HomePage' => HomePage::class,
        'Image' => Image::class
    );

    /**
     * @var array
     * @config
     */
    private static $summary_fields = array(
        'ImageThumb' => 'Image',
        'Title' => 'Title',
        'Caption' => 'Caption'
    );

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeFieldFromTab('Root.Main', 'ComponentsPageID');
        $fields->removeFieldFromTab('Root.Main', 'SortOrder');
        $fields->removeFieldFromTab('Root.Main', 'Title');
        $fields->removeFieldFromTab('Root.Main', 'Caption');
        $fields->removeFieldFromTab('Root.Main', 'Heading');

        $fields->addFieldsToTab(
            'Root.Main',
            [
                UploadField::create('Image', 'Carousel Image')
                    ->setDescription('Sizes: &nbsp;&nbsp; Full (2560 x 560) &nbsp;&nbsp;&nbsp; Boxed (1100 x 500) &nbsp;&nbsp;&nbsp; Half (634 x 300)')
                    ->setAllowedFileCategories('image')
                    ->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'))
                    ->setFolderName('CarouselImages'),
                TextField::create('Title','Title'),
                TextAreaField::create('Caption','Caption')
            ]
        );

        return $fields;

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
