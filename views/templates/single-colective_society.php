<?php
get_header( );
while(have_posts()) : the_post();
/**
 * Get post meta information
 */
 $subjet = get_post_meta( get_the_ID(), 'asipi_colective_society_materia-que-atiende-esa-sociedad-de-gestion', true );
 $address = get_post_meta( get_the_ID(), 'asipi_colective_society_direccion-fisica', true );
 $phone = get_post_meta( get_the_ID(), 'asipi_colective_society_telefono', true );
 $website = get_post_meta( get_the_ID(), 'asipi_colective_society_sitio-web', true );
 $email = get_post_meta( get_the_ID(), 'asipi_colective_society_mail-de-contacto', true );
 $country = wp_get_object_terms( get_the_ID(), 'country_origin', array( 'fields' => 'all' ) );

 /**
  * Get options 
  */
  //address_title
  $address_title = get_option('address_title') && get_option('address_title')!=''?get_option('address_title'):'Dirección física: ';
  //phone_title
  $phone_title = get_option('phone_title') && get_option('phone_title')!=''?get_option('phone_title'):'Teléfono: ';
  //web_title
  $web_title = get_option('web_title') && get_option('web_title')!=''?get_option('web_title'):'Sitio Web: ';
  //email_title
  $email_title = get_option('email_title') && get_option('email_title')!=''?get_option('email_title'):'Correo: ';
  
  /**
   * Get term meta
   */
 $country_color= get_term_meta(  $country[0]->term_id, 'country_color', true ) && get_term_meta(  $country[0]->term_id, 'country_color', true ) !='#ffffff'?get_term_meta(  $country[0]->term_id, 'country_color', true ):'#009e4a';
?>
<div class="society-layout">
    <header class="page-header ">
        <div class="page-header-content">
            <h1 style="">
                <span class="title">
                    <span itemprop="headline" style="color:<?php echo $country_color;?>">
                       <?php echo get_the_title();?>                   
                    </span>
                </span>
            </h1>
        </div>
    </header>
    <div class="asipi-colective-society">
        
        <div class="colective-content">
            <div class="lef-side">
                <div class="contentinfo">
                    <ul>
                        <?php
                        if($address && $address!=''):
                        ?>
                        <li><b><?php echo $address_title; ?> </b><?php echo $address;?></li>
                        <?php endif; ?>
                        <?php
                        if($phone && $phone!=''):
                        ?>
                        <li><b><?php echo $phone_title; ?> </b><?php echo $phone;?></li>
                        <?php endif; ?>
                        <?php
                        if($website && $website !=''):
                        ?>
                        <li><b><?php echo $web_title; ?> </b><a style="color:white;" href="<?php echo $website;?>" target="_blank"><?php echo $website;?></a></li>
                        <?php endif; ?>
                        <?php
                        if($email && $email!=''):
                        ?>
                        <li><b><?php echo $email_title; ?> </b><a style="color:white;" href="mailto:<?php echo $email;?>"  target="_blank"><?php echo $email;?></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
             </div>
            <div class="right-side info-subject">
           <div class="content-subject">
           
            <div class="subject-content">
            <?php echo $subjet;?>
            </div>
           </div>
            </div>  
        </div>
    </div>
</div>
<?php
endwhile;
get_footer( );
?>