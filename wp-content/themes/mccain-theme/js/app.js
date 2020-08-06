jQuery(document).ready(function($) {

    $('p#billing_first_name_field,p#billing_last_name_field').wrapAll('<div class="field-wrapper"></div>');
    $('.field-wrapper, p#billing_email_field, p#billing_phone_field, p#lunch_time_slot_field, p#dinner_time_slot_field').wrapAll('<div class="billing-wrapper"></div>');

    var openMiday = "12:00:00";
    var closeMiday = "15:00:00";
    var openNoon = "19:00:00";
    var closeNoon = "22:30:00";
    var closeDay = "23:59:59";

    $('.woocommerce-billing-fields h3').first().text('Fatturazione & Spedizione');

    function timeToSeconds(time) {
        time = time.split(/:/);
        return time[0] * 3600 + time[1] * 60 + time[2];
    }

    var dt = new Date();
    var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();

    if(timeToSeconds(time) < timeToSeconds(closeDay) && timeToSeconds(time) > timeToSeconds(closeNoon)){
        $('p#lunch_time_slot_field').addClass('show-elem');
    }

    if( timeToSeconds(time) < timeToSeconds(openMiday)){
        $('p#lunch_time_slot_field').addClass('show-elem');
    }

    if( timeToSeconds(time) < timeToSeconds(openNoon) && timeToSeconds(time) >  timeToSeconds(closeMiday) ){
        $('p#dinner_time_slot_field').addClass('show-elem');
    }

    $('p#billing_address_1_field,p#billing_city_field, p#billing_postcode_field, p#billing_apartament_nr_field').wrapAll('<div class="shipping-wrapper-fields"></div>');
    $('h3#addres_headding_field,.shipping-wrapper-fields').wrapAll('<div class="shipping-wrapper"></div>');

});