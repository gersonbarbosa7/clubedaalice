<!--container-->
</div>

<form class="cadastro-basico " method="POST" action="<?php echo home_url(); ?>/obrigado">
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
                                <button type="button" class="btn btn-default bgpadrao btn-circle" disabled="disabled"></button>
                                <p>Informações</p>
                            </div>
                            <div class="stepwizard-step">
                                <button type="button" class="btn btn-primary bgcircle btn-circle"  ></button>
                                <p>Pagamento</p>
                            </div> 
                            <div class="stepwizard-step">
                                <button type="button" class="btn btn-default bgpadrao btn-circle" disabled="disabled"></button>
                                <p>Obrigado</p>
                            </div> 
                        </div>
                    </div>
                    
                    <div class="col-sm-12 form-dados">
                        <h3 class="h3checkout">Cartão de crédito</h3>
                         <img src="<?php echo get_template_directory_uri(); ?>/images/formas-de-pagamento.jpg" class="img-responsive" alt="Formas de pagamento" />
                         <p class="preco_pgto">R$99 + <span class="font_menor">R$10,00 do frete</span></p>
                         <p>Você receberá sua carteirinha por Sedex no endereço cadastrado</p>
                         <button class="btn btn-default" id="planoescolhido"><strong>Plano Escolhido</strong> Carteirinha Pink</button>
                    </div>
                    
                    <div class="col-sm-4">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/cartao-pequeno.jpg" class="img-responsive" alt="Plano escolhido" />
                    </div>
                    
                    <div class="col-sm-8">
                        <p><strong>Código:</strong> ALICE 52 01 4230<br />
                        <strong>Nome:</strong> MARIA DAS DORES<br />
                        <strong>Validade:</strong> NOV / 18<br />
                        <span class="red">Pagamento à confirmar</span></p>
                    </div>
                    
                    <div class="col-sm-12">
                        <h4 class="h4green">Presente de boas vindas:</h4>
                        <p>Voucher 10 Sessões de Depilação</p>
                    </div>
                    
                    <div class="col-sm-12">                        
                        <p><strong class="font_menor2">OBS: Confirmado o seu pagamento, o código para utilização do seu presente estará disponível no painel de sua conta</strong></p>
                    </div>
                    
                </div>
                <div class="col-sm-6 col-xs-12">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/banner-plano.jpg" class="img-responsive" alt="Formas de pagamento" />
                    
                    
                    <div class="form-cartao form-dados">
                        <h3 class="h3checkout">- Digitar Dados do Pagamento</h3>

                        <div class="form-group">
                            <input type="text" name="numero_cartao" id="numero_cartao" class="form-control campo-alice" placeholder="Número do cartão" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" name="nome_cartao" id="numero_cartao" class="form-control campo-alice" placeholder="Nome no cartão" required/>
                        </div> 
                        <div class="form-group">
                            <div class="col-sm-6 col-xs-12 left0">
                                <input type="text" name="csv" maxlength="3" id="csv" class="form-control campo-alice" placeholder="CSV" required/>
                            </div>

                            <div class="col-sm-6 col-xs-12 right0">
                                <input type="text" name="validade" id="validade" class="form-control campo-alice" placeholder="Data de validade" required/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-xs-12 left0">
                                <select name="parcelas" id="parcelas" class="form-control campo-alice">
                                <option value="" selected>Nº de Parcelas</option>
                                <option value="1">1x</option>
                                <option value="2">2x</option>
                                <option value="3">3x</option>
                                <option value="4">4x</option>
                                <option value="5">5x</option>
                                <option value="6">6x</option>
                                <option value="7">7x</option>
                            </select>
                            </div>

                            <div class="col-sm-6 col-xs-12 right0">
                                <input type="text" name="bandeira" id="bandeira" class="form-control campo-alice" placeholder="Bandeira do cartão" required/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                       
                    </div>

                
                </div>
                
                
                 
                <div class="col-sm-6 col-xs-12 pull-right text-right">
                        <button class="btn btn-danger btn-alice" onclick="window.location.href = '<?php echo home_url(); ?>/minha-conta'">VOLTAR</button>
                        <button class="btn btn-success btn-alice" type="submit">AVANÇAR</button>
                    </div>
                

            </div>        
        </div>
    </section>
</form>




<div class="container">



