<?php
namespace Mauriciourrego\AutoFashion;
use Phim\Color;
use Phim\Color\RgbColor;

class Compare {
  public static function compare($products, $paletteColors) {
    $matches = [];
    foreach ($products as $product) if (isset($product['identity'])) {
      $rgbColor = new RgbColor($product['identity']['r'], $product['identity']['g'], $product['identity']['b']);
      foreach ($paletteColors as $paletteColor) {
        $paletteColor = new RgbColor($paletteColor[0], $paletteColor[1], $paletteColor[2]);
        if (Color::equals($rgbColor, $paletteColor, 20)) {
          $product['paletteColor'] = $paletteColor;
          $matches[] = $product;
        }
      }
    }
    return $matches;
  }
}
