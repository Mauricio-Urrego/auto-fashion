<?php
namespace Mauriciourrego\AutoFashion;

class Import {
  public static function import($filePath) {
    $csv = [];
    $lines = file($filePath, FILE_IGNORE_NEW_LINES);
    foreach ($lines as $key => $value) {
      $row = str_getcsv($value);
      // Clean row[0] by removing all query parameters from link.
      $csv[$key] = array('product_link' => $row[0], 'product_image_link' => $row[1], 'product_category' => $row[2]);
    }

    return $csv;
  }
}
