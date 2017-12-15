<?php
	//add_filter('show_admin_bar', '__return_false');
	define('THEME_PATH', get_bloginfo('template_directory') . '/');
	define('VENDOR', THEME_PATH . 'vendor/');
	define('CSS', THEME_PATH . 'css/');
	define('IMG', THEME_PATH . 'images/');
	$server = $_SERVER['SERVER_NAME']; 
	$endereco = $_SERVER ['REQUEST_URI'];
	$site = "http://" . $server . $endereco;

	if (!(current_user_can('administrator'))) {
	function remove_wpcf7() {
	    remove_menu_page( 'wpcf7' ); 
	}

	add_action('admin_menu', 'remove_wpcf7');
     }

	define('URLATUAL', $site);

	if ( ! function_exists('load_my_scripts')) {
	    function load_my_scripts() {
	        if ( ! is_admin()) {
		        wp_deregister_script('jquery'); 
		        wp_register_script('main', THEME_PATH . 'js/main.js', [], rand(0, 999));
		        //wp_register_script('jquery', VENDOR . 'jquery/dist/jquery.min.js');
		        wp_register_script('owl', VENDOR . 'owl.carousel/dist/owl.carousel.min.js');
		        //wp_register_script('bootstrap', VENDOR . 'bootstrap-sass/assets/javascripts/bootstrap.min.js');
		        wp_register_script('lightbox', THEME_PATH . 'js/lightbox.min.js');   
		        wp_register_script('masonry', THEME_PATH . 'js/masonry.js');       

		        wp_enqueue_script('jquery', false, array(), false, true);
		        wp_enqueue_script('owl', false, array('jquery'), false, true);
		        wp_enqueue_script('main', false, array('jquery', 'owl'), false, true);

		        if (is_page('nossos-eventos')) {
		        	wp_enqueue_script('bootstrap', false, array('jquery'), false, true);
		        }

		        if (is_page('inicio') || is_category()) {
		        	wp_enqueue_script('masonry', false, array('jquery'), false, true);
		        }


		        if (is_singular('empresas')) {
		        	wp_enqueue_script('lightbox', false, array('jquery'), false, true);
		        }
	        }
	    }
	}
	add_action('wp_enqueue_scripts', 'load_my_scripts');

	// restringe CEP
	function wc_sell_only_states( $states ) {
		$states['BR'] = array(
			'SC' => __( 'Santa Catarina', 'woocommerce' ),
		);
		return $states;
	}
	add_filter( 'woocommerce_states', 'wc_sell_only_states' );


	if ( ! function_exists('load_my_styles')) {
	    function load_my_styles() {
	        if ( ! is_admin()) {
	        	wp_register_style('plugins', CSS . 'vendor/loader.css', [], rand(0, 999));
	        	wp_register_style('geral', CSS . 'geral.css', [], rand(0, 999));
	        	wp_register_style('blog', CSS . 'blog.css', [], rand(0, 999));
	        	wp_register_style('inicio', CSS . 'inicio.css', [], rand(0, 999));
	        	wp_register_style('categoria', CSS . 'categoria.css', [], rand(0, 999));
	        	wp_register_style('empresa', CSS . 'empresa.css', [], rand(0, 999));
	        	wp_register_style('empresas', CSS . 'empresas.css', [], rand(0, 999));
	        	wp_register_style('eventos', CSS . 'eventos.css', [], rand(0, 999));
	        	wp_register_style('home', CSS . 'home.css', [], rand(0, 999));
	        	wp_register_style('pagina', CSS . 'pagina.css', [], rand(0, 999));
	        	wp_register_style('sem-sidebar', CSS . 'sem-sidebar.css', [], rand(0, 999));
	        	wp_register_style('interna', CSS . 'interna.css', [], rand(0, 999));
	        	wp_register_style('listagem', CSS . 'listagem.css', [], rand(0, 999));
	        	wp_register_style('search', CSS . 'search.css', [], rand(0, 999));
	        	wp_register_style('lightbox', CSS . 'lightbox.min.css');
	        	wp_register_style('owlstyle', VENDOR . 'owl.carousel/dist/assets/owl.carousel.min.css');
	        	wp_register_style('owltheme', VENDOR . 'owl.carousel/dist/assets/owl.theme.default.min.css');

		        wp_enqueue_style('plugins');
		        wp_enqueue_style('geral');
		        wp_enqueue_style('owlstyle');
		        wp_enqueue_style('owltheme');

		        if (is_front_page()) {
		        	wp_enqueue_style('home');
		        }
		        if (is_page('inicio') || is_category()) {
		        	wp_enqueue_style('inicio');
		        }	        
		        elseif (is_singular('empresas')) {
		        	wp_enqueue_style('empresa');
		        	wp_enqueue_style('lightbox');
		        }
		        elseif (is_singular('post')) {
		        	wp_enqueue_style('interna');
		        }
		        elseif (is_page('descontos')) {
		        	wp_enqueue_style('empresas');
		        	wp_enqueue_style('listagem');
		        }

		        elseif (is_page('nossos-eventos') || is_singular('eventos')) {
		        	wp_enqueue_style('eventos');
		        }
		        elseif (is_page('blog')) {
		        	wp_enqueue_style('blog');
		        }
		        elseif (is_page_template('template-sem-sidebar.php')) {
		        	wp_enqueue_style('sem-sidebar');
		        }
		        elseif (is_tax('categoria_da_empresa')) {
		        	wp_enqueue_style('listagem');
		        }
		        elseif (is_archive() || is_category()) {
		        	wp_enqueue_style('categoria');
		        }
		        elseif (is_search()) {
		        	wp_enqueue_style('search');
		        }
		        else {
		        	wp_enqueue_style('home');
		        }
	        }
	    }
	}
	add_action('wp_enqueue_scripts', 'load_my_styles');

	// Register Theme Features
	function custom_theme_features()  {

		// Add theme support for Featured Images
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'destaque', 460, 315, true );
		add_image_size( 'movies-thumbnail', 400, 9999 );

		/**
		 * Register Sidebar
		 */
		function curtom_widget() {

			/* Register the primary sidebar. */
			register_sidebar(
				array(
					'id' => 'widget-pinterest',
					'name' => __( 'Widgets Alices', 'textdomain' ),
					'description' => __( 'Widgets Dinâmicos das Alices.', 'textdomain' ),
					'before_widget' => '<li><aside id="%1$s" class="widget %2$s">',
					'after_widget' => '</aside></li>',
					'before_title' => '<h3 class="widget-titulo">',
					'after_title' => '</h3>'
				)
			);



			/* Repeat register_sidebar() code for additional sidebars. */
		}
		add_action( 'widgets_init', 'curtom_widget' );

		// Add theme support for document Title tag
		add_theme_support( 'title-tag' );
	}
	add_action( 'after_setup_theme', 'custom_theme_features' );

	// Register Custom Post Type
	function empresas() {

		$labels = array(
			'name'                  => _x( 'Empresas', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Empresa', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Empresas', 'text_domain' ),
			'name_admin_bar'        => __( 'Empresas', 'text_domain' ),
			'archives'              => __( 'Arquivos', 'text_domain' ),
			'parent_item_colon'     => __( 'Pai:', 'text_domain' ),
			'all_items'             => __( 'Todas', 'text_domain' ),
			'add_new_item'          => __( 'Nova', 'text_domain' ),
			'add_new'               => __( 'Nova', 'text_domain' ),
			'new_item'              => __( 'Nova', 'text_domain' ),
			'edit_item'             => __( 'Editar', 'text_domain' ),
			'update_item'           => __( 'Atualizar', 'text_domain' ),
			'view_item'             => __( 'Ver', 'text_domain' ),
			'search_items'          => __( 'Pesquisar', 'text_domain' ),
			'not_found'             => __( 'Não encontrada', 'text_domain' ),
			'not_found_in_trash'    => __( 'Não encontrada na lixeira', 'text_domain' ),
			'featured_image'        => __( 'Imagem destacada', 'text_domain' ),
			'set_featured_image'    => __( 'Defina a Imagem destacada', 'text_domain' ),
			'remove_featured_image' => __( 'Remova a Imagem destacada', 'text_domain' ),
			'use_featured_image'    => __( 'Use a Imagem destacada', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
			'items_list'            => __( 'Items list', 'text_domain' ),
			'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Empresa', 'text_domain' ),
			'description'           => __( 'Empresas', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-store',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'empresas', $args );

	}
	add_action( 'init', 'empresas', 0 );

	// Register Custom Post Type
	function eventos() {

		$labels = array(
			'name'                  => _x( 'Eventos', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Evento', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Eventos', 'text_domain' ),
			'name_admin_bar'        => __( 'Eventos', 'text_domain' ),
			'archives'              => __( 'Arquivos', 'text_domain' ),
			'parent_item_colon'     => __( 'Pai:', 'text_domain' ),
			'all_items'             => __( 'Todos', 'text_domain' ),
			'add_new_item'          => __( 'Novo', 'text_domain' ),
			'add_new'               => __( 'Novo', 'text_domain' ),
			'new_item'              => __( 'Novo', 'text_domain' ),
			'edit_item'             => __( 'Editar', 'text_domain' ),
			'update_item'           => __( 'Atualizar', 'text_domain' ),
			'view_item'             => __( 'Ver', 'text_domain' ),
			'search_items'          => __( 'Pesquisar', 'text_domain' ),
			'not_found'             => __( 'Não encontrado', 'text_domain' ),
			'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'text_domain' ),
			'featured_image'        => __( 'Imagem destacada', 'text_domain' ),
			'set_featured_image'    => __( 'Defina a Imagem destacada', 'text_domain' ),
			'remove_featured_image' => __( 'Remova a Imagem destacada', 'text_domain' ),
			'use_featured_image'    => __( 'Use a Imagem destacada', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
			'items_list'            => __( 'Items list', 'text_domain' ),
			'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Evento', 'text_domain' ),
			'description'           => __( 'Eventos', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-megaphone',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'eventos', $args );

	}
	add_action( 'init', 'eventos', 0 );

	// Register Custom Post Type
	function slider() {

		$labels = array(
			'name'                  => _x( 'Slides', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Slide', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Slides', 'text_domain' ),
			'name_admin_bar'        => __( 'Slides', 'text_domain' ),
			'archives'              => __( 'Arquivos', 'text_domain' ),
			'parent_item_colon'     => __( 'Pai:', 'text_domain' ),
			'all_items'             => __( 'Todos', 'text_domain' ),
			'add_new_item'          => __( 'Novo', 'text_domain' ),
			'add_new'               => __( 'Novo', 'text_domain' ),
			'new_item'              => __( 'Novo', 'text_domain' ),
			'edit_item'             => __( 'Editar', 'text_domain' ),
			'update_item'           => __( 'Atualizar', 'text_domain' ),
			'view_item'             => __( 'Ver', 'text_domain' ),
			'search_items'          => __( 'Pesquisar', 'text_domain' ),
			'not_found'             => __( 'Não encontrado', 'text_domain' ),
			'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'text_domain' ),
			'featured_image'        => __( 'Imagem destacada', 'text_domain' ),
			'set_featured_image'    => __( 'Defina a Imagem destacada', 'text_domain' ),
			'remove_featured_image' => __( 'Remova a Imagem destacada', 'text_domain' ),
			'use_featured_image'    => __( 'Use a Imagem destacada', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
			'items_list'            => __( 'Items list', 'text_domain' ),
			'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Slide', 'text_domain' ),
			'description'           => __( 'Slider', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'thumbnail', ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-images-alt2',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'slider', $args );

	}
	add_action( 'init', 'slider', 0 );

	// Register Custom Post Type
	function imprensa() {

		$labels = array(
			'name'                  => _x( 'Matérias', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Matéria', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Imprensa', 'text_domain' ),
			'name_admin_bar'        => __( 'Imprensa', 'text_domain' ),
			'archives'              => __( 'Arquivos', 'text_domain' ),
			'parent_item_colon'     => __( 'Pai:', 'text_domain' ),
			'all_items'             => __( 'Todos', 'text_domain' ),
			'add_new_item'          => __( 'Novo', 'text_domain' ),
			'add_new'               => __( 'Novo', 'text_domain' ),
			'new_item'              => __( 'Novo', 'text_domain' ),
			'edit_item'             => __( 'Editar', 'text_domain' ),
			'update_item'           => __( 'Atualizar', 'text_domain' ),
			'view_item'             => __( 'Ver', 'text_domain' ),
			'search_items'          => __( 'Pesquisar', 'text_domain' ),
			'not_found'             => __( 'Não encontrado', 'text_domain' ),
			'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'text_domain' ),
			'featured_image'        => __( 'Imagem destacada', 'text_domain' ),
			'set_featured_image'    => __( 'Defina a Imagem destacada', 'text_domain' ),
			'remove_featured_image' => __( 'Remova a Imagem destacada', 'text_domain' ),
			'use_featured_image'    => __( 'Use a Imagem destacada', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
			'items_list'            => __( 'Items list', 'text_domain' ),
			'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Matéria', 'text_domain' ),
			'description'           => __( 'Imprensa', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'thumbnail', ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-welcome-widgets-menus',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'imprensa', $args );

	}
	add_action( 'init', 'imprensa', 0 );

	// Register Custom Post Type
	function publicidades() {

		$labels = array(
			'name'                  => _x( 'Publicidades', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Publicidade', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Publicidades', 'text_domain' ),
			'name_admin_bar'        => __( 'Publicidades', 'text_domain' ),
			'archives'              => __( 'Arquivos', 'text_domain' ),
			'parent_item_colon'     => __( 'Pai:', 'text_domain' ),
			'all_items'             => __( 'Todos', 'text_domain' ),
			'add_new_item'          => __( 'Novo', 'text_domain' ),
			'add_new'               => __( 'Novo', 'text_domain' ),
			'new_item'              => __( 'Novo', 'text_domain' ),
			'edit_item'             => __( 'Editar', 'text_domain' ),
			'update_item'           => __( 'Atualizar', 'text_domain' ),
			'view_item'             => __( 'Ver', 'text_domain' ),
			'search_items'          => __( 'Pesquisar', 'text_domain' ),
			'not_found'             => __( 'Não encontrado', 'text_domain' ),
			'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'text_domain' ),
			'featured_image'        => __( 'Imagem destacada', 'text_domain' ),
			'set_featured_image'    => __( 'Defina a Imagem destacada', 'text_domain' ),
			'remove_featured_image' => __( 'Remova a Imagem destacada', 'text_domain' ),
			'use_featured_image'    => __( 'Use a Imagem destacada', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
			'items_list'            => __( 'Items list', 'text_domain' ),
			'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Publicidade', 'text_domain' ),
			'description'           => __( 'Publicidades', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'thumbnail' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-tag',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'publicidades', $args );

	}
	add_action( 'init', 'publicidades', 0 );

	if (function_exists('acf_set_options_page_menu')){
	acf_set_options_page_menu('Opções do Site');
	}

	// Register Custom Taxonomy
	function categoria_publicidades() {

		$labels = array(
			'name'                       => _x( 'Categorias - Publicidades', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Categoria', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Categorias', 'text_domain' ),
			'all_items'                  => __( 'Todas', 'text_domain' ),
			'parent_item'                => __( 'Pai', 'text_domain' ),
			'parent_item_colon'          => __( 'Pai:', 'text_domain' ),
			'new_item_name'              => __( 'Nova', 'text_domain' ),
			'add_new_item'               => __( 'Nova', 'text_domain' ),
			'edit_item'                  => __( 'Editar', 'text_domain' ),
			'update_item'                => __( 'Atualizar', 'text_domain' ),
			'view_item'                  => __( 'Ver', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separe com vírgulas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Adicionar ou remover itens', 'text_domain' ),
			'choose_from_most_used'      => __( 'Selecione das mais usadas', 'text_domain' ),
			'popular_items'              => __( 'Populares', 'text_domain' ),
			'search_items'               => __( 'Buscar', 'text_domain' ),
			'not_found'                  => __( 'Não encontrado', 'text_domain' ),
			'no_terms'                   => __( 'Não encontrado', 'text_domain' ),
			'items_list'                 => __( 'Lista', 'text_domain' ),
			'items_list_navigation'      => __( 'Navegação', 'text_domain' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'categoria_publicidades', array( 'publicidades' ), $args );

	}
	add_action( 'init', 'categoria_publicidades', 0 );



	// Register Custom Taxonomy
	function categoria_das_empresas() {

		$labels = array(
			'name'                       => _x( 'Categorias - Empresas', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Categoria', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Categorias', 'text_domain' ),
			'all_items'                  => __( 'Todas', 'text_domain' ),
			'parent_item'                => __( 'Pai', 'text_domain' ),
			'parent_item_colon'          => __( 'Pai:', 'text_domain' ),
			'new_item_name'              => __( 'Nova', 'text_domain' ),
			'add_new_item'               => __( 'Nova', 'text_domain' ),
			'edit_item'                  => __( 'Editar', 'text_domain' ),
			'update_item'                => __( 'Atualizar', 'text_domain' ),
			'view_item'                  => __( 'Ver', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separe com vírgulas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Adicionar ou remover itens', 'text_domain' ),
			'choose_from_most_used'      => __( 'Selecione das mais usadas', 'text_domain' ),
			'popular_items'              => __( 'Populares', 'text_domain' ),
			'search_items'               => __( 'Buscar', 'text_domain' ),
			'not_found'                  => __( 'Não encontrado', 'text_domain' ),
			'no_terms'                   => __( 'Não encontrado', 'text_domain' ),
			'items_list'                 => __( 'Lista', 'text_domain' ),
			'items_list_navigation'      => __( 'Navegação', 'text_domain' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'categoria_da_empresa', array( 'empresas' ), $args );

	}
	add_action( 'init', 'categoria_das_empresas', 0 );

	// Register Navigation Menus
	function custom_navigation_menus() {

		$locations = array(
			'menu_superior' => __( 'Menu superior', 'text_domain' ),
			'institucional' => __( 'Menu do rodapé', 'text_domain' ),
			/*'menu_blog' => __( 'Menu do Blog', 'text_domain' ),*/
		);
		register_nav_menus( $locations );

	}
	add_action( 'init', 'custom_navigation_menus' );


	function getPostViews($postID){
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '1');
	        return "1 visualização";
	    }
	    return $count. ($count === 1 ? ' visualização' : ' visualizações');
	}
	
	function setPostViews($postID) {
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        $count = 0;
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	    }else{
	        $count++;
	        update_post_meta($postID, $count_key, $count);
	    }
	}

	function nomedoMes($mes) {
		switch ($mes) {
	        case "01": $mes = "Janeiro";
	        			break;
	        case "02": $mes = "Fevereiro";
	        			break;
	        case "03": $mes = "Março";
	        			break;
	        case "04": $mes = "Abril";
	        			break;
	        case "05": $mes = "Maio";
	        			break;
	        case "06": $mes = "Junho";
	        			break;
	        case "07": $mes = "Julho";
	        			break;
	        case "08": $mes = "Agosto";
	        			break;
	        case "09": $mes = "Setembro";
	        			break;
	        case "10": $mes = "Outubro";
	        			break;
	        case "11": $mes = "Novembro";
	        			break;
	        case "12": $mes = "Dezembro";
	        			break; 
		}
		return $mes;
	}

	// Register Custom Post Type
function faixas() {

	$labels = array(
		'name'                  => _x( 'Faixas', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Faixa', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Cores dos descontos', 'text_domain' ),
		'name_admin_bar'        => __( 'Cores dos descontos', 'text_domain' ),
		'archives'              => __( 'Arquivo', 'text_domain' ),
		'attributes'            => __( 'Atributos', 'text_domain' ),
		'parent_item_colon'     => __( 'Pai', 'text_domain' ),
		'all_items'             => __( 'Todas', 'text_domain' ),
		'add_new_item'          => __( 'Nova', 'text_domain' ),
		'add_new'               => __( 'Nova', 'text_domain' ),
		'new_item'              => __( 'Nova', 'text_domain' ),
		'edit_item'             => __( 'Editar', 'text_domain' ),
		'update_item'           => __( 'Atualizar', 'text_domain' ),
		'view_item'             => __( 'Ver', 'text_domain' ),
		'view_items'            => __( 'Ver', 'text_domain' ),
		'search_items'          => __( 'Pesquisar', 'text_domain' ),
		'not_found'             => __( 'Nada encontrado', 'text_domain' ),
		'not_found_in_trash'    => __( 'Nada encontrado na lixeira', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Faixa', 'text_domain' ),
		'description'           => __( 'Faixas', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-image-filter',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'faixa', $args );

}
add_action( 'init', 'faixas', 0 );

function disable_acf_load_field( $field ) {

	$field['readonly'] = 1;
	return $field;

}
add_filter('acf/load_field/name=post_views_count', 'disable_acf_load_field');

add_action( 'admin_enqueue_scripts', 'add_my_script' );
function add_my_script() {
    wp_enqueue_script(
        'disable',
        get_template_directory_uri() . '/js/disable.js',
        array('jquery'),
        25
    );
}

add_filter( 'rewrite_rules_array', 'my_insert_rewrite_rules' );
function my_insert_rewrite_rules( $rules ) {
  $newrules = array();
  // audio pieces with g_sacred tax:
  $newrules['categoria_da_empresa/([^/]+)/?$'] = 'index.php?categoria_da_empresa=$matches[1]';
  $newrules['categoria_da_empresa/([^/]+)/page/?([0-9]{1,})/?$'] =
      'index.php?categoria_da_empresa=$matches[1]&page=$matches[2]';


  return $newrules + $rules;
}

add_action( 'wp_loaded','my_flush_ALL_rules' );
function my_flush_ALL_rules(){
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}

//woocommerce support
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

//LIMITAR OS CARACTERES DO THE_EXCERTP() NO WORDPRESS
function excerpt($limit) {
        $excerpt = explode(' ', get_the_excerpt(), $limit);
        if (count($excerpt)>=$limit) {
                array_pop($excerpt);
                $excerpt = implode(" ",$excerpt).'...';
        } else {
                $excerpt = implode(" ",$excerpt);
        }
$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
return $excerpt;
}
function recent_posts($no_posts = 10, $excerpts = true) {
global $wpdb;
$request = "SELECT ID, post_title, post_excerpt FROM $wpdb->posts WHERE post_status = 'publish' AND post_type='portifolio' ORDER BY post_date DESC LIMIT $no_posts";
$posts = $wpdb->get_results($request);
if($posts) {
foreach ($posts as $posts) {
$post_title = stripslashes($posts->post_title);
$permalink = get_permalink($posts->ID);
$output .= '
' . HTMLSPECIALCHARS($POST_TITLE) . '
';
if($excerpts) {
$output.= '
' . stripslashes($posts->post_excerpt);
}$output .= '';
}
} else {
$output .= '
No posts found';
}
echo $output;
}
function new_excerpt_more($more) {
global $post;
return '<p><a class="button_readmore" href="'. get_permalink($post->ID) . '"> Leia Mais</a></p>';
}
add_filter('excerpt_more', 'new_excerpt_more');