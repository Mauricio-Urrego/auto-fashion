<?php
namespace Mauriciourrego\AutoFashion;

class Products {
  public static function getProducts() {
    // If product data is cached already, use the cache. Clear cache to reprocess.
    //$products = file_get_contents(__DIR__ . '/../cache/cache.txt');
    // TODO: getting product object from python
    $products = file_get_contents(__DIR__ . '/../csv/get-hq-images/receive_hq.txt');

    if ($products) {
      //$products = unserialize($products);
      $products = json_decode($products, true);
      // Cleans product links of '/ref=' and any query parameters.
      //foreach ($products as $i => $product) {
      //  $products[$i]['product_link'] = strtok(explode('ref=', $product['product_link'])[0], '?');
      //}

      //$json = json_encode($products);
      //file_put_contents(__DIR__ . '/../csv/get-hq-images/hq.txt',$json);
      // TODO: pass the list of product links at this point to the python script to download HQ images. Then return them to this point to have link in object.
    }
    else {
      $import = new Import;
      $fileDirectory = __DIR__ . '/../csv/csv-raw/';
      $fileNames = scandir($fileDirectory);

      $dirSize = 0;
      foreach ($fileNames as $fileName) if (mime_content_type($fileDirectory . $fileName) === 'text/plain') {
        $dirSize = $dirSize + filesize($fileDirectory . $fileName);
      }

      // If there are new CSVs in the raw folder, re-create the final csv.
      $finalDataPath = __DIR__ . '/../csv/csv-final/final_data.csv';
      if ($dirSize !== filesize($finalDataPath)) {
        $fileContents = '';
        foreach ($fileNames as $fileName) if (mime_content_type($fileDirectory . $fileName) === 'text/plain') {
          $fileContents .= file_get_contents($fileDirectory . $fileName);
        }
        file_put_contents($finalDataPath, $fileContents);
      }

      $products = $import::import($finalDataPath);

      $identify = new Identify;
      $products = $identify::identify($products);

      file_put_contents(__DIR__ . '/../cache/cache.txt', serialize($products));
    }

    return $products;
  }
}