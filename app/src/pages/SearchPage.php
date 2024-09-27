<?php

class SearchPage extends Page {

    public function getSearchString() {
        if(isset($_GET['s'])) {
            return $_GET['s'];
        }
    }
    
    public function getCMSFields() {
        $fields = parent::getCMSFields();

        $fields->removeFieldFromTab('Root.Main', 'Content');

        return $fields;
    }
}