<?php
get_header( );
while(have_posts()) : the_post();
$name= get_post_meta( get_the_ID(), 'asipi_colective_society_nombre-sgc', true );
 $subjet = get_post_meta( get_the_ID(), 'asipi_colective_society_materia-que-atiende-esa-sociedad-de-gestion', true );
 $address = get_post_meta( get_the_ID(), 'asipi_colective_society_direccion-fisica', true );
 $phone = get_post_meta( get_the_ID(), 'asipi_colective_society_telefono', true );
 $website = get_post_meta( get_the_ID(), 'asipi_colective_society_sitio-web', true );
 $email = get_post_meta( get_the_ID(), 'asipi_colective_society_mail-de-contacto', true );
?>
<div class="society-layout">
    <header class="page-header ">
        <div class="page-header-content">
            <h1 style="">
                <span class="title">
                    <span itemprop="headline">
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
                    
                    <li><b>Nombre SGC: </b><?php echo $name;?></li>
                        <li><b>Dirección física: </b><?php echo $address;?></li>
                        <li><b>Teléfono: </b><?php echo $phone;?></li>
                        <li><b>Sitio Web: </b><a href="<?php echo $website;?>" target="_blank"><?php echo $website;?></a></li>
                        <li><b>Correo de contacto: </b><a href="mailto:<?php echo $email;?>"  target="_blank"><?php echo $email;?></a></li>
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