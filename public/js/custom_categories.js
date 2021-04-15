$(document).ready(function () {
    // Initialize select2
    $(".search-select").select2();
});

function choose_soncat(thisElement) {
    elem = $(thisElement).find(':selected');
    if ($(elem).val() == 0) {
        $('#son_id').attr('value', '');
        $('#myModal').css('display', 'none');
    } else {
        $('#son_id').attr('value', $(elem).data('id'));
        editinfo(elem);
        $('#myModal').css('display', '');
        $.ajax({
            url: 'api/categoryparents/' + $(elem).data('id'),
            data: {},
            success: function (responseText) {
                html = '';
                for(i=0;i<responseText.json.length;i++){
                    html += '<div style="float: left" id="rel'+responseText.json[i].id+$(elem).data('id')+'"><input style="float: left" type="button" value="Del Parent" onclick="rem_rel('+responseText.json[i].id+','+$(elem).data('id')+')"><p style="float: left">'+JSON.stringify(responseText.json[i].category_name_en)+'</p></div>'
                }
                $('#parent_categories').html(html);
            }
        });
    }
}

function rem_rel(parent,son) {
    $.ajax({
        url: 'api/rem-parent',
        data: {
            son_id: son,
            parent_id: parent
        },
        success: function (responseText) {
            $('#rel'+parent+son).remove();
        }
    });
}

function choose_parentcat(thisElement) {
    elem = $(thisElement).find(':selected');
    if ($(elem).val() == 0) {
        $('#parent_id').attr('value', '');
    } else {
        $('#parent_id').attr('value', $(elem).data('id'));
    }
}

function set_parentcat() {
    if ($('#son_id').attr('value').length > 0 && $('#parent_id').attr('value').length > 0) {
        $.ajax({
            url: 'api/add-parent',
            data: {
                son_id: $('#son_id').attr('value'),
                parent_id: $('#parent_id').attr('value')
            },
            success: function (responseText) {
                $('#parent_categories').append(responseText.json);
            }
        });
    } else {
        alert('choose category and category parent');
    }
}

function editinfo(thisElem) {
    $('#myModalEdit').find("input[name='id']").attr('value', $(thisElem).data('id'));
    $('#myModalEdit').find("input[name='category_name_ar']").attr('value', $(thisElem).data('category_name_ar'));
    $('#myModalEdit').find("input[name='category_name_en']").attr('value', $(thisElem).data('category_name_en'));
    $('#myModalEdit').find("input[name='photo_path']").attr('value', $(thisElem).data('photo_path'));

    $('#myModalEdit').find("input[name='pc_site_photo']").attr('value', $(thisElem).data('pc_site_photo'));
    $('#myModalEdit').find("input[name='tabe_site_photo']").attr('value', $(thisElem).data('tabe_site_photo'));
    $('#myModalEdit').find("input[name='mobile_site_photo']").attr('value', $(thisElem).data('mobile_site_photo'));

    $('#myModalEdit').find("input[name='size1_site_photo']").attr('value', $(thisElem).data('size1_site_photo'));
    $('#myModalEdit').find("input[name='size2_site_photo']").attr('value', $(thisElem).data('size2_site_photo'));
    $('#myModalEdit').find("input[name='size3_site_photo']").attr('value', $(thisElem).data('size3_site_photo'));
    $('#myModalEdit').find("input[name='size4_site_photo']").attr('value', $(thisElem).data('size4_site_photo'));
    $('#myModalEdit').find("input[name='size5_site_photo']").attr('value', $(thisElem).data('size5_site_photo'));
    $('#myModalEdit').find("input[name='size6_site_photo']").attr('value', $(thisElem).data('size6_site_photo'));

    $('#myModalEdit').find("img[name='img_photo_path']").attr('src', $(thisElem).data('photo_path'));

    $('#myModalEdit').find("img[name='img_pc_site_photo']").attr('src', $(thisElem).data('pc_site_photo'));
    $('#myModalEdit').find("img[name='img_tabe_site_photo']").attr('src', $(thisElem).data('tabe_site_photo'));
    $('#myModalEdit').find("img[name='img_mobile_site_photo']").attr('src', $(thisElem).data('mobile_site_photo'));

    $('#myModalEdit').find("img[name='img_size1_site_photo']").attr('src', $(thisElem).data('size1_site_photo'));
    $('#myModalEdit').find("img[name='img_size2_site_photo']").attr('src', $(thisElem).data('size2_site_photo'));
    $('#myModalEdit').find("img[name='img_size3_site_photo']").attr('src', $(thisElem).data('size3_site_photo'));
    $('#myModalEdit').find("img[name='img_size4_site_photo']").attr('src', $(thisElem).data('size4_site_photo'));
    $('#myModalEdit').find("img[name='img_size5_site_photo']").attr('src', $(thisElem).data('size5_site_photo'));
    $('#myModalEdit').find("img[name='img_size6_site_photo']").attr('src', $(thisElem).data('size6_site_photo'));


    $('#myModalEdit').find("input[name='show_pages']").attr('value', $(thisElem).data('show_pages'));
    $('#myModalEdit').find("input[name='max_price_new']").attr('value', $(thisElem).data('max_price_new'));
    $('#myModalEdit').find("input[name='min_price_new']").attr('value', $(thisElem).data('min_price_new'));
    $('#myModalEdit').find("input[name='max_price_old']").attr('value', $(thisElem).data('max_price_old'));
    $('#myModalEdit').find("input[name='min_price_old']").attr('value', $(thisElem).data('min_price_old'));

    $('#myModalDel'  ).find("input[name='choosen_cattype_id']").attr('value', $(elem).data('id'));
}

function addcategoryclick() {
    $.ajax({
        url: 'api/addcategory',
        data: {
            'category_name_ar': $('#myModalAdd').find("input[name='category_name_ar']").val(),
            'category_name_en': $('#myModalAdd').find("input[name='category_name_en']").val(),
            'parent_category_id': $('#myModalAdd').find("input[name='parent_category_id']").val(),
            'photo_path': $('#myModalAdd').find("input[name='photo_path']").val(),
            'show_pages': $('#myModalAdd').find("input[name='show_pages']").val(),
            'tabe_site_photo': $('#myModalEdit').find("input[name='tabe_site_photo']").val(),
            'mobile_site_photo': $('#myModalEdit').find("input[name='mobile_site_photo']").val(),
            'pc_site_photo': $('#myModalEdit').find("input[name='pc_site_photo']").val(),
            'size1_site_photo': $('#myModalEdit').find("input[name='size1_site_photo']").val(),
            'size2_site_photo': $('#myModalEdit').find("input[name='size2_site_photo']").val(),
            'size3_site_photo': $('#myModalEdit').find("input[name='size3_site_photo']").val(),
            'size4_site_photo': $('#myModalEdit').find("input[name='size4_site_photo']").val(),
            'size5_site_photo': $('#myModalEdit').find("input[name='size5_site_photo']").val(),
            'size6_site_photo': $('#myModalEdit').find("input[name='size6_site_photo']").val(),

            'max_price_new': $('#myModalAdd').find("input[name='max_price_new']").val(),
            'min_price_new': $('#myModalAdd').find("input[name='min_price_new']").val(),
            'max_price_old': $('#myModalAdd').find("input[name='max_price_old']").val(),
            'min_price_old': $('#myModalAdd').find("input[name='min_price_old']").val()
        },
        success: function (responseText) {
            html = "<option";
            html += " data-id=" + responseText.json.id;
            html += " data-category_name_ar=" + responseText.json.category_name_ar;
            html += " data-category_name_en=" + responseText.json.category_name_en;
            html += " data-photo_path=" + responseText.json.photo_path;

            html += " data-show_pages=" + responseText.json.show_pages;

            html += " data-tabe_site_photo=" + responseText.json.tabe_site_photo;
            html += " data-mobile_site_photo=" + responseText.json.mobile_site_photo;
            html += " data-pc_site_photo=" + responseText.json.pc_site_photo;
            html += " data-size1_site_photo=" + responseText.json.size1_site_photo;
            html += " data-size2_site_photo=" + responseText.json.size2_site_photo;
            html += " data-size3_site_photo=" + responseText.json.size3_site_photo;
            html += " data-size4_site_photo=" + responseText.json.size4_site_photo;
            html += " data-size5_site_photo=" + responseText.json.size5_site_photo;
            html += " data-size6_site_photo=" + responseText.json.size6_site_photo;




            html += " data-max_price_new=" + responseText.json.max_price_new;
            html += " data-min_price_new=" + responseText.json.min_price_new;
            html += " data-max_price_old=" + responseText.json.max_price_old;
            html += " data-min_price_old=" + responseText.json.min_price_old + ">";
            html += responseText.json.category_name_en;
            html += "</option>";
            $('#son_select').append(html);
            $('#parent_select').append(html);
            $('.search-select').select2();
            $('#myModalAdd').css('display', 'none');
        }
    });
}

function editcatclick() {
    $.ajax({
        url: 'api/editcategory',
        data: {
            'id': $('#myModalEdit').find("input[name='id']").val(),
            'category_name_ar': $('#myModalEdit').find("input[name='category_name_ar']").val(),
            'category_name_en': $('#myModalEdit').find("input[name='category_name_en']").val(),
            'photo_path': $('#myModalEdit').find("input[name='photo_path']").val(),
            'show_pages': $('#myModalEdit').find("input[name='show_pages']").val(),

            'tabe_site_photo': $('#myModalEdit').find("input[name='tabe_site_photo']").val(),
            'mobile_site_photo': $('#myModalEdit').find("input[name='mobile_site_photo']").val(),
            'pc_site_photo': $('#myModalEdit').find("input[name='pc_site_photo']").val(),
            'size1_site_photo': $('#myModalEdit').find("input[name='size1_site_photo']").val(),
            'size2_site_photo': $('#myModalEdit').find("input[name='size2_site_photo']").val(),
            'size3_site_photo': $('#myModalEdit').find("input[name='size3_site_photo']").val(),
            'size4_site_photo': $('#myModalEdit').find("input[name='size4_site_photo']").val(),
            'size5_site_photo': $('#myModalEdit').find("input[name='size5_site_photo']").val(),
            'size6_site_photo': $('#myModalEdit').find("input[name='size6_site_photo']").val(),


            'max_price_new': $('#myModalEdit').find("input[name='max_price_new']").val(),
            'min_price_new': $('#myModalEdit').find("input[name='min_price_new']").val(),
            'max_price_old': $('#myModalEdit').find("input[name='max_price_old']").val(),
            'min_price_old': $('#myModalEdit').find("input[name='min_price_old']").val()
        },
        success: function (responseText) {
            $('#son_select').find("option[data-id='" + responseText.json.id + "']").html(responseText.json.category_name_en);
            $('#son_select').find("option[data-id='" + responseText.json.id + "']").attr('data-category_name_ar', responseText.json.category_name_ar);
            $('#son_select').find("option[data-id='" + responseText.json.id + "']").attr('data-category_name_en', responseText.json.category_name_en);
            $('#son_select').find("option[data-id='" + responseText.json.id + "']").attr('data-photo_path', responseText.json.photo_path);
            $('#son_select').find("option[data-id='" + responseText.json.id + "']").attr('data-show_pages', responseText.json.show_pages);

            $('#son_select').find("option[data-id='" + responseText.json.id + "']").attr('data-tabe_site_photo', responseText.json.tabe_site_photo);
            $('#son_select').find("option[data-id='" + responseText.json.id + "']").attr('data-mobile_site_photo', responseText.json.mobile_site_photo);
            $('#son_select').find("option[data-id='" + responseText.json.id + "']").attr('data-pc_site_photo', responseText.json.pc_site_photo);
            $('#son_select').find("option[data-id='" + responseText.json.id + "']").attr('data-size1_site_photo', responseText.json.size1_site_photo);
            $('#son_select').find("option[data-id='" + responseText.json.id + "']").attr('data-size2_site_photo', responseText.json.size2_site_photo);
            $('#son_select').find("option[data-id='" + responseText.json.id + "']").attr('data-size3_site_photo', responseText.json.size3_site_photo);
            $('#son_select').find("option[data-id='" + responseText.json.id + "']").attr('data-size4_site_photo', responseText.json.size4_site_photo);
            $('#son_select').find("option[data-id='" + responseText.json.id + "']").attr('data-size5_site_photo', responseText.json.size5_site_photo);
            $('#son_select').find("option[data-id='" + responseText.json.id + "']").attr('data-size6_site_photo', responseText.json.size6_site_photo);


            $('#son_select').find("option[data-id='" + responseText.json.id + "']").attr('data-max_price_new', responseText.json.max_price_new);
            $('#son_select').find("option[data-id='" + responseText.json.id + "']").attr('data-min_price_new', responseText.json.min_price_new);
            $('#son_select').find("option[data-id='" + responseText.json.id + "']").attr('data-max_price_old', responseText.json.max_price_old);
            $('#son_select').find("option[data-id='" + responseText.json.id + "']").attr('data-min_price_old', responseText.json.min_price_old);

            $('#parent_select').find("option[data-id='" + responseText.json.id + "']").html(responseText.json.category_name_en);
            $('.search-select').select2();
            $('#myModalEdit').css('display', 'none');
        }
    });
}

function delcatclick() {
    $.ajax({
        url: 'api/deletecategory',
        data: {
            'del_category_id':     $('#myModalDel'  ).find("input[name='choosen_cattype_id']").attr('value'),
        },
        success: function (responseText) {
            $('#son_select').find("option[data-id='" + $('#son_select').attr('value') + "']").remove();
            $('#parent_select').find("option[data-id='" + $('#parent_select').attr('value') + "']").remove();
            $('.search-select').select2();
            $('#myModalDel').css('display', 'none');
            location.reload();
        }
    });
}


