<?php include_once('constants.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once('components/common/head.php'); ?>
  <link rel="stylesheet" type="text/css" href="assets/styles/home.css"/>
  <link rel="stylesheet" type="text/css" href="assets/styles/popup.css"/>
  <script type = "text/javascript" src="/libraries/jquery.js"></script>
  <script type = "text/javascript" src="api/apiCall.js" async></script>
  <script type = "text/javascript" src="assets/js/popup.js" async></script>
</head>

<body data-popup-body aria-visible="false">
<div class="popup" data-popup-show aria-visible="false">
  <button class="x-icon" data-popup-toggle aria-expanded="false">
    <div class="x-1"></div>
    <div class="x-2"></div>
  </button>
  <h1>Help</h1>
  <p>Hello! Welcome to <?= SITE_NAME ?>.
  </p>
</div>
<button class = "ellipsis" data-popup-toggle aria-visible="true"><span class = "ellipsis-text">...</span></button>
<div class="header" data-header-hide><span class="headerText"><?= SITE_NAME ?></span></div>
<div class ="json"></div>
<form action="results/" method="post">
        <span class="buttons" data-buttons-hide>
          <button class="newBtn" type = "button" onclick="newPalette()"><span class="shuffle-ico"></span></button>
          <button type="submit" class="sbtBtn" name="submit"><span class="play-ico"></span></button>
        </span>
  <input type="hidden" name="paletteColors" id="colors" value=""/>
</form>
</body>
</html>
