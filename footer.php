  <section id="footer">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <?php $curYear = date('Y'); ?>
          <p>The Park Slope Food Coop is a member-owned cooperative in Brooklyn, New York.</p>
          <p class="datespan">1973 — <?php echo $curYear; ?></p>

        	<!-- <p><a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a> <span class="copyright">&#169;</span> copyright <?php echo $curYear; ?></p> -->
        </div>
      </div>
      <div class="row">
        <?php
            $args = array(
              'theme_location'  => 'footer-menu',
              'menu'            => '',
              'container'       => 'div',
              'container_class' => 'col-xs-12',
              'container_id'    => '',
              'menu_class'      => '',
              'menu_id'         => '',
              'echo'            => true,
              'before'          => '',
              'after'           => '',
              'link_before'     => '',
              'link_after'      => '',
              'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>'
            );
            wp_nav_menu( $args );
          ?>
      </div>
    </div>
  </section>

<?php wp_footer(); ?>


<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(["trackPageView"]);
  _paq.push(["enableLinkTracking"]);

  (function() {
    var u=(("https:" == document.location.protocol) ? "https" : "http") + "://stats.foodcoop.com/";
    _paq.push(["setTrackerUrl", u+"piwik.php"]);
    _paq.push(["setSiteId", "5"]);
    var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0]; g.type="text/javascript";
    g.defer=true; g.async=true; g.src=u+"piwik.js"; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Piwik Code -->

</body>
</html>
