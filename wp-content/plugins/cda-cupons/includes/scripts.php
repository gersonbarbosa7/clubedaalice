<?php

	defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

	function cda_cupons_enqueue_scripts() {
		global $post;
		if (is_post_type_archive('cda_cupom')){
			wp_enqueue_style( 'css-cupom-component', plugin_dir_url( __FILE__ ).'css/cupons.css?v='.rand(1,9999999) );
			wp_enqueue_style('empresas');
    		wp_enqueue_style('listagem');
		} elseif (is_single() && $post->post_type == "cda_cupom"){
			wp_enqueue_style( 'css-cupom-component', plugin_dir_url( __FILE__ ).'css/cupons.css?v='.rand(1,9999999) );
			wp_enqueue_script( 'js-get-cupom', plugin_dir_url( __FILE__ ).'js/get_cupom.js', array('jquery'), rand(1,999999), true);
		}
	}
	
	add_action( 'wp_enqueue_scripts', 'cda_cupons_enqueue_scripts', 99 );

?>