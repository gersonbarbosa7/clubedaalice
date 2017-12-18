<!--container-->
</div>


<section id="minhaconta">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <h2 class="rosa">Minha conta</h2>
                <div class="stepwizard">
                    <div class="stepwizard-row">
                        <div class="stepwizard-step">
                            <button type="button" class="btn btn-primary bgcircle btn-circle"></button>
                            <p>Cadastro</p>
                        </div>
                        <div class="stepwizard-step">
                            <button type="button" class="btn btn-default bgpadrao btn-circle" disabled="disabled"></button>
                            <p>Informações</p>
                        </div>
                        <div class="stepwizard-step">
                            <button type="button" class="btn btn-default bgpadrao btn-circle" disabled="disabled"></button>
                            <p>Pagamento</p>
                        </div> 
                    </div>
                </div>

                <div class="col-sm-12 col-xs-12">
                    <div class="col-sm-3 col-xs-12">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/foto-perfil.jpg" class=" img-responsive" />
                    </div>
                    <div class="col-sm-9 col-xs-12 lista-btns">
                        <h3 class="h3fcb">- Dados Faceboook</h3>
                        <button class="btn btn-primary btn-fcb"> Perfil do facebook <i class="fa fa-lock"></i></button>
                    </div>

                    <div class="col-sm-12 col-xs-12 lista-btns">
                        <div class="col-sm-6 col-xs-12">
                            <button class="btn btn-primary btn-fcb"> Nome do facebook <i class="fa fa-lock"></i></button>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <button class="btn btn-primary btn-fcb"> Sobrenome <i class="fa fa-lock"></i></button>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <button class="btn btn-primary btn-fcb"> E-mail do facebook <i class="fa fa-lock"></i></button>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <button class="btn btn-primary btn-fcb"> ID do facebook <i class="fa fa-lock"></i></button>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-sm-6 col-xs-12 form-dados">
                <h3 class="h3checkout">- Preencha com seus dados</h3>

                <form class="cadastro-basico" id="dados_carteirinha" method="POST" action="">
                    <div class="form-group">
                        <input type="text" name="nome" id="nome" class="form-control campo-alice" placeholder="Seu nome completo" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="nascimento" maxlength="10" id="nascimento" class="form-control campo-alice" onkeyup="mascara(this, mdata);" placeholder="Data de nascimento" required/>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control campo-alice" placeholder="Seu melhor e-mail" required/>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email2" id="email2" class="form-control campo-alice" placeholder="Repita seu melhor e-mail" required/>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="tel" id="tel" class="form-control campo-alice" maxlength="14" onkeyup="mascara(this, mtel);" placeholder="Telefone celular com DDD" required/>
                    </div>
                    <div class="form-check text-center">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="feminino" disabled="disabled" checked="checked">
                            Feminino
                        </label>
                    </div>

                    
                    <input type="hidden" name="produto_id" id="produto_id" value="" />

                </form>
            </div>
        </div>        
    </div>
</section>

<section id="carteirinhas">
    <div class="container">
        <!--rosa-->
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <h2><strong>- Escolha sua carteirinha</strong><br />Seu Passaporte de Descontos e Vantagens</h2>
            </div>
        </div>

        <?php
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => '2'
                /* 'tax_query' => array(
                  array(
                  'taxonomy' => 'tipo_de_cartao',
                  'field' => 'slug',
                  'terms' => 'pessoa-juridica'
                  )
                  ),
                  'posts_per_page' => '10' */
        );
        $loop = new WP_Query($args);
        if ($loop->have_posts()) {
            while ($loop->have_posts()) : $loop->the_post();
                if (has_post_thumbnail()) {
                    $cor = get_post_meta(get_the_ID(), "cor", true);
                    $preco = get_post_meta(get_the_ID(), "_regular_price", true);
                    ?>

                    <div class="row line-pink rowProduto" id="<?php echo get_the_ID(); ?>" onclick="selecionaProduto(this.id)" url-produto="<?php echo get_the_permalink(); ?>">
                        <div class="col-sm-3 col-xs-12 text-center">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icon_check-empty.png" class="img-responsive empty_<?php echo get_the_ID(); ?> icon_check-empty" />
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icon-check.png" class="img-responsive icon_check check_<?php echo get_the_ID(); ?>" referencia="<?php echo get_the_ID(); ?>" style="display: none;" />
                            <img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive fullimg imgcartao nocheck" id="cartao1" alt="<?php the_title(); ?>" />
                            <!---->
                            <h4 <?php if ($cor) { echo 'style="color:' . $cor . ' !important;"'; } ?>><?php the_title(); ?></h4>
                            <button class="btn btn-default button-pink" <?php if ($cor) { echo 'style="background:' . $cor . ' !important;"'; } ?>><strong>R$<?php echo $preco; ?></strong>/ANO</button>
                        </div>
                        <div class="col-sm-9 col-xs-12">
                            <div class="alert alert-danger alert-pink fade in" <?php if ($cor) { echo 'style="background:' . $cor . ' !important;"'; } ?>>                    
                                <h3><?php the_title(); ?></h3>
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div><!--/rosa-->

                <?php
                } endwhile;
        } else {
            echo '<div class="col-md-12 col-sm-12 col-xs-12">Nenhum produto encontrado.</div>';
        }
        wp_reset_postdata();
        ?>


        
    </div>
</section>

<section id="fechamento">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 hidden-xs"></div>
            <div class="col-sm-6 text-center">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="termos" id="termos" value="aceito" checked required>
                        Li e aceito os termos de uso
                    </label>
                    <br /><a href="javascript:void(0)" data-toggle="modal" data-target="#termos_condicoes">Ler os termos de contrato</a>
                </div>
            </div>
            <div class="col-sm-3 col-xs-12">
                <button type="button" class="btn btn-danger btn-alice" onclick="window.history.back()">VOLTAR</button>
                <button type="button" class="btn btn-success btn-alice" onclick="prepararCheckout()">AVANÇAR</button>
            </div>
        </div>
    </div>
</section>




<div class="container">



