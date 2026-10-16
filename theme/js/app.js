/**
 * Created by ahmed on 08/05/15.
 */
$("#ajaxform").submit(function (e) {
    var btn = $(this).find("input[type=submit]:focus").attr("name");
    var postData = $(this).serializeArray();
    postData.push({name: "btn", value: btn});
    var formURL = $(this).attr("action");
    $.ajax(
        {
            url: formURL,
            type: "POST",
            data: postData,
            dataType: 'json',
            success: function (data) {
                if (!data.success) {
                    $("#alertDiv").hide().html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <h4 class="alert-heading margin-bottom-10"><i class="ti-close"></i> Error!</h4> ' + data.message + '</div>').show(500);
                } else {
                    $("#alertDiv").hide().html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <h4 class="alert-heading margin-bottom-10"><i class="ti-check"></i> Success!</h4> ' + data.message + '</div>').show(500);

                }
                if (data.script) {
                    var f = new Function(data.script);
                    f();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#alertDiv").hide().html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <h4 class="alert-heading margin-bottom-10"><i class="ti-close"></i> Error!</h4>  Something went wrong.</div>').show(500);
            }
        });
    e.preventDefault(); //STOP default action
    // e.unbind(); //unbind. to stop multiple form submit.
});
$(".ajax").click(function () {
    var functionName = $(this).data("ajaxfunction");
    var functionArgument = $(this).data("ajaxdata");
    window[functionName](functionArgument);
});

function datePickerHandler() {
    $('.datepicker').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: "yyyy-mm-dd"
    });
};
function maskInputHandler() {
    $.mask.definitions['~'] = '[+-]';
    $('.input-mask-date').mask('9999-99-99');
    $('.input-mask-phone').mask('99 999 999');
    $('.input-mask-rib').mask('99 999 9999 999 999999 99');
    $(".input-mask-product").mask("a*-999-a999", {
        placeholder: " ",
        completed: function () {
            alert("You typed the following: " + this.val());
        }
    });
};

function select2() {
    $(".fw-select2").each(function () {
            var module = $(this).data("ajaxmodule");
            $(this).select2({
                    ajax: {
                        url: "ajax.php",
                        dataType: 'json',
                        type: "POST",
                        delay: 250,
                        data: function (params) {
                            return {
                                q: params.term, // search term
                                module: module,
                                action: "formSelect"
                            };
                        },
                        cache: false
                    },
                    minimumInputLength: 1
                }
            );
        }
    );

};

function ckeditorRtl() {
    $(".ckeditor").each(function () {
            if ($(this).prop("dir") == "rtl")
                $(this).ckeditor({contentsLangDirection: 'rtl'});
        }
    );
}

function treeTable() {
    $(".treetable").each(function () {
            $(this).treetable(
                {
                    expandable: true
                }
            );
        }
    );
}

function tagit(){
    $('.tagit').tagit({
        singleFieldDelimiter:"|"
    });
}


function formrib() {
    $(".input-mask-rib").on("keypress", function (e) {
            var btn = $(this).find("input[type=submit]:focus").attr("name");
            var postData = $(this).serializeArray();
            postData.push({name: "btn", value: btn});
            postData.push({name: "module", value: "banquecompte"});
            postData.push({name: "action", value: "checkRib"});
            var formURL = "ajax.php";
            $.ajax(
                {
                    url: formURL,
                    type: "POST",
                    data: postData,
                    dataType: 'json',
                    success: function (data) {
                        var caller = e.target.id;
                        $("#" + caller + "_status").html(data.message);
                        if (data.script) {
                            var f = new Function(data.script);
                            f();
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        $("#alertDiv").hide().html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <strong>Error!</strong> Something went wrong.</div>').show(500);
                    }
                });
        }
    );

};
$(
    function () {
        datePickerHandler();
        maskInputHandler();
        select2();
        formrib();
        treeTable();
        ckeditorRtl();
        tagit();

        $("#article_language").change(
            function () {
                var dir = "";
                var invDir = "";
                if ($(this).val() == "AR") {
                    dir = "rtl";
                    invDir = "ltr";
                } else {
                    dir = "ltr";
                    invDir = "rtl";
                }
                $("*[dir='" + invDir + "']").prop("dir", dir);

                if (typeof CKEDITOR != 'undefined') {
                        $.each(CKEDITOR.instances, function (index, instance) {
                            instance.destroy();
                        });
                }

                $(".ckeditor").each(function () {
                        $(this).ckeditor({contentsLangDirection: dir});
                    }
                );
            }
        );
    }
);

