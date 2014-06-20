<section id="mission-msg" class="mission">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">

        <!-- <p class="lead">Dear Coop Member,</p> -->
        <p class="lead">The Coop is redesigning, and you are a part of it.</p>

        <p class="lead hidden">Welcome to <a href="http://new.foodcoop.com" title="new.foodcoop.com">new.foodcoop.com</a></p>


        <!-- <p>Welcome to <a href="http://new.foodcoop.com" title="new.foodcoop.com">new.foodcoop.com</a>.</p> -->

        <p class="hidden">We are designing a new digital experience at The Park Slope Food Coop, and we want to invite you to participate in the process.</p>


        <?php
          $args = array(
            'theme_location'  => 'mission-msg',
            'menu'            => '',
            'container'       => '',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => 'mission-nav',
            'menu_id'         => '',
            'echo'            => true,
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>'
          );
          // wp_nav_menu( $args );
        ?>
      </div>
    </div>
  </div>
</section>