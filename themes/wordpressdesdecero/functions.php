<?php 
//registrar un nuevo menú
function agregar_menus(){
register_nav_menus([
    'principal'=>__('principal'),
    'footer'=>__('footer')

    ]);
}
//enganchamos el menú al wordpress
add_action('init','agregar_menus');
//funcion mostrar menú principal
function mostrar_menu_principal(){
wp_nav_menu([
    'theme_location'  =>'principal',
    'container'       => 'div',
    'container_id'    => 'principal',
    'container_class' => 'collapsenavbar-collapse justify-content-end',
    'menu_class'      => 'navbar-nav',
    'depth'           => 2,
    'fallback_cb'     =>'wp_bootstrap_navwalker::fallback',
    'walker'          => new wp_bootstrap_navwalker()
    ]);
}

//funcion mostrar menú footer
function mostrar_menu_footer(){
wp_nav_menu([
    'theme_location'  =>'footer',
    'container'       => 'div',
    'container_id'    => 'menu_footer',
    'container_class' => 'nav',
    'menu_class'      => 'navbar',
    'depth'           => 2,
    'fallback_cb'     =>'wp_bootstrap_navwalker::fallback',
    'walker'          => new wp_bootstrap_navwalker()
    ]);
}
//funcion para controlar el excerpt
function custom_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'custom_excerpt_length');
//añadimos soporte de thumbnails
add_theme_support('post-thumbnails');
//añadimos soporte para custom header
function imagen_custom_header() {
    $args = array(
        'default-image'  	=> get_template_directory_uri().'/img/default-image.jpg',
        'default-text-color'=> '000',
        'width'          	=> 1000,
        'height'         	=> 250,
        'flex-width'     	=> true,
        'flex-height'    	=> true,
    );
    add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'imagen_custom_header' );
//añadimos soporte a logotipo personalizado

function logo_custom() {
    $defaults = array(
    'height'      => 50,
    'width'       => 50,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title',   'site-description' ),
    'unlink-homepage-logo' => true, 
    );
    add_theme_support( 'custom-logo', $defaults );
   }
   add_action( 'after_setup_theme', 'logo_custom' );

//shortcode
function firma_guay(){
    return 'Soy Alex';
}

//agregamos zonas de widgets
function agregar_widgets(){
    register_sidebar([
        'name'          => 'widget footer-1',
        'id'            => 'wf1',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ]);

    register_sidebar([
        'name'          => 'widget footer-2',
        'id'            => 'wf2',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ]);

    register_sidebar([
        'name'          => 'widget footer-3',
        'id'            => 'wf3',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ]);

    register_sidebar([
        'name'          => 'lateral derecho',
        'id'            => 'ld',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ]);
}
add_action('widgets_init', 'agregar_widgets');

add_shortcode('firma','firma_guay');
//incluimos la clase walker para los menus de bootstrap
require_once (get_template_directory()."/inc/wp_bootstrap_navwalker.php");

//---------------ESTILOS---------------

wp_register_style('bootstrap',get_theme_file_uri().'/inc/bootstrap.min.css');
wp_register_style('dw_style',get_theme_file_uri(),['bootstrap']);
//encolamos
function encolar_estilos(){
wp_enqueue_style('dw_style', get_stylesheet_uri());}
//gancho
add_action('wp_enqueue_scripts','encolar_estilos');

//---------------JAVASCRIPT---------------

wp_register_script('jquery', get_theme_file_uri().'/inc/jquery.min.js','', '3.5.1', true);
wp_register_script('bootstrapjs', get_theme_file_uri().'/inc/bootstrap.min.js', ['jquery'], '4.5.2', true);
wp_register_script('dw_script', get_theme_file_uri().'/script.js', ['bootstrapjs','jquery'], '', true);
//encolamos
function encolar_scripts(){
wp_enqueue_script('dw_script');}
//gancho
add_action('wp_enqueue_scripts','encolar_scripts');