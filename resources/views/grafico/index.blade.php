<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>amCharts V4 Example - simple-pie-chart</title>
    <style>
    body {
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
      background-color: #ffffff;
      overflow: hidden;
      margin: 0;
      background: url({{asset('grafico/fondo2.jpg')}}) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      color:red !important;
    }

    #chartdiv {
      width: 100%;

      height: 70vh;
    }
    .primario{background-color:rgba(255,255,255,0.5);}
    </style>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"></head>
  <body>
<div class="container-fluid " style="height: 100vh;">
    <div class="container-fluid themed-container rounded primario" style="border:solid 1px #117204; margin:3px; height: 98vh;" >

    <div class="container-fluid themed-container">
      <div class="row">
        <div class="col" style="margin-bottom:-15px; margin-top:3px;">
          <center><div class="alert alert-success"><span style="font-size:3em"><B>RESULTADOS ALCALDIA</B></span></div></center>
        </div>
      </div>
    </div>


    <div class="container-fluid themed-container">

      <div class="row">
        <div class="col-md-12 themed-grid-col">
        <div id="chartdiv"></div>
        </div>
        <!--<div class="col-4 col-md-2 themed-grid-col" style="border:solid 1px black;">
        2 of 2
        </div>
        <-->
      </div>


    </div>




</div>


</div>
  <!--  -->
  </body>
  <script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
	<script src="{{asset('grafico/core.js')}}"></script>
    <script src="{{asset('grafico/charts.js')}}"></script>
	<script src="{{asset('grafico/animated.js')}}"></script>
    <script>

    am4core.useTheme(am4themes_animated);

    var chart = am4core.create("chartdiv", am4charts.PieChart3D);//am4charts.PieChart3D

      chart.data = [{
        "partido": "AS",
        "votos": {{$as}}
      }, {
        "partido": "MAS",
        "votos":  {{$mas}}
      }, {
        "partido": "ADN",
        "votos": {{$adn}}
      }, {
        "partido": "JAP",
        "votos": {{$jap}}
      }, {
        "partido": "MCP",
        "votos": {{$mcp}}
      }, {
        "partido": "USC",
        "votos": {{$ucs}}
      }, {
        "partido": "PUKA",
        "votos":  {{$puka}}
      }, {
        "partido": "MDS",
        "votos": {{$mds}}
      }, {
        "partido": "FPV",
        "votos": {{$fpv}}
      }];
      var series = chart.series.push(new am4charts.PieSeries3D());

      series.dataFields.value = "votos";
      series.dataFields.category = "partido";
      series.colors = new am4core.ColorSet();
      series.colors.list = [am4core.color("#02b658"),
                            am4core.color("#2788f4"),
                            am4core.color("#929292"),
                            am4core.color("#fffdbd"),
                            am4core.color("#ff9898"),
                            am4core.color("#b8d5fc"),
                            am4core.color("#c53025"),
                            am4core.color("#c7ffcf"),
                            am4core.color("#ffbafd"),
                            am4core.color("#f00")];



      // this creates initial animation
      series.hiddenState.properties.opacity = 1;
      series.hiddenState.properties.endAngle = -90;
      series.hiddenState.properties.startAngle = -90;
      series.labels.template.fill = am4core.color("black");
      //series.slices.template.fill = am4core.color("red");
      series.alignLabels = false;
      series.slices.template.stroke = am4core.color("#fff");
      series.labels.template.fontSize = 25;
      series.labels.template.wrap = true;



      chart.legend = new am4charts.Legend();
      chart.legend.position = "right";
      series.legendSettings.labelText = "[font-size: 25px]{name} - {value}[/]";
      series.legendSettings.valueText = "{valueY.close}";

    </script>
</html>
