<?php

namespace DIMA\Elemental\Models {

    use DNADesign\Elemental\Models\BaseElement;
    use SilverStripe\Forms\TextField;
    use gorriecoe\Link\Models\Link;
    use SilverStripe\Assets\Image;
    use gorriecoe\LinkField\LinkField;

    class ElementBanner extends BaseElement {
        private static $icon = 'font-icon-block-file';
      
        private static $table_name = 'ElementBanner';

        private static $has_one = [
            'Image' => Image::class
        ];
      

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->dataFieldByName('Title')->setTitle('test');

            $fields->removeByName('ShowTitle');

            return $fields;
        }
        
        public function getType()
        {
          return 'Banner';
        }
    }

    

}