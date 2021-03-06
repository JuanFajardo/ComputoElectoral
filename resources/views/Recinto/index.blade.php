@extends('gamp')

@section('title') Recintos @endsection

@section('ventana') Recintos
@endsection
@section('descripcion') Administracion de los recintos @endsection
@section('titulo')
  <a href="{{asset('index.php')}}" style="color:#000;" accesskey="i"></i> <u>I</u>nicio </a>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a  style="color:#000;" href="#modalAgregar"   data-toggle="modal" class="nuevo" data-target="" accesskey="n"> <li class="fa fa-plus"></li> <u>N</u>uevo Recinto </a>
 @endsection

@section('menuRecinto')
 class="active-menu"
@endsection

@section('modal1')
<div id="modalAgregar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content panel panel-primary">
      <div class="modal-header panel-heading">
        <b>Nuevo</b>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body panel-body">
        {!! Form::open(['accept-charset'=>'UTF-8', 'enctype'=>'multipart/form-data', 'method'=>'POST', 'files'=>true, 'autocomplete'=>'off', 'id'=>'form-insert'] ) !!}


        {!! Form::hidden('id_departamento', '1') !!}
        {!! Form::hidden('id_provincia', '1') !!}
        {!! Form::hidden('id_circ', '1') !!}
        {!! Form::hidden('id_municipio', '1') !!}

        <div class="row">
          <div class="col-md-4">
            <label for="id_distrito_" > <b><i>Distrito</i></b> </label><br>
            {!! Form::select('id_distrito', \App\Distrito::pluck('distrito', 'id'), null, ['class'=>'form-control', 'placeholder'=>' ', 'id'=>'id_distrito_', 'required']) !!}
          </div>
          <div class="col-md-4">
            <label for="id_zona_" > <b><i>Zona</i></b> </label><br>
            {!! Form::select('id_zona', \App\Zona::pluck('zona', 'id'), null, ['class'=>'selectpicker', 'data-live-search'=>'true', 'placeholder'=>' ', 'id'=>'id_zona_', 'required']) !!}
          </div>
          <div class="col-md-4">
            <label for="recinto_" > <b><i>Recinto</i></b> </label><br>
            {!! Form::text('recinto', null, ['class'=>'form-control', 'placeholder'=>'Recinto', 'id'=>'recinto_', 'required']) !!}
          </div>
        </div>




        <hr>
        {!! Form::hidden('id_user', '1') !!}
        {!! Form::submit('A&ntilde;adir', ['class'=>'agregar btn btn-primary']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection

@section('modal2')
    <div id="modalModifiar" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content panel panel-warning ">
                <div class="modal-header panel-heading">
                    <b>Actualizar </b>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body panel-body">
                    {!! Form::open(['route'=>['Recinto.update', ':DATO_ID'], 'method'=>'PATCH', 'id'=>'form-update' ])!!}

                   {!! Form::hidden('id_departamento', '1') !!}
                   {!! Form::hidden('id_provincia', '1') !!}
                   {!! Form::hidden('id_circ', '1') !!}
                   {!! Form::hidden('id_municipio', '1') !!}

                   <div class="row">
                     <div class="col-md-4">
                       <label for="id_distrito_" > <b><i>Distrito</i></b> </label><br>
                       {!! Form::select('id_distrito', \App\Distrito::pluck('distrito', 'id'), null, ['class'=>'form-control', 'placeholder'=>' ', 'id'=>'id_distrito', 'required']) !!}
                     </div>
                     <div class="col-md-4">
                       <label for="id_zona_" > <b><i>Zona</i></b> </label><br>
                       {!! Form::select('id_zona', \App\Zona::pluck('zona', 'id'), null, ['class'=>'selectpicker', 'data-live-search'=>'true', 'placeholder'=>' ', 'id'=>'id_zona', 'required']) !!}
                     </div>
                     <div class="col-md-4">
                       <label for="recinto_" > <b><i>Recinto</i></b> </label><br>
                       {!! Form::text('recinto', null, ['class'=>'form-control', 'placeholder'=>'Recinto', 'id'=>'recinto', 'required']) !!}
                     </div>
                   </div>


                    <hr>
                    {!! Form::hidden('id_user', '1') !!}
                    {!! Form::submit('Actualizar ', ['class'=>'btn btn-warning']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
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
      <th>Distrito</th>
      <th>Zona</th>
      <th>Recinto</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($datos as $dato)
      <tr data-id="{{ $dato->id }}">

        <td>{{ $dato->id }}</td>
        <td>{{ $dato->distrito }}</td>
        <td>{{ $dato->zona }}</td>
        <td>{{ $dato->recinto }}</td>

        <td>
          <a href="#modalModifiar"  data-toggle="modal" data-target="" class="btn btn-warning actualizar" style="color: #176F05;"> <li class="fa fa-edit"></li>Editar</a> &nbsp;&nbsp;&nbsp;
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

{!! Form::open(['route'=>['Recinto.destroy', ':DATO_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
{!! Form::close() !!}
@endsection

@section('js')
<script type="text/javascript">
  $('.my-select').selectpicker();
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
    link  = '{{ asset("/index.php/Recinto/")}}/'+id;
    $.getJSON(link, function(data, textStatus) {
      if(data.length > 0){
        $.each(data, function(index, el) {
          $('#id_distrito').val(el.id_distrito);
          $('#id_zona').val(el.id_zona);
          $('#recinto').val(el.recinto);
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
