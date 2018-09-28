<?php

namespace Eklektos\Eklektos\Model;

use SilverStripe\ORM\DataObject,
    SilverStripe\Assets\Image,
    SilverStripe\AssetAdmin\Forms\UploadField,
    SilverStripe\Forms\TextField,
    SilverStripe\Forms\TextAreaField,
    Eklektos\Eklektos\PageTypes\ComponentsPage;

class CarouselItem extends DataObject
{

    private static $table_name = 'CarouselItem';

    private static $db = array(
        'Title' => 'Varchar(255)',
        'SortOrder' => 'Int'
    );

    private static $has_one = array(
        'ComponentsPage' => ComponentsPage::class,
        'Image' => Image::class
    );

    private static $summary_fields = array(
        'ImageThumb' => 'Image',
        'Title' => 'Title'
    );

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

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

}
