<?php
/**
 * Template part for displaying service section
 *
 * @package Shopping Cart Woocommerce
 * @subpackage shopping_cart_woocommerce
 */
?>
<?php if( get_theme_mod( 'shopping_cart_woocommerce_show_hide_service_section') != '') { ?>
<section id="services">
	<div class="row">
    <?php for ($i=1; $i <=4; $i++) { ?>
		<div class="col-lg-3 col-md-6 col-sm-12 col-12 p-1 align-self-center">
      <div class="services-box ">
        <div class="row m-0">
          <div class="col-lg-2 col-md-12 align-self-center">
            <?php if( get_theme_mod( 'shopping_cart_woocommerce_services_fields_icon'.$i ) != '') { ?>
              <i class="<?php echo esc_attr(get_theme_mod('shopping_cart_woocommerce_services_fields_icon'.$i)) ?>"></i>
            <?php }?>
          </div>
          <div class="col-lg-10 col-md-12 mt-1 align-self-center">
            <?php if( get_theme_mod( 'shopping_cart_woocommerce_services_fields_heading'.$i ) != '') { ?>
              <h4 class="ml-2 mb-0 "><?php echo esc_html(get_theme_mod('shopping_cart_woocommerce_services_fields_heading'.$i)); ?></h4>
            <?php }?>
            <?php if( get_theme_mod( 'shopping_cart_woocommerce_services_fields_text'.$i ) != '') { ?>
              <p class="ml-2"><?php echo esc_html(get_theme_mod('shopping_cart_woocommerce_services_fields_text'.$i)); ?></p>
            <?php }?>
          </div>
        </div>
			</div>
		</div>
    <?php } ?>
	</div>
</section>
<?php } ?>