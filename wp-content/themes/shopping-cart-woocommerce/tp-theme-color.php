<?php

$shopping_cart_woocommerce_tp_theme_css = '';

//theme color
$shopping_cart_woocommerce_tp_color_option = get_theme_mod('shopping_cart_woocommerce_tp_color_option');

if($shopping_cart_woocommerce_tp_color_option != false){
$shopping_cart_woocommerce_tp_theme_css .='button[type="submit"],.main-navigation .menu > ul > li.highlight,.readmore-btn a,.more-btn a,.box:before,.box:after,a.added_to_cart.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,a.added_to_cart.wc-forward,.page-numbers,.prev.page-numbers,.next.page-numbers,span.meta-nav,#theme-sidebar button[type="submit"],#footer button[type="submit"],#comments input[type="submit"],.site-info,.book-tkt-btn a.register-btn,#slider .carousel-control-prev-icon, #slider .carousel-control-next-icon,p.cart-value.simplep,.woocommerce ul.products li.product .onsale, .woocommerce span.onsale, .error-404 [type="submit"] {';
$shopping_cart_woocommerce_tp_theme_css .='background-color: '.esc_attr($shopping_cart_woocommerce_tp_color_option).';';
$shopping_cart_woocommerce_tp_theme_css .='}';
}
if($shopping_cart_woocommerce_tp_color_option != false){
$shopping_cart_woocommerce_tp_theme_css .='a,#theme-sidebar .textwidget a,#footer .textwidget a,.comment-body a,.entry-content a,.entry-summary a,.page-template-front-page .media-links a:hover,.topbar-home i.fas.fa-phone-volume,#theme-sidebar h3,p.phone-info i,.product-content p,.main-navigation .current_page_item > a, .main-navigation .current-menu-item > a,.main-navigation a:hover,#slider .carousel-control-prev-icon:hover,#slider .carousel-control-next-icon:hover,.wp-block-search .wp-block-search__label,#theme-sidebar h2.wp-block-heading,.page-template-front-page .main-navigation .current_page_item > a, .page-template-front-page .main-navigation .current-menu-item > a{';
$shopping_cart_woocommerce_tp_theme_css .='color: '.esc_attr($shopping_cart_woocommerce_tp_color_option).';';
$shopping_cart_woocommerce_tp_theme_css .='}';
}
//hover color
$shopping_cart_woocommerce_tp_color_option_link = get_theme_mod('shopping_cart_woocommerce_tp_color_option_link');

if($shopping_cart_woocommerce_tp_color_option_link != false){
$shopping_cart_woocommerce_tp_theme_css .='.prev.page-numbers:focus, .prev.page-numbers:hover, .next.page-numbers:focus, .next.page-numbers:hover, .readmore-btn a:hover,span.meta-nav:hover, #comments input[type="submit"]:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, #footer button[type="submit"]:hover,#theme-sidebar .tagcloud a:hover, #theme-sidebar button[type="submit"]:hover,.book-tkt-btn a.register-btn:hover,.more-btn a:hover{';
	$shopping_cart_woocommerce_tp_theme_css .='background: '.esc_attr($shopping_cart_woocommerce_tp_color_option_link).';';
$shopping_cart_woocommerce_tp_theme_css .='}';
}
if($shopping_cart_woocommerce_tp_color_option_link != false){
$shopping_cart_woocommerce_tp_theme_css .='a:hover,#theme-sidebar a:hover,.media-links i:hover,#footer li a:hover,#theme-sidebar .tagcloud a:hover,.main-navigation a:hover,.page-template-front-page .main-navigation a:hover, #theme-sidebar .widget_tag_cloud a:hover  {';
$shopping_cart_woocommerce_tp_theme_css .='color: '.esc_attr($shopping_cart_woocommerce_tp_color_option_link).';';
$shopping_cart_woocommerce_tp_theme_css .='}';
}
if($shopping_cart_woocommerce_tp_color_option_link != false){
$shopping_cart_woocommerce_tp_theme_css .='#footer .tagcloud a:hover,p.wp-block-tag-cloud a:hover,#theme-sidebar .tagcloud a:hover,.post_tag a:hover, #theme-sidebar .widget_tag_cloud a:hover {';
$shopping_cart_woocommerce_tp_theme_css .='border-color: '.esc_attr($shopping_cart_woocommerce_tp_color_option_link).';';
$shopping_cart_woocommerce_tp_theme_css .='}';
}

//preloader

$shopping_cart_woocommerce_tp_preloader_color1_option = get_theme_mod('shopping_cart_woocommerce_tp_preloader_color1_option');
$shopping_cart_woocommerce_tp_preloader_color2_option = get_theme_mod('shopping_cart_woocommerce_tp_preloader_color2_option');
$shopping_cart_woocommerce_tp_preloader_bg_color_option = get_theme_mod('shopping_cart_woocommerce_tp_preloader_bg_color_option');

if($shopping_cart_woocommerce_tp_preloader_color1_option != false){
$shopping_cart_woocommerce_tp_theme_css .='.center1{';
	$shopping_cart_woocommerce_tp_theme_css .='border-color: '.esc_attr($shopping_cart_woocommerce_tp_preloader_color1_option).' !important;';
$shopping_cart_woocommerce_tp_theme_css .='}';
}
if($shopping_cart_woocommerce_tp_preloader_color1_option != false){
$shopping_cart_woocommerce_tp_theme_css .='.center1 .ring::before{';
	$shopping_cart_woocommerce_tp_theme_css .='background: '.esc_attr($shopping_cart_woocommerce_tp_preloader_color1_option).' !important;';
$shopping_cart_woocommerce_tp_theme_css .='}';
}
if($shopping_cart_woocommerce_tp_preloader_color2_option != false){
$shopping_cart_woocommerce_tp_theme_css .='.center2{';
	$shopping_cart_woocommerce_tp_theme_css .='border-color: '.esc_attr($shopping_cart_woocommerce_tp_preloader_color2_option).' !important;';
$shopping_cart_woocommerce_tp_theme_css .='}';
}
if($shopping_cart_woocommerce_tp_preloader_color2_option != false){
$shopping_cart_woocommerce_tp_theme_css .='.center2 .ring::before{';
	$shopping_cart_woocommerce_tp_theme_css .='background: '.esc_attr($shopping_cart_woocommerce_tp_preloader_color2_option).' !important;';
$shopping_cart_woocommerce_tp_theme_css .='}';
}
if($shopping_cart_woocommerce_tp_preloader_bg_color_option != false){
$shopping_cart_woocommerce_tp_theme_css .='.loader{';
	$shopping_cart_woocommerce_tp_theme_css .='background: '.esc_attr($shopping_cart_woocommerce_tp_preloader_bg_color_option).';';
$shopping_cart_woocommerce_tp_theme_css .='}';
}

// footer-bg-color
$shopping_cart_woocommerce_tp_footer_bg_color_option = get_theme_mod('shopping_cart_woocommerce_tp_footer_bg_color_option');

if($shopping_cart_woocommerce_tp_footer_bg_color_option != false){
$shopping_cart_woocommerce_tp_theme_css .='#footer{';
	$shopping_cart_woocommerce_tp_theme_css .='background: '.esc_attr($shopping_cart_woocommerce_tp_footer_bg_color_option).' !important;';
$shopping_cart_woocommerce_tp_theme_css .='}';
}