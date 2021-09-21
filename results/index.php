<?php
namespace Mauriciourrego\AutoFashion;
require_once  __DIR__ . '/../vendor/autoload.php';

echo '<html lang = "en">';
echo '<head>';
include_once __DIR__ . '/../components/common/head.php';
echo '<link rel="stylesheet" type="text/css" href="../assets/styles/result.css"/>';
echo '<script type = "text/javascript" src="/libraries/jquery.js"></script>';
// TODO: Consider the amazon plugin of affiliatejs to modify urls for locality:
echo '<script data-aff="amazon.com, www.amazon.com : tag = digmypants01-20" src="https://cdn.jsdelivr.net/npm/affiliate@3.0.0/dist/affiliate.js" async id="aff-js"></script>';
echo '</head>';
echo '<body>';
echo '<div class="results">';
if($_SERVER["REQUEST_METHOD"] === "POST") {
  $paletteColors = json_decode($_POST['paletteColors']);
  $products = Products::getProducts();
  $compare = new Compare;
  $matches = $compare::compare($products, $paletteColors);
  if ($matches) {
    shuffle($matches);
    $usedPaletteColors = [];
    $usedCategories = [];
    foreach ($matches as $match) if (!in_array($match['paletteColor'], $usedPaletteColors) && !in_array($match['product_category'], $usedCategories) && !empty($match['hq_image_link'])) {
      array_push($usedCategories, $match['product_category']);
      array_push($usedPaletteColors, $match['paletteColor']);
      echo '<div class="result">' . '<a class = "ProductPage" target="_blank" href=' . $match['product_link'] . '>' . '<div class = "resultImg" style="background-image: url(';
      rsort($match['hq_image_link']);
      echo $match['hq_image_link'][0];
      echo ')"></div>' . '</a>' . '</div>';
    }
  }
  else {
    echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1080 1080"><defs><style>.cls-1,.cls-6{fill:#99adf9;}.cls-2,.cls-8{fill:#fec272;}.cls-10,.cls-3{fill:#ff97c9;}.cls-4{isolation:isolate;}.cls-5{clip-path:url(#clip-path);}.cls-6{opacity:0.25;}.cls-10,.cls-6,.cls-8{mix-blend-mode:multiply;}.cls-7{clip-path:url(#clip-path-2);}.cls-8{opacity:0.52;}.cls-9{clip-path:url(#clip-path-3);}.cls-10{opacity:0.19;}.cls-11{fill:#1c3177;}.cls-12,.cls-15{fill:none;stroke:#1c3177;stroke-linecap:round;stroke-miterlimit:10;}.cls-12{stroke-width:9px;}.cls-13{fill:#f774b9;}.cls-14{fill:#fff;}.cls-15{stroke-width:12px;}</style><clipPath id="clip-path"><path class="cls-1" d="M588.94,624.7c-1.82.55-3.59,1.17-5.31,1.88a7.13,7.13,0,0,1-9.52-4.61l-28.42-95.49L222,622.81l77.17,259.32a35.67,35.67,0,0,0,44.36,24l255.34-76a35.67,35.67,0,0,0,24-44.36l-18.24-61.31a7.14,7.14,0,0,1,5.45-9.07,53.68,53.68,0,0,0,5.47-1.32c26.8-8,42.56-34.45,35.22-59.14S615.74,616.73,588.94,624.7Z"/></clipPath><clipPath id="clip-path-2"><path class="cls-2" d="M458.35,233,168.82,319.14a35.66,35.66,0,0,0-24,44.35L222,622.81l111.08-33a6.58,6.58,0,0,1,8.35,5q.49,2.5,1.24,5c8,26.79,34.45,42.56,59.13,35.21s38.24-35,30.26-61.82c-.5-1.66-1.06-3.29-1.7-4.87a6.58,6.58,0,0,1,4.27-8.72l111.08-33.06Z"/></clipPath><clipPath id="clip-path-3"><path class="cls-3" d="M458.35,233l24.87,83.56A9.74,9.74,0,0,1,475.43,329a55.84,55.84,0,0,0-7.67,1.7c-26.79,8-42.56,34.45-35.21,59.14s35,38.23,61.81,30.26a53.33,53.33,0,0,0,7.35-2.78A9.76,9.76,0,0,1,515,423.48l30.65,103L651.38,495a12,12,0,0,0,8-14.9l-.09-.3c-8-26.8,5.58-54.48,30.26-61.82s51.16,8.42,59.13,35.22l.09.29a12,12,0,0,0,14.9,8.08l71.5-21.28a35.66,35.66,0,0,0,24-44.35l-67-225.14a35.66,35.66,0,0,0-44.35-24Z"/></clipPath></defs><g class="cls-4"><g id="Layer_2" data-name="Layer 2"><path class="cls-1" d="M588.94,624.7c-1.82.55-3.59,1.17-5.31,1.88a7.13,7.13,0,0,1-9.52-4.61l-28.42-95.49L222,622.81l77.17,259.32a35.67,35.67,0,0,0,44.36,24l255.34-76a35.67,35.67,0,0,0,24-44.36l-18.24-61.31a7.14,7.14,0,0,1,5.45-9.07,53.68,53.68,0,0,0,5.47-1.32c26.8-8,42.56-34.45,35.22-59.14S615.74,616.73,588.94,624.7Z"/><g class="cls-5"><path class="cls-6" d="M502.37,868.25S360.75,908,329.56,884.92c-26.28-19.4-27.49-39.4-64.79-118.31-.42,68,36.69,179.6,36.69,179.6Z"/></g><path class="cls-6" d="M342.65,599.74S356.47,665.9,406.56,651,432,573.13,432,573.13Z"/><path class="cls-2" d="M458.35,233,168.82,319.14a35.66,35.66,0,0,0-24,44.35L222,622.81l111.08-33a6.58,6.58,0,0,1,8.35,5q.49,2.5,1.24,5c8,26.79,34.45,42.56,59.13,35.21s38.24-35,30.26-61.82c-.5-1.66-1.06-3.29-1.7-4.87a6.58,6.58,0,0,1,4.27-8.72l111.08-33.06Z"/><g class="cls-7"><path class="cls-8" d="M185.1,517.73s-39.71-141.62-16.68-172.81c19.41-26.28,53.76-41.66,94.33-53.74-68-.42-155.62,25.64-155.62,25.64Z"/></g><path class="cls-3" d="M458.35,233l24.87,83.56A9.74,9.74,0,0,1,475.43,329a55.84,55.84,0,0,0-7.67,1.7c-26.79,8-42.56,34.45-35.21,59.14s35,38.23,61.81,30.26a53.33,53.33,0,0,0,7.35-2.78A9.76,9.76,0,0,1,515,423.48l30.65,103L651.38,495a12,12,0,0,0,8-14.9l-.09-.3c-8-26.8,5.58-54.48,30.26-61.82s51.16,8.42,59.13,35.22l.09.29a12,12,0,0,0,14.9,8.08l71.5-21.28a35.66,35.66,0,0,0,24-44.35l-67-225.14a35.66,35.66,0,0,0-44.35-24Z"/><g class="cls-9"><path class="cls-10" d="M467.76,330.69S440,345.37,450.12,379.43s33.79,38.49,49.36,41.27c-28,24.38-110.74-9.18-110.74-9.18L420,327.43Z"/><path class="cls-10" d="M838.73,327s-44.19-140.29-80.52-153.82c-30.62-11.39-74.45-15.58-115-3.51,56.73-37.55,151-53.52,151-53.52Z"/></g><circle class="cls-11" cx="260.44" cy="431.83" r="17.12"/><circle class="cls-11" cx="387.43" cy="394.05" r="17.12"/><path class="cls-12" d="M314.57,453s.48-13.33,16.2-18,22.93,6.37,22.93,6.37"/><circle class="cls-11" cx="366.95" cy="729.71" r="17.12"/><circle class="cls-11" cx="493.94" cy="691.92" r="17.12"/><path class="cls-11" d="M605.57,329.13c2.69,9.06-4,13.43-13.07,16.13s-17.06,2.7-19.76-6.36a17.13,17.13,0,1,1,32.83-9.77Z"/><path class="cls-11" d="M732.55,291.34c2.7,9.07-4,13.43-13.07,16.13s-17.06,2.7-19.76-6.36a17.13,17.13,0,1,1,32.83-9.77Z"/><path class="cls-13" d="M690.87,342.83c-.63,8.63-11.11,7.71-26.3,12.23s-22.45,12-28.71,4.14c-8-10,5.73-25.8,20.92-30.32S691.8,330.11,690.87,342.83Z"/><rect class="cls-14" x="397.52" y="735.45" width="86.09" height="22.04" rx="11.02" transform="translate(-194.61 156.67) rotate(-16.57)"/><line class="cls-15" x1="744.07" y1="681.76" x2="761.14" y2="712.66"/><line class="cls-15" x1="780.34" y1="575.78" x2="812.33" y2="560.85"/><line class="cls-15" x1="778.35" y1="632.95" x2="819.6" y2="646.51"/></g></g></svg>';
  }
}
echo '</div>';
echo '</body>';
echo '</html>';
