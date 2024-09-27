<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use gorriecoe\Link\Models\Link;
use gorriecoe\LinkField\LinkField;

class SliderImage extends DataObject {

    private static $db = [
        'Title' => 'Varchar(100)',
        'Sort' => 'Varchar(100)'
    ];

    private static $has_one = [
        'Page' => Page::class,
        'Image' => Image::class,
        'Button' => Link::class
    ];
    
    private static $owns = [
        'Image'
    ];

    private static $summary_fields = [
        'Sort' => 'Positie',
        'Thumbnail',
        'Title'
    ];

    private static $singular_name = 'Slider foto';
    private static $plural_name = "Slider foto's";
    private static $default_sort = "Sort DESC";

    public function getCMSFields() {
        $fields = parent::getCMSFields();
        $fields->dataFieldByName('Sort')->setTitle('Positie');
        $fields->dataFieldByName('Title')->setTitle('Titel');
        $fields->dataFieldByName('Image')->setTitle('Afbeelding');

        $fields->addFieldToTab('Root.Main', LinkField::create('Button', 'Knop', $this));
        
        $fields->removeFieldFromTab('Root.Main', 'ButtonID');
        $fields->removeFieldFromTab('Root.Main', 'PageID');

        return $fields;
    }

    public function getThumbnail() {
        if($this->Image) {
            return $this->Image->pad(200, 100);
        }
    }
}