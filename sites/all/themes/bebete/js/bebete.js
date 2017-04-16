jQuery(document).ready(function($) {
  
  $('#edit-onoffswitch').attr('checked', false);
  
  $(".view-shutter-homepage img").load(function() {
    $(this).wrap(function(){
      return '<span class="image-wrap ' + $(this).attr('class') + '" style="position:relative; display:inline-block; background:url(' + $(this).attr('src') + ') no-repeat center center; width: ' + $(this).width() + 'px; height: ' + $(this).height() + 'px;" />';
    });
    $(this).css("opacity","0");
  });
});