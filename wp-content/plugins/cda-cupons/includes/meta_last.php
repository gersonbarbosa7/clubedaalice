<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/* Define a meta box */

add_action( 'add_meta_boxes', 'cda_cupons_add_meta_box' );

function cda_cupons_add_meta_box() {
    $screens = array( 'cda_cupom' );
    foreach ($screens as $screen) {
        add_meta_box(
            'cda_cupons_codigos',
            'Códigos',
            'cda_cupons_codigos_metabox_callback',
            $screen
        );
    }
}

function cda_cupons_codigos_metabox_callback(){
  global $wpdb;
  global $post;
  $participantes = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix . 'cda_codigos'." WHERE cupom_id='".$post->ID."'");
  ?>
  <a href="<?php echo get_edit_post_link()."&exportar_cupom=".$post->ID ?>" target="_blank" class="button">Exportar lista</a>
  <br/><br/>
  <table class="widefat fixed">
    <thead>
      <tr>
        <td width="15%">Código</td>
        <td width="25%">Utilizado em</td>
        <td width="30%">Nome</td>
        <td width="30%">E-mail</td>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach ($participantes as $participante){
        $utilizacao = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix . 'cda_cupons_uso'." WHERE email='".$participante->email."' AND cupom_id='".$post->ID."'");
        ?>
          <tr>
            <td><?php echo $participante->codigo?></td>
            <td><?php echo date('d/m/Y H:i', strtotime($participante->usado_em))?></td>
            <td><a href="http://www.facebook.com/<?php echo $utilizacao->fbid?>" target="_blank"><?php echo $utilizacao->nome?></a></td>
            <td><?php echo $participante->email?></td>
          </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
  <?php
}

?>