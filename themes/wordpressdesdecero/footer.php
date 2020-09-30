<div class="container bg-dark text-light">
  <div class="row">

    <div class="col-sm">
      <?php dynamic_sidebar( 'widget-footer-1');?>
    </div>

    <div class="col-sm">
      <?php dynamic_sidebar( 'widget-footer-2');?>
    </div>

    <div class="col-sm">
     <?php dynamic_sidebar( 'widget-footer-3');?>
    </div>

  </div>
</div>

<?php dynamic_sidebar( 'widget-footer-1');?>
<footer class="container">
  <p>&copy; Company 2017-2020</p>
  <p class="d.inline"><?php mostrar_menu_footer() ?></p>

</footer>
<?php wp_footer(); ?>
</body>
</html>
