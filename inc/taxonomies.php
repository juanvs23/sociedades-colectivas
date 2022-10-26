<?php
if ( ! function_exists( 'asipi_country_origin_function' ) ) {

    // Register Custom Taxonomy
    function asipi_country_origin_function() {
    
        $labels = array(
            'name'                       => _x( 'Paises', 'Taxonomy General Name', 'asipi_colective_society' ),
            'singular_name'              => _x( 'País', 'Taxonomy Singular Name', 'asipi_colective_society' ),
            'menu_name'                  => __( 'Paises de las sociedades', 'asipi_colective_society' ),
            'all_items'                  => __( 'Ver todos los paises', 'asipi_colective_society' ),
            'parent_item'                => __( 'Parent Item', 'asipi_colective_society' ),
            'parent_item_colon'          => __( 'Parent Item:', 'asipi_colective_society' ),
            'new_item_name'              => __( 'Añadir nuevo país', 'asipi_colective_society' ),
            'add_new_item'               => __( 'Añadir nuevo país', 'asipi_colective_society' ),
            'edit_item'                  => __( 'Edit país', 'asipi_colective_society' ),
            'update_item'                => __( 'Actualizar país', 'asipi_colective_society' ),
            'view_item'                  => __( 'Ver país', 'asipi_colective_society' ),
            'separate_items_with_commas' => __( 'Separar paises por comas', 'asipi_colective_society' ),
            'add_or_remove_items'        => __( 'Añadir o remover paises', 'asipi_colective_society' ),
            'choose_from_most_used'      => __( 'Elige entre los más usados', 'asipi_colective_society' ),
            'popular_items'              => __( 'Paises populares', 'asipi_colective_society' ),
            'search_items'               => __( 'Buscar paises', 'asipi_colective_society' ),
            'not_found'                  => __( 'No econtrado', 'asipi_colective_society' ),
            'no_terms'                   => __( 'No hay paises', 'asipi_colective_society' ),
            'items_list'                 => __( 'Lista de paises', 'asipi_colective_society' ),
            'items_list_navigation'      => __( 'Lista de paises', 'asipi_colective_society' ),
        );
        $rewrite = array(
            'slug'                       => 'paises',
            'with_front'                 => true,
            'hierarchical'               => false,
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => false,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'rewrite'                    => false,
        );
        register_taxonomy( 'country_origin', array( 'colective_society' ), $args );
    
    }
    add_action( 'init', 'asipi_country_origin_function', 0 );
    
    }