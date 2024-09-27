<?php

use SilverStripe\Forms\DropdownField;

class FormPage extends Page {
    private static $db = [
        'Type' => 'Varchar(10)'
    ];

    public function getCMSFields() {
        $fields = parent::getCMSFields();

        $typeOptions = [
            'MoreInfo' => 'Meer informatie',
            'Order' => 'Bestellen'
        ];
        $fields->addFieldToTab('Root.Main', new DropdownField('Type', 'Type', $typeOptions));

        $fields->removeFieldFromTab('Root.Main', 'Content');

        return $fields;
    }


    public function getProduct() {

        if(isset($_GET['id'])) {
            $product = Product::get()->byID($_GET['id']);

            return $product;
        } else {
            // echo "<script>history.back()</script>";
        }
    }
}
