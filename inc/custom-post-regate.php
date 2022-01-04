<?php
// Register Custom Post Type
function regates_post_type() {

	$labels = array(
		'name'                  => _x( 'Régates', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Les régates', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Régates', 'text_domain' ),
		'name_admin_bar'        => __( 'Régates', 'text_domain' ),
		'archives'              => __( 'Régates archivées', 'text_domain' ),
		'attributes'            => __( 'regates attributs', 'text_domain' ),
		'parent_item_colon'     => __( 'Régates Parentes:', 'text_domain' ),
		'all_items'             => __( 'Toutes les régates', 'text_domain' ),
		'add_new_item'          => __( 'Ajouter une régate', 'text_domain' ),
		'add_new'               => __( 'Ajouter', 'text_domain' ),
		'new_item'              => __( 'Nouvelle régate', 'text_domain' ),
		'edit_item'             => __( 'Editer la régate', 'text_domain' ),
		'update_item'           => __( 'Mettre à jour la régate', 'text_domain' ),
		'view_item'             => __( 'Voir la régate', 'text_domain' ),
		'view_items'            => __( 'Voir les régates', 'text_domain' ),
		'search_items'          => __( 'Chercher la régate', 'text_domain' ),
		'not_found'             => __( 'Pas trouvé', 'text_domain' ),
		'not_found_in_trash'    => __( 'Pas trouvé dans la poubelle', 'text_domain' ),
		'featured_image'        => __( 'Le thumbnail de la régate', 'text_domain' ),
		'set_featured_image'    => __( 'Mettre le thumbnail de la régate', 'text_domain' ),
		'remove_featured_image' => __( 'Enlever le thumbnail de la régate', 'text_domain' ),
		'use_featured_image'    => __( 'Utiliser uen image préexistante', 'text_domain' ),
		'insert_into_item'      => __( 'Insérer dans l\'article', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Télécharger cet article', 'text_domain' ),
		'items_list'            => __( 'Liste d\'articles', 'text_domain' ),
		'items_list_navigation' => __( 'Navigation sur la liste d\'articles', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrer la liste des articles', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Régates', 'text_domain' ),
		'description'           => __( 'Régates du CVL.', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions' ), // Important : editor pour gutenberg
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
    'show_in_menu'          => true,
    'show_in_rest'          => true, // Important ! pour genterg
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'menu_icon' 			      => 'dashicons-flag',
	);
	register_post_type( 'regates', $args );

}
add_action( 'init', 'regates_post_type', 0 );
