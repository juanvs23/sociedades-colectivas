<?php
get_header( );
$archive_page_content_options = get_option( 'archive_page_content_option_name' );
/**
 * $titulo_de_la_pagina_0 = $archive_page_content_options['titulo_de_la_pagina_0']; // Titulo de la pagina
 * $contenido_descriptivo_de_la_pagina_1 = $archive_page_content_options['contenido_descriptivo_de_la_pagina_1'];
 */


 
$titulo = get_option('colective_title') && get_option('colective_title')!=''?get_option('colective_title'):'Mapa de Sociedades Colectivas';
$first_option = get_option('first_option') && get_option('first_option')!=''?get_option('first_option'):'Seleccione una opción';

$country_label = get_option('country_label') && get_option('country_label')!=''?get_option('country_label'):'País';
$society_label = get_option('society_label') && get_option('society_label')!=''?get_option('society_label'):'Sociedades';

$text_loading = get_option('text_loading') && get_option('text_loading')!=''?get_option('text_loading'):'Cargando espere por favor...';
$contenido = get_option('text_description') && get_option('text_description')!=''?get_option('text_description'):'';
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
                    <option value="clear"><?php echo $first_option; ?></option>
                        <?php
                            $terms = get_terms(
                                
                                array(
                                    'taxonomy' => 'country_origin' ,
                                    'hide_empty' => false,
                                )
                            
                            );
                        foreach($terms as $term){
                          $iso_code =  get_term_meta( $term->term_id, 'country_iso', true );
                            echo '<option value="'.$iso_code.'">'.$term->name.'</option>';
                        } 
                        ?>
                    </select>
                    <input type="submit" id="send" value="Send" hidden="true" style="height:0;width:0;margin:0;opacity:0;">
                </form>
                <div class="descrition-content">
                <div id="society-loader">
                <div class="loading">
                    <img src="<?php echo ASIPICOLECTIVESSOCIETY_PLUGIN_URL; ?>assets/img/rolling-1s-200px.svg" class="loader-circle" alt="loading">
                    <img src="<?php echo ASIPICOLECTIVESSOCIETY_PLUGIN_URL; ?>assets/img/ajax-loader.gif" class="progress-bar" alt="loading">
                    <p><?php echo $text_loading; ?></p>
                </div>
            </div>
                <div id="info-content">

                </div>
                  <div id="description">
                  <?php echo $contenido; ?>
                  </div>
                </div>
            </div>

            <div class="right-side" >
                <div id="asipiMAp"></div>
           
            </div>  
        </div>
    </div>
</div>
<script>
    <?php 
    $countries =  get_terms( array(
        'taxonomy' => 'country_origin' ,
        'hide_empty' => false,

    ));
  
    ?>
    var leyendtitles= {
        <?php
         echo 'countryLabel:"'.$country_label.'",';
        echo 'societyLabel:"'.$society_label.'"';
        ?>

    }
    
    var data = [
    
 <?php
    foreach ($countries as $country) {
        
        $iso_code =  get_term_meta( $country->term_id, 'country_iso', true );
        $country_color= get_term_meta(  $country->term_id, 'country_color', true ) && get_term_meta(  $country->term_id, 'country_color', true ) !='#ffffff'?get_term_meta(  $country->term_id, 'country_color', true ):'#009e4a';
       
        $arg=array(
            'numberposts' => -1,
            'post_type'   => 'colective_society',
            'tax_query' => array(
                array(
                    'taxonomy' => 'country_origin',
                    'field'    => 'slug',
                    'terms'    => $country->slug,
                )
            )

          );
        $value = get_posts($arg);
        echo '{';
        echo  'code2:"'.$iso_code.'",';
        echo  'name: "'.$country->name.'",';
        echo 'value:'.count( $value ).',';
       echo 'color:"'. $country_color.'",';
        echo  'code:"'.$iso_code.'",';
        echo  '},';
    }
    
    ?>
];
console.log(data)
</script>
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/mapdata/index.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
  var text_loading ='<?php echo $text_loading;?>'
</script>
<?php
get_footer( );
?>