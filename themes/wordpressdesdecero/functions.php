<?php 
//registrar un nuevo menú
function agregar_menu(){
register_nav_menu('principal', __('principal'));
}
//enganchamos el menú a wordpress
add_action('init','agregar_menu');
//funcion mostrar menú
function mostrar_menu(){
wp_nav_menu([
    'principal'=>'principal',
    'li'=>'nav.item',
    'a'=>'nav.link'
    ]);
}
//funcion para controlar el excerpt
function custom_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'custom_excerpt_length');
//añadimos soporte de thumbnails
add_theme_support('post-thumbnails');

//shortcode
function firma_guay(){
    return 'Soy Alex';
}
add_shortcode('firma','firma_guay');
?>