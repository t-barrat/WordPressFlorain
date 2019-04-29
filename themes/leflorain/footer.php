<footer>
  <div class="follow">
        <div class=" contact">
      <a href="<?php echo get_permalink( tmpl_customizer_options( 'contact_page' ) ); ?>" ><span>Contactez-nous</span></a>
    </div>
    <div class=" text-white social-networks">
      <span>Suivez-nous</span>
      <ul >
        <?php if(tmpl_customizer_options('facebook_display_url')): ?>
        <li><a href="<?php echo tmpl_customizer_options('facebook_url'); ?>" target="_blank" class="text-facebook"><i class="fa fa-facebook"></i></a>
        </li>
        <?php endif; ?>
        <?php if(tmpl_customizer_options('twitter_display_url')): ?>
        <li><a href="<?php echo tmpl_customizer_options('twitter_url'); ?>" target="_blank" class="text-twitter"><i class="fa fa-twitter"></i></a>
        </li>
        <?php endif; ?>

      </ul>
    </div>
  </div>
  <div class="copyright text-white">

			© Le FLorain - <script>document.write(new Date().getFullYear());</script>   |   <a href="<?php echo get_permalink( tmpl_customizer_options( 'mentions_legales' ) ); ?>" target='_blank'>Mentions légales</a>   |   All Rights Reserved   |   Design <a href='http://www.thibault-barrat.com' target='_blank' >Thibault Barrat</a>

  </div>
    </footer>
    <?php wp_footer(); ?>
  </div>
  </body>
</html>
