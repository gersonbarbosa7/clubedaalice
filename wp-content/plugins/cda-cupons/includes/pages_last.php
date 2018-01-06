<?php
// create custom plugin settings menu
add_action('admin_menu', 'cda_cupons_create_menu');

function cda_cupons_create_menu() {

	//create new top-level menu
	add_menu_page('Cupons', 'Opções - Cupons', 'administrator', __FILE__, 'cda_cupons_settings_page' , null, __FILE__ );

	//call register settings function
	add_action( 'admin_init', 'cda_cupons_plugin_settings' );
}


function cda_cupons_plugin_settings() {
	//register our settings
}

function cda_cupons_settings_page() {

    global $wpdb;

    $cupom_id_restringir = $_GET['restringir'];

    if ($cupom_id_restringir){

        update_post_meta($cupom_id_restringir, "restrito", 1);

    }

    $cupom_id_desfazer_restringir = $_GET['desfazer_restringir'];

    if ($cupom_id_desfazer_restringir){

        update_post_meta($cupom_id_desfazer_restringir, "restrito", 0);

    }

    $cupons = $_GET['cupons'];

    $lista_restricao = $_GET['lista_restricao'];

    if ($cupons || $lista_restricao):

        if ($lista_restricao){

            $cupom = get_post($lista_restricao);

            $excluiremail = $_GET['excluiremail'];

            if ($excluiremail){

                $wpdb->query("DELETE FROM ".$wpdb->prefix . 'cda_lista_restricao'." WHERE id='".$excluiremail."'");

            }

            if ($_GET['limparlista']){

                $wpdb->query("DELETE FROM ".$wpdb->prefix."cda_lista_restricao WHERE cupom_id = '".$cupom->ID."'");

                echo "<script>window.alert('Lista esvaziada com sucesso!');</script>";

            }
            
            if ($_GET['enviarlista']){

                $file = $_FILES['lista'];

                $parts = explode(".", $file['name']);

                if (in_array($parts[1], array('txt', 'csv'))){

                    $arq = fopen($file['tmp_name'], 'r');

                    $content = fread($arq, filesize($file['tmp_name']));

                    $content = explode("\n", $content);

			        $total = 0;

                    foreach ($content as $newc){

                        $newc = str_replace(",", "", trim($newc));
                        $newc = str_replace(";", "", trim($newc));
			            $newc = str_replace(" ", "", trim($newc));

                        $existe = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix . 'cda_lista_restricao'." WHERE cupom_id='".$cupom->ID."' AND email='".$newc."'");

                        if (!$existe){

                            $wpdb->query("INSERT INTO ".$wpdb->prefix . 'cda_lista_restricao'." VALUES(null, '".$cupom->ID."','".$newc."')");

                        }
			$total++;
                    }

                    fclose($arq);

			echo "<script>window.alert('Foram registrados ".$total." cupons');</script>";

                } else {
			echo "<script>window.alert('O arquivo deve estar em formato csv ou txt');</script>";
		}

            }

            ?>
            <div class="wrap">
            <h2>Lista de Restrição - <?php echo $cupom->post_title?></h2>

            <br><br>
            <a href="<?php echo admin_url('admin.php?page=cda-cupons/includes/pages.php')?>" class="button">Voltar</a>
            <br/><br/>

                <form action="<?php echo admin_url('admin.php?page=cda-cupons/includes/pages.php&lista_restricao='.$cupom->ID."&enviarlista=1")?>" method="POST" enctype="multipart/form-data">
                    <fieldset>
                        <h4>Enviar arquivo com lista</h4>
                        <input type="file" name="lista">
                        <button type="submit" class="button">Enviar lista</button>
                    </fieldset>
                </form>
                <br/><br/>
                <a href="<?php echo admin_url('admin.php?page=cda-cupons/includes/pages.php&lista_restricao='.$cupom->ID."&limparlista=1")?>" class="button" onclick="javascript:if(!confirm('Deseja realmente limpar a lista?')) return false;">Limpar lista</a>
                <br/><br/>
                <table class="table widefat">
                    <thead>
                        <tr>
                            <th width="50%">E-mail</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            global $wpdb;
                            $lista = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix . 'cda_lista_restricao'." WHERE cupom_id='".$cupom->ID."'");
                            foreach ($lista as $item):
                                ?>
                                    <tr>
                                        <td><?php echo $item->email?></td>
                                        <td>
                                            <a onclick="javascript:if (!confirm('Deseja realmente excluir este e-mail? Esta operação é irreversível.')) return false;" href="<?php echo admin_url('admin.php?page=cda-cupons/includes/pages.php&lista_restricao='.$cupom->ID.'&excluiremail='.$item->id)?>" class="button">Remover da lista</a>
                                        </td>
                                    </tr>
                                <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
            <?php

        } else {

        if ($_GET['enviarlista']){

            $file = $_FILES['lista'];

            $parts = explode(".", $file['name']);

            if (in_array($parts[1], array('txt', 'csv'))){

                $arq = fopen($file['tmp_name'], 'r');

                $content = fread($arq, filesize($file['tmp_name']));

                $content = explode("\n", $content);

                foreach ($content as $newc){

                    $newc = str_replace(",", "", trim($newc));
                    $newc = str_replace(";", "", trim($newc));
                    $newc = str_replace(".", "", trim($newc));
                    $newc = str_replace(" ", "", trim($newc));

                    $existe = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix . 'cda_codigos'." WHERE cupom_id='".$cupons."' AND codigo='".$newc."'");

                    if (!$existe){

                        $wpdb->query("INSERT INTO ".$wpdb->prefix . 'cda_codigos'." VALUES(null, '".$newc."', null, null, '".$cupons."')");

                    }

                }

                fclose($arq);

            }

        }

        $excluircupom = $_GET['excluircupom'];

        if ($excluircupom){

            $wpdb->query("DELETE FROM ".$wpdb->prefix . 'cda_cupons_uso'." WHERE cupom_id = '".$excluircupom."'");

            $wpdb->query("DELETE FROM ".$wpdb->prefix . 'cda_codigos'." WHERE id = '".$excluircupom."'");

        }

        $excluirpart = $_GET['excluirpart'];

        if ($excluirpart){

            $existe = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix . 'cda_codigos'." WHERE cupom_id='".$cupons."' AND codigo='".$excluirpart."'");

            $wpdb->query("DELETE FROM ".$wpdb->prefix . 'cda_cupons_uso'." WHERE cupom_id = '".$existe->id."'");

        }

        $cupom = get_post($cupons);

        ?>
        <div class="wrap">
        <h2>Cupons - <?php echo $cupom->post_title?></h2>

        <br><br>
        <a href="<?php echo admin_url('admin.php?page=cda-cupons/includes/pages.php')?>" class="button">Voltar</a>
        <br/><br/>

            <form action="<?php echo admin_url('admin.php?page=cda-cupons/includes/pages.php&cupons='.$cupom->ID."&enviarlista=1")?>" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <h4>Enviar arquivo com lista</h4>
                    <input type="file" name="lista">
                    <button type="submit" class="button">Enviar lista</button>
                </fieldset>
            </form>
            <br/><br/>
            <table class="table widefat">
                <thead>
                    <tr>
                        <th width="10%">Código</th>
                        <th width="15%">Usado em</th>
                        <th width="20%">Nome</th>
                        <th width="30%">E-mail</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        global $wpdb;
                        $participantes = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix . 'cda_codigos'." WHERE cupom_id='".$cupom->ID."'");
                        foreach ($participantes as $participante):
                            $utilizacao = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix . 'cda_cupons_uso'." WHERE email='".$participante->email."' AND cupom_id='".$cupom->ID."'");
                            ?>
                                <tr>
                                    <td><?php echo $participante->codigo?></td>
                                    <td><?php echo $participante->usado_em ? date('d/m/Y H:i', strtotime($participante->usado_em)) : ""?></td>
                                    <td><a href="http://www.facebook.com/<?php echo $utilizacao->fbid?>" target="_blank"><?php echo $utilizacao->nome?></a></td>
                                    <td><?php echo $participante->email?></td>
                                    <td>
                                        <a onclick="javascript:if (!confirm('Deseja realmente excluir este cupom? Esta operação é irreversível.')) return false;" href="<?php echo admin_url('admin.php?page=cda-cupons/includes/pages.php&cupons='.$cupom->ID.'&excluircupom='.$participante->id)?>" class="button">Excluir cupom</a>&nbsp;
                                        <?php
                                        if ($participante->usado_em):
                                        ?>
                                        <a onclick="javascript:if (!confirm('Deseja realmente excluir a participação desta pessoa e tornar este cupom livre? Esta operação é irreversível.')) return false;" href="<?php echo admin_url('admin.php?page=cda-cupons/includes/pages.php&cupons='.$cupom->ID.'&excluirpart='.$participante->codigo)?>" class="button">Excluir participação</a>
                                        <?php
                                        endif;
                                        ?>
                                    </td>
                                </tr>
                            <?php
                        endforeach;
                    ?>
                </tbody>
            </table>
        </div>
        <?php

        }

    else:

    ?>
    <div class="wrap">
    <h2>Cupons</h2>

        <?php
        $args = array('post_type'=>'cda_cupom', 'post_status'=>array('publish', 'draft'), 'posts_per_page'=>-1); 
        $cupons = new WP_Query($args);

        ?>
        <table class="table widefat">
            <thead>
                <tr>
                    <th width="30%">Cupom</th>
                    <th width="20%">Restrito</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($cupons->have_posts()): $cupons->the_post();
                        $restrito = get_post_meta(get_the_ID(), "restrito", true);
                        ?>
                            <tr>
                                <td><?php echo get_the_title()?></td>
                                <td><?php echo $restrito == 1 ? "Sim" : "Não"?></td>
                                <td>
                                    <a href="<?php echo admin_url('admin.php?page=cda-cupons/includes/pages.php&cupons='.get_the_ID())?>" class="button">Cupons</a>
                                    <?php
                                    if (!$restrito):
                                    ?>
                                        <a href="<?php echo admin_url('admin.php?page=cda-cupons/includes/pages.php&restringir='.get_the_ID())?>" class="button">Restringir</a>
                                    <?php
                                    else:
                                    ?>
                                        <a href="<?php echo admin_url('admin.php?page=cda-cupons/includes/pages.php&desfazer_restringir='.get_the_ID())?>" class="button">Remover restrição</a>
                                        <a href="<?php echo admin_url('admin.php?page=cda-cupons/includes/pages.php&lista_restricao='.get_the_ID())?>" class="button">Lista de restrição</a>
                                    <?php
                                    endif;
                                    ?>
                                </td>
                            </tr>
                        <?php
                    endwhile;
                ?>
            </tbody>
        </table>
    </div>

    <?php

    endif;

    ?>

<?php } ?>
