<?php

/**
 * this filter take archive and redirect to plugin archive function
 *
 * @param [string]  $original_template
 * @return [string] $template_directory
 */
function asipi_colective_society_templates($original_template){
    // Check Theme Template or Plugin Template for archive-colective_society.php
    $file = trailingslashit(get_stylesheet_directory()) . 'archive-colective_society.php';
    if(is_post_type_archive('colective_society')) {
        //if archive-colective_society.php in the current  theme, else return the archive-colective_society.php file to the current tplugins directory.
        if(file_exists($file)) {
            return trailingslashit(get_stylesheet_directory()).'archive-colective_society.php';
        } else {
            return ASIPICOLECTIVESSOCIETY_PLUGIN_DIR . 'views/templates/archive-colective_society.php';
        }
    } elseif(is_singular('colective_society')) {
        if(file_exists(get_stylesheet_directory_uri() . 'single-colective_society.php')) {
            return get_stylesheet_directory_uri() . 'single-colective_society.php';
        } else {
            return ASIPICOLECTIVESSOCIETY_PLUGIN_DIR . '/views/templates/single-colective_society.php';
        }
    }
    return $original_template;
}
add_action('template_include', 'asipi_colective_society_templates');