<?php
use SilverStripe\Dev\CsvBulkLoader;
use SilverStripe\Assets\Image;
use SilverStripe\Assets\Folder;
use SilverStripe\Assets\Storage\AssetStore;

class CustomProductImporter extends CsvBulkLoader 
{
    public $columnMap = [
        'name' => 'Name',
        'price' => 'Price',
        'description' => 'Description',
        // 'image' => '->customImage',
        'meta_title' => 'MetaTitle',
        'meta_description' => 'MetaDesc'
     ];

     
    //  public static function customImage(&$obj, $val, $record)  {
    //     if($val != '') {
    //         $metaImage = "https://www.paulineswoonwinkel.nl/media/catalog/product".$val;
            
    //         $saveFolder = Folder::find_or_make('Producten');
    //         $fileName = basename($metaImage);
    //         $tmpFolder = 'assets/tmp';

    //         file_put_contents( $tmpFolder.'/'.$fileName, file_get_contents($metaImage));
            
    //         $metaObjectImage = new Image();
    //         $metaObjectImage->setFromLocalFile($tmpFolder.'/'.$fileName);
    //         $metaObjectImage->ParentID = $saveFolder->ID;
    //         $metaObjectImage->publishSingle();
    //         $metaObjectImage->write();
            
    //         $getLastID = Product::get()->sort('ID', 'DESC')->limit(1);
    //         if($getLastID->exists()) {
    //             $lastID = $getLastID['Product']->ID;
    //         } else {
    //             $lastID = 0;
    //         }

    //         $obj->ID = $lastID + 1;

    //         $productImage = new ProductImage;
    //         $productImage->ImageID = $metaObjectImage->ID;
    //         $productImage->ProductID = $obj->ID;
    //         $productImage->write();
    //     }
    // }
}