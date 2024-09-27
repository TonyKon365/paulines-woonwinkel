<?php

namespace {

    use SilverStripe\ORM\DataObject;
    use SilverStripe\Assets\Image;

    class Brand extends DataObject {

        private static $db = [
            'BrandName' => 'Varchar(100)'
        ];

        private static $has_one = [
            'Image' => Image::class,
            'Homepage' => HomePage::class
        ];

        private static $summary_fields = [
            'BrandName',
            'Thumbnail'
        ];

        private static $owns = [
            'Image'
        ];

        private static $singular_name = 'Merk';
        private static $plural_name = 'Merken';

        public function getCMSFields() {

            $fields = parent::getCMSFields();

            $fields->dataFieldByName('BrandName')->setTitle('Naam');
            $fields->dataFieldByName('Image')->setTitle('Foto');

            $fields->removeFieldFromTab('Root.Main', 'HomepageID');

            return $fields;
            
        }

        public function getThumbnail() {
            if($this->Image) {
                return $this->Image->Pad(200, 100);
            } else {
                return "Geen afbeelding";
            }
        }
    }
}