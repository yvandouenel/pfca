(function ($) {
    
    Drupal.behaviors.downloadsLists = {
        attach: function (context, settings) {
            $(".list-content ul").hide(0);
            $("a.list-button").bind("click",function(event){
                var parent = $(this).parent();
                if($(".list-content ul",parent).css("display") == "none"){
                    $(".list-content ul").hide(0);
                    $(".list-content ul",parent).show(0);
                }else{
                    $(".list-content ul").hide(0);
                }
            });
        }
    };

}(jQuery));