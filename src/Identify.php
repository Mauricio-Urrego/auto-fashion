<?php
namespace Mauriciourrego\AutoFashion;
use Mauriciourrego\ColorcubePhp\ColorCube;

class Identify {
  public static function identify($products) {
    $cc = new ColorCube();
    foreach ($products as $i => $product) if (isset($product['product_image_link'])) {
      // Converts image link to image file (only if jpeg).
      if (getimagesize($product['product_image_link'])['mime'] === 'image/jpeg') {
        $image = imagecreatefromjpeg($product['product_image_link']);
      }
      else {
        continue;
      }

      // Identifies the primary colors used in the image.
      if ($image) {
        set_time_limit(20);
        $get_colors = $cc->get_colors($image);
      }
      else {
        continue;
      }

      // Adds the primary color used in the image to the product object.
      if (isset($get_colors[0])) {
        $product['identity'] = $get_colors[0];
        $products[$i] = $product;
      }
    }
    return $products;
  }
}
