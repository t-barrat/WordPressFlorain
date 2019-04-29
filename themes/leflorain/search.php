<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Florain
 */

get_header(); ?>

	<div class="wrap">
		<div class="content-area">

		

		<div class="search-area">
				<h2>Recherche</h2>
				<p class="search-user">Votre recherche : <?php echo esc_attr( get_search_query() ); ?></p>

				<?php get_template_part('template-parts/search'); ?>




			</div>
				<?php get_template_part('sidebar'); ?>
			</div>
			</div>




<?php get_footer();
