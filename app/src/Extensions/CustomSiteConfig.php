<?php

namespace Eklektos\Eklektos\Extensions;

use SilverStripe\ORM\DataExtension,
    SilverStripe\SiteConfig\SiteConfig,
    SilverStripe\Forms\FieldList,
    SilverStripe\Forms\TextField,
    SilverStripe\Forms\CheckboxField,
    SilverStripe\Forms\DropdownField,
    SilverStripe\Forms\HTMLEditor\HTMLEditorField;

class CustomSiteConfig extends DataExtension
{
    /**
     * @var array
     */
    private static $db = array(
        'AlertTitle' => 'Varchar(32)',
        'AlertType' => 'Varchar(255)',
        'AlertBody' => 'HTMLText',
        'AlertToggle' => 'Boolean'
    );

    /**
     * @return FieldList
     */
    public function updateCMSFields(FieldList $fields)
    {

        $fields->addFieldsToTab('Root.Alerts', [
            CheckboxField::create('CustAlertToggle', 'Show Customer Alert?'),
            TextField::create('CustAlertTitle', 'Title'),
            DropdownField::create(
                'AlertType',
                'Alert type',
                [
                    'Primary' => 'Primary',
                    'Secondary' => 'Secondary',
                    'Success' => 'Success',
                    'Danger' => 'Danger',
                    'Warning' => 'Warning',
                    'Info' => 'Info',
                    'Light' => 'Light',
                    'Dark' => 'Dark'
                ],
                'Primary'
            ),
            HTMLEditorField::create('CustAlertBody', 'Body text')
                ->setRows(10)
        ]);

    }

}
