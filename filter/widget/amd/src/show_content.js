define(['jquery'], function($) {
 
    return {
        init: function(content) {
            // Put whatever you like here. $ is available
            // to you as normal.
            $(".filter_widget_content").click(function() {
                alert(content);
            });
        }
    };
});