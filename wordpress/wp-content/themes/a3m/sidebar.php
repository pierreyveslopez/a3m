<?php
/**
 *   Sidebar
 */
  $page_parent = $post->post_parent;
  if($page_parent != 0){

    $firstParent = $page_parent;

    query_posts('page_id='.$page_parent);
    while ( have_posts() ) : the_post();
      /* Check if the page has grand parent */
      $page_grandParent = $post->post_parent;
      if($page_grandParent != 0){
        $firstParent = $page_grandParent;
      }
    endwhile; wp_reset_query(); 
  }else{
    $firstParent = $post->ID;
  }
  if($post->post_type == 'adherents'){
    $firstParent = 5;
  }
  if($post->post_type == 'cours-des-metaux'){
    $firstParent = 14;
  }  
?>
		<div class="sidebar">

			<div class="submenu">
        <?php sidebar_menu($firstParent); ?> 
			</div>
			<div class="hp-actu">
				<h2 class="angle">Actu <br/>& Évenements</h2>
        <?php 
          query_posts( 'posts_per_page=3' );
          while ( have_posts() ) : the_post();          
        ?>
        <article>
          <h3><span class="date"><?php the_date('d/m/Y'); ?></span> <?php the_title(); ?></h3>
          <?php the_excerpt(); ?>
        <article>
        <?php endwhile; wp_reset_query();?>
			</div>
      <div class="donneesEco">
        <h2 class="angle">Données économiques</h2>
        <h3>Cours des métaux</h3>
        <p><a href="<?php echo get_permalink(103);?>"><img src="<?php bloginfo(template_url); ?>/img/content/cours-des-metaux.jpg" /></a></p>
        <div class="hp2col">
          <div class="col">
            <h3>Chiffres clés</h3>
            <p><a href="<?php echo get_permalink(98);?>"><img src="<?php bloginfo(template_url); ?>/img/content/hp-chiffres-cles.jpg" /></a></p>
          </div>
          <div class="col">
            <h3>Conjoncture</h3>
            <p><a href="<?php echo get_permalink(101);?>"><img src="<?php bloginfo(template_url); ?>/img/content/hp-conjoncture.jpg" /></a></p>
          </div>
        </div>
        <span class="btn blue fullwidth annuaireAdherents"><a href="<?php echo get_permalink(36);?>">Annuaire<br/>des adhérents</a></span> 
      </div>
		</div>