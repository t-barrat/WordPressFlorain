<?php get_header(); ?>
<main class="wrap">
    <section class="content-area content-thin">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article class="article-loop">

            <?php the_content(); ?>
        </article>
        <?php endwhile; else : ?>
        <article>
            <p>Sorry, no posts were found!</p>
        </article>
        <?php endif; ?>
    </section>
    <?php get_sidebar(); ?>
</main>
</div>
<?php get_footer(); ?>
