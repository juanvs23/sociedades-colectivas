<?php

function asipi_colective_society_get_societies(){
  
    $country = $_POST["country"];
    $security = $_POST["security"];
    $action = $_POST["action"];
    $not_found = get_option('not_found') && get_option('not_found')!=''? get_option('not_found'):'No hay sociedades disponibles';
  if('get_societies'==$action){
    $data =array();
    $terms = get_terms(
                                
      array(
          'taxonomy' => 'country_origin' ,
          'hide_empty' => false,
          'meta_query' => array(
            array(
              'key'     => 'country_iso',
              'value'   =>  $country,
              'compare' => 'LIKE'
            )
          )
        )
      );
    $args = array(
        'post_type' => 'colective_society',
        'tax_query' => array(
                        array(
                            'taxonomy' => 'country_origin',
                            'field' => 'term_id',
                            'terms' =>   $terms[0]->term_id
                            )
                        )
                );
        $query = new WP_Query( $args );
        if($query->have_posts()):
            $termData =get_term_by('term_id',  $terms[0]->term_id,'country_origin' );
            //{ lat: -60, lng: -10.4807975 }
            $lat_country= get_term_meta( $terms[0]->term_id, 'lat_country', true ) && get_term_meta(  $terms[0]->term_id, 'lat_country', true ) !=''?get_term_meta(  $terms[0]->term_id, 'lat_country', true ):'-60';
            $lng_country= get_term_meta( $terms[0]->term_id, 'lng_country', true ) && get_term_meta(  $terms[0]->term_id, 'lng_country', true ) !=''?get_term_meta(  $terms[0]->term_id, 'lng_country', true ):'-10.4807975';
          
            $data['term'] = $termData;
            $data['error']=false;
            $data['country_color']= get_term_meta(  $terms[0]->term_id, 'country_color', true ) && get_term_meta(  $terms[0]->term_id, 'country_color', true )!=''?get_term_meta(  $terms[0]->term_id, 'country_color', true ):'#009e4a';
            $data['lat_country'] = $lat_country;
            $data['lng_country'] = $lng_country;
            $data['text_list']= get_option('text_list') && get_option('text_list')!=''?get_option('text_list'):'Lista de sociedades de'; 
            $societies=[];
            while($query->have_posts()):$query->the_post();
            array_push( $societies ,['title'=>get_the_title(),'link'=>get_permalink()]);
            endwhile;
        $data['societies']=$societies;
       
        echo wp_send_json( $data, 200);
    else:
      $termData =get_term_by('term_id',  $terms[0]->term_id,'country_origin' );
      //{ lat: -60, lng: -10.4807975 }
      $lat_country= get_term_meta( $terms[0]->term_id, 'lat_country', true ) && get_term_meta(  $terms[0]->term_id, 'lat_country', true ) !=''?get_term_meta(  $terms[0]->term_id, 'lat_country', true ):'-60';
      $lng_country= get_term_meta( $terms[0]->term_id, 'lng_country', true ) && get_term_meta(  $terms[0]->term_id, 'lng_country', true ) !=''?get_term_meta(  $terms[0]->term_id, 'lng_country', true ):'-10.4807975';
    
      $data['term'] = $termData;
   
      $data['country_color']= get_term_meta(  $terms[0]->term_id, 'country_color', true ) && get_term_meta(  $terms[0]->term_id, 'country_color', true )!=''?get_term_meta(  $terms[0]->term_id, 'country_color', true ):'#009e4a';
      $data['lat_country'] = $lat_country;
      $data['lng_country'] = $lng_country;
            $data['error']=true;
            $data['message']=$not_found; 
        endif;
        wp_reset_postdata();
        echo wp_send_json( $data, 200);
  }else{
    echo wp_send_json(['error'=>'Wrong way'],404);
  }

    wp_die();
}
    add_action('wp_ajax_get_societies','asipi_colective_society_get_societies',1);
    add_action( "wp_ajax_nopriv_get_societies",'asipi_colective_society_get_societies',1);
