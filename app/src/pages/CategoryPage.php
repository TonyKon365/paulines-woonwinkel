<?php

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\View\ArrayData;
use SilverStripe\ORM\ArrayList;

class CategoryPage extends Page {

    private static $icon_class = 'font-icon-box';
    private static  $allowed_children = [
        SubCategoryPage::class
    ];

    private static $db = [
        'ShowOnHomepage' => 'Boolean',
        'Size' => 'Varchar(10)',
        'isProduct' => 'Boolean'
    ];

    private static $has_one = [
        'Image' => Image::class,
        'ContentImage' => Image::class
    ];

    private static $belongs_many_many = [
        'Products' => Product::class
    ];

    private static $owns = [
        'Image',
        'ContentImage'
    ];

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.Andere pagina', CheckboxField::create('ShowOnHomepage','Tonen op homepagina'));
        $fields->addFieldToTab('Root.Andere pagina', UploadField::create('Image','Foto'));
        $sizeDropdown = [
            'width-1' => '1x',
            'width-2' => '2x'
        ];
        $fields->addFieldToTab('Root.Andere pagina', DropdownField::create('Size', 'Grootte', $sizeDropdown));
       
        $fields->addFieldToTab('Root.Main', UploadField::create('ContentImage','Content foto'));

        return $fields;
    }

    public function customBreadCrumbs() {
        $level = SiteTree::getPageLevel();

        $pages = new ArrayList();
        for($i=1;$i<=$level;$i++) {
            $pageInfo = SiteTree::Level($i);
            $pages->push(
                new ArrayData(['Name' => $pageInfo->Title, 'Link' => $pageInfo->AbsoluteLink()])
            );
        }
        

        return $pages;
    }

    public function currentCategoryLink() {
        return $this->Link();
    }

}