<?php

    use SilverStripe\ORM\DataObject;
    use SilverStripe\Forms\ReadonlyField;
    use SilverStripe\Forms\LiteralField;
    use SilverStripe\Control\Director;

class Order extends Dataobject {

    private static $db = [
        'Customer' => 'Varchar(255)',
        'Email' => 'Varchar(255)',
        'Phone' => 'Varchar(50)',
        'ProductName' => 'Varchar(100)',
        'ProductID' => 'Varchar(100)',
        'Adress' => 'Varchar'
    ];

    private static $singular_name = 'Bestelling';
    private static $plural_name = 'Bestellingen';

    private static $summary_fields = [
        'ID',
        'Created',
        'Customer',
        'ProductName'
    ];

    private static $field_labels = [
        'Created' => 'Besteld',
        'Customer' => 'Klant',
        'ProductName' => 'Product'
    ];

    public function getCMSFields() {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.Main', new ReadonlyField('Created', 'Besteld op'));
        $fields->dataFieldByName('Customer')->setTitle('Klant');
        $fields->dataFieldByName('Adress')->setTitle('Adres');
        $fields->dataFieldByName('Phone')->setReadOnly(true);
        $fields->dataFieldByName('Adress')->setReadOnly(true);
        $fields->dataFieldByName('Customer')->setReadOnly(true);
        $fields->dataFieldByName('Email')->setReadOnly(true);
        $fields->dataFieldByName('ProductName')->setReadOnly(true);
        $fields->removeFieldFromTab('Root.Main','ProductID');

        $fields->addFieldToTab('Root.Main', new LiteralField('contact', "<a class='btn btn-primary' href='mailto:{$this->Email}?subject=Informatie over bestelling'>Contacteer</a>"));
       
        $baseHref = Director::BaseURL();
        $fields->addFieldToTab('Root.Main', new LiteralField('product', "<a class='btn btn-primary' href='{$baseHref}admin/products/Product/EditForm/field/Product/item/$this->ProductID/'>Bekijk product<a>"));

        return $fields;
    }

    public function populate($data) {
        $this->Customer = $data['Name'];
        $this->Email = $data['Email'];
        $this->ProductName = $data['ProductName'];
        $this->ProductID = $data['ProductID'];
        $this->Adress = $data['Street'].', '.$data['Postal'].', '.$data['City'];
        $this->Phone = $data['Phone'];

    }
}