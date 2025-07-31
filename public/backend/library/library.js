(function($){
    "use strict";
    var HT = {};

    var $document = $(document);

    HT.select2 = () => {
        $('.setupSelect2').select2();
    }

    HT.status = () => {
        document.querySelectorAll('.status_publish').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                let switcheryElement = $(this);

                let id = switcheryElement.attr("id");
                let value = switcheryElement.prop("checked");

                console.log(`+++++++++++++++++++++`);
                console.log(`ID   : ${id}`);
                console.log(`VALUE: ${value}`);
                console.log(`+++++++++++++++ ++++++`);
            });
        });
    }

    $document.ready(function(){        
        HT.select2();
        // HT.status();
    });
})(jQuery);