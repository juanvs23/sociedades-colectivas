<?php
if ( ! function_exists('asipi_colective_society_ctp_register') ) {

    // Register Custom Post Type
    function asipi_colective_society_ctp_register() {
    
        $labels = array(
            'name'                  => _x( 'Sociedades Colectivas', 'Post Type General Name', 'asipi_colective_society' ),
            'singular_name'         => _x( 'Sociedad Colectiva', 'Post Type Singular Name', 'asipi_colective_society' ),
            'menu_name'             => __( 'Sociedades Colectivas', 'asipi_colective_society' ),
            'name_admin_bar'        => __( 'Sociedades Colectivas', 'asipi_colective_society' ),
            'archives'              => __( 'Sociedad Colectiva Archivos', 'asipi_colective_society' ),
            'attributes'            => __( 'Atributos de la sociedad', 'asipi_colective_society' ),
            'parent_item_colon'     => __( 'Sociedad superior:', 'asipi_colective_society' ),
            'all_items'             => __( 'Todas las sociedades', 'asipi_colective_society' ),
            'add_new_item'          => __( 'Añadir nueva sociedad', 'asipi_colective_society' ),
            'add_new'               => __( 'Añadir nueva', 'asipi_colective_society' ),
            'new_item'              => __( 'Nueva sociedad', 'asipi_colective_society' ),
            'edit_item'             => __( 'Edit Editar sociedad', 'asipi_colective_society' ),
            'update_item'           => __( 'Actualizar sociedad', 'asipi_colective_society' ),
            'view_item'             => __( 'Ver sociedad', 'asipi_colective_society' ),
            'view_items'            => __( 'Ver sociedades', 'asipi_colective_society' ),
            'search_items'          => __( 'Buscar sociedad', 'asipi_colective_society' ),
            'not_found'             => __( 'No encontrado', 'asipi_colective_society' ),
            'not_found_in_trash'    => __( 'No encontrado en papelera', 'asipi_colective_society' ),
            'featured_image'        => __( 'Imagen destacada', 'asipi_colective_society' ),
            'set_featured_image'    => __( 'Conf. imagen destacada', 'asipi_colective_society' ),
            'remove_featured_image' => __( 'Remover imagen destacada', 'asipi_colective_society' ),
            'use_featured_image'    => __( 'Utilizar como imagen destacada', 'asipi_colective_society' ),
            'insert_into_item'      => __( 'Incluir en la sociedad', 'asipi_colective_society' ),
            'uploaded_to_this_item' => __( 'Cargar en esta sociedad', 'asipi_colective_society' ),
            'items_list'            => __( 'Lista de sociedades', 'asipi_colective_society' ),
            'items_list_navigation' => __( 'Lista de navegación de sociedades', 'asipi_colective_society' ),
            'filter_items_list'     => __( 'Filtrar lista de sociedades', 'asipi_colective_society' ),
        );
        $rewrite = array(
            'slug'                  => 'sociedades-colectivas',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );
        $args = array(
            'label'                 => __( 'Sociedad Colectiva', 'asipi_colective_society' ),
            'description'           => __( 'Contenido de las sociedades colectivas organizadas por paises', 'asipi_colective_society' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes' ),
            'taxonomies'            => array( 'country_origin' ),
            'hierarchical'          => true,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-id-alt',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'post',
        );
        register_post_type( 'colective_society', $args );
    
    }
    add_action( 'init', 'asipi_colective_society_ctp_register', 0 );
    
    }