<?php
/**
 * Shopping Cart Woocommerce: Customizer
 *
 * @package Shopping Cart Woocommerce
 * @subpackage shopping_cart_woocommerce
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function shopping_cart_woocommerce_customize_register( $wp_customize ) {

	require get_parent_theme_file_path('/inc/controls/icon-changer.php');

	require get_parent_theme_file_path('/inc/controls/range-slider-control.php');

	// Register the custom control type.
	$wp_customize->register_control_type( 'Shopping_Cart_Woocommerce_Toggle_Control' );

	//Register the sortable control type.
	$wp_customize->register_control_type( 'Shopping_Cart_Woocommerce_Control_Sortable' );	

	//add home page setting pannel
	$wp_customize->add_panel( 'shopping_cart_woocommerce_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Custom Home page', 'shopping-cart-woocommerce' ),
	    'description' => __( 'Description of what this panel does.', 'shopping-cart-woocommerce' ),
	) );

	//TP Genral Option
	$wp_customize->add_section('shopping_cart_woocommerce_tp_general_settings',array(
        'title' => __('TP General Option', 'shopping-cart-woocommerce'),
        'priority' => 1,
        'panel' => 'shopping_cart_woocommerce_panel_id'
    ) );
 	$wp_customize->add_setting('shopping_cart_woocommerce_tp_body_layout_settings',array(
		'default' => 'Full',
		'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_choices'
	));
 	$wp_customize->add_control('shopping_cart_woocommerce_tp_body_layout_settings',array(
		'type' => 'radio',
		'label'     => __('Body Layout Setting', 'shopping-cart-woocommerce'),
		'description'   => __('This option work for complete body, if you want to set the complete website in container.', 'shopping-cart-woocommerce'),
		'section' => 'shopping_cart_woocommerce_tp_general_settings',
		'choices' => array(
		'Full' => __('Full','shopping-cart-woocommerce'),
		'Container' => __('Container','shopping-cart-woocommerce'),
		'Container Fluid' => __('Container Fluid','shopping-cart-woocommerce')
		),
	) );

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('shopping_cart_woocommerce_sidebar_post_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_choices'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_sidebar_post_layout',array(
     'type' => 'radio',
     'label'     => __('Post Sidebar Position', 'shopping-cart-woocommerce'),
     'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'shopping-cart-woocommerce'),
     'section' => 'shopping_cart_woocommerce_tp_general_settings',
     'choices' => array(
         'full' => __('Full','shopping-cart-woocommerce'),
         'left' => __('Left','shopping-cart-woocommerce'),
         'right' => __('Right','shopping-cart-woocommerce'),
         'three-column' => __('Three Columns','shopping-cart-woocommerce'),
         'four-column' => __('Four Columns','shopping-cart-woocommerce'),
         'grid' => __('Grid Layout','shopping-cart-woocommerce')
     ),
	) );

	// Add Settings and Controls for single post sidebar Layout
	$wp_customize->add_setting('shopping_cart_woocommerce_sidebar_single_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_choices'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_sidebar_single_post_layout',array(
        'type' => 'radio',
        'label'     => __('Single Post Sidebar Position', 'shopping-cart-woocommerce'),
        'description'   => __('This option work for single blog page', 'shopping-cart-woocommerce'),
        'section' => 'shopping_cart_woocommerce_tp_general_settings',
        'choices' => array(
            'full' => __('Full','shopping-cart-woocommerce'),
            'left' => __('Left','shopping-cart-woocommerce'),
            'right' => __('Right','shopping-cart-woocommerce'),
        ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('shopping_cart_woocommerce_sidebar_page_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_choices'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_sidebar_page_layout',array(
     'type' => 'radio',
     'label'     => __('Page Sidebar Position', 'shopping-cart-woocommerce'),
     'description'   => __('This option work for pages.', 'shopping-cart-woocommerce'),
     'section' => 'shopping_cart_woocommerce_tp_general_settings',
     'choices' => array(
         'full' => __('Full','shopping-cart-woocommerce'),
         'left' => __('Left','shopping-cart-woocommerce'),
         'right' => __('Right','shopping-cart-woocommerce')
     ),
	) );
    $wp_customize->add_setting( 'shopping_cart_woocommerce_sticky', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Shopping_Cart_Woocommerce_Toggle_Control( $wp_customize, 'shopping_cart_woocommerce_sticky', array(
		'label'       => esc_html__( 'Show / Hide Sticky Header', 'shopping-cart-woocommerce' ),
		'section'     => 'shopping_cart_woocommerce_tp_general_settings',
		'type'        => 'toggle',
		'settings'    => 'shopping_cart_woocommerce_sticky',
	) ) );

	//TP Preloader Option
	$wp_customize->add_section('shopping_cart_woocommerce_prelaoder_option',array(
		'title'         => __('TP Preloader Option', 'shopping-cart-woocommerce'),
		'priority' => 1,
		'panel' => 'shopping_cart_woocommerce_panel_id'
	) );
	$wp_customize->add_setting( 'shopping_cart_woocommerce_preloader_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Shopping_Cart_Woocommerce_Toggle_Control( $wp_customize, 'shopping_cart_woocommerce_preloader_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Preloader Option', 'shopping-cart-woocommerce' ),
		'section'     => 'shopping_cart_woocommerce_prelaoder_option',
		'type'        => 'toggle',
		'settings'    => 'shopping_cart_woocommerce_preloader_show_hide',
	) ) );
	$wp_customize->add_setting( 'shopping_cart_woocommerce_tp_preloader_color1_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'shopping_cart_woocommerce_tp_preloader_color1_option', array(
			'label'     => __('Preloader First Ring Color', 'shopping-cart-woocommerce'),
	    'description' => __('It will change the complete theme preloader ring 1 color in one click.', 'shopping-cart-woocommerce'),
	    'section' => 'shopping_cart_woocommerce_prelaoder_option',
	    'settings' => 'shopping_cart_woocommerce_tp_preloader_color1_option',
  	)));
  	$wp_customize->add_setting( 'shopping_cart_woocommerce_tp_preloader_color2_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'shopping_cart_woocommerce_tp_preloader_color2_option', array(
			'label'     => __('Preloader Second Ring Color', 'shopping-cart-woocommerce'),
	    'description' => __('It will change the complete theme preloader ring 2 color in one click.', 'shopping-cart-woocommerce'),
	    'section' => 'shopping_cart_woocommerce_prelaoder_option',
	    'settings' => 'shopping_cart_woocommerce_tp_preloader_color2_option',
  	)));
  	$wp_customize->add_setting( 'shopping_cart_woocommerce_tp_preloader_bg_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'shopping_cart_woocommerce_tp_preloader_bg_color_option', array(
			'label'     => __('Preloader Background Color', 'shopping-cart-woocommerce'),
	    'description' => __('It will change the complete theme preloader bg color in one click.', 'shopping-cart-woocommerce'),
	    'section' => 'shopping_cart_woocommerce_prelaoder_option',
	    'settings' => 'shopping_cart_woocommerce_tp_preloader_bg_color_option',
  	)));

    //TP Color Option
	$wp_customize->add_section('shopping_cart_woocommerce_color_option',array(
     'title'         => __('TP Color Option', 'shopping-cart-woocommerce'),
     'priority' => 1,
     'panel' => 'shopping_cart_woocommerce_panel_id'
    ) );
	$wp_customize->add_setting( 'shopping_cart_woocommerce_tp_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'shopping_cart_woocommerce_tp_color_option', array(
	    'description' => __('It will change the complete theme color in one click.', 'shopping-cart-woocommerce'),
	    'section' => 'shopping_cart_woocommerce_color_option',
	    'settings' => 'shopping_cart_woocommerce_tp_color_option',
  	)));
  	$wp_customize->add_setting( 'shopping_cart_woocommerce_tp_color_option_link', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'shopping_cart_woocommerce_tp_color_option_link', array(
	    'description' => __('It will change the complete theme hover link color in one click.', 'shopping-cart-woocommerce'),
	    'section' => 'shopping_cart_woocommerce_color_option',
	    'settings' => 'shopping_cart_woocommerce_tp_color_option_link',
  	)));

	//TP Blog Option
	$wp_customize->add_section('shopping_cart_woocommerce_blog_option',array(
		'title' => __('TP Blog Option', 'shopping-cart-woocommerce'),
		'priority' => 1,
		'panel' => 'shopping_cart_woocommerce_panel_id'
	) );
	$wp_customize->add_setting('blog_meta_order', array(
        'default' => array('date', 'author', 'comment'),
        'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_sortable',
    ));
    $wp_customize->add_control(new Shopping_Cart_Woocommerce_Control_Sortable($wp_customize, 'blog_meta_order', array(
    	'label' => esc_html__('Meta Order', 'shopping-cart-woocommerce'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'shopping-cart-woocommerce') ,
        'section' => 'shopping_cart_woocommerce_blog_option',
        'choices' => array(
            'date' => __('date', 'shopping-cart-woocommerce') ,
            'author' => __('author', 'shopping-cart-woocommerce') ,
            'comment' => __('comment', 'shopping-cart-woocommerce') ,
        ) ,
    )));
    $wp_customize->add_setting( 'shopping_cart_woocommerce_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'shopping_cart_woocommerce_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'shopping_cart_woocommerce_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','shopping-cart-woocommerce' ),
		'section'     => 'shopping_cart_woocommerce_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );
	$wp_customize->add_setting('shopping_cart_woocommerce_read_more_text',array(
		'default'=> __('Read More','shopping-cart-woocommerce'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_read_more_text',array(
		'label'	=> __('Edit Button Text','shopping-cart-woocommerce'),
		'section'=> 'shopping_cart_woocommerce_blog_option',
		'type'=> 'text'
	));
	$wp_customize->add_setting( 'shopping_cart_woocommerce_remove_read_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Shopping_Cart_Woocommerce_Toggle_Control( $wp_customize, 'shopping_cart_woocommerce_remove_read_button', array(
		'label'       => esc_html__( 'Show / Hide Read More Button', 'shopping-cart-woocommerce' ),
		'section'     => 'shopping_cart_woocommerce_blog_option',
		'type'        => 'toggle',
		'settings'    => 'shopping_cart_woocommerce_remove_read_button',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'shopping_cart_woocommerce_remove_read_button', array(
		'selector' => '.readmore-btn',
		'render_callback' => 'shopping_cart_woocommerce_customize_partial_shopping_cart_woocommerce_remove_read_button',
	 ));

	 $wp_customize->add_setting( 'shopping_cart_woocommerce_remove_tags', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Shopping_Cart_Woocommerce_Toggle_Control( $wp_customize, 'shopping_cart_woocommerce_remove_tags', array(
		'label'       => esc_html__( 'Show / Hide Tags Option', 'shopping-cart-woocommerce' ),
		'section'     => 'shopping_cart_woocommerce_blog_option',
		'type'        => 'toggle',
		'settings'    => 'shopping_cart_woocommerce_remove_tags',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'shopping_cart_woocommerce_remove_tags', array(
		'selector' => '.box-content a[rel="tag"]',
		'render_callback' => 'shopping_cart_woocommerce_customize_partial_shopping_cart_woocommerce_remove_tags',
	));

 	 //MENU TYPOGRAPHY
	$wp_customize->add_section( 'shopping_cart_woocommerce_menu_typography', array(
    	'title'      => __( 'Menu Typography', 'shopping-cart-woocommerce' ),
    	'priority' => 2,
		'panel' => 'shopping_cart_woocommerce_panel_id'
	) );
	$wp_customize->add_setting('shopping_cart_woocommerce_menu_text_tranform',array(
		'default' => 'Uppercase',
		'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_choices'
 	));
 	$wp_customize->add_control('shopping_cart_woocommerce_menu_text_tranform',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','shopping-cart-woocommerce'),
		'section' => 'shopping_cart_woocommerce_menu_typography',
		'choices' => array(
		   'Uppercase' => __('Uppercase','shopping-cart-woocommerce'),
		   'Lowercase' => __('Lowercase','shopping-cart-woocommerce'),
		   'Capitalize' => __('Capitalize','shopping-cart-woocommerce'),
		),
	) );
	$wp_customize->add_setting('shopping_cart_woocommerce_menu_font_size', array(
	  'default' => 14,
      'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_number_range',
	));
	$wp_customize->add_control(new Shopping_Cart_Woocommerce_Range_Slider($wp_customize, 'shopping_cart_woocommerce_menu_font_size', array(
       'section' => 'shopping_cart_woocommerce_menu_typography',
      'label' => esc_html__('Font Size', 'shopping-cart-woocommerce'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 20,
        'step' => 1
    )
	)));

	// Top Bar
	$wp_customize->add_section( 'shopping_cart_woocommerce_topbar', array(
    	'title'      => __( 'Header Details', 'shopping-cart-woocommerce' ),
    	'priority' => 2,
    	'description' => __( 'Add your contact details', 'shopping-cart-woocommerce' ),
		'panel' => 'shopping_cart_woocommerce_panel_id'
	) );
	$wp_customize->add_setting('shopping_cart_woocommerce_topbar_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_topbar_text',array(
		'label'	=> __('Topbar Text','shopping-cart-woocommerce'),
		'section'=> 'shopping_cart_woocommerce_topbar',
		'type'=> 'text'
	));
	$wp_customize->add_setting('shopping_cart_woocommerce_topbar_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_topbar_button_text',array(
		'label'	=> __('Add Button Text','shopping-cart-woocommerce'),
		'section'=> 'shopping_cart_woocommerce_topbar',
		'type'=> 'text'
	));
	$wp_customize->add_setting('shopping_cart_woocommerce_topbar_button_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_topbar_button_link',array(
		'label'	=> __('Add Button Link','shopping-cart-woocommerce'),
		'section'=> 'shopping_cart_woocommerce_topbar',
		'type'=> 'url'
	));
	$wp_customize->add_setting('shopping_cart_woocommerce_about_us_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_about_us_text',array(
		'label'	=> __('My About Us Text','shopping-cart-woocommerce'),
		'section'	=> 'shopping_cart_woocommerce_topbar',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('shopping_cart_woocommerce_about_us_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_about_us_link',array(
		'label'	=> __('My About Us Page Link','shopping-cart-woocommerce'),
		'section'	=> 'shopping_cart_woocommerce_topbar',
		'type'		=> 'url'
	));
	$wp_customize->add_setting('shopping_cart_woocommerce_my_account_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_my_account_text',array(
		'label'	=> __('My Account Text','shopping-cart-woocommerce'),
		'section'	=> 'shopping_cart_woocommerce_topbar',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('shopping_cart_woocommerce_my_account_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_my_account_link',array(
		'label'	=> __('My Account Page Link','shopping-cart-woocommerce'),
		'section'	=> 'shopping_cart_woocommerce_topbar',
		'type'		=> 'url'
	));
	$wp_customize->add_setting('shopping_cart_woocommerce_wishlist_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_wishlist_text',array(
		'label'	=> __('My Wishlist Text','shopping-cart-woocommerce'),
		'section'	=> 'shopping_cart_woocommerce_topbar',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('shopping_cart_woocommerce_wishlist_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_wishlist_link',array(
		'label'	=> __('My Wishlist Page Link','shopping-cart-woocommerce'),
		'section'	=> 'shopping_cart_woocommerce_topbar',
		'type'		=> 'url'
	));
	$wp_customize->add_setting('shopping_cart_woocommerce_checkout_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_checkout_text',array(
		'label'	=> __('My Checkout Text','shopping-cart-woocommerce'),
		'section'	=> 'shopping_cart_woocommerce_topbar',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('shopping_cart_woocommerce_checkout_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_checkout_link',array(
		'label'	=> __('My Checkout Page Link','shopping-cart-woocommerce'),
		'section'	=> 'shopping_cart_woocommerce_topbar',
		'type'		=> 'url'
	));
	$wp_customize->add_setting('shopping_cart_woocommerce_phone_number_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'shopping_cart_woocommerce_sanitize_phone_number'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_phone_number_text',array(
		'label'	=> __('Add Phone Number','shopping-cart-woocommerce'),
		'section'=> 'shopping_cart_woocommerce_topbar',
		'type'=> 'text'
	));
	$wp_customize->add_setting('shopping_cart_woocommerce_phone_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Shopping_Cart_Woocommerce_Icon_Changer(
	    $wp_customize,'shopping_cart_woocommerce_phone_icon',array(
		'label'	=> __('Phone Icon','shopping-cart-woocommerce'),
		'transport' => 'refresh',
		'section'	=> 'shopping_cart_woocommerce_topbar',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting( 'shopping_cart_woocommerce_search_icon', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Shopping_Cart_Woocommerce_Toggle_Control( $wp_customize, 'shopping_cart_woocommerce_search_icon', array(
		'label'       => esc_html__( 'Show / Hide Search Option', 'shopping-cart-woocommerce' ),
		'section'     => 'shopping_cart_woocommerce_topbar',
		'type'        => 'toggle',
		'settings'    => 'shopping_cart_woocommerce_search_icon',
	) ) );
	$wp_customize->add_setting( 'shopping_cart_woocommerce_user_icon', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Shopping_Cart_Woocommerce_Toggle_Control( $wp_customize, 'shopping_cart_woocommerce_user_icon', array(
		'label'       => esc_html__( 'Show / Hide User Option', 'shopping-cart-woocommerce' ),
		'section'     => 'shopping_cart_woocommerce_topbar',
		'type'        => 'toggle',
		'settings'    => 'shopping_cart_woocommerce_user_icon',
	) ) );
	$wp_customize->add_setting( 'shopping_cart_woocommerce_cart_icon', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Shopping_Cart_Woocommerce_Toggle_Control( $wp_customize, 'shopping_cart_woocommerce_cart_icon', array(
		'label'       => esc_html__( 'Show / Hide Cart Option', 'shopping-cart-woocommerce' ),
		'section'     => 'shopping_cart_woocommerce_topbar',
		'type'        => 'toggle',
		'settings'    => 'shopping_cart_woocommerce_cart_icon',
	) ) );

	//home page slider
	$wp_customize->add_section( 'shopping_cart_woocommerce_slider_section' , array(
    	'title'      => __( 'Slider Section', 'shopping-cart-woocommerce' ),
    	'priority' => 3,
		'panel' => 'shopping_cart_woocommerce_panel_id'
	) );

	$wp_customize->add_setting( 'shopping_cart_woocommerce_slider_arrows', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Shopping_Cart_Woocommerce_Toggle_Control( $wp_customize, 'shopping_cart_woocommerce_slider_arrows', array(
		'label'       => esc_html__( 'Show / Hide slider', 'shopping-cart-woocommerce' ),
		'section'     => 'shopping_cart_woocommerce_slider_section',
		'type'        => 'toggle',
		'settings'    => 'shopping_cart_woocommerce_slider_arrows',
	) ) );
	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'shopping_cart_woocommerce_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'shopping_cart_woocommerce_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'shopping-cart-woocommerce' ),
			'description' => __('Image Size ( 1835 x 700 ) px','shopping-cart-woocommerce'),
			'section'  => 'shopping_cart_woocommerce_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}
	$wp_customize->add_setting( 'shopping_cart_woocommerce_slider_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Shopping_Cart_Woocommerce_Toggle_Control( $wp_customize, 'shopping_cart_woocommerce_slider_button', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'shopping-cart-woocommerce' ),
		'section'     => 'shopping_cart_woocommerce_slider_section',
		'type'        => 'toggle',
		'settings'    => 'shopping_cart_woocommerce_slider_button',
	) ) );
	$wp_customize->add_setting('shopping_cart_woocommerce_slider_option',array(
        'default' => 'defaut-layout',
        'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_choices'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_slider_option',array(
        'type' => 'radio',
        'label'     => __('Theme Layout', 'shopping-cart-woocommerce'),
        'section' => 'shopping_cart_woocommerce_slider_section',
        'choices' => array(
            'defaut-layout' => __('Defaut Layout','shopping-cart-woocommerce'),
            'custom-layout' => __('Custom Layout','shopping-cart-woocommerce'),
        ),
	) );

	$wp_customize->add_setting('shopping_cart_woocommerce_slider_content_layout',array(
        'default' => 'CENTER-ALIGN',
        'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_choices'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_slider_content_layout',array(
        'type' => 'radio',
        'label'     => __('Slider Content Layout', 'shopping-cart-woocommerce'),
        'section' => 'shopping_cart_woocommerce_slider_section',
        'choices' => array(
            'CENTER-ALIGN' => __('CENTER-ALIGN','shopping-cart-woocommerce'),
            'LEFT-ALIGN' => __('LEFT-ALIGN','shopping-cart-woocommerce'),
            'RIGHT-ALIGN' => __('RIGHT-ALIGN','shopping-cart-woocommerce'),
        ),
	) );


	// Service Fields
    $wp_customize->add_section('shopping_cart_woocommerce_services_fields_section',array(
        'title' => __('Our Services','shopping-cart-woocommerce'),
        'description'   => __('Our Services Sections','shopping-cart-woocommerce'),
        'panel' => 'shopping_cart_woocommerce_panel_id',
        'priority' => 3,
    ));
    $wp_customize->add_setting( 'shopping_cart_woocommerce_show_hide_service_section', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Shopping_Cart_Woocommerce_Toggle_Control( $wp_customize, 'shopping_cart_woocommerce_show_hide_service_section', array(
		'label'       => esc_html__( 'Show / Hide Service Section', 'shopping-cart-woocommerce' ),
		'section'     => 'shopping_cart_woocommerce_services_fields_section',
		'type'        => 'toggle',
		'settings'    => 'shopping_cart_woocommerce_show_hide_service_section',
	) ) );
	for ($i=1; $i <=4 ; $i++) {

        $wp_customize->add_setting('shopping_cart_woocommerce_services_fields_icon'.$i,array(
            'default' => '',
            'sanitize_callback'   => 'sanitize_text_field',
        ));
        $wp_customize->add_control('shopping_cart_woocommerce_services_fields_icon'.$i,array(
            'label' => __('Service Icon','shopping-cart-woocommerce'),
            'section' => 'shopping_cart_woocommerce_services_fields_section',
            'type'  => 'text'
        ));

        $wp_customize->add_setting('shopping_cart_woocommerce_services_fields_heading'.$i,array(
            'default' => '',
            'sanitize_callback'   => 'sanitize_text_field',
        ));
        $wp_customize->add_control('shopping_cart_woocommerce_services_fields_heading'.$i,array(
            'label' => __('Service Name','shopping-cart-woocommerce'),
            'section' => 'shopping_cart_woocommerce_services_fields_section',
            'type'  => 'text'
        ));

        $wp_customize->add_setting('shopping_cart_woocommerce_services_fields_text'.$i,array(
            'default'  => '',
            'sanitize_callback'    => 'sanitize_text_field',
        ));
        $wp_customize->add_control('shopping_cart_woocommerce_services_fields_text'.$i,array(
            'label' => __('Service Description','shopping-cart-woocommerce'),
            'section' => 'shopping_cart_woocommerce_services_fields_section',
            'type' => 'text'
        ));
    }

	// Product Section
	$wp_customize->add_section( 'shopping_cart_woocommerce_product_section' , array(
    	'title'      => __( 'Product Section', 'shopping-cart-woocommerce' ),
    	'priority' => 3,
		'panel' => 'shopping_cart_woocommerce_panel_id'
	) );
	$wp_customize->add_setting( 'shopping_cart_woocommerce_show_hide_product_section', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Shopping_Cart_Woocommerce_Toggle_Control( $wp_customize, 'shopping_cart_woocommerce_show_hide_product_section', array(
		'label'       => esc_html__( 'Show / Hide Product Section', 'shopping-cart-woocommerce' ),
		'section'     => 'shopping_cart_woocommerce_product_section',
		'type'        => 'toggle',
		'settings'    => 'shopping_cart_woocommerce_show_hide_product_section',
	) ) );

	$shopping_cart_woocommerce_args = array(
	 'type'                     => 'product',
	 'child_of'                 => 0,
	 'parent'                   => '',
	 'orderby'                  => 'term_group',
	 'order'                    => 'ASC',
	 'hide_empty'               => false,
	 'hierarchical'             => 1,
	 'number'                   => '',
	 'taxonomy'                 => 'product_cat',
	 'pad_counts'               => false
	);
	$categories = get_categories( $shopping_cart_woocommerce_args );
	$shopping_cart_woocommerce_cats = array();
	$i = 0;
	foreach($categories as $category){
		if($i==0){
				$default = $category->slug;
				$i++;
		}
		$shopping_cart_woocommerce_cats[$category->slug] = $category->name;
	}
	$wp_customize->add_setting('shopping_cart_woocommerce_recent_product_category',array(
		'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_select',
	));
	$wp_customize->add_control('shopping_cart_woocommerce_recent_product_category',array(
		'type'    => 'select',
		'choices' => $shopping_cart_woocommerce_cats,
		'label' => __('Select Product Category','shopping-cart-woocommerce'),
		'section' => 'shopping_cart_woocommerce_product_section',
	));

	//footer
	$wp_customize->add_section('shopping_cart_woocommerce_footer_section',array(
		'title'	=> __('Footer Text','shopping-cart-woocommerce'),
		'description'	=> __('Add copyright text.','shopping-cart-woocommerce'),
		'panel' => 'shopping_cart_woocommerce_panel_id',
		'priority' => 4,
	));
	$wp_customize->add_setting('shopping_cart_woocommerce_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_footer_text',array(
		'label'	=> __('Copyright Text','shopping-cart-woocommerce'),
		'section'	=> 'shopping_cart_woocommerce_footer_section',
		'type'		=> 'text'
	));
	// footer columns
	$wp_customize->add_setting('shopping_cart_woocommerce_footer_columns',array(
		'default'	=> 4,
		'sanitize_callback'	=> 'shopping_cart_woocommerce_sanitize_number_absint'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_footer_columns',array(
		'label'	=> __('Footer Widget Columns','shopping-cart-woocommerce'),
		'section'	=> 'shopping_cart_woocommerce_footer_section',
		'setting'	=> 'shopping_cart_woocommerce_footer_columns',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	));
	$wp_customize->add_setting( 'shopping_cart_woocommerce_tp_footer_bg_color_option', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'shopping_cart_woocommerce_tp_footer_bg_color_option', array(
			'label'     => __('Footer Widget Background Color', 'shopping-cart-woocommerce'),
			'description' => __('It will change the complete footer widget backgorund color.', 'shopping-cart-woocommerce'),
			'section' => 'shopping_cart_woocommerce_footer_section',
			'settings' => 'shopping_cart_woocommerce_tp_footer_bg_color_option',
	)));
	$wp_customize->add_setting('shopping_cart_woocommerce_footer_widget_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'shopping_cart_woocommerce_footer_widget_image',array(
        'label' => __('Footer Widget Background Image','shopping-cart-woocommerce'),
         'section' => 'shopping_cart_woocommerce_footer_section'
	)));
	$wp_customize->add_setting( 'shopping_cart_woocommerce_return_to_header', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Shopping_Cart_Woocommerce_Toggle_Control( $wp_customize, 'shopping_cart_woocommerce_return_to_header', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'shopping-cart-woocommerce' ),
		'section'     => 'shopping_cart_woocommerce_footer_section',
		'type'        => 'toggle',
		'settings'    => 'shopping_cart_woocommerce_return_to_header',
	) ) );
    $wp_customize->add_setting('shopping_cart_woocommerce_scroll_top_icon',array(
	  'default'	=> 'fas fa-arrow-up',
	  'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Shopping_Cart_Woocommerce_Icon_Changer(
	        $wp_customize,'shopping_cart_woocommerce_scroll_top_icon',array(
		'label'	=> __('Scroll to top Icon','shopping-cart-woocommerce'),
		'transport' => 'refresh',
		'section'	=> 'shopping_cart_woocommerce_footer_section',
			'type'		=> 'icon'
	)));

    // Add Settings and Controls for Scroll top
	$wp_customize->add_setting('shopping_cart_woocommerce_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_choices'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_scroll_top_position',array(
        'type' => 'radio',
        'label'     => __('Scroll to top Position', 'shopping-cart-woocommerce'),
        'description'   => __('This option work for scroll to top', 'shopping-cart-woocommerce'),
       'section' => 'shopping_cart_woocommerce_footer_section',
       'choices' => array(
            'Right' => __('Right','shopping-cart-woocommerce'),
            'Left' => __('Left','shopping-cart-woocommerce'),
            'Center' => __('Center','shopping-cart-woocommerce')
     ),
	) );
	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'shopping_cart_woocommerce_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'shopping_cart_woocommerce_customize_partial_blogdescription',
	) );

	//Mobile Respnsive
	$wp_customize->add_section('shopping_cart_woocommerce_mobile_media_option',array(
		'title'         => __('Mobile Responsive media', 'shopping-cart-woocommerce'),
		'priority' => 5,
		'panel' => 'shopping_cart_woocommerce_panel_id'
	) );
	$wp_customize->add_setting( 'shopping_cart_woocommerce_return_to_header_mob', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Shopping_Cart_Woocommerce_Toggle_Control( $wp_customize, 'shopping_cart_woocommerce_return_to_header_mob', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'shopping-cart-woocommerce' ),
		'section'     => 'shopping_cart_woocommerce_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'shopping_cart_woocommerce_return_to_header_mob',
	) ) );
	$wp_customize->add_setting( 'shopping_cart_woocommerce_slider_buttom_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Shopping_Cart_Woocommerce_Toggle_Control( $wp_customize, 'shopping_cart_woocommerce_slider_buttom_mob', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'shopping-cart-woocommerce' ),
		'section'     => 'shopping_cart_woocommerce_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'shopping_cart_woocommerce_slider_buttom_mob',
	) ) );

	//Site Identity
	$wp_customize->add_setting( 'shopping_cart_woocommerce_site_title', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Shopping_Cart_Woocommerce_Toggle_Control( $wp_customize, 'shopping_cart_woocommerce_site_title', array(
		'label'       => esc_html__( 'Show / Hide Site Title', 'shopping-cart-woocommerce' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'shopping_cart_woocommerce_site_title',
	) ) );
	$wp_customize->add_setting('shopping_cart_woocommerce_site_title_font_size',array(
		'default'	=> 25,
		'sanitize_callback'	=> 'shopping_cart_woocommerce_sanitize_number_absint'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_site_title_font_size',array(
		'label'	=> __('Site Title Font Size in PX','shopping-cart-woocommerce'),
		'section'	=> 'title_tagline',
		'setting'	=> 'shopping_cart_woocommerce_site_title_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 80,
		),
	));
	$wp_customize->add_setting( 'shopping_cart_woocommerce_site_tagline', array(
	    'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Shopping_Cart_Woocommerce_Toggle_Control( $wp_customize, 'shopping_cart_woocommerce_site_tagline', array(
		'label'       => esc_html__( 'Show / Hide Site Tagline', 'shopping-cart-woocommerce' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'shopping_cart_woocommerce_site_tagline',
	) ) );

	// logo site tagline size
	$wp_customize->add_setting('shopping_cart_woocommerce_site_tagline_font_size',array(
		'default'	=> 15,
		'sanitize_callback'	=> 'shopping_cart_woocommerce_sanitize_number_absint'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_site_tagline_font_size',array(
		'label'	=> __('Site Tagline Font Size in PX','shopping-cart-woocommerce'),
		'section'	=> 'title_tagline',
	    'setting'	=> 'shopping_cart_woocommerce_site_tagline_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));
    $wp_customize->add_setting('shopping_cart_woocommerce_logo_width',array(
		'default' => 150,
		'sanitize_callback'	=> 'shopping_cart_woocommerce_sanitize_number_absint'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','shopping-cart-woocommerce'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('shopping_cart_woocommerce_logo_settings',array(
		'default' => 'Different Line',
		'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_choices'
	));
    $wp_customize->add_control('shopping_cart_woocommerce_logo_settings',array(
        'type' => 'radio',
        'label'     => __('Logo Layout Settings', 'shopping-cart-woocommerce'),
        'description'   => __('Here you have two options 1. Logo and Site tite in differnt line. 2. Logo and Site title in same line.', 'shopping-cart-woocommerce'),
        'section' => 'title_tagline',
        'choices' => array(
            'Different Line' => __('Different Line','shopping-cart-woocommerce'),
            'Same Line' => __('Same Line','shopping-cart-woocommerce')
        ),
	) );

	//Woo Coomerce
	$wp_customize->add_setting('shopping_cart_woocommerce_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'shopping_cart_woocommerce_sanitize_number_absint'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_per_columns',array(
		'label'	=> __('Product Per Row','shopping-cart-woocommerce'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));
	$wp_customize->add_setting('shopping_cart_woocommerce_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'shopping_cart_woocommerce_sanitize_number_absint'
	));
	$wp_customize->add_control('shopping_cart_woocommerce_product_per_page',array(
		'label'	=> __('Product Per Page','shopping-cart-woocommerce'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));
   	$wp_customize->add_setting( 'shopping_cart_woocommerce_product_sidebar', array(
		 'default'           => true,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Shopping_Cart_Woocommerce_Toggle_Control( $wp_customize, 'shopping_cart_woocommerce_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Shop Page Sidebar', 'shopping-cart-woocommerce' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'shopping_cart_woocommerce_product_sidebar',
	) ) );

	$wp_customize->add_setting( 'shopping_cart_woocommerce_single_product_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Shopping_Cart_Woocommerce_Toggle_Control( $wp_customize, 'shopping_cart_woocommerce_single_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Product Page Sidebar', 'shopping-cart-woocommerce' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'shopping_cart_woocommerce_single_product_sidebar',
	) ) );
	$wp_customize->add_setting( 'shopping_cart_woocommerce_related_product', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'shopping_cart_woocommerce_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Shopping_Cart_Woocommerce_Toggle_Control( $wp_customize, 'shopping_cart_woocommerce_related_product', array(
		'label'       => esc_html__( 'Show / Hide related product', 'shopping-cart-woocommerce' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'shopping_cart_woocommerce_related_product',
	) ) );
}
add_action( 'customize_register', 'shopping_cart_woocommerce_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Shopping Cart Woocommerce 1.0
 * @see shopping_cart_woocommerce_customize_register()
 *
 * @return void
 */
function shopping_cart_woocommerce_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Shopping Cart Woocommerce 1.0
 * @see shopping_cart_woocommerce_customize_register()
 *
 * @return void
 */
function shopping_cart_woocommerce_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'SHOPPING_CART_WOOCOMMERCE_PRO_THEME_NAME' ) ) {
	define( 'SHOPPING_CART_WOOCOMMERCE_PRO_THEME_NAME', esc_html__( 'Shopping Cart Pro', 'shopping-cart-woocommerce' ));
}
if ( ! defined( 'SHOPPING_CART_WOOCOMMERCE_PRO_THEME_URL' ) ) {
	define( 'SHOPPING_CART_WOOCOMMERCE_PRO_THEME_URL', esc_url('https://www.themespride.com/themes/wordpress-shopping-theme/'));
}


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Shopping_Cart_Woocommerce_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Shopping_Cart_Woocommerce_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Shopping_Cart_Woocommerce_Customize_Section_Pro(
				$manager,
				'shopping_cart_woocommerce_section_pro',
				array(
					'priority'   => 9,
					'title'    => SHOPPING_CART_WOOCOMMERCE_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'shopping-cart-woocommerce' ),
					'pro_url'  => esc_url( SHOPPING_CART_WOOCOMMERCE_PRO_THEME_URL, 'shopping-cart-woocommerce' ),
				)
			)
		);

		// Register sections.
	$manager->add_section(
		new Shopping_Cart_Woocommerce_Customize_Section_Pro(
			$manager,
			'shopping_cart_woocommerce_documentation',
			array(
				'priority'   => 500,
				'title'    => esc_html__( 'Theme Documentation', 'shopping-cart-woocommerce' ),
				'pro_text' => esc_html__( 'Click Here', 'shopping-cart-woocommerce' ),
				'pro_url'  => esc_url( SHOPPING_CART_WOOCOMMERCE_DOCS_URL, 'shopping-cart-woocommerce'),
			)
		)
	);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'shopping-cart-woocommerce-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'shopping-cart-woocommerce-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Shopping_Cart_Woocommerce_Customize::get_instance();
