jQuery(document).ready(function($) {

    $('p#billing_first_name_field,p#billing_last_name_field').wrapAll('<div class="field-wrapper"></div>');
    $('.field-wrapper,p#billing_email_field,p#billing_phone_field').wrapAll('<div class="billing-wrapper"></div>');

    $('p#billing_address_1_field,p#billing_city_field, p#billing_postcode_field, p#billing_apartament_nr_field').wrapAll('<div class="shipping-wrapper-fields"></div>');
    $('h3#addres_headding_field,.shipping-wrapper-fields').wrapAll('<div class="shipping-wrapper"></div>');

});