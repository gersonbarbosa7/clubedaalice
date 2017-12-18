<?php
/* Template Name: Nova Home */
get_template_part('header-novahome');
?>
<section id="banner_novahome">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <img src="<?php the_field('banner_principal_nova_home', 'options'); ?>" class="img-responsive" id="banner_desktop" alt="Banner Alice" />
                <img src="<?php echo get_template_directory_uri(); ?>/images/bg-mobile.jpg" class="img-responsive" alt="Banner Alice" id="banner_mobile" style="display: none;" />
            </div>
        </div>
    </div>
</section>
<section id="posts_detaque">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-xs-12">
                <img src="<?php echo get_template_directory_uri(); ?>/images/img-blog1.jpg" class="img-responsive" alt="Blog1" />
                <div class="titulo_postdestaque text-center">
                    <h3>VAMOS CORRER QUE O VERÃO ESTÁ CHEGANDO</h3>
                    <span>ALICE EM FORMA</span>
                </div>
                <div class="box-textpost text-center">
                    <p class="text-left">E o verão está chegando… Esta época do ano é a hora que começa a bater o desespero em muitas mulheres. O verão se aproxima e a hora de encarar o biquíni está cada vez mais perto. </p>
                    <button class="btn btn-default text-center btn-rosa-alice">LEIA MAIS ></button>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <img src="<?php echo get_template_directory_uri(); ?>/images/img-blog2.jpg" class="img-responsive" alt="Blog2" />
                <div class="titulo_postdestaque text-center">
                    <h3>VAMOS CORRER QUE O VERÃO ESTÁ CHEGANDO</h3>
                    <span>ALICE EM FORMA</span>
                </div>
                <div class="box-textpost text-center">
                    <p class="text-left">E o verão está chegando… Esta época do ano é a hora que começa a bater o desespero em muitas mulheres. O verão se aproxima e a hora de encarar o biquíni está cada vez mais perto. </p>
                    <button class="btn btn-default text-center btn-rosa-alice">LEIA MAIS ></button>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <img src="<?php echo get_template_directory_uri(); ?>/images/img-blog3.jpg" class="img-responsive" alt="Blog3" />
                <div class="titulo_postdestaque text-center">
                    <h3>VAMOS CORRER QUE O VERÃO ESTÁ CHEGANDO</h3>
                    <span>ALICE EM FORMA</span>
                </div>
                <div class="box-textpost text-center">
                    <p class="text-left">E o verão está chegando… Esta época do ano é a hora que começa a bater o desespero em muitas mulheres. O verão se aproxima e a hora de encarar o biquíni está cada vez mais perto. </p>
                    <button class="btn btn-default text-center btn-rosa-alice">LEIA MAIS ></button>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="banner_transforme">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12 text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/images/banner-transforme.jpg" class="img-responsive" alt="Banner Transform" />
            </div>
        </div>
    </div>
</section>
<section id="novo_miolo">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-xs-12">
                <!--loop posts-->
                <div class="col-sm-12 col-xs-12">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/blog1.jpg" class="img-responsive" alt="Banner Transform" />
                    <div class="titulo_postdestaque">
                        <h3>VAMOS CORRER QUE O VERÃO ESTÁ CHEGANDO</h3>
                        <span>ALICE EM FORMA</span>
                    </div>
                    <div class="box-textpost">
                        <p>E o verão está chegando… Esta época do ano é a hora que começa a bater o desespero em muitas mulheres. O verão se aproxima e a hora de encarar o biquíni está cada vez mais perto. </p>
                        <button class="btn btn-default text-center btn-rosa-alice">LEIA MAIS ></button>
                    </div>
                </div>
                <!--/loop-->
                
                <!--loop posts-->
                <div class="col-sm-12 col-xs-12">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/blog1.jpg" class="img-responsive" alt="Banner Transform" />
                    <div class="titulo_postdestaque">
                        <h3>VAMOS CORRER QUE O VERÃO ESTÁ CHEGANDO</h3>
                        <span>ALICE EM FORMA</span>
                    </div>
                    <div class="box-textpost">
                        <p>E o verão está chegando… Esta época do ano é a hora que começa a bater o desespero em muitas mulheres. O verão se aproxima e a hora de encarar o biquíni está cada vez mais perto. </p>
                        <button class="btn btn-default text-center btn-rosa-alice">LEIA MAIS ></button>
                    </div>
                </div>
                <!--/loop-->
            </div>
            <div class="col-sm-4 col-xs-12" id="div_sidebar">
                <div class="div_sidebar">
                    <div class="fb-page" data-href="https://www.facebook.com/clubedaaliceoficial/?ref=ts&amp;fref=ts" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/clubedaaliceoficial/?ref=ts&amp;fref=ts" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/clubedaaliceoficial/?ref=ts&amp;fref=ts">Clube da Alice</a></blockquote></div>
                </div>
                <div class="div_sidebar">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/banner-inscreva-se.jpg" class="img-responsive" alt="Banner Transform" />
                </div>
                <div class="div_sidebar">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/banner-alice.jpg" class="img-responsive" alt="Banner Transform" />
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
