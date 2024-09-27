<?php

    use SilverStripe\ORM\DataObject;
    use SilverStripe\Forms\LiteralField;

    class ProductAttribute extends DataObject {

        private static $db = [
            'Name' => 'Varchar(50)',
            'Content' => 'Varchar(50)'
        ];

        private static $has_one = [
            'Product' => Product::class,
            'DefaultAttribute' => ProductDefaultAttribute::class
        ];

        private static $summary_fields = [
            'Attribute',
            'Content'
        ];
        private static $field_labels = [
            'Attribute' => 'Eigenschap',
            'Content' => 'Inhoud'
        ];

        private static $singular_name = 'Product eigenschap';
        private static $plural_name = 'Product eigenschappen';

        public function getCMSFields() {

            $fields = parent::getCMSFields();

            $fields->removeFieldFromTab('Root.Main', 'ProductID');

            $fields->dataFieldByName('Name')->setTitle('Naam');
            $fields->dataFieldByName('Content')->setTitle('Inhoud');
            $fields->dataFieldByName('DefaultAttributeID')->setTitle('Standaard eigenschap');
            
            $fields->changeFieldOrder([
                'DefaultAttributeID',
                'Name',
                'Content'
            ]);
                
            return $fields;
        }

        public function getAttribute() {
            if($this->DefaultAttribute->Name) {
                return $this->DefaultAttribute->Name;
            } else {
                return $this->Name;
            }
        }
    }