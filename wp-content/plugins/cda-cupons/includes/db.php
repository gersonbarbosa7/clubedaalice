<?php
	
	defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

	function cda_cupons_install(){
	
		global $wpdb;

		$table_name = $wpdb->prefix . 'cda_cupons_uso';
		
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			data_cadastro datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			nome varchar(200) NOT NULL,
			sobrenome varchar(200) NOT NULL,
			email varchar(255) NOT NULL,
			fbid varchar(30) NOT NULL,
			cupom_id int(11) NOT NULL,
			UNIQUE KEY id (id)
		) $charset_collate;";

		dbDelta( $sql );

		$table_name = $wpdb->prefix . 'cda_codigos';
		
		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			codigo varchar(200) NOT NULL,
			usado_em datetime,
			email varchar(255),
			cupom_id int(11) NOT NULL,
			UNIQUE KEY id (id)
		) $charset_collate;";

		dbDelta( $sql );

	}

?>