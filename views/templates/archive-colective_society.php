<?php
get_header( );
$archive_page_content_options = get_option( 'archive_page_content_option_name' );
/**
 * $titulo_de_la_pagina_0 = $archive_page_content_options['titulo_de_la_pagina_0']; // Titulo de la pagina
 * $contenido_descriptivo_de_la_pagina_1 = $archive_page_content_options['contenido_descriptivo_de_la_pagina_1'];
 */
$titulo = $archive_page_content_options['titulo_de_la_pagina_0'] && $archive_page_content_options['titulo_de_la_pagina_0']!=''?$archive_page_content_options['titulo_de_la_pagina_0']:'Sociedades Colectivas';
$contenido = $archive_page_content_options['contenido_descriptivo_de_la_pagina_1'] ? $archive_page_content_options['contenido_descriptivo_de_la_pagina_1']:'';
?>
<div class="society-layout">
    <header class="page-header ">
        <div class="page-header-content">
            <h1 style="">
                <span class="title">
                    <span itemprop="headline">
                        <?php echo $titulo;?>
                    </span>
                </span>
            </h1>
        </div>
    </header>
    <div class="asipi-colective-society">
        
        <div class="colective-content">
            <div class="lef-side">
              <form id="form-colective-society" class="select-container">
                <?php
                $action ="get_societies";
                $nonce = wp_create_nonce($action);
                ?>
                <input type="hidden" id="security" name="security" value="<?php  echo $nonce;?>">
                <input type="hidden" name="action" id="action" value="<?php  echo$action;?>">
                <select id="search-colective-society">
                    <option value="clear">Seleccione un País</option>
                        <?php
                            $terms = get_terms(
                                
                                array(
                                    'taxonomy' => 'country_origin' ,
                                    'hide_empty' => false,
                                )
                            
                            );
                        foreach($terms as $term){
                            echo '<option value="'.$term->term_id.'">'.$term->name.'</option>';
                        } 
                        ?>
                    </select>
                    <input type="submit" id="send" value="Send" hidden="true" style="height:0;width:0;margin:0;opacity:0;">
                </form>
                <div class="descrition-content">
                    <?php echo $contenido; ?>
                </div>
            </div>
            <div class="right-side" style="background-image:url(<?php echo ASIPICOLECTIVESSOCIETY_PLUGIN_URL; ?>assets/img/america.svg);">
            <div id="society-loader">
                <div class="loading">
                    <img src="<?php echo ASIPICOLECTIVESSOCIETY_PLUGIN_URL; ?>assets/img/rolling-1s-200px.svg" class="loader-circle" alt="loading">
                    <img src="<?php echo ASIPICOLECTIVESSOCIETY_PLUGIN_URL; ?>assets/img/ajax-loader.gif" class="progress-bar" alt="loading">
                    <p>Cargando espere por favor...</p>
                </div>
            </div>
                <div id="info-content">

                </div>
            </div>  
        </div>
    </div>
</div>
<?php
get_footer( );
?>