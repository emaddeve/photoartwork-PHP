(function($){
  $(function(){
    var $itemContent = $("#itemContent1");
    $("#expandButton1").click(function(e){
      e.preventDefault();
      if($itemContent.hasClass('opened')){
        $itemContent.slideUp('slow').toggleClass('closed opened');
      } else {
        $itemContent.slideDown('slow').toggleClass('closed opened');
      }
    });
  });
})(jQuery);

(function($){
  $(function(){
    var $itemContent = $("#itemContent2");
    $("#expandButton2").click(function(e){
      e.preventDefault();
      if($itemContent.hasClass('opened')){
        $itemContent.slideUp('slow').toggleClass('closed opened');
      } else {
        $itemContent.slideDown('slow').toggleClass('closed opened');
      }
    });
  });
})(jQuery);

(function($){
  $(function(){
    var $itemContent = $("#itemContent3");
    $("#expandButton3").click(function(e){
      e.preventDefault();
      if($itemContent.hasClass('opened')){
        $itemContent.slideUp('slow').toggleClass('closed opened');
      } else {
        $itemContent.slideDown('slow').toggleClass('closed opened');
      }
    });
  });
})(jQuery);

