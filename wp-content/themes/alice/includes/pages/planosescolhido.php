
<?php
//recebendo dados
$nome = $_GET['nome'];
$email = $_GET['email'];
$nascimento = $_GET['nascimento'];
$telefone = $_GET['tel'];

?>

<!--container-->
</div>
<?php if (have_posts()): while(have_posts()): the_post(); ?>
<form class="cadastro-basico " method="POST" action="<?php echo home_url(); ?>/pagamento">
    <section id="minhaconta">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h2 class="rosa">Plano escolhido</h2>
                    <div class="stepwizard">
                        <div class="stepwizard-row">
                            <div class="stepwizard-step">
                                <button type="button" class="btn btn-default bgpadrao btn-circle" disabled="disabled"></button>
                                <p>Cadastro</p>
                            </div>
                            <div class="stepwizard-step">
                                <button type="button" class="btn btn-primary bgcircle btn-circle"></button>
                                <p>Informações</p>
                            </div>
                            <div class="stepwizard-step">
                                <button type="button" class="btn btn-default bgpadrao btn-circle" disabled="disabled"></button>
                                <p>Pagamento</p>
                            </div> 
                            <div class="stepwizard-step">
                                <button type="button" class="btn btn-default bgpadrao btn-circle" disabled="disabled"></button>
                                <p>Obrigado</p>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12">


                    <div class="col-sm-12 col-xs-12">
                        <div class="col-sm-4 col-xs-12">
                            <img src="<?php the_post_thumbnail_url(); ?>" class=" img-responsive" />
                        </div>

                        <div class="col-sm-4 col-xs-12">
                            <h3 class="title_pink"><?php the_title(); ?></h3>
                            <?php echo excerpt(50); ?>
                        </div>

                        <div class="col-sm-4 col-xs-12">
                            <h3 class="custo">CUSTO DA CARTEIRINHA</h3>
                            <span class="desc_custo">até 3x sem juros nos cartões de crédito.</span><br />
                            <span class="cifrao">R$</span> <span class="preco"><?php echo get_post_meta(get_the_ID(), "_regular_price", true); ?></span><span class="centavos">/ANO</span>
                        </div>


                    </div>

                </div> 

                <div class="col-sm-12 col-xs-12 dadoscliente form-dados">
                    <div class="col-sm-6 col-xs-12">
                        <h3 class="h3checkout">- Preencha com seus dados</h3>

                        <div class="form-group">
                            <input type="text" name="cpf" id="cpf" class="form-control campo-alice" maxlength="13" placeholder="CPF" onkeyup="mascara(this, mcpf);" required/>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-xs-12 left0">
                                <input type="text" name="cep" maxlength="10" id="cep" class="form-control campo-alice" onkeyup="mascara(this, mcep);" onblur="buscarCep()" placeholder="CEP" required/>
                            </div>

                            <div class="col-sm-6 col-xs-12 right0">
                                <input type="text" name="bairro" id="bairro" class="form-control campo-alice" placeholder="Bairro" readonly="readonly"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="rua" id="rua" class="form-control campo-alice" placeholder="Rua" readonly="readonly" required/>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-xs-12 left0">
                                <input type="text" name="numero" id="numero" class="form-control campo-alice" placeholder="Número" required/>
                            </div>

                            <div class="col-sm-6 col-xs-12 right0">
                                <input type="text" name="complemento" id="complemento" class="form-control campo-alice" placeholder="Complemento" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-xs-12 left0">
                                <input type="text" name="cidade" id="cidade" class="form-control campo-alice" placeholder="Cidade" readonly="readonly"/>
                            </div>

                            <div class="col-sm-6 col-xs-12 right0">
                                <input type="text" name="estado" id="estado" class="form-control campo-alice" placeholder="Estado" readonly="readonly"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>                        


                    </div>

                    <div class="col-sm-6 col-xs-12">


                        <!--opções de pagamento-->
                        <fieldset>
                            <h3 class="h3checkout">- Formas de pagamento</h3>
                            <div class="form-group">                     
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group fullradio">
                                        <div class="btn-group radio-group">
                                            <label class="btn btn-primary not-active custom-radio cartao radio-ativo">Cartão de crédito <input type="radio" value="cartao" name="tipo_pgto" class="tipo_pgto" checked></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group fullradio">
                                        <div class="btn-group radio-group">
                                            <label class="btn btn-primary not-active boleto custom-radio">Boleto <input type="radio" value="boleto" name="tipo_pgto" class="tipo_pgto"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">        
                                <div class="col-sm-6 col-xs-12 text-center">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/formas-de-pagamento.jpg" class="img-responsive" alt="Formas de pagamento" />
                                </div>
                                <div class="col-sm-6 col-xs-12 text-center">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/boleto.jpg" class="img-responsive" alt="Formas de pagamento" />
                                </div>
                            </div>
                        </fieldset>

                        <!--retirada-->
                        <fieldset>
                            <h3 class="h3checkout">- Entrega da certeirinha</h3>
                            <div class="form-group">                     
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group fullradio">
                                        <div class="btn-group radio-group">
                                            <label class="btn btn-primary not-active custom-radio retirar radio-ativo">Retirar loja clube <input type="radio" value="retirar" name="entrega" class="entrega" checked required></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group fullradio">
                                        <div class="btn-group radio-group">
                                            <label class="btn btn-primary not-active sedex custom-radio">Sedex <input type="radio" value="sedex" name="entrega" class="entrega" required></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">        
                                <div class="col-sm-6 col-xs-12 text-center">
                                    <span class="desc_entrega">Av. Cândido de Abreu, 127 - <strong>CA 11 - Piso L2</strong></span>
                                </div>
                                <div class="col-sm-6 col-xs-12 text-center">
                                    <span class="desc_entrega"><strong>R$ 10,00</strong> | 5 dias úteis</span>
                                </div>
                            </div>
                        </fieldset>

                        <!--presente-->
                        <div class="boxpresente">
                            <div class="form-group">
                                <div class="col-sm-12 col-xs-12">
                                    <h3 class="h3checkout">- Presente de boas vindas</h3>                            
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12 col-xs-12">
                                    <p class="text-center desc_presente">Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado.</p>                      
                                </div>
                            </div>                        

                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="presente" value="10sessoes" required>
                                    10 Sessões de Depilação | Espaço lazer
                                </label>
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="presente" value="cremenatura" required>
                                    Creme Hidratante Natura
                                </label>
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="presente" value="10sessoes" required>
                                    Voucher R$ 50 Havanna Café
                                </label>
                                <br />                                
                                <p><hr /></p>                                
                                 <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="presente" value="10sessoes" required>
                                    Escolher 1 Presente na Loja Clube
                                </label>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-xs-12 text-right">
                        <button class="btn btn-danger btn-alice" onclick="window.location.href = '<?php echo home_url(); ?>/minha-conta'">VOLTAR</button>
                        <button class="btn btn-success btn-alice" type="submit">AVANÇAR</button>
                    </div>

                </div>

            </div>        
        </div>
    </section>
    
    <!--dados do usuário-->
    <input type="hidden" name="nome" id="nome" value="<?php echo $nome; ?>" />
    <input type="hidden" name="email" id="email" value="<?php echo $email; ?>" />
    <input type="hidden" name="nascimento" id="nascimento" value="<?php echo $nascimento; ?>" />
    <input type="hidden" name="tel" id="tel" value="<?php echo $telefone; ?>" />
    
</form>
<?php endwhile; endif; ?>



<div class="container">



