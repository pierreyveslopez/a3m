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
          <?php $postName = $post->post_title;?>
          <?php $subtitle = get_field('sous_titre');
            if($subtitle != ''){
          ?>
            <h2 class="titlePAge twoline">
              <?php the_title(); ?>
              <?php
                echo '<br/><span class="subtitle">'.$subtitle.'</span>';
              ?>
            </h2>
            <?php }else{?>
              <h2 class="titlePAge"><?php the_title(); ?></h2>
            <?php } ?>
            <?php the_content(); ?>
          <?php endwhile; endif; wp_reset_query(); ?>
          <?php
            query_posts(
              array(
                'post_type' => 'post',
                'showposts' => 20,
                'tax_query' => array(
                  array(
                    'taxonomy' => 'post_tag',
                    'terms' => $postName,
                    'field' => 'name'
                  )
                ),
                
                'orderby' => 'date',
                'order' => 'DSC'
              )
            );
            if ( have_posts() ) : 
          ?>
          <div class="articlesRelatifs">
            <h3>Liste des articles relatifs :</h3>
              <ul>
                <?php while ( have_posts() ) : the_post(); ?>
                <li><span class="date"><?php echo get_the_date('d/m/Y'); ?>&nbsp;: </span> <span class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title();?> - A3M"><?php the_title();?></a></span></li>
                <?php endwhile; wp_reset_query();?>
              </ul>            
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <?php get_footer();?>