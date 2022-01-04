<?php
/**
 * Adds a meta box to the post editing screen
 * source   :  https://themefoundation.com/wordpress-meta-boxes-guide/
 */
function events_custom_meta() {
    add_meta_box(
       'events_meta',
        __( 'Infos Evénements', 'events-textdomain' ),
         'events_meta_callback',
          'regates', // C'est ici que l'on indique le register posts
          'normal',
           'high'
        );
};
