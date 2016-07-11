<?php
/**
 *  Template Name: Newsletter - Single page
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
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <p class="subtitle">A3M ACTU - <?php the_title(); ?></p>
      <?php endwhile; endif; wp_reset_query(); ?>
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

          <?php
            //Ramdom colors for articles elements
            function random($max){
              $random = rand(1, $max);
              $bgClass = "randomClass".$random;
              return $bgClass;
            }
          ?>
        
          <?php 
            if ( have_posts() ) : while ( have_posts() ) : the_post();
              $articles = get_field('articles_relatifs');
              $nbarticles = count($articles); 
              $test = ceil($nbarticles/2); ?>

              <?php 
                for($i = 0; $i < $nbarticles; $i++){

                  if( $i == 0 || $i == $test || $i == $test*2 ){
                    echo '<div class="col">';
                  } 
              ?>
                  <div class="blc">
                    <?php echo get_the_post_thumbnail( $articles[$i], 'medium' ); ?>
                    <h2 class="angle <?php echo random(4); ?>"><?php echo get_the_title( $articles[$i] ); ?></h2>
                    <p><?php echo get_post_excerpt_by_id($articles[$i]); ?></p>
                    <a href="<?php echo get_the_permalink($articles[$i]); ?>" class="btn">Voir plus  --></a>
                  </div>
                  <?php 

                  if( $i == ($test-1) || $i == ($test*2-1) || $i == ($nbarticles-1) ){
                    echo '</div>';
                  }
                }

            endwhile; endif; wp_reset_query(); 
          ?>

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

            <a href="<?php echo site_url(); ?>/archives-des-newsletters/" class="btn btn2">
              <span>ARCHIVES</span>
              <img src="<?php bloginfo(template_url); ?>/img/archives.png">
            </a>

            <?php 
              if ( have_posts() ) : while ( have_posts() ) : the_post();
              $pdfile = get_field('newsletter_pdf');
              if($pdfile){ ?>
                <a href="<?php echo $pdfile; ?>" class="btn btn2">
                  <span>TÉLÉCHARGER A3M<br> ACTU EN PDF</span>
                  <img src="<?php bloginfo(template_url); ?>/img/download.png">
                </a>
            <?php } ?>
                
            <?php
              endwhile; endif; wp_reset_query();
            ?>

          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer();?>