<?php
	defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

	add_action( 'wp_ajax_cda_cupom_obter', 'cda_cupons_cadastrar_cda_callback' );
	add_action( 'wp_ajax_nopriv_cda_cupom_obter', 'cda_cupons_cadastrar_cda_callback' );

	function cda_cupons_cadastrar_cda_callback() {
		global $wpdb; // this is how you get access to the database

		$nome = $_POST['nome'];
		$sobrenome = $_POST['sobrenome'];
		$email = $_POST['email'];
		$email_preferencial = $_POST['email_preferencial'];
		$fbid = $_POST['fbid'];
		$cupom_id = $_POST['cupom_id'];

		if (!$nome || !$sobrenome || !$email || !$email_preferencial || !$fbid || !$cupom_id){
			echo json_encode(array("response"=>"ERROR"));
			wp_die();
		}

		$restrito = get_post_meta($cupom_id, "restrito", true);

		if ($restrito){

			$exists = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix . 'cda_lista_restricao'." WHERE email = '".$email."' AND cupom_id = '".$cupom_id."'");

			if (!$exists){

				echo json_encode(array("response"=>"RESTRICTED"));
				wp_die();

			}

		}

		$exists = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix . 'cda_cupons_uso'." WHERE email = '".$email."' AND cupom_id = '".$cupom_id."'");

		if ($exists){
			echo json_encode(array("response"=>"EXISTS"));
			wp_die();
		}

		/* Obter cupom */

		$cupom = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix . 'cda_codigos'." WHERE cupom_id = '".$cupom_id."' AND usado_em IS NULL");

		if (!$cupom){
			echo json_encode(array("response"=>"ENDED"));
			wp_die();
		}

		$wpdb->query("INSERT INTO ".$wpdb->prefix . 'cda_cupons_uso'." VALUES(
			null,
			NOW(),
			'".$nome."',
			'".$sobrenome."',
			'".$email."',
			'".$email_preferencial."',
			'".$fbid."',
			'".$cupom_id."'
		)");

		/* Seta o cupom como usado */

		$wpdb->query("UPDATE ".$wpdb->prefix . 'cda_codigos'." SET usado_em = NOW(), email='".$email."' WHERE id='".$cupom->id."'");

		// Registra a pessoa na lista geral

		$exists_geral = $wpdb->get_row("SELECT * FROM cda_lista_geral WHERE email = '".$email."'");

		if (!$exists_geral){

			$wpdb->query("INSERT INTO cda_lista_geral VALUES(null, NOW(), '".$nome."', '".$sobrenome."', '".$email."')");

		}

		echo json_encode(array("response"=>"OK", "codigo"=>$cupom->codigo));

		wp_die(); // this is required to terminate immediately and return a proper response
	}

?>