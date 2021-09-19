$(document).ready(function(){
  const json = $('.json');
  json.empty();
  json.append('<span class="loader"></span>');
  newPalette();
});
function newPalette() {
  const json = $('.json');
  json.empty();
  json.append('<span class="loader"></span>');
  let palette = {};
  $.ajax({
    url: 'api/apiCall.php',
    async: false,
    dataType: 'json',
    success: function(data){
      palette = data;
    }
  });
  json.empty();
  palette.result.forEach((item, i) => {
    json.append(renderMessage(item, i));
  });
  function renderMessage(item, i){
    let icons = ['hat', 'shirt', 'pants', 'watch', 'shoe'];
    return '<div class="jsonItems" style="background-color:rgb('+item+');"><span class="icons '+icons[i]+'"></span></div>';
  }
  document.getElementById('colors').value = JSON.stringify(palette.result);
}
