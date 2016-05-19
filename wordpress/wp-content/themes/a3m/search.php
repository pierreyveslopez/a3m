<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Shape
 * @since Shape 1.0
 */
 
get_header(); ?>
	 <div id="mainContent" class="searchPage">
        <div class="pure-u-1 pure-u-md-1-1 l-box hp-actu">
      
            <?php if ( have_posts() ) : ?>
                <h2 class="page-title"><?php printf( __( 'Résultat de recherche pour: %s', 'shape' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
 

 
                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
 
                    <?php get_template_part( 'content', 'search' ); ?>
 
                <?php endwhile; ?>
 

 
            <?php else : ?>
 
                <?php get_template_part( 'no-results', 'search' ); ?>
 
            <?php endif; ?>
	</div>
 </div>

<?php get_footer(); ?>