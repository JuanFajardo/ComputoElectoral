@extends('gamp')


@section('title') Logs @endsection

@section('ventana') Logs
@endsection
@section('descripcion') Administracion de los proyectos @endsection
@section('titulo') @endsection

@section('')
 class="active-menu"
@endsection


@section('cuerpo')
@if( \Session::get('clave') == "OK" )
  <script type="text/javascript">
    alert("La contraseña se actualizo correctamente");
  </script>
@endif
<table id="tablaGamp" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
  <thead>

    <tr>
      <th>Id</th>
      <th>IP</th>
      <th>CODIGO</th>
      <th>CELULAR</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($datos as $dato)
      <tr data-id="{{ $dato->id }}">
        <td>{{ $dato->id }}</td>
        <td>{{ $dato->ip }}</td>
        <td>{{ $dato->codigo }}</td>
        <td>{{ $dato->celular }}</td>

        <td>
          <a href="{{asset('voto/'.$foto)}}"  target="_blank" class="btn btn-warning actualizar" style="color: #176F05;"> <li class="fa fa-linux"></li></a> &nbsp;&nbsp;&nbsp;
          <a href="https://www.google.com/maps/search/?api=1&query={{$dato->latitud}},{{$dato->longitud}}"  target="_blank" class="btn btn-warning actualizar" style="color: #176F05;"> <li class="fa fa-archive"></li></a> &nbsp;&nbsp;&nbsp;
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

{!! Form::open(['route'=>['Mesa.destroy', ':DATO_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
{!! Form::close() !!}
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

  $('.actualizar').click(function(event){
    event.preventDefault();
    var fila = $(this).parents('tr');
    var id = fila.data('id');
    var form = $('#form-update')
    var url = form.attr('action').replace(':DATO_ID', id);
    form.get(0).setAttribute('action', url);
    link  = '{{ asset("/index.php/Mesa/")}}/'+id;

    $.getJSON(link, function(data, textStatus) {
      if(data.length > 0){
        $.each(data, function(index, el) {
          $("#id_distrito option[value="+el.id_distrito+"]").attr('selected', 'selected');
          $("#id_zona option[value="+el.id_zona+"]").attr('selected', 'selected');
          $("#id_recinto option[value="+el.id_recinto+"]").attr('selected', 'selected');

          $('#mesa').val(el.mesa);
          $('#habilitados').val(el.habilitados);
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
