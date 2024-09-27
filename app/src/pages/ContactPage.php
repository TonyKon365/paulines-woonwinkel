<?php

namespace {

    class ContactPage extends Page {
        
        public function getCMSFields() {
            $fields = parent::getCMSFields();

            $fields->removeFieldFromTab('Root.Main', 'Content');

            return $fields;
        }
    }
}