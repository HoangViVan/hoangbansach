<?php
/**
 * Template Name: Custom Home Page
 *
 * @package Shopping Cart Woocommerce
 * @subpackage shopping_cart_woocommerce
 */

get_header(); ?>

<main id="tp_content" role="main">
	<div class="py-5">
		<div class="container">
			<div class="row">
				<?php
					$shopping_cart_woocommerce_slider_option = get_theme_mod( 'shopping_cart_woocommerce_slider_option','defaut-layout');
					if($shopping_cart_woocommerce_slider_option == 'defaut-layout'){ ?>
				<div class="col-lg-3 col-md-3">
					<?php get_template_part( 'template-parts/home/product-cat' ); ?>
					<?php do_action( 'shopping_cart_woocommerce_after_product-cat' ); ?>
    			</div>
				<div class="col-lg-9 col-md-9">
					<?php do_action( 'shopping_cart_woocommerce_before_slider' ); ?>

					<?php get_template_part( 'template-parts/home/slider' ); ?>
					<?php do_action( 'shopping_cart_woocommerce_after_slider' ); ?>

					<?php get_template_part( 'template-parts/home/services' ); ?>
					<?php do_action( 'shopping_cart_woocommerce_after_services' ); ?>
				</div>
			<?php }
			else if($shopping_cart_woocommerce_slider_option == 'custom-layout'){ ?>
				<div class=" slider2 col-lg-12 col-md-12">
					<?php do_action( 'shopping_cart_woocommerce_before_slider' ); ?>

					<?php get_template_part( 'template-parts/home/slider' ); ?>
					<?php do_action( 'shopping_cart_woocommerce_after_slider' ); ?>

					<?php get_template_part( 'template-parts/home/services' ); ?>
					<?php do_action( 'shopping_cart_woocommerce_after_services' ); ?>
				</div>
			<?php }?>
			</div>
		</div>
	</div>
	<?php get_template_part( 'template-parts/home/shop-product' ); ?>
	<?php do_action( 'shopping_cart_woocommerce_after_shop-product' ); ?>

	<?php get_template_part( 'template-parts/home/home-content' ); ?>
	<?php do_action( 'shopping_cart_woocommerce_after_home_content' ); ?>
</main>
<?php get_footer();
