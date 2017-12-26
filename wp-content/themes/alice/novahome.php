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
            
            <?php
            //criando loop
            $posts = array(
                'post_type' => 'post',
                'posts_per_page' => '3'
            );
            $loop = new WP_Query($posts);
            if ($loop->have_posts()): while($loop->have_posts()): $loop->the_post(); ?>

            
            <div class="col-sm-4 col-xs-12">
                <img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive" alt="<?php the_title(); ?>" />
                <div class="titulo_postdestaque text-center">
                    <h3><?php the_title(); ?></h3>
                    <span><?php the_category(", "); ?></span>
                </div>
                <div class="box-textpost text-center">
                    <p class="text-left"><?php echo excerpt(20); ?></p>
                    <button class="btn btn-default text-center btn-rosa-alice" onclick="window.location.href='<?php the_permalink(); ?>'">LEIA MAIS ></button>
                </div>
            </div>
            
            <?php endwhile; endif; wp_reset_postdata(); ?>
            
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
                
            <?php
            //criando loop
            $posts2 = array(
                'post_type' => 'post',
                'offset' => '3'
            );
            $loop2 = new WP_Query($posts2);
            if ($loop2->have_posts()): while($loop2->have_posts()): $loop2->the_post(); ?>
                
                <!--loop posts-->
                <div class="col-sm-12 col-xs-12">
                    <img src="<?php the_post_thumbnail_url(); ?>" class="img-responsive" alt="<?php the_title(); ?>" />
                    <div class="titulo_postdestaque">
                        <h3><?php the_title(); ?></h3>
                        <span><?php the_category(", "); ?></span>
                    </div>
                    <div class="box-textpost">
                        <p><?php echo excerpt(30); ?></p>
                        <button class="btn btn-default text-center btn-rosa-alice" onclick="window.location.href='<?php the_permalink(); ?>'">LEIA MAIS ></button>
                    </div>
                </div>
                <!--/loop-->
                <?php endwhile; endif; wp_reset_postdata(); ?>
                
                
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
