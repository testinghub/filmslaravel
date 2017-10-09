jQuery(document).ready(function() {
    jQuery('video').mediaelementplayer({
        alwaysShowControls: true,
        videoVolume: 'horizontal',
        features: ['playpause','progress','volume','fullscreen']
    });

    jQuery('#mask').on('click', function () {
        if(jQuery('div[class=mask]').css('display') > 'none'){
            jQuery('div[class=mask]').fadeIn(1000);
        }else {
            jQuery('div[class=mask]').fadeOut(1000);

        }
    });
    jQuery('#film').addClass('act');
    jQuery('#film').on('click', function () {
        if(jQuery('#mep_0').css('display') > 'none'){
            jQuery('#mep_0').show();
            jQuery('#prev').hide();
            jQuery('#film').addClass('act');
            jQuery('#previve').removeClass('act');
        }
    });
    jQuery('#previve').on('click', function () {
        if(jQuery('#prev').css('display') > 'none') {
            jQuery('#mep_0').hide();
            jQuery('#prev').show();
            jQuery('#film').removeClass('act');
            jQuery('#previve').addClass('act');
        }
    });
});