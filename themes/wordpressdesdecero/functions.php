<?php 
//registrar un nuevo menú
function agregar_menu(){
register_nav_menu('principal', __('principal'));
}
//enganchamos el menú a wordpress
add_action('init','agregar_menu');
//funcion mostrar menú
function mostrar_menu(){
wp_nav_menu(['principal'=>'principal']);
}
?>