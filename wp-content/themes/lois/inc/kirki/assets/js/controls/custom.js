jQuery( window ).ready( function( $ ){

    if ( typeof lois_customizer_settings !== "undefined" ) {
        if (lois_customizer_settings.number_action > 0) {
            $('.control-section-themes h3.accordion-section-title').append('<a class="theme-action-count" href="' + lois_customizer_settings.action_url + '">' + lois_customizer_settings.number_action + '</a>');
        }
        if ( lois_customizer_settings.is_plus_activated !== 'y' ) {
            $('#customize-info .accordion-section-title').append('<a target="_blank" style="text-transform: uppercase; background: #D54E21; color: #fff; font-size: 10px; line-height: 14px; padding: 2px 5px; display: inline-block;" href="https://www.famethemes.com/plugins/onepress-plus/?utm_source=theme_customizer&utm_medium=text_link&utm_campaign=onepress_customizer#get-started">Upgrade to OnePress plus</a>');
            $( '#accordion-section-onepress_order_styling > .accordion-section-title').append( '<span class="onepress-notice">Plus</span>' );
        }
    }