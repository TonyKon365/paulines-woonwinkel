<?php

    use SilverStripe\Control\HTTPRequest;
    use SilverStripe\Forms\FieldList;
    use SilverStripe\Forms\TextField;
    use SilverStripe\Forms\EmailField;
    use SilverStripe\Forms\TextareaField;
    use SilverStripe\Forms\FormAction;
    use SilverStripe\Forms\Form;
    use SilverStripe\Forms\LiteralField;
    use SilverStripe\Forms\CheckboxField;
    use SilverStripe\Control\Email\Email;
    use SilverStripe\Forms\RequiredFields;
    use SilverStripe\ORM\PaginatedList;

    class CategoryPageController extends PageController {

        private static $allowed_actions  = [
            'product'
        ];

        private static $url_handlers = [
            '//$Action/$Form' => 'product'
        ];

        public function product(HTTPRequest $request)
        {

            if ($request->param('Action') == null) {
               $pageType = Page::get_by_link($request->param('URLSegment'));
               switch($pageType) {
                   case 'SubCategoryPage':
                   return $this->renderWith(array('SubCategoryPage', 'Page'));
                    break;
                   case 'CategoryPage':
                   return $this->renderWith(array(' CategoryPage', 'Page'));
                    break;
               }
            } else {
                $product = Product::getByUrlSegment($request->param('Action'));

                if(!$product->exists()) {
                    return $this->httpError(404);
                }

                $this->isProduct = 1;

                return $this->customise(array('Product' => $product))->renderWith(array('ProductPage', 'Page'));
            }
        }

        public function PaginatedPages() {

            $list = $this->Products();
            $list = $list->sort([
                'OnSale' => 'DESC',
                'Name' => 'ASC'
            ]);
            $pages = new PaginatedList($list, $this->getRequest());
            $pages->setPageLength(12);
			if ($_SERVER['QUERY_STRING'] == "paginated-12") {
                $pages->setPageLength(12);
            } if ($_SERVER['QUERY_STRING'] == "paginated-24") {
                $pages->setPageLength(24);
            } if ($_SERVER['QUERY_STRING'] == "paginated-36") {
                $pages->setPageLength(36);
            } if ($_SERVER['QUERY_STRING'] == "all-products") {
                $pages->setPageLength(false);
            }

            return $pages;
        }

    }
