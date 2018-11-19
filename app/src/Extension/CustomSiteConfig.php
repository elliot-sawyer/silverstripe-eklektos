<?php

namespace Eklektos\Eklektos\Extension;

use SilverStripe\ORM\DataExtension;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

class CustomSiteConfig extends DataExtension
{
    /**
     * @var array
     */
    private static $db = array(
        'AlertTitle' => 'Varchar(32)',
        'AlertType' => 'Varchar(255)',
        'AlertBody' => 'HTMLText',
        'AlertToggle' => 'Boolean',
        'SiteFacebook' => 'Text',
        'SiteTwitter' => 'Text',
        'SiteLinkedin' => 'Text',
        'SiteInstagram' => 'Text',
        'SiteYoutube' => 'Text',
        'SiteVimeo' => 'Text'
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

        $fields->addFieldsToTab('Root.SocialMedia', array(
            TextField::create('SiteFacebook', 'Facebook')
                ->setDescription('e.g. https://www.facebook.com/467371 where 467371 is your Facebook page'),
            TextField::create('SiteTwitter', 'Twitter')
                ->setDescription('e.g. https://twitter.com/431465 where 431465 is your Twitter page'),
            TextField::create('SiteLinkedin', 'Linked In')
                ->setDescription('e.g. https://www.linkedin.com/231451 where 231451 is your Linked In page'),
            TextField::create('SiteInstagram', 'Instagram')
                ->setDescription('e.g. https://www.instagram.com/423561 where 423561 is your Instagram page'),
            TextField::create('SiteYoutube', 'Youtube')
                ->setDescription('e.g. https://www.youtube.com/753213 where 753213 is your Youtube page'),
            TextField::create('SiteVimeo', 'Vimeo')
                ->setDescription('e.g. https://www.vimeo.com/876543 where 876543 is your Vimeo page')
        ));

    }

}
