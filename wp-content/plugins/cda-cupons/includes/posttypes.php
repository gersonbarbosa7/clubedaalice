<?php

	defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

	add_action( 'init', 'cda_cupons_init' );

	function cda_cupons_init() {
		$labels = array(
			'name'               => __( 'Cupons' ),
			'singular_name'      => __( 'Cupom' ),
			'menu_name'          => __( 'Cupons' ),
			'name_admin_bar'     => __( 'Cupom' ),
			'add_new'            => __( 'Adicionar novo' ),
			'add_new_item'       => __( 'Adicionar novo cupom' ),
			'new_item'           => __( 'Novo Cupom' ),
			'edit_item'          => __( 'Editar Cupom' ),
			'view_item'          => __( 'Ver Cupom' ),
			'all_items'          => __( 'Todos os Cupons' ),
			'search_items'       => __( 'Buscar Cupons' ),
			'parent_item_colon'  => __( 'Cupons pais:' ),
			'not_found'          => __( 'Nenhum cupom encontrado.' ),
			'not_found_in_trash' => __( 'Nenhum cupom encontrado na lixeira.' )
		);

		$args = array(
			'labels'             => $labels,
            'description'        => 'Cupons que serão exibidos em página específica no site.',
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'cda_cupom' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);

		register_post_type( 'cda_cupom', $args );

		add_image_size('cda_cupom', 722, 380, true);
	}

?>