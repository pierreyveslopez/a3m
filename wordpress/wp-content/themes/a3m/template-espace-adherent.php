<?php
/**
 *  Template Name: Espace adhérents
 */
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>A3M</title>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php bloginfo(template_url); ?>/css/main.css">
  <link rel="stylesheet" href="<?php bloginfo(template_url); ?>/css/style.min.css">
  <!-- endinject -->
    <!-- inject:js -->
  <script src="<?php bloginfo(template_url); ?>/js/main.js"></script>
  <script src="<?php bloginfo(template_url); ?>/js/modernizr.js"></script>
  <script src="<?php bloginfo(template_url); ?>/js/script.js"></script>
  <!-- endinject -->
</head>
<body>

  <div class="wrapper bluePage espaceAdherents">

    <header>
      <div class="pure-g">
        <div class="pure-u-1 pure-u-md-1-4">
          <div id="logo">
            <a href="<?php echo get_home_url(); ?>"><img src="<?php bloginfo(template_url); ?>/img/a3m-logo.jpg" class="pure-img"></a>
          </div>
        </div>
        <div class="pure-u-1 pure-u-md-1-4"></div>
        <div class="pure-u-1 pure-u-md-1-4"></div>
        <div class="pure-u-1 pure-u-md-1-4">
          <div id="login" class="login--on bluegradient">
            <a href="<?php echo get_home_url(); ?>"><strong>Revenir sur le site A3M</strong></a><br/>
            <?php echo '<a href="' . wp_logout_url( site_url( '/' ) ) .'">déconnexion</a>'; ?>
          </div>
        </div>
      </div>
      <h1>Espace Adhérents</h1>
    </header>

    <div id="mainContent">
		<div class="sidebar">
			<div class="submenu green">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
        $articles = get_field('articles_relatifs');?>
          <ul>
              <?php for($i = 0; $i < count($articles); $i++){ ?>
                <li>
                  <a href="<?php echo get_the_permalink($articles[$i]); ?>"><?php echo get_the_title( $articles[$i] ); ?></a>
                </li>
              <?php } ?> 
          </ul>
        <?php endwhile; endif; wp_reset_query(); ?>
			</div>
		</div>

      <div class="pageContent">
        <div class="col3--espaceAdherents">
          <div class="col">

              <?php
                function random($max){
                  $random = rand(1, $max);
                  $bgClass = "randomClass".$random;
                  return $bgClass;
                }
              ?>

              <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
              $articles = get_field('articles_relatifs');

              for($i = 0; $i < count($articles); $i++){ ?>
                <div class="blc">
                  <?php echo get_the_post_thumbnail( $articles[$i], 'medium' ); ?>
                  <h2 class="angle <?php echo random(4); ?>"><?php echo get_the_title( $articles[$i] ); ?></h2>
                  <p><?php echo get_post_excerpt_by_id($articles[$i]); ?></p>
                  <a href="<?php echo get_the_permalink($articles[$i]); ?>" class="btn">Voir plus  --></a>
                </div>
              <?php } ?>
              <?php endwhile; endif; wp_reset_query(); ?>
            
            
            
          </div>
          <div class="col">
            <div class="blc">
               <?php 
              $the_query = new WP_Query( array( 'page_id' => 169 )  );
              while ( $the_query->have_posts() ) : $the_query->the_post();
              ?>
                <?php echo get_the_post_thumbnail( $page->ID, 'medium' ); ?>
                <h2 class="angle lightgreen"><?php the_title(); ?></h2>
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>" class="btn">Voir plus  --></a>

              <?php
                endwhile; wp_reset_query();
              ?>         
            </div>
            <div class="blc">
              <?php 
              $the_query = new WP_Query( array( 'page_id' => 173 )  );
              while ( $the_query->have_posts() ) : $the_query->the_post();
              ?>
                <?php echo get_the_post_thumbnail( $page->ID, 'medium' ); ?>
                <h2 class="angle"><?php the_title(); ?></h2>
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>" class="btn">Voir plus  --></a>

              <?php
                endwhile; wp_reset_query();
              ?>         
            </div>
          </div>
          <div class="col">
            <div class="blc">
              <h2 class="angle pink">Manifestation<br/> et Agenda</h2>
              
              <?php query_posts('post_type=post&cat=195&orderby=date&order=DESC'); ?>
              <?php
                 while ( have_posts() ) : the_post();
                 $eventDate = get_field('date');
              ?>
                <article>
                <h3><span class="date"><?php echo $eventDate; ?></span>
                <?php the_title(); ?></h3>
                <a href="<?php the_permalink(); ?>">Lire la suite --></a>
                </article>
              <?php
                endwhile; wp_reset_query();
              ?>

            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php get_footer();?>