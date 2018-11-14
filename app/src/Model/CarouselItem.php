<?php

namespace Eklektos\Eklektos\Model;

use SilverStripe\ORM\DataObject,
    SilverStripe\ORM\ArrayList,
    SilverStripe\Assets\Image,
    SilverStripe\AssetAdmin\Forms\UploadField,
    SilverStripe\Forms\OptionsetField,
    SilverStripe\Forms\TextField,
    SilverStripe\Forms\TextAreaField,
    Eklektos\Eklektos\PageTypes\ComponentsPage,
    UncleCheese\DisplayLogic\Forms\Wrapper;

class CarouselItem extends DataObject
{

    /**
     * Config variable for slider source default field mappings
     *
     * @var array
     * @config
     */
    private static $slide_source_map = [
        [
            'label' => 'Image',
            'field' => 'ImageID'
        ],
        [
            'label' => 'YouTube',
            'field' => 'YouTubeID'
        ],
        [
            'label' => 'Vimeo',
            'field' => 'VimeoID'
        ]
    ];

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
        'Caption' => 'Varchar(255)',
        'YouTubeID' => 'Varchar(255)',
        'VimeoID' => 'Varchar(255)'
    );

    /**
     * @var array
     * @config
     */
    private static $has_one = array(
        'ComponentsPage' => ComponentsPage::class,
        'Image' => Image::class,
        'YoutubeImage' => Image::class
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
        $fields->removeFieldFromTab('Root.Main', 'Image');
        $fields->removeFieldFromTab('Root.Main', 'YouTubeID');
        $fields->removeFieldFromTab('Root.Main', 'VimeoID');
        $fields->removeFieldFromTab('Root.Main', 'YoutubeImage');
        $fields->addFieldsToTab(
            'Root.Main',
            [
                OptionsetField::create('Type', 'Type', $this->getSourceTypes('label'))
                    ->setValue($this->getSourceDefault()),

                Wrapper::create(
                    UploadField::create('Image', 'Image')
                        ->setDescription('Sizes: &nbsp;&nbsp; Full (2560 x 560) &nbsp;&nbsp;&nbsp; Boxed (1100 x 500) &nbsp;&nbsp;&nbsp; Half (634 x 300)')
                        ->setAllowedFileCategories('image')
                        ->setAllowedExtensions(array('jpg', 'jpeg', 'png', 'gif'))
                        ->setFolderName('CarouselImages')
                )->hideUnless('Type')->isEqualTo('ImageID')->end(),

                Wrapper::create(
                    TextField::create('YouTubeID', 'YouTube')
                        ->setDescription('Please type the YouTube ID (e.g. tdKMEfvkrFw)'),
                    UploadField::create('YouTubeImage', 'YouTube Thumbnail Image')
                )->hideUnless('Type')->isEqualTo('YouTubeID')->end(),

                Wrapper::create(
                    TextField::create('VimeoID', 'Vimeo')
                        ->setDescription('Please type the Vimeo ID (e.g. tdKMEfvkrFw)'),
                    UploadField::create('VimeoImage', 'Vimeo Thumbnail Image')
                )->hideUnless('Type')->isEqualTo('VimeoID')->end(),

                TextField::create('Title','Title'),
                TextAreaField::create('Caption','Caption')
            ]
        );
        return $fields;
    }

    /**
     * @return SS_Map
     */
    private function getSourceTypes()
    {
        $map = $this->config()->get('slide_source_map');

        return ArrayList::create($map)->map('field', 'label');
    }

    /**
     * Returns the correct radio-button default for the "Type" field.
     *
     * @return string
     */
    public function getSourceDefault()
    {
        $types = $this->getSourceTypes();

        foreach ($types as $field => $label) {
            if (!empty($this->getField($field))) {
                return $field;
            }
        }

        return 'ImageID';
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
