<?php
/**
 *  Template Name: Espace adhérents - Content
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
        <?php sidebar_menu(159); ?> 
			</div>
		</div>
      <div class="pageContent">
        <div class="col3--espaceAdherents">
          <h2 class="titlePAge"><?php the_title(); ?></h2>
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>
  <?php get_footer();?>