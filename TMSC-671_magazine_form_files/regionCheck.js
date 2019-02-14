// JavaScript Document



$(function () {

    var data = $.cookie('cmsRegion');
    var data2 = $.cookie('cmsRegName');
    var data3 = $.cookie('cmsRegURL');

    //selector modal
    $('#checkRegion').on('click', '.modal-footer .btn-primary', function () {
        setRegionCookie('global', '#');
        $('#checkRegion').modal('hide');
    });

    $('#checkRegion').on('click', '.tab-content a', function () {
        setRegionCookie($(this).text(), $(this).attr('href'));

        location.href = $(this).attr('href');
        return false;
    });

    //confirm modal
    $('#checkRegion2').on('click', '.modal-footer .btn-primary', function () {
        setRegionCookie('global', '#');
        $('#checkRegion2').modal('hide');
    });

    $('#checkRegion2').on('click', '.tab-content a', function () {
        setRegionCookie($(this).text(), $(this).attr('href'));
        location.href = $(this).attr('href');
        return false;
    });

    //region selector
    $('#regionSelector').on('click', '.tab-content a', function () {
        setRegionCookie($(this).text(), $(this).attr('href'));
        location.href = $(this).attr('href');
        return false;
    });



    if (data != 'on') {
        $('#checkRegion').modal('show');
    } else {
        if (data2 != 'global' && data3 != 'https://global.medical.canon/') {
            $('#checkRegion2 .panel a').prop('href', data3);
            $('#checkRegion2 .panel a').text(data2);
            $('#checkRegion2').modal('show');
        } else {
            setRegionCookie('global', '#');
        }
    }

});

function setRegionCookie(_na, _u) {
    var date = new Date();
    date.setTime(date.getTime() + (90 * 24 * 60 * 60 * 1000));

    $.cookie('cmsRegion', 'on', { expires: date, path: '/' });
    $.cookie('cmsRegName', _na, { expires: date, path: '/' });
    $.cookie('cmsRegURL', _u, { expires: date, path: '/' });
}
