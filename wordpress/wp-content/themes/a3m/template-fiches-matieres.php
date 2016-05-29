<?php
/**
 *  Template Name: Fiches matières
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

          <div class="select--custom">
            <select id="selectMatieres" class="filtre" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
              <option>Minerais</option>            
              <?php 
              query_posts(
                array(
                  'post_type' => 'fiches matières',
                  'showposts' => -1,
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'type-matiere',
                      'terms' => 'minerais',
                      'field' => 'name'
                    )
                  ),
                  'orderby' => 'title',
                  'order' => 'ASC'
                )
              ); 
              while ( have_posts() ) : the_post();
              ?>
                <option value="<?php the_permalink();?>"><?php the_title(); ?></option>
              <?php 
                endwhile; wp_reset_query(); 
              ?>
            </select>
          </div>

          <div class="select--custom">
            <select id="selectProduits" class="filtre" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
              <option value="#">Mineraux</option>              
              <?php 
              query_posts(
                array(
                  'post_type' => 'fiches matières',
                  'showposts' => -1,
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'type-matiere',
                      'terms' => 'mineraux',
                      'field' => 'name'
                    )
                  ),
                  'orderby' => 'title',
                  'order' => 'ASC'
                )
              ); 
              while ( have_posts() ) : the_post();
              ?>
                <option value="<?php the_permalink();?>"><?php the_title(); ?></option>
              <?php 
                endwhile; wp_reset_query(); 
              ?>
            </select>
          </div>

          <div class="select--custom">
            <select id="selectProduits" class="filtre" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
              <option value="#">Métaux</option>              
              <?php 
              query_posts(
                array(
                  'post_type' => 'fiches matières',
                  'showposts' => -1,
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'type-matiere',
                      'terms' => 'metaux',
                      'field' => 'name'
                    )
                  ),
                  'orderby' => 'title',
                  'order' => 'ASC'
                )
              ); 
              while ( have_posts() ) : the_post();
              ?>
                <option value="<?php the_permalink();?>"><?php the_title(); ?></option>
              <?php 
                endwhile; wp_reset_query(); 
              ?>
            </select>
          </div>  
        </div>
      </div>
    </div>
  </div>
  <?php get_footer();?>