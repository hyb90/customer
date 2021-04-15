$(document).ready(function () {
    // Initialize select2
    $(".search-select").select2();
});

function regionclick(thisElement) {
    elem = $(thisElement).find(':selected');
    lvl = $(elem).data('lvl');
    edit_del(lvl);
    $('#myModal' + lvl).css('display', 'block');
    $('#myModal' + lvl).css('display', '');
    $.ajax({
        url: 'api/regionbyparent-level/' + (lvl + 1) + '/' + $(elem).data('id'),
        data: {},
        success: function (responseText) {
            $('#lvl' + (lvl + 1)).html(responseText);
            $('.search-select').select2();
        }
    });
}

function edit_del(lvl) {
    $('#myModalEdit' + lvl).find("input[name='id']").val($(elem).data('id'));
    $('#myModalEdit' + lvl).find("input[name='description']").val($(elem).data('description'));
    $('#myModalEdit' + lvl).find("input[name='is_verified_from_us']").val('1');
    $('#myModalEdit' + lvl).find("input[name='parent_region_id']").val($(elem).data('parent_region_id'));
    $('#myModalEdit' + lvl).find("input[name='region_name_ar']").val($(elem).data('region_name_ar'));
    $('#myModalEdit' + lvl).find("input[name='region_name_en']").val($(elem).data('region_name_en'));
    $('#myModalEdit' + lvl).find("input[name='region_type_id']").val($(elem).data('region_type_id'));
    $('#myModalEdit' + lvl).find("input[name='lat']").val($(elem).data('lat'));
    $('#myModalEdit' + lvl).find("input[name='long']").val($(elem).data('long'));

    $('#myModalEdit' + lvl).find("input[name='del_region_id']").attr('value', $(elem).data('id'));
}

function addregionclick(lvl) {
    $.ajax({
        url: 'api/addregion',
        data: {
            'lvl': lvl,
            'description': $('#myModalAdd' + lvl).find("input[name='description']").val(),
            'is_verified_from_us': $('#myModalAdd' + lvl).find("input[name='is_verified_from_us']").val(),
            'parent_region_id': $('#myModalAdd' + lvl).find("input[name='parent_region_id']").val(),
            'region_name_ar': $('#myModalAdd' + lvl).find("input[name='region_name_ar']").val(),
            'region_name_en': $('#myModalAdd' + lvl).find("input[name='region_name_en']").val(),
            'region_type_id': $('#myModalAdd' + lvl).find("input[name='region_type_id']").val(),
            'lat': $('#myModalAdd' + lvl).find("input[name='lat']").val(),
            'long': $('#myModalAdd' + lvl).find("input[name='long']").val(),
        },
        success: function (responseText) {
            $('#select' + lvl).append(responseText);
            $('.search-select').select2();
            $('#myModalAdd' + lvl).css('display', 'none')
        }
    });
}

function editregionclick(lvl) {
    $.ajax({
        url: 'api/editregion',
        data: {
            'description': $('#myModalEdit' + lvl).find("input[name='description']").val(),
            'region_name_ar': $('#myModalEdit' + lvl).find("input[name='region_name_ar']").val(),
            'region_name_en': $('#myModalEdit' + lvl).find("input[name='region_name_en']").val(),
            'lat': $('#myModalEdit' + lvl).find("input[name='temp_lat']").val(),
            'long': $('#myModalEdit' + lvl).find("input[name='temp_long']").val(),
            'id': $('#myModalEdit' + lvl).find("input[name='id']").val(),
        },
        success: function (responseText) {
            $('#lvl' + lvl).find("select[class='search-select']").find("option[data-id='" + responseText.json.id + "']").html(responseText.json.region_name_ar);
            $('#lvl' + lvl).find("select[class='search-select']").find("option[data-id='" + responseText.json.id + "']").attr('data-description', responseText.json.description);
            $('#lvl' + lvl).find("select[class='search-select']").find("option[data-id='" + responseText.json.id + "']").attr('data-region_name_ar', responseText.json.region_name_ar);
            $('#lvl' + lvl).find("select[class='search-select']").find("option[data-id='" + responseText.json.id + "']").attr('data-region_name_en', responseText.json.region_name_en);
            $('#lvl' + lvl).find("select[class='search-select']").find("option[data-id='" + responseText.json.id + "']").attr('data-lat', responseText.json.region_lat);
            $('#lvl' + lvl).find("select[class='search-select']").find("option[data-id='" + responseText.json.id + "']").attr('data-long', responseText.json.region_long);

            $('.search-select').select2();
            $('#myModalEdit' + lvl).css('display', 'none');
        }
    });
}

function delregionclick(lvl) {
    $.ajax({
        url: 'api/delregion',
        data: {
            'del_region_id': $('#myModalDel' + lvl).find("input[name='del_region_id']").val(),
        },
        success: function (responseText) {
            $('#lvl' + lvl).find("select[class='search-select']").find("option[data-id='" + $('#myModalDel' + lvl).find("input[name='del_region_id']").val() + "']").remove();
            var cond1 = false;
            var cond2 = false;
            $('.lvlContainer').each(function () {
                if (cond1) {
                    $(this).remove();
                } else if ('lvl' + lvl == $(this).attr('id')) {
                    cond1 = true;
                }
            });
            $('.search-select').select2();
            $('#myModalDel' + lvl).css('display', 'none');
            $('#myModal' + lvl).css('display', 'none');
        }
    });
}

function addregiontypeclick() {
    $.ajax({
        url: 'api/addregiontype',
        data: {
            'is_verified_from_us': $('#myModalAdd').find("input[name='is_verified_from_us']").val(),
            'region_type_name_ar': $('#myModalAdd').find("input[name='region_type_name_ar']").val(),
            'region_type_name_en': $('#myModalAdd').find("input[name='region_type_name_en']").val(),
        },
        success: function (responseText) {
            $('#select').append("<option data-id='" + responseText.json.id + "'>" + responseText.json.region_type_name_ar + "</option>");
            $('.search-select').select2();
            $('#myModalAdd').css('display', 'none');
        }
    });
}

function chooseregiontype(thisElement) {
    elem = $(thisElement).find(':selected')
    $('#region_id').attr('value', $(elem).data('id'));
}

function delregiontypeclick() {
    $.ajax({
        url: 'api/delregiontype',
        data: {
            'del_region_id': $('#myModalDel').find("input[id='region_id']").val(),
        },
        success: function (responseText) {
            $('.search-select').find("option[data-id='" + $('#myModalDel').find("input[id='region_id']").val() + "']").remove();
            $('.search-select').select2();
            $('#myModalDel').css('display', 'none');
        }
    });
}
