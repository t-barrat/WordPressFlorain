<?php if ( have_posts() && strlen( trim( get_search_query() ) ) != 0 ) : ?>
<?php

$search_count = $wp_query->found_posts;

if ($search_count > 1 ) {
	echo '<p class="clearfix search-result-count">' . $search_count . ' résultats</p>';
}
else {
	echo '<p class="clearfix search-result-count">' . $search_count . ' résultat</p>';
}

while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'template-parts/search-content', get_post_type() ); ?>
<?php
endwhile; ?>
</div>
<?php
the_posts_pagination( array(
	'mid_size' => 1,
	'prev_text' => '<i class="fa fa-chevron-left"></i>'  . '<span class="screen-reader-text">' . __( ' Précédent') . '</span>',
	'next_text' => '<span class="screen-reader-text">' . __( 'Suivant ') . '</span>' . '<i class="fa fa-chevron-right"></i>' ,
	'before_page_number' => '<span class="meta-nav screen-reader-text"></span>'
) );
else : ?>
<div class="inner404">
<p class="clearfix search-result-count">Aucun résultat</p>


</div>
<?php endif; ?>
