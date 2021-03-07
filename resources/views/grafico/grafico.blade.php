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
    #bar{
      color: white;
-webkit-text-fill-color: white; /* Will override color (regardless of order) */
-webkit-text-stroke-width: 1px;
-webkit-text-stroke-color: black;
    }
    .primario{background-color:rgba(255,255,255,0.5);}
    </style>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"></head>
  <body>
<div class="container-fluid " style="height: 100vh;">
    <div class="container-fluid themed-container rounded primario" style="border:solid 1px #117204; margin:3px; height: 98vh;" >

<div class="badge badge-success" style="position:absolute; top:2%;"><span style="font-size:3em"><B>RESULTADOS {{$tipo}}</B></span></div>


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

    <div class="alert alert-info" role="alert">
      <marquee><p style="font-size: 16pt">
        <b>Votos Emitidos:</b> <span id="total">{{$total}}</span> |
        <b>Votos Validos:</b> <span id="validos"> {{$validos}}</span> |
        <b>Votos Nulos:</b> <span id="nulo">{{$nulo}} </span>|
        <b>Votos Blancos:</b> <span id="blanco"> {{$blanco}}</span> |
       </p></marquee>
    </div>

    <div class="progress progress-striped" style="height:5%;">
      <div class="progress-bar progress-bar-primary" role="progressbar" id="porcentaje" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:{{$grafico}}%">
        <span id="bar" style="color:black; font-weight:bold;font-size:2em; position: absolute;left:40%">

          <span id="conteo">{{$conteo}}</span> de
          <span id="mesas">{{$mesas}}</span> mesas
          (<span id="porcentaje_">{{$porcentaje}}</span>%)

        </span>
      </div>
    </div>

</div>

<input type="hidden" value="{{$tipo}}" id="tipo">
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
          "partido": "PANBOL",
          "votos": {{$panbol}}
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
                            am4core.color("#ffc107"),//panbol
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
        tipo=$("#tipo").val();
          url  = '{{ asset("/index.php/ContarVotos/")}}/'+tipo;
          $.getJSON(url, null, function(data)
          {

              //alert(data[0])
              var miObjeto=1;
              am4core.array.each(chart.data, function (item)
              {

                switch(miObjeto)
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
                  item.votos=data['panbol'];
                  break;

                  case 6:
                // alert(data['uc'])
                  item.votos=data['uc'];
                  break;

                  case 7:
                  item.votos=data['mas'];
                  break;

                  case 8:
                  item.votos=data['mcp'];
                  break;

                  case 9:
                  item.votos=data['mds'];
                  break;

                  case 10:
                  item.votos=data['mts'];
                  break;

                  case 11:
                  item.votos=data['cc'];
                  break;

                  case 12:
                  item.votos=data['as'];
                  break;

                  case 13:
                  item.votos=data['adn'];
                  break;
                }
              //  alert(miObjeto)
                miObjeto++;
              //item.votos += Math.round(Math.random() * 200 - 100);
            });
              $("#total").html(data['total'])
              $("#validos").html(data['validos'])
              $("#blanco").html(data['blanco'])
              $("#nulo").html(data['nulo'])
              $("#conteo").html(data['conteo'])
              $("#mesas").html(data['mesas'])
              $("#porcentaje_").html(data['porcentaje'])
              $('#porcentaje').css('width', data['grafico']+'%');
              chart.invalidateRawData();
          });


      }, 2000)

      //series.sortBySeries = series;

    </script>
</html>

