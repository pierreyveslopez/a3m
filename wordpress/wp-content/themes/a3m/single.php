<?php
/**
 *  Template Name: Pages enjeux
 */
 
    get_header();?>
    <div id="mainContent">
    <?php custom_breadcrumbs($post); ?>
    <?php get_sidebar(); ?>
      <div class="pageContent">
        <div class="pure-u-1 pure-u-md-1-1 l-box hp-actu">
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h2 class="titlePAge"><?php the_title(); ?></h2>
            <p><?php the_content(); ?></p>
          <?php endwhile; endif; wp_reset_query(); ?>
        </div>
      </div>
    </div>
  </div>
  <?php get_footer();?>