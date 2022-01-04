<?php
/**
 * Saves the custom meta input
 */
function events_meta_save( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'events_nonce' ] ) && wp_verify_nonce( $_POST[ 'events_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'events-name' ] ) ) {
        update_post_meta( $post_id, 'events-name', sanitize_text_field( $_POST[ 'events-name' ] ) );
    }
    if( isset( $_POST[ 'events-description' ] ) ) {
        update_post_meta( $post_id, 'events-description', sanitize_text_field( $_POST[ 'events-description' ] ) );
    }
    if( isset( $_POST[ 'events-day' ] ) ) {
        update_post_meta( $post_id, 'events-day', sanitize_text_field( $_POST[ 'events-day' ] ) );
    }
    if( isset( $_POST[ 'events-date' ] ) ) {
        update_post_meta( $post_id, 'events-date', sanitize_text_field( $_POST[ 'events-date' ] ) );
    }
    if( isset( $_POST[ 'events-date-full' ] ) ) {
        update_post_meta( $post_id, 'events-date-full', sanitize_text_field( $_POST[ 'events-date-full' ] ) );
    }
    // On rajoute liens internet pour Information et Inscription
    if( isset( $_POST[ 'events-linkInfo' ] ) ) {
      update_post_meta( $post_id, 'events-linkInfo', sanitize_text_field( $_POST[ 'events-linkInfo' ] ) );
    }
    if( isset( $_POST[ 'events-linkInsc' ] ) ) {
      update_post_meta( $post_id, 'events-linkInsc', sanitize_text_field( $_POST[ 'events-linkInsc' ] ) );
    }      

}
add_action( 'save_post', 'events_meta_save' );
