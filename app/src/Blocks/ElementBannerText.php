<?php

namespace DIMA\Elemental\Models {

    use DNADesign\Elemental\Models\BaseElement;
    use SilverStripe\Forms\TextField;
    use gorriecoe\Link\Models\Link;
    use SilverStripe\Assets\Image;
    use gorriecoe\LinkField\LinkField;

    class ElementBannerText extends BaseElement {
        private static $icon = 'font-icon-block-banner';
      
        private static $table_name = 'ElementBannerText';

        private static $has_one = [
            'Image' => Image::class,
            'Button' => Link::Class
        ];
      

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->addFieldToTab('Root.Main', new LinkField('Button', 'Knop', $this));

            return $fields;
        }
        
        public function getType()
        {
          return 'Banner met tekst';
        }
    }

    

}