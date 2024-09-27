<?php
    
    use SilverStripe\ORM\DataObject;
    use SilverStripe\AssetAdmin\Forms\UploadField;
    use SilverStripe\Assets\Image;
    use SilverStripe\Forms\CheckboxSetField;
    use SilverStripe\Forms\FieldList;
    use SilverStripe\Control\HTTPRequest;
    use SilverStripe\Core\Injector\Injector;
    use SilverStripe\Forms\GridField\GridField;
    use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
    use SilverStripe\Forms\GridField\GridFieldDeleteAction;
    use SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter;
    use SilverStripe\Forms\GridField\GridFieldFilterHeader;
    use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

    class Product extends Dataobject {

        private static $db = [
            'Name' => 'Varchar(150)',
            'Sku' => 'Varchar(150)',
            'Description' => 'Text',
            'ShortDescription' => 'Text',
			'AttributesDescription' => 'Text',
            'Price' => 'Varchar(10)',
            'SalePrice' => 'Varchar(10)',
            'OnSale' => 'Boolean',
            'Highlighted' => 'Boolean',
            'URLSegment' => 'Varchar(255)',
            'OrderButton' => 'Boolean',
            'MetaTitle' => 'Varchar(255)',
            'MetaDesc' => 'Text'
        ];

        private static $has_one = [
            'MainCategory' => CategoryPage::class
        ];

        private static $many_many = [
            'Category' => CategoryPage::class
        ];
        
        private static $has_many = [
            'Images' => ProductImage::class,
            'Attributes' => ProductAttribute::class
        ];

        private static $searchable_fields = [
            'ID',
            'Name'
        ];

        private static $summary_fields = [
            'Thumbnail',
            'ID',
            'Name',
            'Price'
        ]; 

        private static $field_labels = [
            'Name' => 'Naam',
            'Price' => 'Prijs'
        ];
        
        private static $singular_name = 'Product';
        private static $plural_name = 'Producten';


        public function getCMSFields() {

            $fields = parent::getCMSFields();   

            $fields->changeFieldOrder([
                'URLSegment',
                'Name',
                'Price',
                'OnSale',
                'SalePrice',
                'Highlighted',
                'Description',
                'ShortDescription'
            ]);


            if($this->OnSale == false) {
                $fields->removeByName('SalePrice');
            }

            
            // $fields2 = FieldList::create(
            //     new CheckboxSetField("Category", "Categorie(ën)", CategoryPage::get()->map())
            // );
            $fields->dataFieldByName('AttributesDescription')->setTitle('AttributesDescription');
            

            $fields3 = parent::getCMSFields();
               
            $fields3->removeByName('Images');
            $ImagesConfig = new GridFieldConfig_RecordEditor;
            $ImagesConfig->addComponent(new GridFieldOrderableRows('SortID'));            
            $ImagesConfig->addComponent(new GridFieldDeleteAction(true));           
        
            
            $fields3->addFieldToTab('Root.Main', new GridField('Images', 'Images', $this->Images(), $ImagesConfig));

            $fields3->removeByName('Attributes');
            $AttributesConfig = new GridFieldConfig_RecordEditor;
            $AttributesConfig->removeComponentsByType('SilverStripe\Versioned\GridFieldArchiveAction');
            $AttributesConfig->removeComponentsByType(new GridFieldDeleteAction);
            $AttributesConfig->removeComponentsByType(new GridFieldFilterHeader);
            $AttributesConfig->removeComponentsByType(new GridFieldAddExistingAutocompleter);
            $fields3->addFieldToTab('Root.Attributen', new GridField('Attributes', 'Attributen', $this->Attributes(), $AttributesConfig));

            $fields3->removeByName('Category');
            $CategoryConfig = new GridFieldConfig_RecordEditor;
            $CategoryConfig->removeComponentsByType('SilverStripe\Versioned\GridFieldArchiveAction');
            $CategoryConfig->removeComponentsByType(new GridFieldFilterHeader);
            $CategoryConfig->addComponent(new GridFieldDeleteAction(true));
            $CategoryConfig->addComponent(new GridFieldAddExistingAutocompleter('buttons-before-right'));
            $fields3->addFieldToTab('Root.Categorieën', new GridField('Category', 'Categories', $this->Category(), $CategoryConfig));

            return $fields3;   
            
            // $fields->merge($fields2);

            return $fields;
        }

        protected function onBeforeWrite() {

            // Format price
            $this->Price = $this->formatPrice($this->Price);
            if($this->OnSale) {$this->SalePrice = $this->formatPrice($this->SalePrice);}

            // Update URL
            $this->URLSegment = $this->makeUrlSegment();

            $this->setMainCategory();

            parent::onBeforeWrite();
        }

        public static function getByUrlSegment($urlSegment) {
            $list = Product::get()->filter('URLSegment', $urlSegment);

            return $list;
        }

        private function formatPrice($price) {
            
            $formatted = str_replace(' ', '', $price);
            $formatted = str_replace('.', '', $price);
            $formatted = str_replace(',', '.', $formatted);
            $formatted = floatval($formatted);
            $formatted = number_format($formatted, 2, ',', '.');

            return $formatted;
        }

        private function setMainCategory() {
            if($this->Category()->exists()) {
                if(!$this->MainCategory->exists()) {
                    $this->MainCategoryID = $this->Category()->First()->ID; 
                }
            }
        }
        
        private function makeUrlSegment() {
            
            $table = array(
                'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
                'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
                'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
                'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
                'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
                'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
                'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r',
            );
            
            $urlSegment = str_replace(' ', '-', $this->Name);
            $urlSegment = str_replace(',', '', $urlSegment);
            $urlSegment = str_replace('.', '', $urlSegment);
            $urlSegment = str_replace('/', '', $urlSegment);
            $urlSegment = strtolower($urlSegment);
            $urlSegment = strtr($urlSegment, $table);

            // Check if current url has a iteration in it
            $getURLlength = strlen($this->URLSegment);
            $currentURL = $this->URLSegment[$getURLlength - 1];
            if(is_numeric($currentURL)) {
                $currentUrlNoIteration = substr($this->URLSegment, 0, -2);

                // Check if new URL is equal to old URL
                if($currentUrlNoIteration == $urlSegment) {
                    return $urlSegment.'-'.$currentURL;
                }
            }
            
            $search = Product::get()->filter(['URLSegment' => $urlSegment, 'ID:not' => $this->ID]);

            // Check if there are more items with this url segment
            if($search->Count() > 0) {

                // Get last number and then generating new number and url
                $getLastNum = Product::get()
                ->filter([
                    'URLSegment:PartialMatch' => $urlSegment,
                    'ID:not' => $this->ID])
                ->sort('ID', 'DESC')
                ->limit(1);
                $getLastNum = $getLastNum['Product'];
                                
                $getLastLength = strlen($getLastNum->URLSegment);
                $lastNum = $getLastNum->URLSegment[$getLastLength - 1];

                if(is_numeric($lastNum)) {
                    $newNum = $lastNum + 1;
                    return $urlSegment.'-'.$newNum;
                } else {
                    return $urlSegment.'-1';
                }
            }

            return $urlSegment;
        }

        public function Link() {
            $request = Injector::inst()->get(HTTPRequest::class);
            $session = $request->getSession();
            $currentPageID = $session->get('PageID');

            if(isset($currentPageID)) {
                if(Page::get()->byID($currentPageID)->exists()) {
                    $currentPage = Page::get()->byID($currentPageID);
                    
                    if($currentPage == "SubCategoryPage" || $currentPage == "CategoryPage") {
                        $category = CategoryPage::get()->byID($currentPageID);
                    } elseif ($this->MainCategory->exists()) {
                        $category = CategoryPage::get()->byID($this->MainCategory->ID);
                    } else {
                        $category = $this->Category()->First();
                    }
                }
            } 
            
            if($category->Parent()->exists()) {
                $categoryParentLink = $category->Parent()->URLSegment.'/';
            } else {
                $categoryParentLink = "";
            }
            
            $categoryLink = $categoryParentLink.$category->URLSegment;

            return $categoryLink.'/'.$this->URLSegment;
        }

        public function getMainImage() {

            if($this->Images()->Count() > 0) {
                if($this->Images()->First()->Image()) {
                    $image = $this->Images()->First()->Image();
    
                    return $image;
                }
            } else {
                return "https://dummyimage.com/170x120/f2f2f2/000000";
            }
        }

        public function getThumbnail() {
            if($this->MainImage != "https://dummyimage.com/170x120/f2f2f2/000000") {
                return $this->MainImage->fit(100, 200);
            }
        }

        public function getCategoryName() {
            if($this->CategoryID != 0) {
                $category = CategoryPage::get()->byID($this->CategoryId);
                if($category) {
                    if($category->exists()) {
                        return $category->Title;
                    }
                }
            }
        }

        public function onBeforeDelete() {

            parent::onBeforeDelete();

            foreach($this->Images() as $image) {
                $image->delete();
            }
            foreach($this->Attributes() as $attribute) {
                $attribute->delete();
            }
        }
        
    }