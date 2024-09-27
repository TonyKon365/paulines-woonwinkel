<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;

class ProductImage extends DataObject {

    private static $db = [
        'SortID' => 'Int'
    ];

    private static $has_one = [
        'Product' => Product::class,
        'Image' => Image::class
    ];

    private static $summary_fields = [
        'Thumbnail'
    ];

    private static $owns = [
        'Image'
    ];

    private static $singular_name = 'Product foto';
    private static $plural_name = "Product foto's";

    public function getCMSFields() {

        $fields = parent::getCMSFields();;
    echo '<pre>';
    print_r($fields);
    echo '</pre>';

        $fields->dataFieldByName('Image')->setFolderName("Producten");
        // $fields->dataFieldByName('Alt')->setTitle("Alt tekst");

        $fields->removeByName('ProductID');

        return $fields;

    }

    public function getThumbnail() {
        if($this->Image) {
            return $this->Image->Pad(200, 100);
        } else {
            return "Geen afbeelding";
        }
    }

    public function onBeforeDelete() {
        $image = $this->Image();
        $image->delete();
        $image->destroy();

        parent::onBeforeDelete();
    }
}
