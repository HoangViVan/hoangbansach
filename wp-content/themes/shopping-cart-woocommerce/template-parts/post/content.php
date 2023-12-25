<?php
/**
 * Template part for displaying posts
 *
 * @package Shopping Cart Woocommerce
 * @subpackage shopping_cart_woocommerce
 */

?>


<?php $shopping_cart_woocommerce_column_layout = get_theme_mod( 'shopping_cart_woocommerce_sidebar_post_layout');
if($shopping_cart_woocommerce_column_layout == 'four-column' || $shopping_cart_woocommerce_column_layout == 'three-column' ){ ?>
	<div id="category-post">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="page-box">
			    <?php 
			        if(has_post_thumbnail()) { ?>
			        <div class="box-image mb-3">
			            <?php the_post_thumbnail();  ?>	   
			        </div>
			    <?php } ?>
			    <div class="box-content">
			        <h4><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h4>
	                <div class="box-info">
			        	<?php 
							$blog_archive_ordering = get_theme_mod('blog_meta_order', array('date', 'author', 'comment'));
							foreach ($blog_archive_ordering as $blog_data_order) :
							    if ('date' === $blog_data_order) :?>
							        <i class="far fa-calendar-alt mb-1"></i><span class="entry-date"><?php echo get_the_date('j F, Y'); ?></span>
							<?php elseif ('author' === $blog_data_order) :?>
							        <i class="fas fa-user mb-1"></i><span class="entry-author"><?php the_author(); ?></span>
							<?php elseif ('comment' === $blog_data_order) :?>
							        <i class="fas fa-comments mb-1"></i><span class="entry-comments"><?php comments_number(__('0 Comments', 'shopping-cart-woocommerce'), __('0 Comments', 'shopping-cart-woocommerce'), __('% Comments', 'shopping-cart-woocommerce')); ?></span>
							<?php
							    endif;
							endforeach;
							?>
		            </div>
			        <p><?php echo wp_trim_words(get_the_content(), get_theme_mod('shopping_cart_woocommerce_excerpt_count',35) );?></p>
			        <?php if(get_theme_mod('shopping_cart_woocommerce_remove_read_button',true) != ''){ ?>
			            <div class="readmore-btn">
			                <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'Read More', 'shopping-cart-woocommerce' ); ?>"><?php echo esc_html(get_theme_mod('shopping_cart_woocommerce_read_more_text',__('Read More','shopping-cart-woocommerce')));?></a>
			            </div>
			        <?php }?>
			    </div>
			    <div class="clearfix"></div>
			</div>
		</article>
	</div>
<?php } else{ ?>
<div id="category-post">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="page-box row">
		    <?php 
		        if(has_post_thumbnail()) { ?>
		        <div class="box-image col-lg-6 col-md-12">
		            <?php the_post_thumbnail();  ?>	   
		        </div>
		    <?php } ?>
		    <div class="box-content <?php 
		        if(has_post_thumbnail()) { ?>col-lg-6 col-md-12"<?php } else { ?>col-lg-12 col-md-12"<?php } ?>>
		        <h4><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h4>
		        <div class="box-info">
			        <?php $blog_archive_ordering = get_theme_mod('blog_meta_order', array('date', 'author', 'comment'));
			        foreach ($blog_archive_ordering as $blog_data_order) : 
			            if ('date' === $blog_data_order) : ?>
			              <i class="far fa-calendar-alt mb-1"></i><span class="entry-date"><?php echo get_the_date('j F, Y'); ?></span>
			            <?php elseif ('author' === $blog_data_order) : ?>
			              <i class="fas fa-user mb-1"></i><span class="entry-author"><?php the_author(); ?></span>
			            <?php elseif ('comment' === $blog_data_order) : ?>
			              <i class="fas fa-comments mb-1"></i><span class="entry-comments"><?php comments_number(__('0 Comments', 'shopping-cart-woocommerce'), __('0 Comments', 'shopping-cart-woocommerce'), __('% Comments', 'shopping-cart-woocommerce')); ?></span>
			            <?php endif;
			        endforeach; ?>
		        </div>
		        <p><?php echo wp_trim_words(get_the_content(), get_theme_mod('shopping_cart_woocommerce_excerpt_count',35) );?></p>
		        <?php if(get_theme_mod('shopping_cart_woocommerce_remove_read_button',true) != ''){ ?>
		            <div class="readmore-btn mt-1">
		                <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'Read More', 'shopping-cart-woocommerce' ); ?>"><?php echo esc_html(get_theme_mod('shopping_cart_woocommerce_read_more_text',__('Read More','shopping-cart-woocommerce')));?></a>
		            </div>
		        <?php }?>
		    </div>
		    <div class="clearfix"></div>
		</div>
	</article>
</div>
<?php } ?>