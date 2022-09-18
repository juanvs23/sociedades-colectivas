<?php

function asipi_colective_society_get_societies(){
  
    $country = $_POST["country"];
    $security = $_POST["security"];
    $action = $_POST["action"];
    
  if('get_societies'==$action){
    $data =array();
  
    $args = array(
        'post_type' => 'colective_society',
        'tax_query' => array(
                        array(
                            'taxonomy' => 'country_origin',
                            'field' => 'term_id',
                            'terms' =>  $country
                            )
                        )
                );
        $query = new WP_Query( $args );
        if($query->have_posts()):
            $termData =get_term_by('term_id', $country,'country_origin' );
            $data['term'] = $termData;
            $data['error']=false;
            
            $societies=[];
            while($query->have_posts()):$query->the_post();
            array_push( $societies ,['title'=>get_the_title(),'link'=>get_permalink()]);
            endwhile;
        $data['societies']=$societies;
       
        echo wp_send_json( $data, 200);
    else:
            $data['error']=true;
            $data['message']='No hay sociedades disponibles'; 
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
