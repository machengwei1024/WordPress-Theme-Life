    <li class="blog-nav-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="transition">首页</a></li>
<?php
    wp_nav_menu(array( 'container' => 'false', 'items_wrap' => '%3$s', 'depth' => 1));
?>

<script type="text/javascript">
      $(".blog-navbar-links>li").attr("class", "blog-nav-item");
      $(".blog-navbar-links>li>a").attr("class", "transition");
</script>
