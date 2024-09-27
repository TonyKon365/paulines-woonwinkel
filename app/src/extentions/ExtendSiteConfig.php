<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\TextField;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use gorriecoe\Link\Models\Link;
use gorriecoe\LinkField\LinkField;

class ExtendSiteConfig extends DataExtension 
{

    private static $db = [
        'DefaultEmail' => 'Varchar(150)',

        
        'TopbarTextLine' => 'Text',

        'CompanyName' => 'Varchar(100)',
        'Street' => 'Varchar(100)',
        'Postal' => 'Varchar(100)',
        'City' => 'Varchar(100)',
        'Phone' => 'Varchar(100)',
        'Email' => 'Varchar(100)',
        'KvK' => 'Varchar(100)',
        'BTW' => 'Varchar(100)',

        'FooterCol1Title' => 'Varchar(50)',
        'FooterCol2Title' => 'Varchar(50)',
        'FooterCol3Title' => 'Varchar(50)',
        'FooterCol3Content' => 'HTMLText',
        'FooterCol4Title' => 'Varchar(50)',
        'FooterCol4Content' => 'HTMLText',
        'FooterCol5Title' => 'Varchar(50)',

        'OpenHoursMon' => 'Varchar(50)',
        'OpenHoursFri' => 'Varchar(50)',
        'OpenHoursSat' => 'Varchar(50)',
        'OpenHoursDiDo' => 'Varchar(50)',
        'OpenHoursFriTrim' => 'Varchar(50)'
    ];

    private static $has_one = [
        'Logo' => Image::class,
        'LogoWhite' => Image::class,
        'Favicon' => Image::class,
        'FooterFacebookLink' => Link::class,
        'FooterTwitterLink' => Link::class,
        'FooterInstagramLink' => Link::class,
        'MoreInfoLink' => Link::class,
        'PrivacyLink' => Link::class,
        'OrderLink' => Link::class
    ];

    private static $owns = [
        'Logo',
        'LogoWhite',
        'Favicon'
    ];

    public function updateCMSFields(FieldList $fields) 
    {
        // Main tab
        $fields->addFieldToTab('Root.Main', TextField::create('DefaultEmail','Standaard email'));
        $fields->addFieldToTab('Root.Main', UploadField::create('Logo','Logo'));
        $fields->addFieldToTab('Root.Main', UploadField::create('LogoWhite','Wit logo'));
        $fields->addFieldToTab('Root.Main', UploadField::create('Favicon','Favicon'));
        $fields->addFieldToTab('Root.Main', LinkField::create('PrivacyLink', 'Privacy link', $this->owner));        
        $fields->addFieldToTab('Root.Main', TextField::create('TopbarTextLine','Tekst in de topbar'));
    
        // Default info
        $fields->addFieldToTab('Root.Standaard gegevens', TextField::create('CompanyName','Bedrijfsnaam'));
        $fields->addFieldToTab('Root.Standaard gegevens', TextField::create('Street','Straat'));
        $fields->addFieldToTab('Root.Standaard gegevens', TextField::create('Postal','Postcode'));
        $fields->addFieldToTab('Root.Standaard gegevens', TextField::create('City','Plaats'));
        $fields->addFieldToTab('Root.Standaard gegevens', TextField::create('Email','Email adres'));
        $fields->addFieldToTab('Root.Standaard gegevens', TextField::create('Phone','Telefoonnummer'));
        $fields->addFieldToTab('Root.Standaard gegevens', TextField::create('KvK','KvK nr.'));
        $fields->addFieldToTab('Root.Standaard gegevens', TextField::create('BTW','BTW nr.'));

        // Footer
        $fields->addFieldToTab('Root.Footer', LiteralField::create('', '<h1>Kolom 1</h1>'));
        $fields->addFieldToTab('Root.Footer', TextField::create('FooterCol1Title','Titel'));

        $fields->addFieldToTab('Root.Footer', LiteralField::create('', '<h1>Kolom 2</h1>'));
        $fields->addFieldToTab('Root.Footer', TextField::create('FooterCol2Title','Titel'));
        
        $fields->addFieldToTab('Root.Footer', LiteralField::create('', '<h1>Kolom 3</h1>'));
        $fields->addFieldToTab('Root.Footer', TextField::create('FooterCol3Title','Titel'));
        $fields->addFieldToTab('Root.Footer', HTMLEditorField::create('FooterCol3Content','Content'));

        $fields->addFieldToTab('Root.Footer', LiteralField::create('', '<h1>Kolom 4</h1>'));
        $fields->addFieldToTab('Root.Footer', TextField::create('FooterCol4Title','Titel'));
        $fields->addFieldToTab('Root.Footer', HTMLEditorField::create('FooterCol4Content','Content'));

        $fields->addFieldToTab('Root.Footer', LiteralField::create('', '<h1>Kolom 5</h1>'));
        $fields->addFieldToTab('Root.Footer', TextField::create('FooterCol5Title','Titel'));
        $fields->addFieldToTab('Root.Footer', LinkField::create('FooterFacebookLink', 'Facebook link', $this->owner));
        $fields->addFieldToTab('Root.Footer', LinkField::create('FooterTwitterLink', 'Twitter link', $this->owner));
        $fields->addFieldToTab('Root.Footer', LinkField::create('FooterInstagramLink', 'Instagram link', $this->owner));
        
        // Opening hours
        $fields->addFieldToTab('Root.Openingstijden', TextField::create('OpenHoursMon','Maandag'));
        $fields->addFieldToTab('Root.Openingstijden', TextField::create('OpenHoursDiDo','Din-Don'));
        $fields->addFieldToTab('Root.Openingstijden', TextField::create('OpenHoursFri','Vrijdag'));
        $fields->addFieldToTab('Root.Openingstijden', TextField::create('OpenHoursFriTrim','Vrijdag verkort'));
        $fields->addFieldToTab('Root.Openingstijden', TextField::create('OpenHoursSat','Zaterdag'));
        
        // Product page
        $fields->addFieldToTab('Root.Product Pagina', LinkField::create('MoreInfoLink', 'Meer informatie link', $this->owner));
        $fields->addFieldToTab('Root.Product Pagina', LinkField::create('OrderLink', 'Bestel link', $this->owner));
        
        // Remove fields
        $fields->removeFieldFromTab('Root.Main', 'Tagline');
    }
}