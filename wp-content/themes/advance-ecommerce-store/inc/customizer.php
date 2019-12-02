<?php
/**
 * Advance Ecommerce Store Theme Customizer
 *
 * @package advance-ecommerce-store
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function advance_ecommerce_store_customize_register($wp_customize) {

	//add home page setting pannel
	$wp_customize->add_panel('advance_ecommerce_store_panel_id', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Theme Settings', 'advance-ecommerce-store'),
		'description'    => __('Description of what this panel does.', 'advance-ecommerce-store'),
	));

	// Add the Theme Color Option section.
	$wp_customize->add_section( 'advance_ecommerce_store_theme_color_option', array( 
		'panel' => 'advance_ecommerce_store_panel_id', 
		'title' => esc_html__( 'Theme Color Option', 'advance-ecommerce-store' ) 
	) );

  	$wp_customize->add_setting( 'advance_ecommerce_store_theme_color', array(
	    'default' => '#cb4f00',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_ecommerce_store_theme_color', array(
  		'label' => 'Color Option',
	    'description' => __('One can change complete theme color on just one click.', 'advance-ecommerce-store'),
	    'section' => 'advance_ecommerce_store_theme_color_option',
	    'settings' => 'advance_ecommerce_store_theme_color',
  	)));

	//Layouts
	$wp_customize->add_section('advance_ecommerce_store_left_right', array(
		'title'    => __('Layout Settings', 'advance-ecommerce-store'),
		'panel'    => 'advance_ecommerce_store_panel_id',
	));

	$wp_customize->add_setting('advance_ecommerce_store_theme_options',array(
        'default' => __('Default','advance-ecommerce-store'),
	        'sanitize_callback' => 'advance_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('advance_ecommerce_store_theme_options',array(
        'type' => 'radio',
        'label' => __('Container Box','advance-ecommerce-store'),
        'description' => __('Here you can change the Width layout. ','advance-ecommerce-store'),
        'section' => 'advance_ecommerce_store_left_right',
        'choices' => array(
            'Default' => __('Default','advance-ecommerce-store'),
            'Container' => __('Container','advance-ecommerce-store'),
            'Box Container' => __('Box Container','advance-ecommerce-store'),
        ),
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('advance_ecommerce_store_layout_options', array(
		'default'           => __('Right Sidebar', 'advance-ecommerce-store'),
		'sanitize_callback' => 'advance_ecommerce_store_sanitize_choices',
	));
	$wp_customize->add_control('advance_ecommerce_store_layout_options',array(
		'type'           => 'radio',
		'label'          => __('Change Layouts', 'advance-ecommerce-store'),
		'section'        => 'advance_ecommerce_store_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'advance-ecommerce-store'),
			'Right Sidebar' => __('Right Sidebar', 'advance-ecommerce-store'),
			'One Column'    => __('One Column', 'advance-ecommerce-store'),
			'Three Columns' => __('Three Columns', 'advance-ecommerce-store'),
			'Four Columns'  => __('Four Columns', 'advance-ecommerce-store'),
			'Grid Layout'   => __('Grid Layout', 'advance-ecommerce-store')
		),
	));

	$font_array = array(
        '' =>'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' =>'Acme', 
        'Anton' => 'Anton', 
        'Architects Daughter' =>'Architects Daughter',
        'Arimo' => 'Arimo', 
        'Arsenal' =>'Arsenal',
        'Arvo' =>'Arvo',
        'Alegreya' =>'Alegreya',
        'Alfa Slab One' =>'Alfa Slab One',
        'Averia Serif Libre' =>'Averia Serif Libre', 
        'Bangers' =>'Bangers', 
        'Boogaloo' =>'Boogaloo', 
        'Bad Script' =>'Bad Script',
        'Bitter' =>'Bitter', 
        'Bree Serif' =>'Bree Serif', 
        'BenchNine' =>'BenchNine',
        'Cabin' =>'Cabin',
        'Cardo' =>'Cardo', 
        'Courgette' =>'Courgette', 
        'Cherry Swash' =>'Cherry Swash',
        'Cormorant Garamond' =>'Cormorant Garamond', 
        'Crimson Text' =>'Crimson Text',
        'Cuprum' =>'Cuprum', 
        'Cookie' =>'Cookie',
        'Chewy' =>'Chewy',
        'Days One' =>'Days One',
        'Dosis' =>'Dosis',
        'Droid Sans' =>'Droid Sans', 
        'Economica' =>'Economica', 
        'Fredoka One' =>'Fredoka One',
        'Fjalla One' =>'Fjalla One',
        'Francois One' =>'Francois One', 
        'Frank Ruhl Libre' => 'Frank Ruhl Libre', 
        'Gloria Hallelujah' =>'Gloria Hallelujah',
        'Great Vibes' =>'Great Vibes', 
        'Handlee' =>'Handlee', 
        'Hammersmith One' =>'Hammersmith One',
        'Inconsolata' =>'Inconsolata',
        'Indie Flower' =>'Indie Flower', 
        'IM Fell English SC' =>'IM Fell English SC',
        'Julius Sans One' =>'Julius Sans One',
        'Josefin Slab' =>'Josefin Slab',
        'Josefin Sans' =>'Josefin Sans',
        'Kanit' =>'Kanit',
        'Lobster' =>'Lobster',
        'Lato' => 'Lato',
        'Lora' =>'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather',
        'Monda' =>'Monda',
        'Montserrat' =>'Montserrat',
        'Muli' =>'Muli',
        'Marck Script' =>'Marck Script',
        'Noto Serif' =>'Noto Serif',
        'Open Sans' =>'Open Sans',
        'Overpass' => 'Overpass', 
        'Overpass Mono' =>'Overpass Mono',
        'Oxygen' =>'Oxygen',
        'Orbitron' =>'Orbitron',
        'Patua One' =>'Patua One',
        'Pacifico' =>'Pacifico',
        'Padauk' =>'Padauk',
        'Playball' =>'Playball',
        'Playfair Display' =>'Playfair Display',
        'PT Sans' =>'PT Sans',
        'Philosopher' =>'Philosopher',
        'Permanent Marker' =>'Permanent Marker',
        'Poiret One' =>'Poiret One',
        'Quicksand' =>'Quicksand',
        'Quattrocento Sans' =>'Quattrocento Sans',
        'Raleway' =>'Raleway',
        'Rubik' =>'Rubik',
        'Rokkitt' =>'Rokkitt',
        'Russo One' => 'Russo One', 
        'Righteous' =>'Righteous', 
        'Slabo' =>'Slabo', 
        'Source Sans Pro' =>'Source Sans Pro',
        'Shadows Into Light Two' =>'Shadows Into Light Two',
        'Shadows Into Light' =>  'Shadows Into Light',
        'Sacramento' =>'Sacramento',
        'Shrikhand' =>'Shrikhand',
        'Tangerine' => 'Tangerine',
        'Ubuntu' =>'Ubuntu',
        'VT323' =>'VT323',
        'Varela Round' =>'Varela Round',
        'Vampiro One' =>'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' =>'Volkhov',
        'Yanone Kaffeesatz' =>'Yanone Kaffeesatz'
    );

	//Typography
	$wp_customize->add_section( 'advance_ecommerce_store_typography', array(
    	'title'      => __( 'Typography', 'advance-ecommerce-store' ),
		'priority'   => 30,
		'panel' => 'advance_ecommerce_store_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'advance_ecommerce_store_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_ecommerce_store_paragraph_color', array(
		'label' => __('Paragraph Color', 'advance-ecommerce-store'),
		'section' => 'advance_ecommerce_store_typography',
		'settings' => 'advance_ecommerce_store_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('advance_ecommerce_store_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_ecommerce_store_paragraph_font_family', array(
	    'section'  => 'advance_ecommerce_store_typography',
	    'label'    => __( 'Paragraph Fonts','advance-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('advance_ecommerce_store_paragraph_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_ecommerce_store_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','advance-ecommerce-store'),
		'section'	=> 'advance_ecommerce_store_typography',
		'setting'	=> 'advance_ecommerce_store_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'advance_ecommerce_store_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_ecommerce_store_atag_color', array(
		'label' => __('"a" Tag Color', 'advance-ecommerce-store'),
		'section' => 'advance_ecommerce_store_typography',
		'settings' => 'advance_ecommerce_store_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('advance_ecommerce_store_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_ecommerce_store_atag_font_family', array(
	    'section'  => 'advance_ecommerce_store_typography',
	    'label'    => __( '"a" Tag Fonts','advance-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'advance_ecommerce_store_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_ecommerce_store_li_color', array(
		'label' => __('"li" Tag Color', 'advance-ecommerce-store'),
		'section' => 'advance_ecommerce_store_typography',
		'settings' => 'advance_ecommerce_store_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('advance_ecommerce_store_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_ecommerce_store_li_font_family', array(
	    'section'  => 'advance_ecommerce_store_typography',
	    'label'    => __( '"li" Tag Fonts','advance-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'advance_ecommerce_store_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_ecommerce_store_h1_color', array(
		'label' => __('H1 Color', 'advance-ecommerce-store'),
		'section' => 'advance_ecommerce_store_typography',
		'settings' => 'advance_ecommerce_store_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('advance_ecommerce_store_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_ecommerce_store_h1_font_family', array(
	    'section'  => 'advance_ecommerce_store_typography',
	    'label'    => __( 'H1 Fonts','advance-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('advance_ecommerce_store_h1_font_size',array(
		'default'	=> '50px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_ecommerce_store_h1_font_size',array(
		'label'	=> __('H1 Font Size','advance-ecommerce-store'),
		'section'	=> 'advance_ecommerce_store_typography',
		'setting'	=> 'advance_ecommerce_store_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'advance_ecommerce_store_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_ecommerce_store_h2_color', array(
		'label' => __('H2 Color', 'advance-ecommerce-store'),
		'section' => 'advance_ecommerce_store_typography',
		'settings' => 'advance_ecommerce_store_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('advance_ecommerce_store_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_ecommerce_store_h2_font_family', array(
	    'section'  => 'advance_ecommerce_store_typography',
	    'label'    => __( 'H2 Fonts','advance-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('advance_ecommerce_store_h2_font_size',array(
		'default'	=> '45px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_ecommerce_store_h2_font_size',array(
		'label'	=> __('H2 Font Size','advance-ecommerce-store'),
		'section'	=> 'advance_ecommerce_store_typography',
		'setting'	=> 'advance_ecommerce_store_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'advance_ecommerce_store_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_ecommerce_store_h3_color', array(
		'label' => __('H3 Color', 'advance-ecommerce-store'),
		'section' => 'advance_ecommerce_store_typography',
		'settings' => 'advance_ecommerce_store_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('advance_ecommerce_store_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_ecommerce_store_h3_font_family', array(
	    'section'  => 'advance_ecommerce_store_typography',
	    'label'    => __( 'H3 Fonts','advance-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('advance_ecommerce_store_h3_font_size',array(
		'default'	=> '36px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_ecommerce_store_h3_font_size',array(
		'label'	=> __('H3 Font Size','advance-ecommerce-store'),
		'section'	=> 'advance_ecommerce_store_typography',
		'setting'	=> 'advance_ecommerce_store_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'advance_ecommerce_store_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_ecommerce_store_h4_color', array(
		'label' => __('H4 Color', 'advance-ecommerce-store'),
		'section' => 'advance_ecommerce_store_typography',
		'settings' => 'advance_ecommerce_store_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('advance_ecommerce_store_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_ecommerce_store_h4_font_family', array(
	    'section'  => 'advance_ecommerce_store_typography',
	    'label'    => __( 'H4 Fonts','advance-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('advance_ecommerce_store_h4_font_size',array(
		'default'	=> '30px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_ecommerce_store_h4_font_size',array(
		'label'	=> __('H4 Font Size','advance-ecommerce-store'),
		'section'	=> 'advance_ecommerce_store_typography',
		'setting'	=> 'advance_ecommerce_store_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'advance_ecommerce_store_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_ecommerce_store_h5_color', array(
		'label' => __('H5 Color', 'advance-ecommerce-store'),
		'section' => 'advance_ecommerce_store_typography',
		'settings' => 'advance_ecommerce_store_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('advance_ecommerce_store_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_ecommerce_store_h5_font_family', array(
	    'section'  => 'advance_ecommerce_store_typography',
	    'label'    => __( 'H5 Fonts','advance-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('advance_ecommerce_store_h5_font_size',array(
		'default'	=> '25px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_ecommerce_store_h5_font_size',array(
		'label'	=> __('H5 Font Size','advance-ecommerce-store'),
		'section'	=> 'advance_ecommerce_store_typography',
		'setting'	=> 'advance_ecommerce_store_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'advance_ecommerce_store_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'advance_ecommerce_store_h6_color', array(
		'label' => __('H6 Color', 'advance-ecommerce-store'),
		'section' => 'advance_ecommerce_store_typography',
		'settings' => 'advance_ecommerce_store_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('advance_ecommerce_store_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'advance_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control(
	    'advance_ecommerce_store_h6_font_family', array(
	    'section'  => 'advance_ecommerce_store_typography',
	    'label'    => __( 'H6 Fonts','advance-ecommerce-store'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('advance_ecommerce_store_h6_font_size',array(
		'default'	=> '18px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_ecommerce_store_h6_font_size',array(
		'label'	=> __('H6 Font Size','advance-ecommerce-store'),
		'section'	=> 'advance_ecommerce_store_typography',
		'setting'	=> 'advance_ecommerce_store_h6_font_size',
		'type'	=> 'text'
	));
	
	//Slider
	$wp_customize->add_section( 'advance_ecommerce_store_slider' , array(
    	'title'      => __( 'Slider Settings', 'advance-ecommerce-store' ),
		'priority'   => null,
		'panel' => 'advance_ecommerce_store_panel_id'
	) );

	$wp_customize->add_setting('advance_ecommerce_store_slider_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_ecommerce_store_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','advance-ecommerce-store'),
       'section' => 'advance_ecommerce_store_slider',
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'advance_ecommerce_store_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'advance_ecommerce_store_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'advance_ecommerce_store_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'advance-ecommerce-store' ),
			'section'  => 'advance_ecommerce_store_slider',
			'type'     => 'dropdown-pages'
		) );
	}

	//Products Service
	$wp_customize->add_section( 'advance_ecommerce_store_services_section' , array(
    	'title'      => __( 'Product Services', 'advance-ecommerce-store' ),
		'priority'   => null,
		'panel' => 'advance_ecommerce_store_panel_id'
	) );

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
	if($i==0){
	$default = $category->slug;
	$i++;
	}
	$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('advance_ecommerce_store_product_service',array(
		'default'	=> 'select',
		'sanitize_callback' => 'advance_ecommerce_store_sanitize_choices'
	));
	$wp_customize->add_control('advance_ecommerce_store_product_service',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display Services','advance-ecommerce-store'),
		'section' => 'advance_ecommerce_store_services_section',
	));

	//New Arrivals
	$wp_customize->add_section( 'advance_ecommerce_store_products' , array(
    	'title'      => __( 'New Arrivals', 'advance-ecommerce-store' ),
		'priority'   => null,
		'panel' => 'advance_ecommerce_store_panel_id'
	) );

	$wp_customize->add_setting('advance_ecommerce_store_section_title', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_ecommerce_store_section_title', array(
		'label'   => __('Section Title', 'advance-ecommerce-store'),
		'section' => 'advance_ecommerce_store_products',
		'type'    => 'text',
	));

	$wp_customize->add_setting( 'advance_ecommerce_store_product_page', array(
		'default'           => '',
		'sanitize_callback' => 'advance_ecommerce_store_sanitize_dropdown_pages'
	));
	$wp_customize->add_control( 'advance_ecommerce_store_product_page', array(
		'label'    => __( 'Select Page', 'advance-ecommerce-store' ),
		'section'  => 'advance_ecommerce_store_products',
		'type'     => 'dropdown-pages'
	));

	//Blog Post
	$wp_customize->add_section('advance_ecommerce_store_blog_post',array(
		'title'	=> __('Blog Page Settings','advance-ecommerce-store'),
		'panel' => 'advance_ecommerce_store_panel_id',
	));	

	$wp_customize->add_setting('advance_ecommerce_store_date_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_ecommerce_store_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Date','advance-ecommerce-store'),
       'section' => 'advance_ecommerce_store_blog_post'
    ));

    $wp_customize->add_setting('advance_ecommerce_store_comment_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_ecommerce_store_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Comments','advance-ecommerce-store'),
       'section' => 'advance_ecommerce_store_blog_post'
    ));

    $wp_customize->add_setting('advance_ecommerce_store_author_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_ecommerce_store_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Author','advance-ecommerce-store'),
       'section' => 'advance_ecommerce_store_blog_post'
    ));

    $wp_customize->add_setting('advance_ecommerce_store_tags_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('advance_ecommerce_store_tags_hide',array(
       'type' => 'checkbox',
       'label' => __('Single Post Tags','advance-ecommerce-store'),
       'section' => 'advance_ecommerce_store_blog_post'
    ));

    $wp_customize->add_setting( 'advance_ecommerce_store_excerpt_number', array(
		'default'              => 20,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'advance_ecommerce_store_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','advance-ecommerce-store' ),
		'section'     => 'advance_ecommerce_store_blog_post',
		'type'        => 'textfield',
		'settings'    => 'advance_ecommerce_store_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('advance_ecommerce_store_button_text',array(
		'default'=> 'Read More',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('advance_ecommerce_store_button_text',array(
		'label'	=> __('Add Button Text','advance-ecommerce-store'),
		'section'=> 'advance_ecommerce_store_blog_post',
		'type'=> 'text'
	));

	//footer
	$wp_customize->add_section('advance_ecommerce_store_footer_section', array(
		'title'       => __('Footer Text', 'advance-ecommerce-store'),
		'priority'    => null,
		'panel'       => 'advance_ecommerce_store_panel_id',
	));

	$wp_customize->add_setting('advance_ecommerce_store_footer_widget_areas',array(
        'default'           => '4',
        'sanitize_callback' => 'advance_ecommerce_store_sanitize_choices',
    ));
    $wp_customize->add_control('advance_ecommerce_store_footer_widget_areas',array(
        'type'        => 'select',
        'label'       => __('Footer widget area', 'advance-ecommerce-store'),
        'section'     => 'advance_ecommerce_store_footer_section',
        'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'advance-ecommerce-store'),
        'choices' => array(
            '1'     => __('One', 'advance-ecommerce-store'),
            '2'     => __('Two', 'advance-ecommerce-store'),
            '3'     => __('Three', 'advance-ecommerce-store'),
            '4'     => __('Four', 'advance-ecommerce-store')
        ),
    ));

	$wp_customize->add_setting('advance_ecommerce_store_footer_copy', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_ecommerce_store_footer_copy', array(
		'label'   => __('Copyright Text', 'advance-ecommerce-store'),
		'section' => 'advance_ecommerce_store_footer_section',
		'type'    => 'text',
	));
}
add_action('customize_register', 'advance_ecommerce_store_customize_register');

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Advance_Ecommerce_Store_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if (is_null($instance)) {
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
		add_action('customize_register', array($this, 'sections'));

		// Register scripts and styles for the controls.
		add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_control_scripts'), 0);
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections($manager) {

		// Load custom sections.
		load_template(trailingslashit(get_template_directory()).'/inc/section-pro.php');

		// Register custom section types.
		$manager->register_section_type('Advance_Ecommerce_Store_Customize_Section_Pro');

		// Register sections.
		$manager->add_section(
			new Advance_Ecommerce_Store_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__('Ecommerce Pro', 'advance-ecommerce-store'),
					'pro_text' => esc_html__('Go Pro', 'advance-ecommerce-store'),
					'pro_url'  => esc_url('https://www.themeshopy.com/themes/wordpress-ecommerce-theme/'),
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

		wp_enqueue_script('advance-ecommerce-store-customize-controls', trailingslashit(get_template_directory_uri()).'/js/customize-controls.js', array('customize-controls'));

		wp_enqueue_style('advance-ecommerce-store-customize-controls', trailingslashit(get_template_directory_uri()).'/css/customize-controls.css');
	}
}

// Doing this customizer thang!
Advance_Ecommerce_Store_Customize::get_instance();