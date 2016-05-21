<?php
/**
 *  Template Name: Liste adhérents
 */
 
    get_header();?>
    <div id="mainContent">
    <?php custom_breadcrumbs($post); ?>
    <?php get_sidebar();?>
    <?php 
        query_posts(
          array(
            'post_type' => 'adherents',
            'showposts' => -1,
            'tax_query' => array(
              array(
                'taxonomy' => 'type',
                'terms' => 'entreprises',
                'field' => 'name'
              )
            ),
            'orderby' => 'title',
            'order' => 'ASC'
          )
        );
        $countAdherents = 0; 
        while ( have_posts() ) : the_post();
          $countAdherents++;
        endwhile; wp_reset_query();
          $endCol1 = $countAdherents/2;
          $startCol2 = $countAdherents/2;

          if(!is_int($endCol1)){
            $endCol1 = ceil($endCol1);
            $startCol2 = floor($startCol2);
          }
        query_posts(
          array(
            'post_type' => 'adherents',
            'showposts' => -1,
            'tax_query' => array(
              array(
                'taxonomy' => 'type',
                'terms' => 'organismes',
                'field' => 'name'
              )
            ),
            'orderby' => 'title',
            'order' => 'ASC'
          )
        );
        $countOrganismes = 0; 
        while ( have_posts() ) : the_post();
          $countOrganismes++;
        endwhile; wp_reset_query();
          $endColOrganismes1 = $countOrganismes/2;
          $startColOrganismes2 = $countOrganismes/2;

          if(!is_int($endCol1)){
            $endCol1Organismes = ceil($endColOrganismes1);
            $startColOrganismes2 = floor($startColOrganismes2);
          }  
      ?>
      <div class="pageContent">
        <div class="pure-u-1 pure-u-md-1-1 l-box hp-actu">
            <h2 class="titlePAge"><?php the_title(); ?></h2>
            <h3 style="margin:0; float:left; width:100%;font-size:2.2rem;color:#6f6f6f;">Entreprises</h3>
            <div class="hp2col listeAdherents">
            <div class="col">
              <ul>
                <?php
                  query_posts(
                    array(
                      'post_type' => 'adherents',
                      'tax_query' => array(
                        array(
                          'taxonomy' => 'type',
                          'terms' => 'entreprises',
                          'field' => 'name'
                        )
                      ),
                      'orderby' => 'title',
                      'order' => 'ASC',
                      'posts_per_page' => $endCol1
                    )
                  ); 
                  while ( have_posts() ) : the_post();
                ?>
                  <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endwhile; wp_reset_query(); ?>
              </ul>
            </div>
            <div class="col">
              <ul>
                <?php
                  query_posts(
                    array(
                      'post_type' => 'adherents',
                      'tax_query' => array(
                        array(
                          'taxonomy' => 'type',
                          'terms' => 'entreprises',
                          'field' => 'name'
                        )
                      ),
                      'orderby' => 'title',
                      'order' => 'ASC',
                      'offset' => $endCol1
                    )
                  ); 
                  while ( have_posts() ) : the_post();
                ?>
                  <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endwhile; wp_reset_query(); ?>
              </ul>
            </div>
          </div>
          <h3 style="margin:10px 0px; float:left; width:100%;font-size:2.2rem;color:#6f6f6f;">Organismes professionnels</h3>
          <div class="hp2col listeAdherents organismes">
            <div class="col">
              <ul>
                <?php
                  query_posts(
                    array(
                      'post_type' => 'adherents',
                      'tax_query' => array(
                        array(
                          'taxonomy' => 'type',
                          'terms' => 'organismes',
                          'field' => 'name'
                        )
                      ),
                      'orderby' => 'title',
                      'order' => 'ASC',
                      'posts_per_page' => $endColOrganismes1
                    )
                  );  
                  while ( have_posts() ) : the_post();
                ?>
                  <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endwhile; wp_reset_query(); ?>
              </ul>
            </div>
            <div class="col">
              <ul>
                <?php
                  query_posts(
                    array(
                      'post_type' => 'adherents',
                      'tax_query' => array(
                        array(
                          'taxonomy' => 'type',
                          'terms' => 'organismes',
                          'field' => 'name'
                        )
                      ),
                      'orderby' => 'title',
                      'order' => 'ASC',
                      'offset' => $endColOrganismes1
                    )
                  ); 
                  if($countOrganismes>1){
                  while ( have_posts() ) : the_post();
                ?>
                  <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endwhile; wp_reset_query(); } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php get_footer();?>