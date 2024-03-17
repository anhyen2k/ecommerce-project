(function ($) {
    "use strict";
    var HT = {};
    var _token = $('meta[name="csrf-token"').attr("content");

    HT.switchery = () => {
        $(".js-switch").each(function () {
            var switchery = new Switchery(this, { color: "#1AB394" });
        });
    };

    HT.select2 = () => {
        if ($(".setupSelect2").length) {
            $(".setupSelect2").select2();
        }
    };

    HT.changeStatus = () => {
        $(document).on("change", ".status", function (e) {
            let _this = $(this);
            let option = {
                value: _this.val(),
                modelId: _this.attr("data-modelId"),
                model: _this.attr("data-model"),
                field: _this.attr("data-field"),
                _token: _token,
            };

            $.ajax({
                url: "/ajax/dashboard/changeStatus",
                type: "POST",
                data: option,
                dataType: "json",
                success: function (res) {
                    console.log(res);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log("Lỗi: " + textStatus + " " + errorThrown);
                },
            });

            e.preventDefault();
        });
    };

    HT.checkAll = () => {
        if ($("#checkAll").length) {
            $(document).on("click", "#checkAll", function () {
                let isChecked = $(this).prop("checked");

                $(".checkBoxItem").prop("checked", isChecked);
                $(".checkBoxItem").each(function () {
                    let _this = $(this);
                    HT.changeBackground(_this);
                });
            });
        }
    };

    HT.checkBoxItem = () => {
        if ($(".checkBoxItem").length) {
            $(document).on("click", ".checkBoxItem", function () {
                let _this = $(this);
                HT.changeBackground(_this);
                HT.allChecked();
            });
        }
    };

    HT.changeBackground = (object) => {
        let isChecked = object.prop("checked");
        if (isChecked) {
            object.closest("tr").addClass("active-bg");
        } else {
            object.closest("tr").removeClass("active-bg");
        }
    };

    HT.allChecked = () => {
        let allCheckd =
            $(".checkBoxItem:checked").length === $(".checkBoxItem").length;
        $("#checkAll").prop("checked", allCheckd);
    };

    HT.changeStatusAll = () => {
        if ($('.changeStatusAll').length) {
            $(document).on('click', '.changeStatusAll', function () {
                let _this = $(this);
                let id = [];
                $('checkBoxItem').each(function () {
                    let checkBox = _this.val();
                    if (checkBox.prop('checked')) {
                        id.push(checkBox);
                    }
                });
                console.log(id);
                return false;
                

                let option = {
                    value: _this.val(),
                    model: _this.attr("data-model"),
                    field: _this.attr("data-field"),
                    _token: _token,
                };
            });
        }
    };

    $(document).ready(function () {
        HT.switchery();
        HT.select2();
        HT.changeStatus();
        HT.checkAll();
        HT.checkBoxItem();
        HT.changeStatusAll();
    });
})(jQuery);
