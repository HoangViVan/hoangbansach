<?php

	$shopping_cart_woocommerce_tp_theme_css = "";

$shopping_cart_woocommerce_theme_lay = get_theme_mod( 'shopping_cart_woocommerce_tp_body_layout_settings','Full');
if($shopping_cart_woocommerce_theme_lay == 'Container'){
$shopping_cart_woocommerce_tp_theme_css .='body{';
	$shopping_cart_woocommerce_tp_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
$shopping_cart_woocommerce_tp_theme_css .='}';
$shopping_cart_woocommerce_tp_theme_css .='@media screen and (max-width:575px){';
		$shopping_cart_woocommerce_tp_theme_css .='body{';
			$shopping_cart_woocommerce_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left: 0px';
		$shopping_cart_woocommerce_tp_theme_css .='} }';
$shopping_cart_woocommerce_tp_theme_css .='.page-template-front-page .menubar{';
	$shopping_cart_woocommerce_tp_theme_css .='position: static;';
$shopping_cart_woocommerce_tp_theme_css .='}';
$shopping_cart_woocommerce_tp_theme_css .='.scrolled{';
	$shopping_cart_woocommerce_tp_theme_css .='width: auto; left:0; right:0;';
$shopping_cart_woocommerce_tp_theme_css .='}';
}else if($shopping_cart_woocommerce_theme_lay == 'Container Fluid'){
$shopping_cart_woocommerce_tp_theme_css .='body{';
	$shopping_cart_woocommerce_tp_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
$shopping_cart_woocommerce_tp_theme_css .='}';
$shopping_cart_woocommerce_tp_theme_css .='@media screen and (max-width:575px){';
		$shopping_cart_woocommerce_tp_theme_css .='body{';
			$shopping_cart_woocommerce_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left:0px';
		$shopping_cart_woocommerce_tp_theme_css .='} }';
$shopping_cart_woocommerce_tp_theme_css .='.page-template-front-page .menubar{';
	$shopping_cart_woocommerce_tp_theme_css .='width: 99%';
$shopping_cart_woocommerce_tp_theme_css .='}';		
$shopping_cart_woocommerce_tp_theme_css .='.scrolled{';
	$shopping_cart_woocommerce_tp_theme_css .='width: auto; left:0; right:0;';
$shopping_cart_woocommerce_tp_theme_css .='}';
}else if($shopping_cart_woocommerce_theme_lay == 'Full'){
$shopping_cart_woocommerce_tp_theme_css .='body{';
	$shopping_cart_woocommerce_tp_theme_css .='max-width: 100%;';
$shopping_cart_woocommerce_tp_theme_css .='}';
}

$shopping_cart_woocommerce_scroll_position = get_theme_mod( 'shopping_cart_woocommerce_scroll_top_position','Right');
if($shopping_cart_woocommerce_scroll_position == 'Right'){
$shopping_cart_woocommerce_tp_theme_css .='#return-to-top{';
    $shopping_cart_woocommerce_tp_theme_css .='right: 20px;';
$shopping_cart_woocommerce_tp_theme_css .='}';
}else if($shopping_cart_woocommerce_scroll_position == 'Left'){
$shopping_cart_woocommerce_tp_theme_css .='#return-to-top{';
    $shopping_cart_woocommerce_tp_theme_css .='left: 20px;';
$shopping_cart_woocommerce_tp_theme_css .='}';
}else if($shopping_cart_woocommerce_scroll_position == 'Center'){
$shopping_cart_woocommerce_tp_theme_css .='#return-to-top{';
    $shopping_cart_woocommerce_tp_theme_css .='right: 50%;left: 50%;';
$shopping_cart_woocommerce_tp_theme_css .='}';
}

    
//Social icon Font size
$shopping_cart_woocommerce_social_icon_fontsize = get_theme_mod('shopping_cart_woocommerce_social_icon_fontsize');
	$shopping_cart_woocommerce_tp_theme_css .='.media-links a i{';
$shopping_cart_woocommerce_tp_theme_css .='font-size: '.esc_attr($shopping_cart_woocommerce_social_icon_fontsize).'px;';
$shopping_cart_woocommerce_tp_theme_css .='}';

// site title font size option
$shopping_cart_woocommerce_site_title_font_size = get_theme_mod('shopping_cart_woocommerce_site_title_font_size', 25);{
$shopping_cart_woocommerce_tp_theme_css .='.logo h1 , .logo p a{';
	$shopping_cart_woocommerce_tp_theme_css .='font-size: '.esc_attr($shopping_cart_woocommerce_site_title_font_size).'px;';
$shopping_cart_woocommerce_tp_theme_css .='}';
}

//site tagline font size option
$shopping_cart_woocommerce_site_tagline_font_size = get_theme_mod('shopping_cart_woocommerce_site_tagline_font_size', 15);{
$shopping_cart_woocommerce_tp_theme_css .='.logo p{';
	$shopping_cart_woocommerce_tp_theme_css .='font-size: '.esc_attr($shopping_cart_woocommerce_site_tagline_font_size).'px;';
$shopping_cart_woocommerce_tp_theme_css .='}';
}

//return to header mobile				
$shopping_cart_woocommerce_return_to_header_mob = get_theme_mod( 'shopping_cart_woocommerce_return_to_header_mob',false);
	if($shopping_cart_woocommerce_return_to_header_mob == true && get_theme_mod( 'shopping_cart_woocommerce_return_to_header',true) != true){
		$shopping_cart_woocommerce_tp_theme_css .='.return-to-header{';
		$shopping_cart_woocommerce_tp_theme_css .='display:none;';
	$shopping_cart_woocommerce_tp_theme_css .='} ';
	}
	if($shopping_cart_woocommerce_return_to_header_mob == true){
		$shopping_cart_woocommerce_tp_theme_css .='@media screen and (max-width:575px) {';
	$shopping_cart_woocommerce_tp_theme_css .='.return-to-header{';
		$shopping_cart_woocommerce_tp_theme_css .='display:block;';
	$shopping_cart_woocommerce_tp_theme_css .='} }';
}else if($shopping_cart_woocommerce_return_to_header_mob == false){
$shopping_cart_woocommerce_tp_theme_css .='@media screen and (max-width:575px){';
	$shopping_cart_woocommerce_tp_theme_css .='.return-to-header{';
$shopping_cart_woocommerce_tp_theme_css .='display:none;';
	$shopping_cart_woocommerce_tp_theme_css .='} }';
}
//slider mobile	
$shopping_cart_woocommerce_slider_buttom_mob = get_theme_mod( 'shopping_cart_woocommerce_slider_buttom_mob',true);
if($shopping_cart_woocommerce_slider_buttom_mob == true && get_theme_mod( 'shopping_cart_woocommerce_slider_button',true) != true){
$shopping_cart_woocommerce_tp_theme_css .='#slider .more-btn{';
	$shopping_cart_woocommerce_tp_theme_css .='display:none;';
$shopping_cart_woocommerce_tp_theme_css .='} ';
}
if($shopping_cart_woocommerce_slider_buttom_mob == true){
$shopping_cart_woocommerce_tp_theme_css .='@media screen and (max-width:575px) {';
$shopping_cart_woocommerce_tp_theme_css .='#slider .more-btn{';
	$shopping_cart_woocommerce_tp_theme_css .='display:block;';
$shopping_cart_woocommerce_tp_theme_css .='} }';
}else if($shopping_cart_woocommerce_slider_buttom_mob == false){
$shopping_cart_woocommerce_tp_theme_css .='@media screen and (max-width:575px){';
$shopping_cart_woocommerce_tp_theme_css .='#slider .more-btn{';
	$shopping_cart_woocommerce_tp_theme_css .='display:none;';
$shopping_cart_woocommerce_tp_theme_css .='} }';
}

//footer image
$shopping_cart_woocommerce_footer_widget_image = get_theme_mod('shopping_cart_woocommerce_footer_widget_image');
if($shopping_cart_woocommerce_footer_widget_image != false){
$shopping_cart_woocommerce_tp_theme_css .='#footer{';
	$shopping_cart_woocommerce_tp_theme_css .='background: url('.esc_attr($shopping_cart_woocommerce_footer_widget_image).');';
$shopping_cart_woocommerce_tp_theme_css .='}';
}

// related product
$shopping_cart_woocommerce_related_product = get_theme_mod('shopping_cart_woocommerce_related_product',true);
if($shopping_cart_woocommerce_related_product == false){
$shopping_cart_woocommerce_tp_theme_css .='.related.products{';
	$shopping_cart_woocommerce_tp_theme_css .='display: none;';
$shopping_cart_woocommerce_tp_theme_css .='}';
}

//menu font size
$shopping_cart_woocommerce_menu_font_size = get_theme_mod('shopping_cart_woocommerce_menu_font_size', 14);{
$shopping_cart_woocommerce_tp_theme_css .='.main-navigation a, .main-navigation li.page_item_has_children:after,.main-navigation li.menu-item-has-children:after{';
	$shopping_cart_woocommerce_tp_theme_css .='font-size: '.esc_attr($shopping_cart_woocommerce_menu_font_size).'px;';
$shopping_cart_woocommerce_tp_theme_css .='}';
}

// menu text tranform
$shopping_cart_woocommerce_menu_text_tranform = get_theme_mod( 'shopping_cart_woocommerce_menu_text_tranform','Uppercase');
if($shopping_cart_woocommerce_menu_text_tranform == 'Uppercase'){
$shopping_cart_woocommerce_tp_theme_css .='.main-navigation a {';
	$shopping_cart_woocommerce_tp_theme_css .='text-transform: uppercase;';
$shopping_cart_woocommerce_tp_theme_css .='}';
}else if($shopping_cart_woocommerce_menu_text_tranform == 'Lowercase'){
$shopping_cart_woocommerce_tp_theme_css .='.main-navigation a {';
	$shopping_cart_woocommerce_tp_theme_css .='text-transform: lowercase;';
$shopping_cart_woocommerce_tp_theme_css .='}';
}
else if($shopping_cart_woocommerce_menu_text_tranform == 'Capitalize'){
$shopping_cart_woocommerce_tp_theme_css .='.main-navigation a {';
	$shopping_cart_woocommerce_tp_theme_css .='text-transform: capitalize;';
$shopping_cart_woocommerce_tp_theme_css .='}';
}
//======================= slider Content layout ===================== //

$shopping_cart_woocommerce_slider_content_layout = get_theme_mod('shopping_cart_woocommerce_slider_content_layout', 'CENTER-ALIGN'); 
$shopping_cart_woocommerce_tp_theme_css .= '#slider .carousel-caption{';
switch ($shopping_cart_woocommerce_slider_content_layout) {
    case 'LEFT-ALIGN':
        $shopping_cart_woocommerce_tp_theme_css .= 'text-align:left; right: 35%; left: 15%';
        break;
    case 'CENTER-ALIGN':
        $shopping_cart_woocommerce_tp_theme_css .= 'text-align:center; left: 50%; right: 10%';
        break;
    case 'RIGHT-ALIGN':
        $shopping_cart_woocommerce_tp_theme_css .= 'text-align:right; left: 35%; right: 15%';
        break;
    default:
        $shopping_cart_woocommerce_tp_theme_css .= 'text-align:left; right: 35%; left: 15%';
        break;
}
$shopping_cart_woocommerce_tp_theme_css .= '}';