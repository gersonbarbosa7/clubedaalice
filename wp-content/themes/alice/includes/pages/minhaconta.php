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

                <form class="cadastro-basico" method="POST" action="">
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
                        <input type="tel" name="tel" id="tel" class="form-control campo-alice" maxlength="13" onkeyup="mascara(this, mtel);" placeholder="Telefone celular com DDD" required/>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="feminino" checked>
                            Feminino
                        </label>
                    </div>
                    
                    <input type="hidden" name="carteirinha" id="carteirinha" />
                    
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
        <div class="row line-pink">
            <div class="col-sm-3 col-xs-12 text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/images/carteirinha1.png" class="img-responsive fullimg imgcartao nocheck" id="cartao1" />
                <img src="<?php echo get_template_directory_uri(); ?>/images/carteirinha1-check.png" class="img-responsive fullimg imgcartao imgcheck1" style="display: none;" />
                <h4>Carteirinha Pink</h4>
                <button class="btn btn-default button-pink"><strong>R$99</strong>/ANO</button>
            </div>
            <div class="col-sm-9 col-xs-12">
                <div class="alert alert-danger alert-pink fade in">                    
                    <h3>Carteirinha Pink</h3>
                    <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker. Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI. Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.

</p>
                  </div>
            </div>
        </div><!--/rosa-->
        
        <!--black-->        
        <div class="row line-black">
            <div class="col-sm-3 col-xs-12 text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/images/carteirinha2.png" class="img-responsive fullimg imgcartao nocheck" id="cartao2" />
                <img src="<?php echo get_template_directory_uri(); ?>/images/carteirinha2-check.png" class="img-responsive fullimg imgcartao imgcheck2" style="display: none;" />
                <h4>Carteirinha Black</h4>
                <button class="btn btn-default button-black"><strong>R$199</strong>/ANO</button>
            </div>
            <div class="col-sm-9 col-xs-12">
                <div class="alert alert-danger alert-black fade in">                    
                    <h3>Carteirinha Black</h3>
                    <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker. Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI. Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.

</p>
                  </div>
            </div>
        </div><!--/black-->
    </div>
</section>

<section id="fechamento">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 hidden-xs"></div>
            <div class="col-sm-6 text-center">
                <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value="feminino" checked required>
                            Li e aceito os termos de uso
                        </label>
                    <br /><a href="javascript:void(0)">Ler os termos de contrato</a>
                    </div>
            </div>
            <div class="col-sm-3 col-xs-12">
                <button class="btn btn-danger btn-alice" onclick="window.location.href='<?php echo home_url(); ?>'">VOLTAR</button>
                <button class="btn btn-success btn-alice" onclick="window.location.href='<?php echo home_url(); ?>/plano-escolhido'">AVANÇAR</button>
            </div>
        </div>
    </div>
</section>


<div class="container">



