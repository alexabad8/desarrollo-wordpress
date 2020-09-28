<?php 
get_header('sinjumbotron');
if(have_posts()){
    while(have_posts()){
        the_post();
?>
        <!--escribimos lo que va en el bucle-->
<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
<p><span><?php the_date() ?></span> <span><?php the_author() ?></span></p>
<p><?php the_excerpt() ?></p>
<p><?php the_category() ?></p>
<hr>
        <!--entre estos dos comentarios que nos sirven de guía-->
<?php 
    }
}else{
    echo 'No hay resultados para tu búsqueda';
}


get_footer();


?>