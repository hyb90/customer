function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie() {
    var username = getCookie("username");
    if (username != "") {
        alert("Welcome again " + username);
    } else {
        username = prompt("Please enter your name:", "");
        if (username != "" && username != null) {
            setCookie("username", username, 365);
        }
    }
}

function getManyResources(thisElement) {
    elem = thisElement;
    if ($('#area_' + $(elem).data('area')).html().length > 0) {
        $('#area_' + $(elem).data('area')).html('');
    } else {
        $('.info_area').each(function (i) {
            $(this).html('');
        });
        $.ajax({
            url: '' + $(elem).data('href'),
            data: {},
            success: function (responseText) {
                window.temp = "";
                for (i = 0; i < responseText.json.length; i++) {
                    temp += "<p>" + JSON.stringify(responseText.json[i]) + "</p>";
                }
                $('#area_' + $(elem).data('area')).html(temp);
            }
        });
    }
}

function getOneResourceWithAttr(thisElement, input_id) {
    elem = thisElement;

    if ($('#area_' + $(elem).data('area')).html().length > 0) {
        $('#area_' + $(elem).data('area')).html('');
    } else {
        $('.info_area').each(function (i) {
            $(this).html('');
        });
        $.ajax({
            url: '' + $(elem).data('href') + $('#' + input_id).val(),
            data: {},
            success: function (responseText) {
                $('#area_' + $(elem).data('area')).html("<p>" + JSON.stringify(responseText.json) + "</p>");
            }
        });
    }
}

function getManyResourcesWithAttr(thisElement, input_id) {
    elem = thisElement;

    if ($('#area_' + $(elem).data('area')).html().length > 0) {
        $('#area_' + $(elem).data('area')).html('');
    } else {
        $('.info_area').each(function (i) {
            $(this).html('');
        });
        $.ajax({
            url: '' + $(elem).data('href') + +$('#' + input_id).val(),
            data: {},
            success: function (responseText) {
                window.temp = "";
                for (i = 0; i < responseText.json.length; i++) {
                    temp += "<p>" + JSON.stringify(responseText.json[i]) + "</p>";
                }
                $('#area_' + $(elem).data('area')).html(temp);
            }
        });
    }
}


function getJsonResourcesWithAttr(thisElement, input_id) {
    elem = thisElement;
      input_value=$('#' + input_id ).val();
      href_value= $(elem).data('href');
      link=href_value+input_value;

     if ($('#area_' + $(elem).data('area')).html().length > 0) {
        $('#area_' + $(elem).data('area')).html('');

    } else {
        $('.info_area').each(function (i) {
            $(this).html('');

        });
        $.ajax({
            url:link,
            data: {},
            success: function (responseText) {



              $('#area_' + $(elem).data('area')).html(JSON.stringify( (responseText )));

            }
        });
    }

}
function getJsonResourcesWithBarrer( link, area_id,token_input_id) {
    token=$('#' + token_input_id ).val();
        $.ajax({
            url:link,
            headers: {
                'Authorization': 'Bearer '+token
            } ,
            data: {},
            success: function (responseText) {



                $('#area_' + area_id).html(JSON.stringify( (responseText )));

            }
        });
    }

