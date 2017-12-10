<!--container-->
</div>


<section id="minhaconta">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-xs-12">
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
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12">


                <div class="col-sm-12 col-xs-12">
                    <div class="col-sm-4 col-xs-12">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/cartao-escolhido.jpg" class=" img-responsive" />
                    </div>

                    <div class="col-sm-4 col-xs-12">
                        <h3 class="title_pink">Carteirinha Pink</h3>
                        <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum.</p>
                    </div>

                    <div class="col-sm-4 col-xs-12">
                        <h3 class="custo">CUSTO DA CARTEIRINHA</h3>
                        <span class="desc_custo">até 3x sem juros nos cartões de crédito.</span><br />
                        <span class="cifrao">R$</span> <span class="preco">99</span><span class="centavos">/ANO</span>
                    </div>


                </div>

            </div> 

            <div class="col-sm-12 col-xs-12 dadoscliente form-dados">
                <div class="col-sm-6 col-xs-12">
                    <h3 class="h3checkout">- Preencha com seus dados</h3>
                    <form class="cadastro-basico " method="POST" action="">
                        <div class="form-group">
                            <input type="text" name="cpf" id="cpf" class="form-control campo-alice" placeholder="CPF" onkeyup="mascara(this, mcpf);" required/>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-xs-12 left0">
                                <input type="text" name="cep" maxlength="9" id="cep" class="form-control campo-alice" onkeyup="mascara(this, mcep);" placeholder="CEP" required/>
                            </div>
                            
                            <div class="col-sm-6 col-xs-12 right0">
                                <input type="text" name="bairro" id="bairro" class="form-control campo-alice" placeholder="Bairro" required/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="rua" id="rua" class="form-control campo-alice" placeholder="Rua" required/>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-xs-12 left0">
                                <input type="text" name="numero" id="numero" class="form-control campo-alice" placeholder="Número" required/>
                            </div>
                            
                            <div class="col-sm-6 col-xs-12 right0">
                                <input type="text" name="complemento" id="complemento" class="form-control campo-alice" placeholder="Complemento" required/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-xs-12 left0">
                                <input type="text" name="cidade" id="cidade" class="form-control campo-alice" placeholder="Cidade" required/>
                            </div>
                            
                            <div class="col-sm-6 col-xs-12 right0">
                                <input type="text" name="estado" id="estado" class="form-control campo-alice" placeholder="Estado" required/>
                            </div>
                            <div class="clearfix"></div>
                        </div>                        

                    </form>
                </div>
                
                <div class="col-sm-6 col-xs-12">
                    <h3 class="h3checkout">- Formas de pagamento</h3>
                    <form class="form-horizontal"><fieldset>
                <div class="form-group">                     
                      <div class="col-md-10">
                         <div class="input-group">
                            <div class="btn-group radio-group">
                               <label class="btn btn-primary not-active">Cartão de crédito <input type="radio" value="cartao" name="pgto"></label>
                               <label class="btn btn-primary not-active">Boleto <input type="radio" value="boleto" name="pgto"></label>
                            </div>
                         </div>
                    </div>
                </div>
            </fieldset></form>
                </div>
                
                <div class="col-sm-12 col-xs-12 text-right">
                <button class="btn btn-danger btn-alice" onclick="window.location.href = '<?php echo home_url(); ?>/minha-conta'">VOLTAR</button>
                <button class="btn btn-success btn-alice">AVANÇAR</button>
            </div>
                
            </div>

        </div>        
    </div>
</section>




<div class="container">



