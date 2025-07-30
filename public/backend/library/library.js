(function($){
    "use strict";
    var HT = {};

    var $document = $(document);

    HT.select2 = () => {
        $('.setupSelect2').select2();
    }

    HT.status = () => {
        $('.status_publish').change(function() {
            console.log(123);
        });
    }

    $document.ready(function(){
        HT.select2();
        HT.status();
    });
})(jQuery);