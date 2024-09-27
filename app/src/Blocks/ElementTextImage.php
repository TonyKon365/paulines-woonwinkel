<?php

namespace DIMA\Elemental\Models {

    use DNADesign\Elemental\Models\BaseElement;
    use SilverStripe\Forms\TextField;
    use gorriecoe\Link\Models\Link;
    use SilverStripe\Assets\Image;
    use gorriecoe\LinkField\LinkField;

    class ElementTextImage extends BaseElement {
        private static $icon = 'font-icon-block-content';
      
        private static $table_name = 'ElementTextImage';

        private static $db = [
            'Text' => 'HTMLText',
            'VideoURL' => 'Varchar(255)',
            'AlignImageLeft' => 'Boolean'
        ];

        private static $has_one = [
            'Image' => Image::class,
            'Button' => Link::class
        ];

        private static $inline_editable = false;
      

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->dataFieldByName('AlignImageLeft')->setTitle('Foto links');

            $fields->addFieldToTab('Root.Main', new LinkField('Button', 'Knop', $this));
            $fields->addFieldToTab('Root.Main', new TextField('VideoURL', 'Vimeo video ID (Overschrijft afbeelding)'), "Image");

            return $fields;
        }
        
        public function getType()
        {
          return 'Text met afbeelding';
        }
    }

    

}