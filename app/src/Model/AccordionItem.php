<?php

namespace Eklektos\Eklektos\Model;

use SilverStripe\ORM\DataObject,
    SilverStripe\Assets\Image,
    SilverStripe\AssetAdmin\Forms\UploadField,
    SilverStripe\Forms\TextField,
    SilverStripe\Forms\TextAreaField,
    Eklektos\Eklektos\PageTypes\ComponentsPage;

class AccordionItem extends DataObject
{

    /**
     * @var string
     * @config
     */
    private static $table_name = 'AccordionItem';

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
        'ComponentsPage' => ComponentsPage::class
    );

    /**
     * @var array
     * @config
     */
    private static $summary_fields = array(
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
        $fields->removeFieldFromTab('Root.Main', 'SortOrder');
        $fields->removeFieldFromTab('Root.Main', 'Title');
        $fields->removeFieldFromTab('Root.Main', 'Content');

        $fields->addFieldsToTab(
            'Root.Main',
            [
                TextField::create('Title','Title'),
                TextAreaField::create('Content','Content')
            ]
        );

        return $fields;
    }

}
