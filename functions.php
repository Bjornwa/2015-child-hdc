<?php

add_action( 'wp_enqueue_scripts', 'twenty_fifteen_child_enqueue_styles');
function twenty_fifteen_child_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

add_filter('widget_text', 'do_shortcode');

add_filter('gettext', 'remove_classifier_words', 20, 3);
function remove_classifier_words( $translated_text, $untranslated_text, $domain ) {

    $custom_field_text = 'Tag: %s';
    if ( !is_admin() && $untranslated_text === $custom_field_text ) {
        return '%s';
    }

    $custom_field_text = 'Category: %s';
    if ( !is_admin() && $untranslated_text === $custom_field_text ) {
        return '%s';
    }

    return $translated_text;
}