    <?php get_header();?>

    <div id="mainContent">

      <div class="pure-g">

        <div id="homeSlideshow" class="pure-u-1">
          <?php query_posts('post_type=slideshow&orderby=title&order=ASC'); ?>
          <?php
             while ( have_posts() ) : the_post();
             $imgURL = get_field('image');
          ?>
            <div class="pure-u-1"><img src="<?php echo $imgURL; ?>" class="pure-img"></div>
          <?php
            endwhile; wp_reset_query();
          ?>
        </div>

      </div>

      <div class="pure-g">

        <div class="pure-u-1 pure-u-md-1-3 l-box">
          <article>
            <h2 class="angle">A3M</h2>
            <h3>A3M est l'alliance des minerais, minéraux et métaux</h3>
            <p class="bolder">
              L'alliance des Minerais, Minéraux et Métaux (A3M) résulte d'une alliance entre la <a href="#" class="txt-coloured">FEDEM</a> (Fédération des minerais, minéraux industriels et métaux non ferreux) et la <a href="#" class="txt-coloured">FFA</a> (Fédération Francaise de l'Acier) qui ont décidé d'unir leurs forces pour assurer une meilleure visibilité et représentativité de leurs professions.
            </p>
            <a href="#" class="default">Lire la suite --></a>
          </article>
          <hr>
          <article>
            <h2 class="angle">Nos matieres</h2>
            <h3 class="blue">A3M est l'alliance des minerais, minéraux et métaux</h3>
            <p>
              <a class="ctaCircle yellow" href="#" class="txt-coloured">Minerais</a>
              <a class="ctaCircle orange" href="#" class="txt-coloured">Mineraux</a>
              <a class="ctaCircle red" href="#" class="txt-coloured">Métaux</a>
            </p>
          </article>
        </div>

        <div class="pure-u-1 pure-u-md-1-3 l-box hp-actu">
          <h2 class="angle">Actu <br/>& Évenements</h2>
          <?php 
            query_posts( 'posts_per_page=3' );
            while ( have_posts() ) : the_post();          
          ?>
          <article>
            <h3><span class="date"><?php the_date('d/m/Y'); ?></span> <?php the_title(); ?></h3>
            <?php the_excerpt(); ?>
          </article>
          <?php endwhile; wp_reset_query();?>
        </div>

        <div class="pure-u-1 pure-u-md-1-3 l-box">
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

    </div>

  </div>
  <?php get_footer();?>