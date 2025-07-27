(function ($) {
    "use strict";
    var HT = {};

    var $document = $(document);

    HT.province = () => {
        $("#province-select").on("change", function () {
            let province_code = $(this).val();

            $.ajax({
                url: '/location/getDistrict',
                type: 'GET',
                dataType: 'json',
                data: {
                    'province_code': province_code
                },
                success: function (res) {
                    const $select = $('#district-select');

                    $select.empty();

                    const optionDefault = $('<option>', {
                        value: "",
                        text: "Chọn Quận/Huyện"
                    });

                    $select.append(optionDefault);

                    res.forEach(function (item) {
                        const option = $('<option>', {
                            value: item.code,
                            text: item.full_name
                        });

                        $select.append(option);
                    });

                },
                error: function (jqXHR, textStatus, errorThrow) {
                    console.log('Error: ' + textStatus + ' ' + errorThrow);
                    alert('Có lỗi, vui lòng thử lại!')
                }
            })
        });
    }

    HT.district = () => {
        $("#district-select").on("change", function () {
            let district_code = $(this).val();

            $.ajax({
                url: '/location/getWard',
                type: 'GET',
                dataType: 'json',
                data: {
                    'district_code': district_code
                },
                success: function (res) {
                    const $select = $('#ward-select');
                    console.log(res);
                    

                    $select.empty();

                    const optionDefault = $('<option>', {
                        value: "",
                        text: "Chọn Phường/Xã"
                    });

                    $select.append(optionDefault);

                    res.forEach(function (item) {
                        const option = $('<option>', {
                            value: item.code,
                            text: item.full_name
                        });

                        $select.append(option);
                    });

                },
                error: function (jqXHR, textStatus, errorThrow) {
                    console.log('Error: ' + textStatus + ' ' + errorThrow);
                    alert('Có lỗi, vui lòng thử lại!')
                }
            })
        });
    }

    $document.ready(function () {
        HT.province();
        HT.district();
    });
})(jQuery);