<?php
/**
 *  Template Name: Producteurs et produits
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
            <select id="selectMatieres" class="filtre">
              <option value="allItems">Matières</option>            
              <?php 
                $tax = get_taxonomies();
                $terms = get_terms( 'matieres' );
                foreach ($terms as $term) {
                  echo '<option value="'.$term->slug.'">'.$term->name.'</option>';
                }
              ?>
            </select>
          </div>

          <div class="select--custom">
            <select id="selectProduits" class="filtre">
              <option value="allItems">Produits</option>              
              <?php 
                $tax = get_taxonomies();
                $terms = get_terms( 'produit' );
                //print_r($terms);
                foreach ($terms as $term) {
                  echo '<option value="'.$term->slug.'">'.$term->name.'</option>';
                }
              ?>
            </select>
          </div>

          <div class="producteurs_produits">
            <div class="counter"></div>
            <ul>
            <?php 
              query_posts(
                array(
                  'post_type' => 'adherents',
                  'showposts' => -1,
                  'orderby' => 'title',
                  'order' => 'ASC'
                )
              );
             
               while ( have_posts() ) : the_post();
            ?>

           <?php 
            $matieres = wp_get_post_terms($post->ID, 'matieres', '' );
            $produits = wp_get_post_terms($post->ID, 'produit', '' );
            $classNames = '';
            foreach ( $matieres as $matiere ) {
                $classNames .= 'matiere_'.$matiere->slug.' ';
            }
            foreach ( $produits as $produit ) {
                $classNames .= 'produit_'.$produit->slug.' ';
            }
          ?>
         
            <li class="items show <?php echo $classNames; ?>">
              <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
            </li>
          <?php endwhile; wp_reset_query(); ?>
          </ul>
          </div>  
           
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $('select.filtre').change(function(){
      var matieres = $('select#selectMatieres').val();
      var produits = $('select#selectProduits').val();
      filterItems(matieres, produits);
    });
    function filterItems(arg1, arg2){
      var items = $('.items');
      var count = 0;
      items.each(function(index){
        if(arg1 == 'allItems' && arg2 == 'allItems'){
          $(this).addClass('show');
          $(this).css('display','inline-block')
          count++;
        }
        else if(arg1 == 'allItems'){
          if($(this).hasClass('produit_'+arg2)){
            $(this).addClass('show');
            $(this).css('display','inline-block')
            count++;
          }else{
            $(this).removeClass('show');
            $(this).hide();
          }
        }else if(arg2 == 'allItems'){
          console.log(arg2);
          if($(this).hasClass('matiere_'+arg1)){
            $(this).addClass('show');
            $(this).css('display','inline-block')
            count++;
          }else{
            $(this).removeClass('show');
            $(this).hide();
          }
        }else{
          if($(this).hasClass('matiere_'+arg1) && $(this).hasClass('produit_'+arg2)){
            $(this).addClass('show');
            $(this).css('display','inline-block')
            count++;
          }else{
            $(this).removeClass('show');
            $(this).hide();
          }
        }
      });
      if(count == 0){
        $('.producteurs_produits .counter').html('<p>Pas de résultat</p>');
      }else{
        $('.producteurs_produits .counter').html('<p><strong>'+count+'</strong> résultat</p>');
      }
    }
  </script>
  <?php get_footer();?>