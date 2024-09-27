<?php

namespace {

    use SilverStripe\Assets\Image;
    use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\Forms\TextField;
    use gorriecoe\Link\Models\Link;
    use gorriecoe\LinkField\LinkField;
    use SilverStripe\Forms\LiteralField;
    use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
    use SilverStripe\Forms\GridField\GridField;
    use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

    class HomePage extends Page {

        private static $icon_class = "font-icon-p-home";
        
        private static $db = [
            'Banner2Text' => 'Varchar(100)',
            'Content2' => 'HTMLText'
        ];

        private static $has_one = [
            'Banner2Image' => Image::class,
            'Banner2Button' => Link::class,
            'ContentButton' => Link::class,
            'ContentImage' => Image::class,
            'Content2Button' => Link::class,
            'Content2Image' => Image::class
        ];

        private static $has_many = [
            'Brands' => Brand::class,
            'SliderImages' => SliderImage::class
        ];

        private static $owns = [
            'Banner2Image',
            'ContentImage',
            'Content2Image'
        ];


        public function getCMSFields() {
            $fields = parent::getCMSFields();

            // Content
            $fields->addFieldToTab('Root.Main', LinkField::create('ContentButton', 'Knop', $this), 'Metadata');
            $fields->addFieldToTab('Root.Main', UploadField::create('ContentImage', 'Afbeelding'), 'Metadata');
            
            $fields->addFieldToTab('Root.Main', LiteralField::create('', '<h2><b>Content 2</b></h2>'), 'Metadata');
            $fields->addFieldToTab('Root.Main', HTMLEditorField::create('Content2', 'Content'), 'Metadata');
            $fields->addFieldToTab('Root.Main', LinkField::create('Content2Button', 'Knop', $this), 'Metadata');
            $fields->addFieldToTab('Root.Main', UploadField::create('Content2Image', 'Afbeelding'), 'Metadata');
            
            // Banner
            $sliderConf = GridFieldConfig_RecordEditor::create();
            $fields->addFieldToTab('Root.Banner', new GridField('Slider', 'Slider', $this->SliderImages(), $sliderConf));
            
            $fields->addFieldToTab('Root.Banner', LiteralField::Create('', '<br><h2>Tweede banner</h2>'));
            $fields->addFieldToTab('Root.Banner', UploadField::create('Banner2Image','Afbeelding'));
            $fields->addFieldToTab('Root.Banner', TextField::create('Banner2Text','Titel'));
            $fields->addFieldToTab('Root.Banner', LinkField::create('Banner2Button', 'Knop', $this));
            
            // Slider
            $brandsConf = GridFieldConfig_RecordEditor::create();
            $fields->addFieldToTab('Root.Merken', new GridField('Brands', 'Merken', $this->Brands(), $brandsConf));


            return $fields;
        }

        public function getCategories() {
            return CategoryPage::get()->filter('ShowOnHomepage', 1);
        }
    }


}