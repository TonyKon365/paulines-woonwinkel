<?php

    use SilverStripe\ORM\DataObject;

    class ProductDefaultAttribute extends DataObject {

        private static $db = [
            'Name' => 'Varchar(50)'
        ];

        private static $summary_fields = [
            'Name',
        ];

        private static $singular_name = 'Standaard product eigenschap';
        private static $plural_name = 'Standaard product eigenschappen';

        public function getCMSFields() {

            $fields = parent::getCMSFields();

            $fields->removeFieldFromTab('Root.Main', 'ProductID');

            $fields->dataFieldByName('Name')->setTitle('Naam'); 

            return $fields;
        }
    }