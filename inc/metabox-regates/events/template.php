<?php

/**
 * Outputs the content of the meta box
 */
function events_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'events_nonce' );
    $events_stored_meta = get_post_meta( $post->ID );
    ?>
    <div style="width: 100%,">
    <script>
      jQuery(function()
       {
          jQuery( ".datepicker" ).datepicker({
              dateFormat : "DD, dd/mm/yy",
              //altFormat: "dd/mm/yy",
              //altField: ".jour-courant",
              //$( ".date-courante" ).datepicker( "option", "altFormat", "yy-mm-dd" );

              onSelect: function(dateText, inst) 
              {
                  var day = dateText.split(",");

                  // source : http://jsfiddle.net/cnvwu/, date Format : DD, dd/mm/yy
                  $( ".jour-courant" ).html(function() 
                      {
                      var current_day = day[0];
                      return current_day;
                      });
                  $( ".date-courante" ).html(function() 
                      {
                      var current_day = day[1];
                      return current_day;
                      });
              }

          });
        });
    </script>
        <div style="width: 100%%; display: flex;  flex-wrap: wrap;">

            <div style="width: 100%; display: flex; flex-wrap: wrap; margin-bottom: 1rem;">
                <label style="flex: 0 1 auto; font-weight: bold;  vertical-align: middle;" for="events-name" ><?php _e( 'Nom de la régate', 'events-textdomain' )?></label>
                <input style="margin-left: 5%" name="events-name" id="events-name" value="<?php if ( isset ( $events_stored_meta['events-name'] ) ) echo $events_stored_meta['events-name'][0]; ?>" type="text" />
            </div>

            <div style="width: 100%; display: flex; flex-wrap: wrap; margin-bottom: 1rem;">
                <label style="flex: 0 1 auto; font-weight: bold; vertical-align: top;" for="events-description"><?php _e( 'Description de la régate', 'events-textdomain' )?></label>
                <textarea style="margin-left: 5%"  rows="5" cols="30" name="events-description" id="events-description" type="text" placeholder="description de l'évenement"><?php if ( isset ( $events_stored_meta['events-description'] ) ) echo $events_stored_meta['events-description'][0]; ?></textarea>
            </div>

            <div style="width: 100%; display: flex; flex-wrap: wrap; margin-bottom: 1rem">
                <label style="flex: 0 1 auto; font-weight: bold; vertical-align: top;" for="events-date"><?php _e( 'Choisir la date de la régate', 'events-textdomain' );?> </label><br />
                <input class="datepicker" style="margin-left: 5%"  name="events-date-full" id="events-date-full" value="<?php if ( isset ( $events_stored_meta['events-date-full'] ) ) echo $events_stored_meta['events-date-full'][0]; ?>" type="text"  placeholder="Choisir une date" />
            </div> 
               
            <div style="width: 100%; display: flex; flex-wrap: wrap; margin-bottom: 1rem;">
                <label style="flex: 0 1 auto; font-weight: bold;  vertical-align: middle;" for="events-linkInfo"><?php _e( 'Information', 'events-textdomain' )?></label>
                <input style="margin-left: 5%" name="events-linkInfo" id="events-linkInfo" value="<?php if ( isset ( $events_stored_meta['events-linkInfo'] ) ) echo $events_stored_meta['events-linkInfo'][0]; ?>"  type="text" />
            </div>
            <div style="width: 100%; display: flex; flex-wrap: wrap; margin-bottom: 1rem;">
                <label style="flex: 0 1 auto; font-weight: bold;  vertical-align: middle;" for="events-linkInsc"><?php _e( 'Inscription', 'events-textdomain' )?></label>
                <input style="margin-left: 5%" name="events-linkInsc" id="events-linkInsc" value="<?php if ( isset ( $events_stored_meta['events-linkInsc'] ) ) echo $events_stored_meta['events-linkInsc'][0]; ?>"  type="text"/>
            </div>

        </div>
    </div>
    <?php
};
