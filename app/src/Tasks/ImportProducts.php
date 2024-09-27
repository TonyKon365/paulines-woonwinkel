<?php
use SilverStripe\Control\Session;
use SilverStripe\Dev\BuildTask;
use SilverStripe\ORM\DataList;
use SilverStripe\Core\Environment;
use SilverStripe\Assets\Image;
use SilverStripe\Assets\Folder;
use SilverStripe\Assets\Storage\AssetStore;

class ImportProducts extends BuildTask
{
    protected $title = '';

    protected $description = '';

    public function run($request)
    {
        $dbhost = Environment::getEnv('SS_DATABASE_SERVER');
        $dbname = Environment::getEnv('SS_DATABASE_NAME');
        $dbuser = Environment::getEnv('SS_DATABASE_USERNAME');
        $dbpassword = Environment::getEnv('SS_DATABASE_PASSWORD');

        $row = 0;
        $rowCategory = 0;
        if (($handle = fopen("http://localhost/pauline/Export-magento-def.csv", "r")) !== FALSE) {
          while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $row++;
            $num = count($data);

            if ($row >= 2) {
              echo "<p> $data[0] toegevoegd <br /></p>\n";
            }

            if ($row >= 2) {

              //Images
              /*
              if ($data[3]) {
                $metaImages = $data[3];
                $metaImages = explode(';', $data[3]);
                foreach($metaImages as $metaImage) {
                  $saveFolder = Folder::find_or_make('Producten');
                  $fileName = basename($metaImage);
                  $tmpFolder = 'assets/tmp';
      
                  file_put_contents( $tmpFolder.'/'.$fileName, file_get_contents($metaImage));
      
                  $metaObjectImage = new Image();
                  $metaObjectImage->setFromLocalFile($tmpFolder.'/'.$fileName);
                  $metaObjectImage->ParentID = $saveFolder->ID;
                  $metaObjectImage->publishSingle();
                  $metaObjectImage->write();
                  $metaObjectImage->doPublish();

                  $productImage = new ProductImage;
                  $productImage->ImageID = $metaObjectImage->ID;
                  $productImage->ProductID = $row;
                  $productImage->write();
                }
              }
              */
              
              //Category
              /*
              if ($data[6]) {
                $categories = $data[6];

                $categories = explode('|', $data[6]);
                $categories = array_unique($categories);
                $categories = array_filter($categories);
                $categories = array_values($categories);

                $mysqli = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
                foreach($categories as $category) {
                  if($category != 'Default Category') {
                    $categorieID = CategoryPage::get()->find('Title', $category);
                    if (isset($categorieID->ID)) {
                      $rowCategory ++;
                      mysqli_query($mysqli, "INSERT INTO Product_Category VALUES ('$rowCategory', '$row', '$categorieID->ID')");
                    }
                  }
                }                
              }
              */             

              //Product
              $product = Product::create();
              for ($c=0; $c < $num; $c++) {
                $product->ID = $row;
                if ($data[0]) {
                  $product->Name = trim($data[0]);
                }
                if ($data[1]) {
                  $product->Price = $data[1];
                }
                if ($data[2]) {
                  $product->Description = $data[2];
                }
                if ($data[4]) {
                  $product->MetaTitle = $data[4];
                }
                if ($data[5]) {
                  $product->MetaDesc = $data[5];
                }
                if ($data[6]) {
                  $product->Sku = $data[7];
                }
                if ($data[8]) {
                  $product->ShortDescription = $data[8];
                }
              }            
              $product->write();
            }
          }
          fclose($handle);
        }
    }
}
