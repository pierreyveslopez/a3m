<?php get_header();?>
    <div id="mainContent">
    <?php custom_breadcrumbs($post); ?>
    <?php get_sidebar(); ?>
      <div class="pageContent">
        <div class="pure-u-1 pure-u-md-1-1 l-box hp-actu">
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php $currentID = get_the_ID(); ?>
            <h2 class="titlePAge">COURS DES MÉTAUX</h2>
            <?php the_content(); ?>
          <?php endwhile; endif; ?>
          <div class="select--custom" style="min-width:80%">
            <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
              <option value="<?php echo get_permalink(103);?>">Synthèse</option>
              <?php 
              query_posts('post_type=cours-des-metaux&orderby=title&order=ASC'); 
              while ( have_posts() ) : the_post();
              ?>
                <option <?php if($currentID == get_the_ID()){echo"selected";} ?> value="<?php the_permalink();?>"><?php the_title(); ?></option>
              <?php 
                endwhile; wp_reset_query(); 
              ?>
            </select>
          </div>
          <?php
            $path_csv = get_field('csv_cours_des_metaux');
            if($path_csv){
          ?>
          <p>Du: <input id="startdate" type="text" class="startdate" name="startdate" value=" "> au: <input id="enddate" type="text" class="enddate" name="enddate" value=" "></p>
          <?php
            } 
          ?>
          <h3><?php the_title(); ?></h3>
          
          <?php
            if($path_csv){
          ?>
          <div class="chart--line">
              <div class="ct-chart ct-major-tenth"></div>
          </div>
          <div id="coursMoyen" class="bluegradient">
            <p>
              Cours Moyen:
              <span class="appendHere"></span>
            </p>
          </div>    
          <table id="TabCours">
            <tbody>
             <tr>
               <th>Date</th>
               <th>Cours</th>
             </tr>
             <?php
                ini_set('auto_detect_line_endings',TRUE);
                $handle = fopen($path_csv,'r');
                $totalCours = 0;
                $i = 0;
                while ( ($data = fgetcsv($handle) ) !== FALSE ) {
                  $line = $data[0];
                  $col = explode(';', $line);
                  $date = $col[0];
                  $date = str_replace("/", "-", $date);
                  $date = DateTime::createFromFormat('d-m-y', $date);
                  $date = $date->format('Ymd');

                  $arrayDate[$i]  = $date;
                  $arrayCours[$i] = $col[1];
                  $totalCours = $totalCours + $col[1];

                  $i++;
                }
                ini_set('auto_detect_line_endings',FALSE);
                array_multisort($arrayDate,SORT_ASC, $arrayCours);

                $lenghtData = count($arrayCours);
                $coursMoyen = $totalCours / $lenghtData;
                $coursMoyen = round($coursMoyen, 2); 
              ?>
            </tbody>
           </table>
           <?php }else{
            echo '<p>Pas de données dispo</p>';
           }?>
        </div>
      </div>
    </div>
  </div>


<?php
  /****************************************
  *****************************************
  Construction du tableau pour le graphique
  *****************************************/
  $count = count($arrayDate);
  $i = 0;
  $data = "";
  $max_items = 15; 
  while ($count > $i && $max_items > $i) {
    $date = DateTime::createFromFormat('Ymd', $arrayDate[$i]);
    $newDate = $date->format('m/d/Y');
    $mmddyy = $date->format('m/d/y');

    if($i == 0){
      $jsStartDate = $mmddyy;
    }
    
    if($i != $count-1){
      $jsDate .= "'".$newDate."',";
      $jsCours .= $arrayCours[$i].",";
    }else{
      $jsDate .= "'".$newDate."'";
      $jsCours .= $arrayCours[$i];
      $jsLastDate = $mmddyy;
    }
    $i++;
  }
?>


<script type="text/javascript">
  var jsDateStart = new Date(<?php echo "'".$jsStartDate."'"; ?>);
  var jsDateEnd = new Date(<?php echo "'".$jsLastDate."'"; ?>);

  var date = [<?php echo $jsDate; ?>];
  var cours = [<?php echo $jsCours; ?>];


  Date.prototype.mmyyyy = function() {
   var yyyy = this.getFullYear().toString().substr(2,2);
   var mm = (this.getMonth()+1).toString(); // getMonth() is zero-based
   return (mm[1]?mm:"0"+mm[0]) +'/'+ yyyy; // padding
  };

  Date.prototype.ddmmyyyy = function() {
   var yyyy = this.getFullYear().toString();
   var mm = (this.getMonth()+1).toString(); // getMonth() is zero-based
   var dd  = this.getDate().toString();
   return (dd[1]?dd:"0"+dd[0]) +'/'+ (mm[1]?mm:"0"+mm[0]) +'/'+ yyyy; // padding
  };

  function dateFilter(array1, array2){
    var counter = 0;
    var newArrayArray1 = [];
    var newArrayArray2 = [];
    var forTable = [];
    while(counter <= array1.length){
      var dateF = new Date(array1[counter]);
      var startDate = $('.startdate').val();
        startDate = new Date(startDate.split("/").reverse().join("-"));
        startDate = startDate.setHours(0,0,0);

      var endDate = $('.enddate').val();
        endDate = new Date(endDate.split("/").reverse().join("-"));
        endDate = endDate.setHours(0,0,0);
    
      if(dateF >= startDate && dateF <= endDate){
        var newDate = dateF.mmyyyy();
        var pushArray1 = newArrayArray1.push(newDate);
        var pushArray2 = newArrayArray2.push(array2[counter]);
        var pushforTable = forTable.push(dateF.ddmmyyyy());
      }
      counter++;
      
    }
    return [newArrayArray1, newArrayArray2, forTable];
  }

  function initTab(){
    //Filter the data by date
    var filtre = dateFilter(date, cours);
    var tab = $('#TabCours');
    var html = '';

    //Empty the tab 
    tab.empty();
    
    for(var i= 0; i < filtre[2].length; i++)
    {
         html = '<tr><td>'+filtre[2][i]+'</td><td>'+filtre[1][i].toFixed(3)+'</td></tr>\n';
         tab.prepend(html);
    }
    //Add the tab header
    tab.prepend("<tr><th>Date</th><th>Cours</th></tr>");
  }

  function initMoyenne(){
    //Filter the data by date
    var filtre = dateFilter(date, cours);
    var el = $('#coursMoyen .appendHere');
    var total = 0;

    //Empty the el 
    el.empty();
    
    for(var i= 0; i < filtre[1].length; i++)
    {
         total = total+filtre[1][i];
    }
    var moyenne = total / filtre[1].length;
    //Add the tab header
    el.append(moyenne.toFixed(3));
  }

  function initChart(){
    //Filter the data by date
    var filtre = dateFilter(date, cours);
    
    var newData = {
      // [DATE] A labels array that can contain any sort of values
      labels: filtre[0],
      // [COURS] Our series array that contains series objects or in this case series data arrays
      series: [
        filtre[1]
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
        showGrid: true,
        // and also don't show the label
        showLabel: true
      },
      // Y-Axis specific configuration
      axisY: {
        // Lets offset the chart a bit from the labels
        offset: 20,

      }
    };
    new Chartist.Line('.ct-chart', newData, options);
  }

  //Set the date pickers
  $(function() {
    $( ".startdate" ).datepicker({dateFormat: "dd/mm/yy"}).datepicker("option", "minDate", jsDateStart).datepicker("option", "maxDate", jsDateEnd).datepicker("setDate", jsDateStart);
    $( ".enddate" ).datepicker({dateFormat: "dd/mm/yy"}).datepicker("option", "minDate", jsDateStart).datepicker("option", "maxDate", jsDateEnd).datepicker("setDate", jsDateEnd);;
  });

  //Change the chart - depending on date 
  $('.startdate').change(function(){
    initChart();
    initMoyenne();
    initTab();
  });
  $('.enddate').change(function(){
    initChart();
    initMoyenne();
    initTab();
  });

  //Document ready - init chart and tab
  $(document).ready(function() {
    initChart();
    initMoyenne();
    initTab();
  });
</script>
  <?php get_footer();?>