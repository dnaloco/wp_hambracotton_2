<?php
require (dirname(__FILE__) . '/vendor_php/simplehtmldom.php');

if (file_exists('../r2-bootstrap.php')) {
	require_once '../r2-bootstrap.php';
} else {
	require_once 'r2-bootstrap.php';
}

function arthur_theme_setup() {
	add_theme_support( 'automatic-feed-links' );
	
	// Register Primary Navigation Menu
	register_nav_menus(
		array(
			'primary_nav' => 'Primary Menu', // You can add more menus here
		)
	);
}

add_action('after_setup_theme', 'arthur_theme_setup');

function arthur_widgets_init() {
	$class_bw_01 = 'box_widget';
	$class_bg_tl_a = 'bg_title_a';
	$class_tl_a = 'title_a';

	register_sidebar(
		array(
			'name' => 'Sidebar Left Top',
			'description' => 'Display...',
			'before_widget' => '<aside id="%1$s" class="%2$s ' . $class_bw_01 . '">',
			'after_widget' => '<div class="clearfix"></div></aside><!-- widget -->',
			'before_title' => '<div class="' . $class_bg_tl_a . '"><h5 class="' . $class_tl_a . '">',
			'after_title' => '</h5></div>',
			'meu_arg' => 'Arthur Costa'
		)
	);

	register_sidebar(
			array(
				'name' => 'Sidebar Middle Top',
				'description' => 'Display...',
				'before_widget' => '<aside id="%1$s" class="%2$s ' . $class_bw_01 . '">',
				'after_widget' => '<div class="clearfix"></div></aside><!-- widget -->',
				'before_title' => '<div class="' . $class_bg_tl_a . '"><h5 class="' . $class_tl_a . '">',
				'after_title' => '</h5></div>'
			)
		);

	register_sidebar(
		array(
			'name' => 'Sidebar Right Top',
			'description' => 'Display...',
			'before_widget' => '<li><aside id="%1$s" class="%2$s ' . $class_bw_01 . '">',
			'after_widget' => '<div class="clearfix"></div></aside></li><!-- widget -->',
			'before_title' => '<div class="' . $class_bg_tl_a . '"><h5 class="' . $class_tl_a . '">',
			'after_title' => '</h5></div>'
		)
	);
}

add_action('widgets_init', 'arthur_widgets_init');

function arthur_register_styles() {
	wp_register_style( 'arthur', get_stylesheet_uri(), false, null );
	wp_register_style( 'arthur_app', get_template_directory_uri() . '/stylesheets/app.css', false, null);

	wp_register_style( 'smartmenu_core', get_template_directory_uri() . '/stylesheets/sm-core-css.css', false, null);
	wp_register_style( 'smartmenu_simple', get_template_directory_uri() . '/stylesheets/sm-simple/sm-simple.css', false, null);
}

add_action('init', 'arthur_register_styles');

function arthur_enqueue_styles() {
	wp_enqueue_style('arthur');
	wp_enqueue_style('arthur_app');
	wp_enqueue_style('smartmenu_core');	
	wp_enqueue_style('smartmenu_simple');	
}

add_action('wp_enqueue_scripts', 'arthur_enqueue_styles');

function arthur_register_scripts() {
	// wp_register_script( $handle, $src, $deps, $ver, $in_footer )
	wp_register_script('underscore', '/bower_components/underscore/underscore.js');

	wp_register_script('jquery', '/bower_components/jquery/dist/jquery.js');

	wp_register_script('smart_menu_js', get_template_directory_uri() . '/vendor/jquery.smartmenus.js', array('jquery'));
	wp_register_script('plugins_jquery_init', get_template_directory_uri() . '/app/jquery.plugins.init.js', array('smart_menu_js'));

	wp_register_script('angularjs', '/bower_components/angular/angular.js', array('jquery', 'underscore'));
	wp_register_script('angularjs-route', '/bower_components/angular-route/angular-route.js', array('angularjs'));
	wp_register_script('angularjs-animate', '/bower_components/angular-animate/angular-animate.js', array('angularjs'));
	
	wp_register_script('HCApp', '/wp-content/themes/angulartheme/app/HCApp.js', array('jquery', 'angularjs'));	
	wp_register_script('HCAppControllers', get_template_directory_uri() . '/app/HCAppControllers.js', array('HCApp'));
}

add_action( 'init', 'arthur_register_scripts' );

function arthur_enqueue_scripts() {
	wp_enqueue_script('underscore');

	wp_enqueue_script('jquery');
	
	wp_enqueue_script('smart_menu_js');
	wp_enqueue_script('plugins_jquery_init');
	
	wp_enqueue_script('angularjs');
	wp_enqueue_script('angularjs-route');
	wp_enqueue_script('angularjs-animate');

	wp_enqueue_script('HCApp');
	wp_enqueue_script('HCAppControllers');
}

add_action( 'wp_enqueue_scripts', 'arthur_enqueue_scripts' );

function wp_register_widgets () {
	register_widget( 'Blog\Widgets\CepeaResumoNoticias' );
	register_widget( 'Blog\Widgets\CotacoesAlgodao' );
	register_widget( 'Blog\Widgets\IndicadoresEconomicos' );
	register_widget( 'Blog\Widgets\VariacaoUsa' );
}

add_action( 'widgets_init', 'wp_register_widgets');

