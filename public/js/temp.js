$('.selectpicker').change(function() {
    elem = $(this).find(':selected');
    var nextlevel =  $(elem).data('level')+1;
    window.regions = [$(elem).data('id')];
    window.maxlevel = $(elem).data('maxlevel');
    $.ajax({
        url: 'api/regionbyparent-level/' + nextlevel + '/' + $(elem).data('id'),
        data: {},
        success: function (responseText) {
            $('#level_' + nextlevel).html(responseText);
            $('#level_' + nextlevel).css('display','');
            $('.selectpicker').selectpicker('refresh');
            $(document).ready(function() {
                init()
            });
        }
    });
});

function init(){
    $('.selectpicker').change(function() {
        elem = $(this).find(':selected');
        var nextlevel =  $(elem).data('level')+1;
        for(i=0;i<window.regions.length;i++){
            if(window.regions[$(elem).data('level')-1]>0){
                window.regions.pop();
            }
        }
        // console.log('before'+window.regions.length);
        window.regions.push($(elem).data('id'));
        for(i=window.regions.length+2;i<=maxlevel;i++){
            $('#level_' + i).css('display','none');
        }
        $.ajax({
            url: 'api/regionbyparent-level/' + nextlevel + '/' + $(elem).data('id'),
            data: {},
            success: function (responseText) {
                $('#level_' + nextlevel).html(responseText);
                $('#level_' + nextlevel).css('display','');
                $('.selectpicker').selectpicker('refresh');
                $(document).ready(function() {
                    init()
                });
            }
        });
    });
}
