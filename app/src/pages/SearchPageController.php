<?php

use SilverStripe\ORM\PaginatedList;

class SearchPageController extends PageController {
    public function SearchResults() {
        if(isset($_GET['s'])) {
            $searchString = $_GET['s'];
            
            $list = Product::get()->where("Name LIKE '%{$searchString}%' OR ID = '{$searchString}'");
            
            $excludes = [];
            
            
            foreach($list as $product) {
                if(!$product->Category()->exists()) {
                    array_push($excludes, $product->ID);
                }
            }
            
            if(count($excludes) > 0){
                $list = Product::get()->where("Name LIKE '%{$searchString}%' OR ID = '{$searchString}'")->exclude('ID', $excludes);
            }
    
            $pages = new PaginatedList($list, $this->getRequest());
            $pages->setPageLength(24);
            
            return $pages;

        }
    }
}