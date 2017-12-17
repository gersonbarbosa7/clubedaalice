<?php
/*
Plugin Name: Cupons - Clube da Alice
Plugin URI:  http://www.clubedaalice.com.br
Description: Adiciona ao painel do wordpress a opção de criar cupons de parceiros
Version:     1.0
Author:      Freela PHP
Author URI:  http://www.freelaphp.com
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

require(plugin_dir_path( __FILE__ ).'includes/posttypes.php' );
require(plugin_dir_path( __FILE__ ).'includes/meta.php' );
require(plugin_dir_path( __FILE__ ).'includes/shortcodes.php' );
require(plugin_dir_path( __FILE__ ).'includes/scripts.php' );
require(plugin_dir_path( __FILE__ ).'includes/db.php' );
require(plugin_dir_path( __FILE__ ).'includes/ajax.php' );
require(plugin_dir_path( __FILE__ ).'includes/columns.php' );
require(plugin_dir_path( __FILE__ ).'includes/pages.php');

if ($_GET['exportar_cupom']){
   exportar_cupom();
}

function exportar_cupom(){
        $cupom_id = $_GET['exportar_cupom'];
        global $post;
        if ($cupom_id){

                global $wpdb;
                $codigos = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix . 'cda_codigos'." WHERE cupom_id='".$cupom_id."'");

                $outstr = NULL;

                header("Content-Type: application/csv");
                header("Content-Disposition: attachment;Filename=cupom-".$cupom_id.".csv");

                $outstr.= "Codigo;Data;Nome;E-mail;Facebook;";
                $outstr = substr($outstr, 0, -1)."\n";

                foreach ($codigos as $codigo){
                    $utilizacao = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."cda_cupons_uso WHERE email = '".$codigo->email."' AND cupom_id ='".$cupom_id."'");
                    $outstr.= $codigo->codigo.";".date('d/m/Y H:i', strtotime($codigo->usado_em)).";".$utilizacao->nome.";".$codigo->email.";".$utilizacao->email_preferencial.";".($utilizacao ? "http://www.facebook.com/".$utilizacao->fbid : "")."\n";
                }

                echo $outstr;

                die();

        }
}


add_filter('template_include', 'cda_cupom_template_include');

function cda_cupom_template_include($template){
	if (is_post_type_archive('cda_cupom')){
		$template = plugin_dir_path( __FILE__ ).'includes/templates/archive-cupom.php';
	}
	if (is_single()){
		global $post;
		if ($post->post_type == "cda_cupom"){
			$template = plugin_dir_path( __FILE__ ).'includes/templates/single-cupom.php';
		}
	}
	return $template;
}

register_activation_hook( __FILE__, 'cda_cupons_install' );
