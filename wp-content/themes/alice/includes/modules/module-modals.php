<!-- Modal -->
<div class="modal fade modal-alice" id="login_conta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!--<h5 class="modal-title" id="exampleModalLabel">Fazer login</h5>-->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
          <h3>Criar conta</h3>
          <p><img src="https://projetos.gersonbarbosa.com/clubedaalice/wp-content/themes/alice/images/logo-clube-da-alice.png" class="img-responsive" alt="Logo - Clube da Alice" /></p>
          <button class="btn btn-primary btn-fcb" onclick="loginUserOk()"><i class="fa fa-facebook"></i> Entrar com o facebook</button>
          <p class="p_modal">Por razões de segurança e conectividade, sua conta será criada, exclusivamente através de seu perfil no facebook ®</p>
          <p class="p_modal">Dados complementares serão solicitados após seu primeiro login.</p>
          <p class="p_modal"><a href="javascript:void(0)" class="link_terms">Consulte nossa política de privacidade</a><br />Clube da Alice | Todos os direitos resevados</p>
      </div>
        <div class="modal-footer" style="visibility: hidden">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Entrar</button>
      </div>
    </div>
  </div>
</div>

<!--preloader-->
<div class="modal fade" id="preloader_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:15%; overflow-y:visible;"> 
<div class="modal-dialog modal-m"> 
<div class="modal-content"> 
        <div class="modal-header"><h2 style="margin:0;">Processando...</h2></div> 
        <div class="modal-body"> 
                <div class="progress progress-striped active" style="margin-bottom:0;"><div class="progress-bar" style="width: 100%"></div></div> 
        </div> 
</div></div></div>

<!-- contrato -->
<div class="modal fade modal-alice" id="termos_condicoes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!--<h5 class="modal-title" id="exampleModalLabel">Fazer login</h5>-->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
          <h3>Termos e condições</h3>
          <p class="p_modal">
              <?php 
              $post_id = 11287;
              $content = get_post($post_id);
              echo $content->post_content;
              ?>
          </p>
          <p class="p_modal">Clube da Alice | Todos os direitos resevados</p>
      </div>
        <div class="modal-footer" style="visibility: hidden">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Entrar</button>
      </div>
    </div>
  </div>
</div>
