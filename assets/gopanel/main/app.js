/* Nofications Area */
toastr.options = {
    "closeButton": true,
    "debug": true,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": true,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}


function pageload(ttype=true,text='Gözləyin...') {
    if (ttype == 0) {
        $("#sehifeLoading").fadeOut(200, function() {
            $(this).remove();
        });
    } else {
        if ($("#sehifeLoading").length == 0) {
            $("body").append("<div id='sehifeLoading' style='position:fixed;top:0;left:0;width:100%;height:100%;z-index:999999999;background: rgba(0,0,0,0.4);'><div style='width: 100px; height: 40px; position: absolute; top: 0px; bottom: 0px; left: 0px; right: 0px; margin: auto; background: none repeat scroll 0% 0% rgb(238, 238, 238); text-align: center; line-height: 38px; border: 1px solid rgb(221, 221, 221); vertical-align: middle; border-radius: 5px ! important; color: rgb(131, 131, 131);'><i class='fa fa-spin'></i> "+text+"</div></div>");
            $("body>div:last").hide().fadeIn(200);
        }
    }
}

/*  Tagsinput */
$(document).ready(function() {
    $('.tags').tagsInput({
        width: 'auto'
    });
});

function bytesToSize(bytes, decimals) {
    if (bytes == 0) return '0 Bytes';
    var k = 1024,
        dm = decimals <= 0 ? 0 : decimals || 2,
        sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'],
        i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
}


function control_type(input) {
    var val = input.val().toLowerCase(),
        regex = new RegExp("(.*?)\.(docx|doc|pdf|xml|bmp|ppt|xls|xlsx|zip|rar|jpeg|jpg|png|dwg|dwgx|pln|pla|dxf)$");

    if (!(regex.test(val))) {
        $(this).val('');
        return false;
    } else {
        return true;
    }
}

function clearForm() {
    $("input").val("");
    $('option').removeAttr("selected");
    // $('option:selected', this).remove();
}







function loader(show) {
    if (show == true) {
        $(".loaddiv").css("display", "block");
    } else {
        $(".loaddiv").css("display", "none");
    }
}



$("body").on("click", "#show-password", function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});


/* Password show function area */

$('body').on('submit', '#login', function(e) {
    e.preventDefault();
    loader(true);
    var form = $("#login");
    $.ajax({
        type: "post",
        url: 'Auth/login_procces',
        data: form.serialize(),
        success: function(response) {
            loader(false);
            var data = JSON.parse(response);
            if (data.status == 'success') {
                toastr["success"](data.msg);
                location.reload();
            } else {
                toastr["error"](data.msg);
            }
        },
        error: function(err) {
            Swal.fire({
                title: 'Sistem Xətası!',
                html: 'Sistem Xətası baş verdi zəhmət olmasa sistem adminstratru ilə əlaqə saxlayın!',
                type: 'error'
            });
        }
    });
    return false;
});



// Status change function
$("body").on('change', '.status', function() {
    var status = $(this).prop('checked');
    var table = $(this).attr("dataTable");
    var dataid = $(this).attr("dataID");
    var dataROW = $(this).attr("dataROW");
    $.ajax({
        type: "post",
        url: '/gopanel/process/status/',
        data: { id: dataid, status: status, table: table, dataROW: dataROW },
        success: function(response) {
            var data = JSON.parse(response);
            Swal.fire({
                title: data.title,
                html: data.msg,
                type: data.status
            });
        },
        error: function(err) {
            Swal.fire({
                title: 'Sistem Xətası!',
                html: 'Sistem Xətası baş verdi zəhmət olmasa sistem adminstratru ilə əlaqə saxlayın!',
                type: 'error'
            });
        }
    });
});
// Status change function end

// delete function

$('body').on('click', '.delete', function() {
    var table = $(this).attr('table_name');
    var id = $(this).attr('unit_id');
    var that = $(this);
    Swal.fire({
        title: "Silinsin ?",
        text: "Silmək istədiyinizdən əminsiniz? Bu məlumat geri qaytarılmaya bilər",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '<i class="fas fa-check-circle"></i> Bəli',
        cancelButtonText: '<i class="far fa-times-circle"></i> Xeyr',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            $.post('/gopanel/process/delete/', { id: id, table: table }, function(data) {
                if (data == 1) {
                    Swal.fire({
                        type: "success",
                        title: "Uğurlu Əməliyyat",
                        html: "Məlumat uğurla silindi",
                        confirmButtonText: '<i class="fas fa-check-circle"><i/> OK',
                    }).then((value) => {
                        that.parent('div').parent('td').parent('tr').hide(300);
                    });
                }
            });
        } else {

        }
    });

    return false;
});
// delete function end


$("body").on("click", ".icon-demo-content i", function() {
    var icon = this.className;
    icon = icon.replace("fab", "fa");
    $('input[name="icon"]').val(icon);
    $(".select_icon").html('Seçdiyiniz ikon : <i class="' + this.className + '">');
    $("#iconSocial").modal("hide");
});


$(function() {
    $(".sortable").sortable();
    $(".sortable").disableSelection();
});


$(function() {
    $(".sortableIcon").sortable({
        handle: "td.sort-td",
        axis: "y"
    });
    // $(".sortable").disableSelection();
});


$("#sortable").on("sortupdate", function(event, ui) {
    var data = $(this).sortable("serialize");
    var table = $(this).data("table");
    var ajaxurl = "/gopanel/process/sortable/"
    $.post(ajaxurl, { data: data, table: table }, function(response) {
        if (response === 0) {
            Swal.fire({
                title: 'Sistem Xətası!',
                html: 'Sistem Xətası baş verdi zəhmət olmasa sistem adminstratru ilə əlaqə saxlayın!',
                type: 'error'
            });
        } else {
            Swal.fire({
                title: 'Uğurlu Əməliyyat!',
                html: 'Məlumatlar uğurla dəyişdirildi!',
                type: 'success'
            });
        }
    });
});



// Gallery js

var imageList = [];

function show_btn_delete() {
    var checkboxes = $('input:checkbox').filter(':checked').length;
    if (checkboxes > 0) {
        $("#deleteAll").addClass("showBtn");
    } else {
        $("#deleteAll").removeClass("showBtn");
        // $("#imageList").val("");
    }
}

$(".checkAll").click(function() {
    $('input:checkbox').not(this).prop('checked', this.checked);
});

$("body").on("change", ".chekimage", function(e) {
    show_btn_delete();
});

$("body").on("change", ".checkAll", function(e) {
    // e.preventDefault();
    show_btn_delete();
});



$("body").on("click", "#deleteAll", function(e) {
    e.preventDefault();
    var delete_id = $(".chekimage").serialize();
    if (delete_id.length > 2) {
        Swal.fire({
            title: "Silinsin ?",
            text: "Seçilənləri silmək istədiyinizdən əminsiniz? Bu məlumat geri qaytarılmaya bilər",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '<i class="fas fa-check-circle"></i> Bəli',
            cancelButtonText: '<i class="far fa-times-circle"></i> Xeyr',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "post",
                    url: '/gopanel/gallery/deleteall/',
                    data: $(".chekimage").serialize(),
                    success: function(response) {
                        console.log(response)
                        var data = JSON.parse(response);
                        var d = data.deleted;
                        if (data.status != "") {
                            Swal.fire({
                                type: data.status,
                                title: data.title,
                                html: data.msg,
                                confirmButtonText: "Anladım",
                            }).then((result) => {
                                d.forEach(function(entry) {
                                    $("#img_" + entry).hide(350);
                                });
                            });
                        }
                    },
                    error: function(err) {
                        alert("Xəta Baş verdi");
                    }
                });
            } else {

            }
        });
    } else {
        Swal.fire({
            type: "error",
            title: "Xəta",
            html: "Sistem Xətası baş verdi zəhmət olmasa yenidən yoxlayın",
            confirmButtonText: "Anladım",
        })
    }
});

$('body').on('click', '.deleteImg', function() {
    var table = $(this).attr('table_name');
    var id = $(this).attr('unit_id');
    var that = $(this);
    Swal.fire({
        title: "Silinsin ?",
        text: "Silmək istədiyinizdən əminsiniz? Bu məlumat geri qaytarılmaya bilər",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '<i class="fas fa-check-circle"></i> Bəli',
        cancelButtonText: '<i class="far fa-times-circle"></i> Xeyr',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            $.post('/gopanel/gallery/delete/', { id: id, table: table }, function(data) {
                if (data > 1) {
                    Swal.fire({
                        type: "success",
                        title: "Uğurlu Əməliyyat",
                        html: "Məlumat uğurla silindi",
                        confirmButtonText: '<i class="fas fa-check-circle"><i/> OK',
                    }).then((value) => {
                        $("#img_" + data).hide(300);
                    });
                }
            });
        } else {

        }
    });

    return false;
});
// delete function end




$("body").on("change", ".parametr_types", function(e) {
    var type = $(this).val();
    if (type == 2) {
        $(".type_2").show();

    } else {
        $(".type_2").hide();
    }
});


$("body").on("click", ".color_panel_on", function(e) {
    e.preventDefault();
    $(".input-group-append").show();
    $(".colorpicker_p").colorpicker({ format: "hex" });
    return false;
});


$("body").on("click", ".copy_product", function(e) {
    e.preventDefault();
    var thiss = $(this);
    var id = $(this).attr("unit_id");
    $.ajax({
        type: "post",
        url: '/gopanel/product_translate/copy/',
        data: { id: id },
        success: function(response) {
            var data = JSON.parse(response);
            if (data.status != "") {
                Swal.fire({
                    type: data.status,
                    title: data.title,
                    html: data.msg,
                    confirmButtonText: "Anladım",
                }).then((result) => {
                    thiss.parents("tbody").append(data.trasnlate);
                });
            }
        },
        error: function(err) {
            alert("Xəta Baş verdi");
        }
    });
    return false;
});


$("body").on("change", ".parametrs", function(e) {
    e.preventDefault();
    var id = $(this).val();
    var thiss = $(this);
    var div = $(".parametr_values_div");
    var select = $(".parametr_values");
    select.html("");
    div.hide();
    $.ajax({
        type: "post",
        url: '/gopanel/product_parametr/get_parametr_values/',
        data: { id: id },
        success: function(response) {
            var data = JSON.parse(response);
            if (data.status != "" && data.status == 'success') {
                // parametr_values
                var values = data.parametrs;
                var options = '<option value="">Parametir Başlıqı seçin</option>';
                values.forEach(function(entry) {
                    options += '<option value="' + entry.id + '">' + entry.title_az + '</option>';
                });
                select.html(options);
                div.show()
            } else {
                Swal.fire({
                    type: data.status,
                    title: data.title,
                    html: data.msg,
                    confirmButtonText: "Anladım",
                });
            }
        },
        error: function(err) {
            alert("Xəta Baş verdi");
        }
    });
    return false;
});



$("body").on("change", ".banner_positons", function() {
    var position = $(this).val();
    if (position == 1 || position == 2) {
        $(".pimg").text("Ölçü 750 x 610");
    } else if (position == 3 || position == 4) {
        $(".pimg").text("Ölçü 250 x 460");
    }
});


$("body").on("change", ".mobile", function() {
    var position = $(this).val();
    if (position == 1) {
        $(".imgnotfiy").text("Ölçü 610 x 300");
        Swal.fire({
            title: 'Məlumatlandırma',
            html: 'Mobil üçün şəkilin ölçüsü <b>610 x 300</b> olmalıdır',
            type: 'info'
        });

    } else {
        $(".imgnotfiy").text("Ölçü 830 x 460");
        Swal.fire({
            title: 'Məlumatlandırma',
            html: 'Veb üçün şəkilin ölçüsü <b>830 x 460</b> olmalıdır',
            type: 'info'
        });
    }
});


function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}


$("body").on("click", ".get_parent", function(e) {
    e.preventDefault();
    var parent = $(this).attr("parent");
    if (parent > 0) {
        $.ajax({
            type: "post",
            url: '/gopanel/parametr_products/get_product_values/',
            data: { parent: parent },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status == 'success') {
                    var product = data.product;
                    for (var i in product) {
                        var value = product[i];
                        // if (i == 'slug') {
                        //   value = value + '-' + getRandomInt(0, 999999999999);
                        // }
                        $("input[name='" + i + "']").val(value);
                    }
                }

            },
            error: function(err) {
                Swal.fire({
                    type: "error",
                    title: "Sistem Xətası",
                    html: "Sistem xətası baş verdi zəhmət olmasa sayt administartsiyası ilə əlaqə saxlayın",
                    confirmButtonText: "Anladım",
                });
            }
        });
    } else {
        Swal.fire({
            type: "error",
            title: "Sistem Xətası",
            html: "Sistem xətası baş verdi zəhmət olmasa sayt administartsiyası ilə əlaqə saxlayın",
            confirmButtonText: "Anladım",
        });
    }
    return false;
});;

$(document).ready(function() {
    var size = $("#position option:selected").attr("data-id");
    $('.size_for_position').text(size);

    $("#position").change(function() {
        var size = $("select option:selected").attr("data-id");
        $('.size_for_position').text(size);
    });
});