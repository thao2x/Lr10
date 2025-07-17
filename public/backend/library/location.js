(function($){
    "use strict";
    var HT = {};

    var $document = $(document);

    HT.province = () => {
        $("#province-select").on("change", function() {
            let province_id = $(this).val();
            
            $.ajax({
                url: '/location/getLocation',
                type: 'GET',
                dataType: 'json',
                data: {
                    'province_id': province_id
                },
                success: function (res) {
                    console.log(res);
                    
                },
                error: function (jqXHR, textStatus, errorThrow) {
                    console.log('Lỗi: ' + textStatus + ' ' + errorThrow);
                    
                }
            })
        });
    }

    $document.ready(function(){
        HT.province();
    });
})(jQuery);