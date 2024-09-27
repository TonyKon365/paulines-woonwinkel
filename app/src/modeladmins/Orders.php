<?php

    use SilverStripe\Admin\ModelAdmin;
    use SilverStripe\Forms\GridField\GridFieldViewButton;

    class Orders extends ModelAdmin {

        private static $managed_models = [
            'Order'
        ];
        
        private static $url_segment = 'bestellingen';

        private static $menu_title = 'Bestellingen';

    }