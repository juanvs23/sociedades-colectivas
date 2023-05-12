<?php

/**
 * Generated by the WordPress Meta Box Generator
 * https://jeremyhixon.com/tool/wordpress-meta-box-generator/
 * 
 * Retrieving the values:
 * Nombre SGC* = get_post_meta( get_the_ID(), 'asipi_colective_society_nombre-sgc', true )
 * Materia que atiende esa sociedad de gestión = get_post_meta( get_the_ID(), 'asipi_colective_society_materia-que-atiende-esa-sociedad-de-gestion', true )
 * Dirección física = get_post_meta( get_the_ID(), 'asipi_colective_society_direccion-fisica', true )
 * Teléfono* = get_post_meta( get_the_ID(), 'asipi_colective_society_telefono', true )
 * Sitio Web* = get_post_meta( get_the_ID(), 'asipi_colective_society_sitio-web', true )
 * Mail de contacto* = get_post_meta( get_the_ID(), 'asipi_colective_society_mail-de-contacto', true )
 */
class ColectiveSociety {
	private $config = '{"title":"Datos de la sociedad","description":"Informaci\u00f3n de las sociedad colectiva","prefix":"asipi_colective_society_","domain":"asipi_colective_society","class_name":"ColectiveSociety","post-type":["colective_society"],"context":"normal","priority":"default","cpt":"colective_society","fields":[{"type":"text","label":"Direcci\u00f3n","id":"asipi_colective_society_direccion-fisica"},{"type":"text","label":"Contacto","id":"asipi_colective_society_contacto"},{"type":"text","label":"Cargo","id":"asipi_colective_society_cargo"},{"type":"email","label":"Correo","id":"asipi_colective_society_mail-de-contacto"},{"type":"tel","label":"Tel\u00e9fono","pattern":"\/^\\\\\\\\(?([0-9]{3})\\\\\\\\)?[-.\\\\\\\\s]?([0-9]{3})[-.\\\\\\\\s]?([0-9]{4})$\/","id":"asipi_colective_society_telefono"},{"type":"text","label":"Sitio Web","id":"asipi_colective_society_sitio-web"},{"type":"textarea","label":"Materia que atiende esa sociedad de gesti\u00f3n","id":"asipi_colective_society_materia-que-atiende-esa-sociedad-de-gestion"}]}';

	public function __construct() {
		$this->config = json_decode( $this->config, true );
		$this->process_cpts();
		add_action( 'add_meta_boxes', [ $this, 'add_meta_boxes' ] );
		add_action( 'admin_head', [ $this, 'admin_head' ] );
		add_action( 'save_post', [ $this, 'save_post' ] );
	}

	public function process_cpts() {
		if ( !empty( $this->config['cpt'] ) ) {
			if ( empty( $this->config['post-type'] ) ) {
				$this->config['post-type'] = [];
			}
			$parts = explode( ',', $this->config['cpt'] );
			$parts = array_map( 'trim', $parts );
			$this->config['post-type'] = array_merge( $this->config['post-type'], $parts );
		}
	}

	public function add_meta_boxes() {
		foreach ( $this->config['post-type'] as $screen ) {
			add_meta_box(
				sanitize_title( $this->config['title'] ),
				$this->config['title'],
				[ $this, 'add_meta_box_callback' ],
				$screen,
				$this->config['context'],
				$this->config['priority']
			);
		}
	}

	public function admin_head() {
		global $typenow;
		if ( in_array( $typenow, $this->config['post-type'] ) ) {
			?><?php
		}
	}

	public function save_post( $post_id ) {
		foreach ( $this->config['fields'] as $field ) {
			switch ( $field['type'] ) {
				case 'email':
					if ( isset( $_POST[ $field['id'] ] ) ) {
						$sanitized = sanitize_email( $_POST[ $field['id'] ] );
						update_post_meta( $post_id, $field['id'], $sanitized );
					}
					break;
				default:
					if ( isset( $_POST[ $field['id'] ] ) ) {
						$sanitized = $_POST[ $field['id'] ] ;
						update_post_meta( $post_id, $field['id'], $sanitized );
					}
			}
		}
	}

	public function add_meta_box_callback() {
		echo '<style>';
		echo '.asipi-input{ width:100%; display:block; }';
		echo '</style>';
		echo '<div class="rwp-description">' . $this->config['description'] . '</div>';
		$this->fields_table();
	}

	private function fields_table() {
		?>
        <table class="form-table" role="presentation">
			<tbody><?php
				foreach ( $this->config['fields'] as $field ) {
					?>
                    <tr>
						<th scope="row"><?php $this->label( $field ); ?></th>
						<td><?php $this->field( $field ); ?></td>
					</tr><?php
				}
			?></tbody>
		</table><?php
	}

	private function label( $field ) {
		switch ( $field['type'] ) {
			default:
				printf(
					'<label class="" for="%s">%s</label>',
					$field['id'], $field['label']
				);
		}
	}

	private function field( $field ) {
		switch ( $field['type'] ) {
			case 'textarea':
				$this->textarea( $field );
				break;
			default:
				$this->input( $field );
		}
	}

	private function input( $field ) {
		printf(
			'<input class="regular-text %s" id="%s" name="%s" %s type="%s" value="%s">',
			isset( $field['class'] ) ? $field['class'] : 'asipi-input',
			$field['id'], $field['id'],
			isset( $field['pattern'] ) ? "pattern='{$field['pattern']}'" : '',
			$field['type'],
			$this->value( $field )
		);
	}

	private function textarea( $field ) {
        $args = array(
            'wpautop'=>true,
			'default_editor'=>'TinyMCE',
            'media_buttons' => true, // This setting removes the media button.
            'textarea_name' =>$field['id'], // Set custom name.
            'textarea_rows' =>isset( $field['rows'] ) ? $field['rows'] : 5, //Determine the number of rows.
            'quicktags' => true, // Remove view as HTML button.
        );
        wp_editor( $this->value( $field ), $field['id'],   $args );
		/* printf(
			'<textarea class="regular-text" id="%s" name="%s" rows="%d">%s</textarea>',
			$field['id'], $field['id'],
			isset( $field['rows'] ) ? $field['rows'] : 5,
			$this->value( $field )
		); */
	}

	private function value( $field ) {
		global $post;
		if ( metadata_exists( 'post', $post->ID, $field['id'] ) ) {
			$value = get_post_meta( $post->ID, $field['id'], true );
		} else if ( isset( $field['default'] ) ) {
			$value = $field['default'];
		} else {
			return '';
		}
		return str_replace( '\u0027', "'", $value );
	}

}
new ColectiveSociety;