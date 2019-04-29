<div class="singleResult">
  <a class="link-nostyle" href="<?php the_permalink(); ?>">

    <?php
    if(catch_that_image()!=null){
      echo '<div class="img-col">';
      echo '<img class="img-responsive" src="';
  echo catch_that_image();
  echo '" alt="" />';
  echo '</div>';
    }


    ?>

    <div class="content-col">
      <?php the_title('<h3>','</h3>')?>
      <?php	the_excerpt();?>
      <?php

      ?>
      <span class="postDate"><?php the_time('d/m/Y'); ?></span>
    </div>
  </a>
</div>
