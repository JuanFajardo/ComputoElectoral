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

      height: 80vh;
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
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
	<script src="{{asset('grafico/core.js')}}"></script>
    <script src="{{asset('grafico/charts.js')}}"></script>
	<script src="{{asset('grafico/animated.js')}}"></script>
    <script>

    am4core.useTheme(am4themes_animated);

    var chart = am4core.create("chartdiv", am4charts.PieChart3D);//am4charts.PieChart3D
        chart.data = [
        {
          "partido": "MOP",
          "votos": {{$mop}}
        }, {
          "partido": "PUKA",
          "votos":  {{$puka}}
        }, {
          "partido": "FPV",
          "votos": {{$fpv}}
        }, {
          "partido": "JAP",
          "votos": {{$jap}}
        }, {
          "partido": "UCS",
          "votos": {{$ucs}}
        }, {
          "partido": "MAS",
          "votos": {{$mas}}
        }, {
          "partido": "MCP",
          "votos":  {{$mcp}}
        }, {
          "partido": "MDS",
          "votos": {{$mds}}
        }, {
        "partido": "MTS",
        "votos": {{$mts}},
        }, {
          "partido": "CC",
          "votos": {{$cc}},
        }, {
          "partido": "AS",
          "votos": {{$as}},
        }, {
          "partido": "ADN",
          "votos": {{$adn}},
        }];
      var series = chart.series.push(new am4charts.PieSeries3D());

      series.dataFields.value = "votos";
      series.dataFields.category = "partido";
      series.colors = new am4core.ColorSet();


      series.colors.list = [am4core.color("#fe8682"),//mop
                            am4core.color("#d04744"),//puka
                            am4core.color("#d0d0d0"),//fpv
                            am4core.color("#c102f9"),//jap
                            am4core.color("#9ddefc"),//usc
                            am4core.color("#0096ff"),//mas
                            am4core.color("#cb0236"),//mcp
                            am4core.color("#68ffc4"),//mds
                            am4core.color("#ff44eb"),//mts
                            am4core.color("#ff5300"),//cc
                            am4core.color("#0f8d49"),//as
                            am4core.color("#ffffff")];//adn

      // this creates initial animation
      series.hiddenState.properties.opacity = 1;
      series.hiddenState.properties.endAngle = -90;
      series.hiddenState.properties.startAngle = -90;
      series.labels.template.fill = am4core.color("black");

      series.slices.template.stroke = am4core.color("#fff");
      series.labels.template.fontSize = 25;
      series.labels.template.wrap = true;



      chart.legend = new am4charts.Legend();
    	  //chart.legend.position = "left";

      series.legendSettings.labelText = "[font-size: 25px]{name} - {value}[/]";
      series.legendSettings.valueText = "{valueY.close}";


      setInterval(function ()
      {
        //alert("ads")
          url  = '{{ asset("/index.php/ContarVotos/")}}/';
          $.getJSON(url, null, function(data)
          {

              //alert(data[0])
              i=1;
              //alert(chart.data[0][0])
              am4core.array.each(chart.data, function (item)
              {
                switch(i)
                {
                  case 1:
                  item.votos=data['mop'];
                  break;
                  case 2:
                  item.votos=data['puka'];
                  break;
                  case 3:
                  item.votos=data['fpv'];
                  break;
                  case 4:
                  item.votos=data['jap'];
                  break;
                  case 5:
                  item.votos=data['usc'];
                  break;
                  case 6:
                  item.votos=data['mas'];
                  break;
                  case 7:
                  item.votos=data['mcp'];
                  break;
                  case 8:
                  item.votos=data['mds'];
                  break;
                  case 9:
                  item.votos=data['mts'];
                  break;
                  case 10:
                  item.votos=data['cc'];
                  break;
                  case 11:
                  item.votos=data['as'];
                  break;
                  case 12:
                  item.votos=data['adn'];
                  break;
                }
                i++;
              //item.votos += Math.round(Math.random() * 200 - 100);
              })
              chart.invalidateRawData();
          });


      }, 2000)

      //series.sortBySeries = series;

    </script>
</html>

