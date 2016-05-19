<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>A3M</title>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
  <!-- inject:css -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/style.min.css">
  <!-- endinject -->
    <!-- inject:js -->
  <script src="js/main.js"></script>
  <script src="js/modernizr.js"></script>
  <script src="js/script.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <!-- endinject -->
</head>
<body>

  <div class="wrapper purplePage">

    <header>
      <div class="pure-g">
        <div class="pure-u-1 pure-u-md-1-4">
          <div id="logo">
            <a href="index.php"><img src="img/a3m-logo.jpg" class="pure-img"></a>
          </div>
        </div>
        <div class="pure-u-1 pure-u-md-1-4"></div>
        <div class="pure-u-1 pure-u-md-1-4">
          <div id="searchbar">
            <span class="iconSprite">Recherche</span>
            <form class="pure-form pure-form-stacked">
              <input type="text" name="search" id="search" placeholder="Recherche">
            </form>
          </div>
        </div>
        <div class="pure-u-1 pure-u-md-1-4">
          <div id="login" class="bluegradient">
            <span class="iconSprite">Mon compte</span>
            <form action="espace-adherent.php" class="pure-form pure-form-stacked">
                <fieldset>
                  <input id="email" type="email" placeholder="Identifiant">
                  <input id="password" type="password" placeholder="Password">
                  <button type="submit" class="pure-button pure-button-primary">OK</button>
                </fieldset>
            </form>
          </div>
        </div>
      </div>

      <div class="pure-g">
        <div class="pure-u-1">
          <nav class="pure-menu pure-menu-horizontal" id="mainNavigation">
            <ul class="pure-menu-list">
              <li class="pure-menu-item"><a href="liste-adherents.php">A3M</a></li>
              <li class="pure-menu-item"><a href="enjeux.php">Enjeux</a></li>
              <li class="pure-menu-item"><a href="matieres-produits.php">Matieres et produits</a></li>
              <li class="pure-menu-item"><a href="#">Nos métiers</a></li>
              <li class="pure-menu-item"><a class="actif" href="cours-metaux.php">Données économiques</a></li>
              <li class="pure-menu-item"><a href="#">Publications</a></li>
              <li class="pure-menu-item"><a href="#">Contact</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>

    <div id="mainContent">
    <div class="breadcrumb">
      <a href="index.php">A3M</a> <a href="liste-adherents.php">Adhérents</a> <a href="#">Le bronze industriel</a>
    </div>
		<div class="sidebar">
			<div class="submenu green">
				<ul>
					<li><a href="#">Compétitivité</a></li>
					<li><a href="#">Recherche, Innovation et Développement</a>
              <ul class="subsubmenu">
                <li><a href="#">Biodiversité</a></li>
                <li><a href="#">Changement climatique</a></li>
                <li><a href="#">Emissions industrielles</a></li>
                <li><a href="#">Energie</a></li>
                <li><a href="#">Mines</a></li>
                <li><a href="#">Recyclage et économie</a></li>
                <li><a href="#">circulaire</a></li> 
                <li><a href="#">Sites et sols</a></li>
              </ul>
          </li>
					<li><a href="#">Environnement</a>
              <ul class="subsubmenu">
                <li><a href="#">Evaluation et gestion des risques substances</a></li>
              </ul>
          </li>
				</ul>
			</div>
			<div class="hp-actu">
				<h2 class="angle">Actu <br/>& Évenements</h2>
				    <article>
              <h3><span class="date">25/09/2014</span> cimilla ccumquu ndaepe</h3>
		          <p>
		           As dem hillique is aut ariatque niatiis estiberore dem dolore res arum sunt re voluptat quo omnt nullaborit vento de...<br/><a href="#" class="default">Lire la suite --></a>
		          </p>
            </article>
            <article>
		          <h3><span class="date">25/09/2014</span> cimilla ccumquu ndaepe</h3>
		          <p>
		           As dem hillique is aut ariatque niatiis estiberore dem dolore res arum sunt re voluptat quo omnt...<br/><a href="#" class="default">Lire la suite --></a>
		          </p>
            </article>
            <article>
				      <h3><span class="date">25/09/2014</span> cimilla ccumquu ndaepe</h3>
		          <p>
		           As dem hillique is aut ariatque niatiis estiberore dem dolore res arum sunt re voluptat... <br/><a href="#" class="default">Lire la suite --></a>
		          </p>
            </article>
			</div>
      <div class="donneesEco">
        <h2 class="angle">Données économiques</h2>
        <h3>Cours des métaux</h3>
        <p><a href="#"><img src="img/content/cours-des-metaux.jpg" /></a></p>
        <div class="hp2col">
          <div class="col">
            <h3>Chiffres clés</h3>
            <p><a href="#"><img src="img/content/hp-chiffres-cles.jpg" /></a></p>
          </div>
          <div class="col">
            <h3>Conjoncture</h3>
            <p><a href="#"><img src="img/content/hp-conjoncture.jpg" /></a></p>
          </div>
        </div>
        <span class="btn blue fullwidth annuaireAdherents"><a href="liste-adherents.php">Annuaire<br/>des adhérents</a></span> 
      </div>
		</div>

      <div class="pageContent">
        <div class="pure-u-1 pure-u-md-1-1 l-box hp-actu">
          <h2 class="titlePAge">
            Cours des métaux
          </h2>
          
          <div class="select--custom">
            <select>
              <option>option 1</option>
              <option>option 2</option>
              <option>option 3</option>
            </select>
          </div>

          <p>Du: <input id="startdate" type="text" class="startdate" name="startdate" value=" "> au: <input type="text" class="enddate" name="startdate"></p>

          <h3>Titre du graphique</h3>
           <div class="chart--line">
              <div class="ct-chart ct-major-tenth"></div>
           </div>
           <script type="text/javascript">
          var date = ['08/15', '09/15', '10/15', '11/14', '12/15', '01/16', '02/13', '03/16', '04/16'];
              date.sort();
              
              var today = new Date();
              var aDay = today.getDate();
              var aMonth = today.getMonth();
              var aYear = today.getFullYear();
              var lMonth = "";
              var lYear = "";
              //var aYear = today.getFullYear();
              var months= [], i;
              var month = new Array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
              for (i=0; i<12; i++) {
               months.push(month[aMonth]+'/'+aYear);
              if(i==11){
                lMonth = month[aMonth];
                lYear = aYear;
               }
               aMonth--;
               if (aMonth < 0) {
                aYear--;
                aMonth = 11;
               } 
              }
              console.log(months);
              console.log(aDay+"/"+lMonth+"/"+lYear);
          var data = {
            // A labels array that can contain any sort of values
            labels: months,
            // Our series array that contains series objects or in this case series data arrays
            series: [
              [0, 0, 0, 560, 560, 450]
            ]
          };
          var data2 = {
            // A labels array that can contain any sort of values
            labels: ['08/17', '09/15', '10/15', '11/15', '12/15', '01/16', '02/16', '03/16', '04/16'],
            // Our series array that contains series objects or in this case series data arrays
            series: [
              [0, 0, 0, 560, 560, 450]
            ]
          };
          var options = {
             // Don't draw the line chart points
            showPoint: true,
            // Disable line smoothing
            lineSmooth: false,
            // X-Axis specific configuration
            axisX: {
              // We can disable the grid for this axis
              showGrid: false,
              // and also don't show the label
              showLabel: true
            },
            // Y-Axis specific configuration
            axisY: {
              // Lets offset the chart a bit from the labels
              offset: 20,

            }

          };

          // Create a new line chart object where as first parameter we pass in a selector
          // that is resolving to our chart container element. The Second parameter
          // is the actual data object.
          new Chartist.Line('.ct-chart', data, options);
console.log(lYear);
                    $(function() {
            $( ".startdate" ).datepicker({dateFormat: "dd/mm/yy"}).datepicker("setDate", new Date(""+lYear+"-"+lMonth+"-"+aDay+""));
            $( ".enddate" ).datepicker({dateFormat: "dd/mm/yy"}).datepicker("option", "maxDate", new Date()).datepicker("setDate", new Date());;
          });

           </script>

           <table>
            <tbody>
             <tr>
               <th>Date</th>
               <th>Cours</th>
             </tr>
             <tr>
                <td>16/02/2016</td>
                <td>535.100</td>
             </tr>
             <tr>
                <td>16/02/2016</td>
                <td>535.100</td>
             </tr>
             <tr>
                <td>16/02/2016</td>
                <td>535.100</td>
             </tr>
             <tr>
                <td>16/02/2016</td>
                <td>535.100</td>
             </tr>
             <tr>
                <td>16/02/2016</td>
                <td>535.100</td>
             </tr>
             <tr>
                <td>16/02/2016</td>
                <td>535.100</td>
             </tr>
            </tbody>
           </table>
        </div>
      </div>
    </div>
  </div>
  <footer>
      <div class="pure-g">
        <nav id="footerNavigation" class="pure-u-1">
          <ul>
            <li><a href="#">Plan du site</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Mentions légales</a></li>
          </ul>
        </nav>
      </div>
    </footer>
</body>
</html>