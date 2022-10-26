<?php

// Settings Page: ConfiguraciónPaginaPrincipal
// Retrieving values: get_option( 'your_field_id' )
class ConfiguraciónPaginaPrincipal_Settings_Page {

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'wph_create_settings' ) );
		add_action( 'admin_init', array( $this, 'wph_setup_sections' ) );
		add_action( 'admin_init', array( $this, 'wph_setup_fields' ) );
	}

	public function wph_create_settings() {
	/* $page_title = 'Configurar pagina principal';
		$menu_title = 'Configuración pagina principal';
		$capability = 'manage_options';
		$slug = 'ConfiguraciónPaginaPrincipal';
		$callback = array($this, 'wph_settings_content');
                $icon = 'dashicons-admin-appearance';
		$position = 2; */
		//add_menu_page($page_title, $menu_title, $capability, $slug, $callback, $icon, $position); 
		add_submenu_page( 'edit.php?post_type=colective_society',  'Configuración pagina principal de sociedades colectivas',  'Configuración pagina principal', 'manage_options', 'colective-society-page-options',  array($this, 'wph_settings_content'), 1 );
		
	}
    
	public function wph_settings_content() { ?>
	<style>
		input[type=text]{
			width:100%;
			display:block;
		}
	</style>
		<div class="wrap">
			<h1>Configuración pagina principal</h1>
			<?php settings_errors(); ?>
			<form method="POST" action="options.php">
				<?php
					settings_fields( 'ConfiguraciónPaginaPrincipal' );
					do_settings_sections( 'ConfiguraciónPaginaPrincipal' );
					submit_button();
				?>
			</form>
		</div> <?php
	}

	public function wph_setup_sections() {
		add_settings_section( 'ConfiguraciónPaginaPrincipal_section', 'Esta pagina permite configurar el frontend de la pagina principal de sociedades colectivas', array(), 'ConfiguraciónPaginaPrincipal' );
	}

	public function wph_setup_fields() {
		$fields = array(
                    array(
                        'section' => 'ConfiguraciónPaginaPrincipal_section',
                        'label' => 'Titulo de la pagina de configuración',
                        'placeholder' => 'Sociedades Colectivas',
                        'id' => 'colective_title',
                        'desc' => 'Permite configurar la pagina inicial de sociedades colectivas',
                        'type' => 'text',
                    ),
        
                    array(
                        'section' => 'ConfiguraciónPaginaPrincipal_section',
                        'label' => 'Texto inicial del selector de paises',
                        'placeholder' => 'Seleccione una opción',
                        'id' => 'first_option',
                        'desc' => 'Este texto permite colocar el texto de la primera opción del selector',
                        'type' => 'text',
                    ),

					array(
                        'section' => 'ConfiguraciónPaginaPrincipal_section',
                        'label' => 'Texto de no hay resultados',
                        'placeholder' => 'No hay sociedades disponibles',
                        'id' => 'not_found',
                        'desc' => 'Sobreescribe el texto de respuesta al no encontrar resultados',
                        'type' => 'text',
                    ),
        
                    array(
                        'section' => 'ConfiguraciónPaginaPrincipal_section',
                        'label' => 'Texto de espera',
                        'placeholder' => 'Cargando espere por favor...',
                        'id' => 'text_loading',
                        'desc' => 'Este campo permite colocar el texto de carga',
                        'type' => 'text',
                    ),
					array(
                        'section' => 'ConfiguraciónPaginaPrincipal_section',
                        'label' => 'Titulo de lista sociedades',
                        'placeholder' => 'Lista de sociedades de ',
                        'id' => 'text_list',
                        'desc' => 'Este campo permite reescribir el titulo de lista sociedades',
                        'type' => 'text',
                    ),
        
                    array(
                        'section' => 'ConfiguraciónPaginaPrincipal_section',
                        'label' => 'Contenido descriptivo de la pagina',
                        'id' => 'text_description',
                        'desc' => 'Este campo permite colocar un texto con imagen',
                        'type' => 'wysiwyg',
                    )
		);
		foreach( $fields as $field ){
			add_settings_field( $field['id'], $field['label'], array( $this, 'wph_field_callback' ), 'ConfiguraciónPaginaPrincipal', $field['section'], $field );
			register_setting( 'ConfiguraciónPaginaPrincipal', $field['id'] );
		}
	}
	public function wph_field_callback( $field ) {
		$value = get_option( $field['id'] );
		$placeholder = '';
		if ( isset($field['placeholder']) ) {
			$placeholder = $field['placeholder'];
		}
		switch ( $field['type'] ) {
            
            
                        case 'wysiwyg':
                            wp_editor($value, $field['id']);
                            break;

			default:
				printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />',
					$field['id'],
					$field['type'],
					$placeholder,
					$value
				);
		}
		if( isset($field['desc']) ) {
			if( $desc = $field['desc'] ) {
				printf( '<p class="description">%s </p>', $desc );
			}
		}
	}
    
}
new ConfiguraciónPaginaPrincipal_Settings_Page();
                