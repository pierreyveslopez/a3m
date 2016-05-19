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
        <?php sidebar_menu(159); ?> 
			</div>
		</div>

      <div class="pageContent">
        <div class="col3--espaceAdherents">
          <div class="col">
            <div class="blc">
              <img src="<?php bloginfo(template_url); ?>/img/content/img-espace-adherent.jpg" alt="" />
              <h2 class="angle lightblue">A la une</h2>
              <h3>Les métaux recyclables au coeur de l'économie</h3>
              <p><strong>Dans le cadre des actions de promotion de la profession, A3M publie ce mois-ci une plaquette dédiée à l'économie circulaire</strong><br/>
              Cette plaquette s'inscrit dans la dynamique actuelle autour de cette thématique et vise à valoriser à la fois l'engagement de notre profession, sa place dans le cycle de vie des matériaux ainsi que la performance des produits métalliques en faveur de la transition écologique</p>
              <p><a class="btn" href="#" title="">Voir plus -></a></p>
            </div>
            <div class="blc">
              <img src="<?php bloginfo(template_url); ?>/img/content/img-espace-adherent.jpg" alt="" />
              <h2 class="angle yellow">Parole aux adhérents</h2>
              <h3>Emeris graphite & carbone double</h3>
              <p>Anne Fauconnier, Directrice de la Communication Corporate & Interne d’Emeris, souligne par ailleurs la réussite de la finalisation du chantier en temps et en heure et surtout sans accident: « la construction de la ligne de production a duré environ un an, il n’y a eu aucun dépassement de délai, aucun dépassement budgétaire, et surtout, aucun accident, ce dont on se félicite. »</p>
              <p><a class="btn" href="#" title="">Voir plus -></a></p>
            </div>
          </div>
          <div class="col">
            <div class="blc">
              <img src="<?php bloginfo(template_url); ?>/img/content/img-espace-adherent.jpg" alt="" />
              <h2 class="angle lightgreen">Environnement</h2>
              <h3>Réunion d'information et d'échanges d'expériences A3M</h3>
              <p><strong>Le 17 mars prochain, A3M organise une réunion d'information et d'échanges d'expériences sur le thème "L'écologie industrielle au coeur des projets industriels de territoire.</strong><br/>
              Afin de réduire leurs coûts de production, les industriels du secteur de la métallurgie sont en recherche perpétuelle de solutions qui leur permettent de valoriser au mieux leurs déchets ainsi que l’énergie fatale et les gaz issus de leurs procédés.</p>
              <p><a class="btn" href="#" title="">Voir plus -></a></p>
            </div>
            <div class="blc">
              <h2 class="angle">Note de lecture</h2>
              <p>Suite au Conseil européen des 23 et 24 octobre qui a validé le principe « d’un instrument visant à stabiliser le marché » européen du carbone, les commissions environnement et industrie du Parlement européen ont commencé l’examen de la proposition de texte de la Commission européenne.</p>
              <p><a class="btn" href="#" title="">Voir plus -></a></p>
            </div>
          </div>
          <div class="col">
            <div class="blc">
              <h2 class="angle pink">Manifestation<br/> et Agenda</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php get_footer();?>