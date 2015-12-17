$("#search").click(function(){
    $.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?",
        {
            tags: $("#searchterm").val(),
            tagmode: "any",
            format: "json"
        },
        function(data) {
            $.each(data.items, function(i,item){
                $("<img/>").attr("src", item.media.m).prependTo("#results");
                if ( i == 10 ) return false;
            });
        });
});
