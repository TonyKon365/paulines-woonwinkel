<?php

    use SilverStripe\Admin\ModelAdmin;
    

    class Catalog extends ModelAdmin {

        private static $managed_models = [
            'Product',
            'ProductDefaultAttribute'
        ];
        
        private static $model_importers = [
            'Product' => 'CustomProductImporter'
        ];

        private static $url_segment = 'products';

        private static $menu_title = 'Producten';


        

    }