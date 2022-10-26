<?php
class Country_origin{
	private $meta_fields = array(
              /*   array(
                    'label' => 'Imagen del pais',
                    'id' => 'country_images',
                    'default' => '',
                    'type' => 'media',
                ), */
    
                array(
                    'label' => 'Latitud',
                    'id' => 'lat_country',
                    'default' => '',
                    'type' => 'text',
                ),
    
                array(
                    'label' => 'Longitud',
                    'id' => 'lng_country',
                    'default' => '',
                    'type' => 'text',
				),
				array(
                    'label' => 'Color del país',
                    'id' => 'country_color',
                    'default' => '#ffffff',
                    'type' => 'color',
				),
				array(
                    'label' => 'Codigo iso-a2',
                    'id' => 'country_iso',
                    'default' => '',
					'options'=>array(
						["Country","A2"],
["Aaland Islands","AX"],
["Afghanistan","AF"],
["Albania","AL"],
["Algeria","DZ"],
["Andorra","AD"],
["Angola","AO"],
["Anguilla","AI"],
["Antarctica","AQ"],
["Antigua & Barbuda","AG"],
["Argentina","AR"],
["Armenia","AM"],
["Aruba","AW"],
["Australia","AU"],
["Austria","AT"],
["Azerbaijan","AZ"],
["Bahamas","BS"],
["Bahrain","BH"],
["Bangladesh","BD"],
["Barbados","BB"],
["Belarus","BY"],
["Belgium","BE"],
["Belize","BZ"],
["Benin","BJ"],
["Bermuda","BM"],
["Bhutan","BT"],
["Bolivia","BO"],
["Bosnia & Herzegovina","BA"],
["Botswana","BW"],
["Bouvet Island","BV"],
["Brazil","BR"],
["British Indian Ocean Territory","IO"],
["Brunei Darussalam","BN"],
["Bulgaria","BG"],
["Burkina Faso","BF"],
["Myanmar","MM"],
["Burundi","BI"],
["Cambodia","KH"],
["Cameroon","CM"],
["Canada","CA"],
["Cape Verde","CV"],
["Cayman Islands","KY"],
["Central African Republic","CF"],
["Chad","TD"],
["Chile","CL"],
["China","CN"],
["Christmas Island","CX"],
["Cocos (Keeling) Islands","CC"],
["Colombia","CO"],
["Comoros","KM"],
["Congo, Democratic Republic","CD"],
["Congo, Republic of","CG"],
["Cook Islands","CK"],
["Costa Rica","CR"],
["Cte d’Ivoire","CI"],
["Croatia (local name: Hrvatska)","HR"],
["Cuba","CU"],
["Cyprus","CY"],
["Czech Republic","CZ"],
["Denmark","DK"],
["Djibouti","DJ"],
["Dominica","DM"],
["Dominican Republic","DO"],
["Ecuador","EC"],
["Egypt","EG"],
["El Salvador","SV"],
["Equatorial Guinea","GQ"],
["Eritrea","ER"],
["Estonia","EE"],
["Ethiopia","ET"],
["Falkland Islands (Malvinas)","FK"],
["Faroe Islands","FO"],
["Fiji","FJ"],
["Finland","FI"],
["France","FR"],
["French Guiana","GF"],
["French Polynesia","PF"],
["Franch Southern Territories","TF"],
["Gabon","GA"],
["Gambia","GM"],
["Georgia","GE"],
["Germany","DE"],
["Ghana","GH"],
["Gibraltar","GI"],
["Greece","GR"],
["Greenland","GL"],
["Grenada","GD"],
["Guadeloupe","GP"],
["Guam","GU"],
["Guatemala","GT"],
["Guinea","GN"],
["Guinea-Bissau","GW"],
["Guyana","GY"],
["Haiti","HT"],
["Heard & McDonald Islands","HM"],
["Honduras","HN"],
["Hong Kong","HK"],
["Hungary","HU"],
["Iceland","IS"],
["India","IN"],
["Indonesia","ID"],
["Iran","IR"],
["Iraq","IQ"],
["Ireland","IE"],
["Italy","IT"],
["Jamaica","JM"],
["Japan","JP"],
["Jordan","JO"],
["Kazakhstan","KZ"],
["Kenya","KE"],
["Kiribati","KI"],
["Korea, Democratic People’s Republic","KP"],
["Korea","KR"],
["Kuwait","KW"],
["Krygyzstan","KG"],
["Laos","LA"],
["Latvia","LV"],
["Lebanon","LB"],
["Lesotho","LS"],
["Liberia","LR"],
["Libya","LY"],
["Liechtenstein","LI"],
["Lithuania","LT"],
["Luxembourg","LU"],
["Macau","MO"],
["Macedonia","MK"],
["Madagascar","MG"],
["Malawi","MW"],
["Malaysia","MY"],
["Maldives","MV"],
["Mali","ML"],
["Malta","MT"],
["Marshall Islands","MH"],
["Martinique","MQ"],
["Mauritania","MR"],
["Mauritius","MU"],
["Mayott","YT"],
["Mexico","MX"],
["Micronesia","FM"],
["Moldova","MD"],
["Monaco","MC"],
["Mongolia","MN"],
["Montserrat","MS"],
["Morocco","MA"],
["Mozambique","MZ"],
["Namibia","NA"],
["Nauru","NR"],
["Nepal","NP"],
["Netherlands","NL"],
["Curacao","AN"],
["New Caledonia","NC"],
["New Zealand","NZ"],
["Nicaragua","NI"],
["Niger","NE"],
["Nigeria","NG"],
["Niue","NU"],
["Norfolk Island","NF"],
["Northern Mariana Islands","MP"],
["Norway","NO"],
["Oman","OM"],
["Pakistan","PK"],
["Palau","PW"],
["Palestine","PS"],
["Panama","PA"],
["Papua New Guinea","PG"],
["Paraguay","PY"],
["Peru","PER"],
["Philippines","PH"],
["Pitcairn","PN"],
["Poland","PL"],
["Portugal","PT"],
["Puerto Rico","PR"],
["Qatar","QA"],
["Reunion","RE"],
["Romania","RO"],
["Russia","RU"],
["Rwanda","RW"],
["Saint Helena","SH"],
["Saint Kitts & Nevis","KN"],
["Saint Lucia","LC"],
["Saint Pierre et Miquelon","PM"],
["Saint Vincent & the Grenadines","VC"],
["Samoa","WSD"],
["San Marino","SM"],
["Sao Tome et Principe","ST"],
["Saudi Arabia","SA"],
["Senegal","SN"],
["Serbia","CS"],
["Seychelles","SC"],
["Sierra Leone","SL"],
["Singapore","SG"],
["Slovakia","SK"],
["Slovenia","SI"],
["Solomon Islands","SB"],
["Somalia","SO"],
["South africa","ZA"],
["South Georgia","GS"],
["Spain","ES"],
["Sri Lanka","LK"],
["Sudan","SD"],
["Suriname","SR"],
["Svalbard & Jan Mayen Islands","SJ"],
["Swaziland","SZ"],
["Sweden","SE"],
["Switzerland","CH"],
["Syria","SY"],
["Taiwan","TW"],
["Tajikistan","TJ"],
["Tanzania","TZ"],
["Thailand","TH"],
["Timor-Leste","TL"],
["Togo","TG"],
["Tokelau","TK"],
["Tonga","TO"],
["Trinidad & Tobago","TT"],
["Tunisia","TN"],
["Turkey","TR"],
["Turkmenistan","TM"],
["Turks & Caicos Islands","TC"],
["Tuvalu","TV"],
["Uganda","UG"],
["Ukraine","UA"],
["UAE","AE"],
["United Kingdom","GB"],
["United States","US"],
["United States Minor Outlying Islands","UM"],
["Uruguay","UY"],
["Uzbekistan","UZ"],
["Vanuatu","VU"],
["Vatican City","VA"],
["Venezuela","VE"],
["Vietnam","VN"],
["Virgin Islands (British)","VG"],
["Virgin Islands (US)","VI"],
["Wallis & Futuna Islands","WF"],
["Western Sahara","EH"],
["Yemen","YE"],
["Zambia","ZM"],
["Zimbabwe","ZW"],					
				),
                    'type' => 'select',
                )


	);
	public function __construct() {
		if ( is_admin() ) {
			add_action( 'country_origin_add_form_fields', array( $this, 'create_fields' ), 10, 2 );
			add_action( 'country_origin_edit_form_fields', array( $this, 'edit_fields' ),  10, 2 );
			add_action( 'created_country_origin', array( $this, 'save_fields' ), 10, 1 );
			add_action( 'edited_country_origin',  array( $this, 'save_fields' ), 10, 1 ); 
                        add_action( 'admin_footer', array( $this, 'media_fields' ) );
			add_action( 'admin_enqueue_scripts', 'wp_enqueue_media' );
            
		}
	}
    
    public function media_fields() {
		?><script>
			jQuery(document).ready(function($){
				if ( typeof wp.media !== 'undefined' ) {
					var _custom_media = true,
					_orig_send_attachment = wp.media.editor.send.attachment;
					$('.taxokey-media').click(function(e) {
						var send_attachment_bkp = wp.media.editor.send.attachment;
						var button = $(this);
						var id = button.attr('id').replace('_button', '');
						_custom_media = true;
							wp.media.editor.send.attachment = function(props, attachment){
							if ( _custom_media ) {
								$('input#'+id).val(attachment.id);
								$('div#preview'+id).css('background-image', 'url('+attachment.url+')');
							} else {
								return _orig_send_attachment.apply( this, [props, attachment] );
							};
						}
						wp.media.editor.open(button);
						return false;
					});
					$('.add_media').on('click', function(){
						_custom_media = false;
					});
					$('.remove-media').on('click', function(){
						var parent = $(this).parents('td');
						parent.find('input[type="text"]').val('');
						parent.find('div').css('background-image', 'url()');
					});
				}
			});
		</script><?php
	}

	public function create_fields( $taxonomy ) {
		$output = '';
		foreach ( $this->meta_fields as $meta_field ) {
			$label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';
			if ( empty( $meta_value ) ) {
				if ( isset( $meta_field['default'] ) ) {
					$meta_value = $meta_field['default'];
				}
			}
			switch ( $meta_field['type'] ) {
                case 'media':
                    $meta_url = '';
                        if ($meta_value) {
                            $meta_url = wp_get_attachment_url($meta_value);
                        }
                    $input = sprintf(
                        '<input style="display:none;" id="%s" name="%s" type="text" value="%s"><div id="preview%s" style="margin-right:10px;border:2px solid #eee;display:inline-block;width: 100px;height:100px;background-image:url(%s);background-size:contain;background-repeat:no-repeat;"></div><input style="width: 19%%;margin-right:5px;" class="button taxokey-media" id="%s_button" name="%s_button" type="button" value="Select" /><input style="width: 19%%;" class="button remove-media" id="%s_buttonremove" name="%s_buttonremove" type="button" value="Clear" />',
                        $meta_field['id'],
                        $meta_field['id'],
                        $meta_value,
                        $meta_field['id'],
                        $meta_url,
                        $meta_field['id'],
                        $meta_field['id'],
                        $meta_field['id'],
                        $meta_field['id']
                    );
                    break;
					case 'select':
						$input = sprintf(
							'<select id="%s" name="%s">',
							$meta_field['id'],
							$meta_field['id']
						);
						foreach ( $meta_field['options'] as $option ) {
							$label_option = $option[0];
							$value_option = $option[1];
							$selected = $meta_value == $value_option ? 'selected' : '';
							$input .='<option '.$selected.' value="'.$value_option.'">'.$label_option.'</option>';
						}
						$input .= '</select>';
						break;
				default:
					$input = sprintf(
						'<input %s id="%s" name="%s" type="%s" value="%s">',
						$meta_field['type'] !== 'color' ? '' : '',
						$meta_field['id'],
						$meta_field['id'],
						$meta_field['type'],
						$meta_value
					);
			}
			$output .= '<div class="form-field">'.$this->format_rows( $label, $input ).'</div>';
		}
		echo $output;
	}
	public function edit_fields( $term, $taxonomy ) {
		$output = '';
		foreach ( $this->meta_fields as $meta_field ) {
			$label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';
			$meta_value = get_term_meta( $term->term_id, $meta_field['id'], true );
			//var_dump($meta_value);
			switch ( $meta_field['type'] ) {
                
                                case 'media':
                                    $meta_url = '';
                                        if ($meta_value) {
                                            $meta_url = wp_get_attachment_url($meta_value);
                                        }
                                    $input = sprintf(
                                        '<input style="display:none;" id="%s" name="%s" type="text" value="%s"><div id="preview%s" style="margin-right:10px;border:2px solid #eee;display:inline-block;width: 100px;height:100px;background-image:url(%s);background-size:contain;background-repeat:no-repeat;"></div><input style="width: 19%%;margin-right:5px;" class="button taxokey-media" id="%s_button" name="%s_button" type="button" value="Select" /><input style="width: 19%%;" class="button remove-media" id="%s_buttonremove" name="%s_buttonremove" type="button" value="Clear" />',
                                        $meta_field['id'],
                                        $meta_field['id'],
                                        $meta_value,
                                        $meta_field['id'],
                                        $meta_url,
                                        $meta_field['id'],
                                        $meta_field['id'],
                                        $meta_field['id'],
                                        $meta_field['id']
                                    );
                                    break;
									case 'select':
										$input = sprintf(
											'<select id="%s" name="%s">',
											$meta_field['id'],
											$meta_field['id']
										);
										foreach ( $meta_field['options'] as $option ) {
											$label_option = $option[0];
											$value_option = $option[1];
											$selected = $meta_value == $value_option ? 'selected' : '';
											$input .='<option '.$selected.' value="'.$value_option.'">'.$label_option.'</option>';
										}
										$input .= '</select>';
										break;

				default:
					$input = sprintf(
						'<input %s id="%s" name="%s" type="%s" value="%s">',
						$meta_field['type'] !== 'color' ? '' : '',
						$meta_field['id'],
						$meta_field['id'],
						$meta_field['type'],
						$meta_value
					);
			}
			$output .= $this->format_rows( $label, $input );
		}
		echo '<div class="form-field">' . $output . '</div>';
	}
	public function format_rows( $label, $input ) {
		return '<tr class="form-field"><th>'.$label.'</th><td>'.$input.'</td></tr>';
	}
	public function save_fields( $term_id ) {
		foreach ( $this->meta_fields as $meta_field ) {
			if ( isset( $_POST[ $meta_field['id'] ] ) ) {
				switch ( $meta_field['type'] ) {
					case 'email':
						$_POST[ $meta_field['id'] ] = sanitize_email( $_POST[ $meta_field['id'] ] );
						break;
					case 'text':
						$_POST[ $meta_field['id'] ] = sanitize_text_field( $_POST[ $meta_field['id'] ] );
						break;
				}
				update_term_meta( $term_id, $meta_field['id'], $_POST[ $meta_field['id']] );
			} else if ( $meta_field['type'] === 'checkbox' ) {
				update_term_meta( $term_id, $meta_field['id'], '0' );
			}
		}
	}
}
if (class_exists('Country_origin')) {
	new Country_origin;
};
