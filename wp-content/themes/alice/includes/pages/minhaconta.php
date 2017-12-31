<!--container-->
</div>

<?php
global $current_user;
get_currentuserinfo();

$login = $current_user->user_login;
$email = $current_user->user_email;
$nome = $current_user->user_firstname;
$sobrenome = $current_user->user_lastname;
$link = $current_user->user_url;
$id = $current_user->ID;
$foto = get_user_meta($id, 'foto_do_perfil', true);

//dados do usuário
?>

<section id="minhaconta">
    <div class="container">
        <div class="row">

            <div class="col-sm-6 col-xs-12 form-dados form-rosa">
                <h2 class="rosa">Minha conta</h2>
                
                <div class="col-sm-6 col-xs-12">
                    <button class="btn btn-default" id="planoescolhido">Editar Dados</button>
                </div>
                <div class="col-sm-6 col-xs-12 margin_bottom">
                    <button class="btn btn-default btnAvancar" id="planoescolhido" style="background:#47c2ca;border-color:#47c2ca;" onclick="validarCadastro()">Salvar Alterações</button>
                </div>

                <form class="cadastro-basico" id="completar_cadastro" method="POST" action="">
                    
                    <div id="retorno-form"></div>
                    
                    <div class="form-group">
                        <div class="col-sm-6 col-xs-12">
                            <label for="cod_alice">Cód. Alice</label>
                            <input type="text" name="codigo" id="codigo" class="form-control campo-alice" placeholder="xxxxxxxxx" value="" required readonly/>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <label for="nascimento">Data Nascimento</label>
                            <input type="text" name="nascimento" id="nascimento" maxlength="10" onkeyup="mascara(this, mdata);" class="form-control campo-alice" placeholder="DD/MM/AAAA" value="<?php echo get_user_meta($id, 'billing_birthdate', true); ?>" required/>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-6 col-xs-12">
                            <label for="data_cadastro">Data do cadastro</label>
                            <input type="text" name="data_cadastro" id="data_cadastro" class="form-control campo-alice" value="<?php echo $current_user->user_registered; ?>" readonly/>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <label for="fim_plano">Término do plano</label>
                            <input type="text" name="fim_plano" id="fim_plano" class="form-control campo-alice" value="NOV/2018" readonly/>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-12 col-xs-12">
                            <label for="nome_cateirinha">Nome completo <span class="text_obs">| Impresso Carteirinha</span></label>
                            <input type="text" name="nome_cateirinha" id="nome_cateirinha" class="form-control campo-alice" placeholder="Seu nome completo" value="<?php echo get_user_meta($id, 'nome_impresso_na_carteirinha', true); ?>" />
                        </div>                        
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-6 col-xs-12">
                            <label for="data_cadastro">CPF</label>
                            <input type="text" name="cpf" id="cpf" class="form-control campo-alice" maxlength="14" placeholder="CPF" onkeyup="mascara(this, mcpf);" value="<?php echo get_user_meta($id, 'billing_cpf', true); ?>" required/>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <label for="cep">CEP</label>
                            <input type="text" name="cep" maxlength="10" id="cep" class="form-control campo-alice" onkeyup="mascara(this, mcep);" onblur="buscarCep()" placeholder="CEP" value="<?php echo get_user_meta($id, 'billing_postcode', true); ?>" required/>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-12 col-xs-12">
                            <label for="endereco">Rua / Av</label>
                            <input type="text" name="rua" id="rua" class="form-control campo-alice" placeholder="Rua" value="<?php echo get_user_meta($id, 'billing_address_1', true); ?>" readonly="readonly" required/>
                        </div>                        
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-6 col-xs-12">
                            <label for="estado">Estado</label>
                            <input type="text" name="estado" id="estado" class="form-control campo-alice" placeholder="Estado" value="<?php echo get_user_meta($id, 'billing_state', true); ?>" readonly="readonly" required/>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <label for="cidade">Cidade</label>
                            <input type="text" name="cidade" id="cidade" class="form-control campo-alice" placeholder="Cidade" value="<?php echo get_user_meta($id, 'billing_city', true); ?>" readonly="readonly" required/>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-3 col-xs-12">
                            <label for="numero">Nº</label>
                            <input type="text" name="numero" id="numero" class="form-control campo-alice" placeholder="Número" value="<?php echo get_user_meta($id, 'billing_number', true); ?>" required/>
                        </div>
                        <div class="col-sm-3 col-xs-12">
                            <label for="complemento">Comp</label>
                            <input type="text" name="complemento" id="complemento" class="form-control campo-alice" placeholder="Complemento" value="<?php echo get_user_meta($id, 'billing_address_2', true); ?>" />
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <label for="celular">Celular</label>
                            <input type="tel" name="tel" id="tel" class="form-control campo-alice" maxlength="14" onkeyup="mascara(this, mtel);" value="<?php echo get_user_meta($id, 'billing_cellphone', true); ?>" placeholder="Telefone celular com DDD" required/>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-12 col-xs-12">
                            <a href="javascript:void(0)" class="links_infosform azul" data-toggle="modal" data-target="#informacoes_modal"><i class="fa fa-eye"></i> Infos importantes</a>
                            <a href="javascript:void(0)" class="links_infosform rosa" data-toggle="modal" data-target="#historico_modal"><i class="fa fa-eye"></i> Meu histórico</a>
                        </div>                        
                        <div class="clearfix"></div>
                    </div>
                    
                    <input type="hidden" name="id_user" id="id_user" value="<?php echo $id; ?>" />

                </form>
            </div>

            <div class="col-sm-6 col-xs-12 margin_top">                            

                <div class="col-sm-12 col-xs-12">
                    <div class="col-sm-3 col-xs-12">
                        <img src="<?php echo "https://graph.facebook.com/v2.11/" . basename($link) . "/picture/?width=250&height=250"; ?>" class=" img-responsive" />
                    </div>
                    <div class="col-sm-9 col-xs-12 lista-btns">
                        <h3 class="h3fcb">- Dados Faceboook</h3>
                        <button class="btn btn-primary btn-fcb" onclick="window.open('<?php echo $link; ?>')"> Perfil do facebook <i class="fa fa-lock"></i></button>
                    </div>

                    <div class="col-sm-12 col-xs-12 lista-btns">
                        <div class="col-sm-6 col-xs-12">
                            <button class="btn btn-primary btn-fcb"> <?php echo $login; ?> <i class="fa fa-lock"></i></button>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <button class="btn btn-primary btn-fcb"> <?php echo $sobrenome; ?> <i class="fa fa-lock"></i></button>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <button class="btn btn-primary btn-fcb"> <?php echo $email; ?>k <i class="fa fa-lock"></i></button>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <button class="btn btn-primary btn-fcb"> <?php echo basename($link); ?> <i class="fa fa-lock"></i></button>
                        </div>
                    </div>

                </div>

                <!--plano atual-->
                <div class="col-sm-12 col-xs-12 margin_top text-center">
                    <p>Sem planos recentes.</p>
                </div>
                <!--<div class="col-sm-12 col-xs-12 margin_top">
                    <button class="btn btn-default" id="planoescolhido"><strong>Plano atual:</strong> Carteirinha Pink</button>
                </div>
                
                <div class="col-sm-10 col-sm-offset-2 margin_top">
                    <div class="col-sm-4">
                        <img src="https://projetos.gersonbarbosa.com/clubedaalice/wp-content/uploads/2017/12/carteirinha1.png" class="img-responsive" alt="Plano escolhido" />
                    </div>
                    <div class="col-sm-8">
                        <p><strong>Código:</strong> ALICE 52 01 4230<br />
                            <strong>Nome:</strong> <?php echo $nome; ?><br />
                            <strong>Validade:</strong> NOV / 18<br />
                            <span class="red">Pagamento à confirmar</span></p>
                    </div>
                    <div class="col-sm-12">
                        <h4 class="h4green">Presente de boas vindas:</h4>
                        <p><?php echo $presente; ?></p>
                    </div>

                </div>-->
                <!--/plano atual-->
                
                <div class="col-sm-12 col-xs-12 margin_top margin_bottom">
                    <button class="btn btn-success" id="planoescolhido" style="background:green;border-color:green" onclick="window.location.href='<?php echo home_url(); ?>/solicitar-carteirinha'">Contratar uma carteirinha</button>
                </div>




            </div>


        </div>        
    </div>
</section>


<div class="container">



