<?php
if(!function_exists('asipi_colective_society_localize')){
    function asipi_colective_society_localize(){
        return array(
            'admin_ajax' => admin_url('admin-ajax.php'),
          
            
        );
    };
  }
  /**
   * Frontend assets
   */
  
  if(!function_exists('asipi_colective_society_frontend_assets')){
  
      function asipi_colective_society_frontend_assets() {
          //https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css
        
          wp_enqueue_style('asipi_colective_society_frontend',ASIPICOLECTIVESSOCIETY_PLUGIN_URL .'assets/css/index.css',[],ASIPICOLECTIVESSOCIETY_PLUGIN_VERSION,'all');
          wp_enqueue_script('asipi_colective_society_frontend',ASIPICOLECTIVESSOCIETY_PLUGIN_URL .'assets/js/index.js',[],ASIPICOLECTIVESSOCIETY_PLUGIN_VERSION,true);
          wp_localize_script('asipi_colective_society_frontend','asipi_colective_society_ajax',asipi_colective_society_localize());
      }
  
      add_action('wp_enqueue_scripts', 'asipi_colective_society_frontend_assets',10000 );
  }

require ASIPICOLECTIVESSOCIETY_PLUGIN_DIR . '/inc/filters.php';
require ASIPICOLECTIVESSOCIETY_PLUGIN_DIR . '/inc/metaboxes.php';
require ASIPICOLECTIVESSOCIETY_PLUGIN_DIR . '/inc/admin-page.php';
require ASIPICOLECTIVESSOCIETY_PLUGIN_DIR . '/inc/helpers_fn.php';