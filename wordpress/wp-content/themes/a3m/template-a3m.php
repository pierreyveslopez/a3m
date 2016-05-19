<?php
/**
 *  Template Name: A3M - Content
 */
 
    get_header();?>
    <div id="mainContent">
    <?php custom_breadcrumbs($post); ?>
    <?php get_sidebar(); ?>
      <div class="pageContent">
        <div class="pure-u-1 pure-u-md-1-1 l-box hp-actu">
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h2 class="titlePAge"><?php the_title(); ?></h2>
            <?php the_content(); ?>
          <?php endwhile; endif; ?>
        </div>
      </div>
    </div>
  </div>
  <?php get_footer();?>