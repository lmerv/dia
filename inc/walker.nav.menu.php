<?php

class Ananke_Walker extends Walker_Nav_Menu {
  function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
    $object = $item->object;
    $type = $item->type;
    $title = $item->title;
    // $description = $item->description; On n'utilise pas de description
    $permalink = $item->url;

    $output .= "<li>"; // on peut rajouter la class par défaut : class='" .  implode(" ", $item->classes) . "'
    
    if( $permalink && $permalink != '#' ) { // on rajoute un span à la place du lien si #
      $output .= '<a href="' . $permalink . '">';
    } else {
      $output .= '<span aria-expanded="false">';
    }
     
    $output .= $title;

    // if( $description != '' && $depth == 0 ) {
    //   $output .= '<small class="description">' . $description . '</small>';
    // }

    if( $permalink && $permalink != '#' ) {
      $output .= '</a>';
    } else {
      $output .= '</span>';
    }
  }
}
