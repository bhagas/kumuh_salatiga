<!-- BEGIN PAGE CONTENT  -->
<style type="text/css">
#chartdiv {
  width   : 100%;
  height    : 500px;
  font-size : 11px;
}  
</style>
        <div class="page-content page-wizard">
          <div class="header">
            <h2>Statistik <strong> Kawasan</strong></h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li><a href="<?php echo base_url()?>">Home</a>
                </li>
                <li class="active">Statistik Kawasan</li>
              </ol>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-content">
                  <div class="row">
                    <div class="col-md-6">
                     <div id="chartdiv"></div>  
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="footer">
            <div class="copyright">
              <p class="pull-left sm-pull-reset">
                <span>Copyright <span class="copyright">©</span> 2015 </span>
                <span>Dinas </span>.
              </p>
            </div>
          </div>
        </div>

        <script type="text/javascript">
        var isine = <?php echo json_encode($kecamatan); ?>;
        //console.log(JSON.stringify(isine));
var chart = AmCharts.makeChart( "chartdiv", {
  "type": "serial",
  "theme": "light",
  "dataProvider": isine,
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "nilai"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "nama_kecamatan",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
    "tickPosition": "start",
    "tickLength": 20
  },
  "export": {
    "enabled": true
  }

} );
        </script>
        <!-- END PAGE CONTENT