<?php

include_once 'events/init.php';
include_once 'events/template.php';
include_once 'events/save.php';

add_action( 'add_meta_boxes', 'events_custom_meta' );
