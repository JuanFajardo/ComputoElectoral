@extends('gamp')


@section('title') Proyectos @endsection

@section('ventana') Proyectos
@endsection
@section('descripcion') Administracion de los proyectos @endsection
@section('titulo')
  <a href="{{asset('index.php')}}" style="color:#000;" accesskey="i"></i> <u>I</u>nicio </a>

   @endsection

@section('menuGrafico')
 class="active-menu"
@endsection

@section('modal1')

@endsection

@section('modal2')

@endsection


@section('cuerpo')
@if( \Session::get('clave') == "OK" )
  <script type="text/javascript">
    alert("La contraseña se actualizo correctamente");
  </script>
@endif

<div style="margin:0 auto;">
<label class="btn btn-info btn-sm">Seleccione una opcion</label>
<div class="container">
  <a href="{{asset('index.php/VerVotoAlcalde')}}"><button class="alert alert-success">Votacion Alcalde</button></a>
  <a href="{{asset('index.php/VerVotoConcejal')}}"><button class="alert alert-warning">Votacion Concejal</button></a>
</div>


<label class="btn btn-info btn-sm">Generar Grafico</label>

<form class="form-horizontal" role="form" method="POST" action="{{ url('/VerGrafico') }}" autocomplete="off">

  <table class="table" id="mitabla" style="width:50%;">
    {{ csrf_field() }}
    <tr>
      <td>Opcion</td>
      <td>
        <select name="tipo" class="form-control">
        <option>ALCALDE</option>
        <option>CONCEJAL</option>
        </select>
      </td>
    </tr>


      <tr>
        <td>Distrito</td>
        <td>
          <select name="id_distrito" id="distrito" class="form-control">
          <option id="0">Seleccione Distrito</option>
          @foreach($distrito as $distrito)
          <option value="{{$distrito->id}}">{{$distrito->distrito}}</option>
          @endforeach
          </select>
        </td>
      </tr>
  </table>
  <table>
  </tr>
      <tr>
        <td></td>
        <td><input type="submit" value="Generar Grafico" class="alert alert-success"></td>
      </tr>
  </table>
</form>
</div>

@endsection

@section('js')
<script type="text/javascript">
  $(document).ready(function(){
    $('#tablaGamp').DataTable({
      "order": [[ 0, 'asc']],
      "language": {
        "bDeferRender": true,
        "sEmtpyTable": "No ay registros",
        "decimal": ",",
        "thousands": ".",
        "lengthMenu": "Mostrar _MENU_ datos por registros",
        "zeroRecords": "No se encontro nada,  lo siento",
        "info": "Mostrar paginas [_PAGE_] de [_PAGES_]",
        "infoEmpty": "No ay entradas permitidas",
        "search": "Buscar ",
        "infoFiltered": "(Busqueda de _MAX_ registros en total)",
        "oPaginate":{
          "sLast":"Final",
          "sFirst":"Principio",
          "sNext":"Siguiente",
          "sPrevious":"Anterior"
        }
      }
    });
  });

  $('#distrito').change(function(event)
  {
    //event.preventDefault();
    id=this.value;
    link  = '{{ asset("/index.php/BuscarZona/")}}/'+id;
    texto='';

    $.getJSON(link, function(data, textStatus)
    {
      $('#zona_7').remove();
      texto+='<tr id="zona_7"><td>Zona</td>';
        if(data.length > 0)
        {
          texto+='<td><select name="id_recinto" id="reciento" class="form-control" onchange="Recinto(this.value)"><option value="0">Seleccione Zona</option>';
          $.each(data, function(index, el)
          {
            texto+='<option value="'+el.id+'">'+el.zona+'</option>';
          });
          texto+='</select></td>';
        }
        else
        {
          texto+='<td>No existen resultados</td>'
        }

      texto+='</tr>';
      $( "#mitabla" ).append(texto);
    });

  });

  function Recinto(zona)
  {

    //event.preventDefault();
    id=this.value;
    link  = '{{ asset("/index.php/BuscarRecinto/")}}/'+zona;
    texto='';

    $.getJSON(link, function(data, textStatus)
    {
      $('#reciento_7').remove();
      texto+='<tr id="reciento_7"><td>Recinto</td>';
        if(data.length > 0)
        {
          texto+='<td><select name="id_recinto" class="form-control"><option value="0">Seleccione Recinto</option>';
          $.each(data, function(index, el)
          {
            texto+='<option value="'+el.id+'">'+el.recinto+'</option>';
          });
          texto+='</select></td>';
        }
        else
        {
          texto+='<td>No existen resultados</td>'
        }

      texto+='</tr>';
      $( "#mitabla" ).append(texto);
    });

  }


  $('.actualizar').click(function(event){
    event.preventDefault();
    var fila = $(this).parents('tr');
    var id = fila.data('id');
    var form = $('#form-update')
    var url = form.attr('action').replace(':DATO_ID', id);
    form.get(0).setAttribute('action', url);
    link  = '{{ asset("/index.php/Proyecto/")}}/'+id;
    $.getJSON(link, function(data, textStatus) {
      if(data.length > 0){
        $.each(data, function(index, el) {
          $('#apertura').val(el.apertura);
          $('#actividad').val(el.actividad);
          $('#distrito').val(el.distrito);
          $('#presupuesto').val(el.presupuesto);
        });
      }
    });
  });



  $('.eliminar').click(function(event) {
    event.preventDefault();
    var fila = $(this).parents('tr');
    var id = fila.data('id');
    var form = $('#form-delete');
    var url = form.attr('action').replace(':DATO_ID',id);
    var data = form.serialize();
    if(confirm('Esta seguro de eliminar el Proyecto')){
      $.post(url, data, function(result, textStatus, xhr) {
        alert(result);
        fila.fadeOut();
      }).fail(function(esp){
        fila.show();
      });
    }
  });
</script>
@endsection

