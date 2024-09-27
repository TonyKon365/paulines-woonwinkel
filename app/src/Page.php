<?php

namespace {

    use SilverStripe\CMS\Model\SiteTree;
    use DNADesign\Elemental\Extensions\ElementalPageExtension;
    use SilverStripe\Security\Security;

    class Page extends SiteTree
    {
        private static $db = [];

        private static $has_one = [];
        
        public function getHighlightedProducts() {
            return Product::get()->filter('Highlighted', 1);
        }

        public function getLoggedIn() {
            if($member = Security::getCurrentUser()) {
                return true;
            } else {
                return false;
            }
        }

    }
}
