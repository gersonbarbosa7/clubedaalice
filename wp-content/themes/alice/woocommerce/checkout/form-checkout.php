<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout cadastro-basico" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

    <!--novo checkout-->
    <section id="minhaconta" class="cadastro-basico">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h2 class="rosa">Pagamento</h2>
                    
                    <!--steps-->
                    <div class="stepwizard">
                        <div class="stepwizard-row">
                            <div class="stepwizard-step">
                                <button type="button" class="btn btn-default bgpadrao btn-circle" disabled="disabled"></button>
                                <p class="pinativo">Cadastro</p>
                            </div>
                            <div class="stepwizard-step">
                                <button type="button" class="btn btn-default bgpadrao btn-circle" disabled="disabled"></button>
                                <p class="pinativo">Informações</p>
                            </div>
                            <div class="stepwizard-step">
                                <button type="button" class="btn btn-primary bgcircle btn-circle"></button>
                                <p class="pativo">Pagamento</p>
                            </div> 
                            <div class="stepwizard-step">
                                <button type="button" class="btn btn-default bgpadrao btn-circle" disabled="disabled"></button>
                                <p class="pinativo">Obrigado</p>
                            </div> 
                        </div>
                    </div>
                    <!--/steps-->
                    
                    <!--campos-->
                    <?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<!--<div class="col2-set" id="customer_details">-->
		<div class="col-sm-12 col-md-12 col-xs-12 form-dados form-rosa" id="customer_details">
			<div class="col-1">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
			</div>

			<div class="col-2">
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

                <?php endif; ?>
                <!--/fim campos-->
                    
                </div>
                <div class="col-sm-6 col-xs-12">
                    <img src="<?php the_field('imagem_1_checkout', 'options'); ?>" class="img-responsive" alt="Formas de pagamento" />
                    
                    
                    <div class="form-cartao form-dados">
                        <h3 class="h3checkout">- Digitar Dados do Pagamento</h3>

                        <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

                        <div id="order_review" class="woocommerce-checkout-review-order col-sm-12 col-md-12 col-xs-12">
                           <!-- <h3 id="order_review_heading"><?php _e( 'Your order', 'woocommerce' ); ?></h3>-->
                                <?php do_action( 'woocommerce_checkout_order_review' ); ?>
                        </div>

                        <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
                       
                    </div>

                
                </div>
                
                
                 
                <div class="col-sm-6 col-xs-12 pull-right text-right">
                        <button class="btn btn-danger btn-alice" onclick="window.location.href = '<?php echo home_url(); ?>/minha-conta'">VOLTAR</button>
                        <button class="btn btn-success btn-alice" type="submit">AVANÇAR</button>
                    </div>
                

            </div>        
        </div>
    </section>
    <!--/fim-->
    
    
	

	

	

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
