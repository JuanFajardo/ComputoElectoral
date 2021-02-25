@extends('gamp')


@section('title') Proyectos @endsection

@section('ventana') Proyectos
@endsection
@section('descripcion') Administracion de los proyectos @endsection
@section('titulo')
  <a href="{{asset('index.php')}}" style="color:#fff;" accesskey="i"></i> <u>I</u>nicio </a>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a  style="color:#fff;" href="#modalAgregar"   data-toggle="modal" class="nuevo" data-target="" accesskey="n"> <li class="fa fa-plus"></li> <u>N</u>uevo Proyecto </a>
 @endsection

@section('menuProyecto')
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
        <div class="row">
          <div class="col-md-4">
            <label for="apertura_" > <b><i>Apertura</i></b> </label>
            {!! Form::text('apertura', null, ['class'=>'form-control', 'placeholder'=>'Apertura', 'id'=>'apertura_', 'required']) !!}
          </div>
          <div class="col-md-8">
            <label for="actividad_" > <b><i>Actividad</i></b> </label>
            {!! Form::text('actividad', null, ['class'=>'form-control', 'placeholder'=>'Actividad', 'id'=>'actividad_', 'required']) !!}
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <label for="distrito_" > <b><i>Distrito</i></b> </label>
            {!! Form::select('distrito', ['-1'=>'Chasquivillque', '0'=>'MD', '1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5', '6'=>'6', '7'=>'7', '8'=>'8', '9'=>'9', '10'=>'10', '11'=>'11', '12'=>'12', '13'=>'13', '14'=>'14', '15'=>'15', '16'=>'16', '17'=>'17', '18'=>'18', '19'=>'19', '20'=>'20' ], null, ['class'=>'form-control', 'placeholder'=>' ', 'id'=>'distrito_', 'required']) !!}
          </div>
          <div class="col-md-8">
            <label for="presupuesto_" > <b><i>Presupuesto</i></b> </label>
            {!! Form::text('presupuesto', null, ['class'=>'form-control', 'placeholder'=>'Presupuesto', 'id'=>'presupuesto_', 'required']) !!}
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
                    {!! Form::open(['route'=>['Proyecto.update', ':DATO_ID'], 'method'=>'PATCH', 'id'=>'form-update' ])!!}
                    <div class="row">
                      <div class="col-md-4">
                        <label for="apertura" > <b><i>Apertura</i></b> </label>
                        {!! Form::text('apertura', null, ['class'=>'form-control', 'placeholder'=>'Apertura', 'id'=>'apertura', 'required']) !!}
                      </div>
                      <div class="col-md-8">
                        <label for="actividad" > <b><i>Actividad</i></b> </label>
                        {!! Form::text('actividad', null, ['class'=>'form-control', 'placeholder'=>'Actividad', 'id'=>'actividad', 'required']) !!}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <label for="distrito" > <b><i>Distrito</i></b> </label>
                        {!! Form::select('distrito', ['1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5', '6'=>'6', '7'=>'7', '8'=>'8', '9'=>'9', '10'=>'10', '11'=>'11', '12'=>'12', '13'=>'13', '14'=>'14', '15'=>'15', '16'=>'16', '17'=>'17', '18'=>'18', '19'=>'19', '20'=>'20' ], null, ['class'=>'form-control', 'placeholder'=>' ', 'id'=>'distrito', 'required']) !!}
                      </div>
                      <div class="col-md-8">
                        <label for="presupuesto" > <b><i>Presupuesto</i></b> </label>
                        {!! Form::text('presupuesto', null, ['class'=>'form-control', 'placeholder'=>'Presupuesto', 'id'=>'presupuesto', 'required']) !!}
                      </div>
                    </div>
                    <br><br>
                    <div class="row">
                      <div class="col-md-12">
                        <label for="Observacion" > <b><i>Observacion</i></b> </label>
                        {!! Form::text('observacion', null, ['class'=>'form-control', 'placeholder'=>'Observacion', 'id'=>'observacion', 'required']) !!}
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
      <th>Apertura</th>
      <th>Actividad</th>
      <th>Distrito</th>
      <th>Presupuesto</th>
      <th>Gastado</th>
      <th>Total</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($datos as $dato)
      <tr data-id="{{ $dato->id }}">
        <td>{{ $dato->id }}</td>
        <td>{{ $dato->apertura }}</td>
        <td>{{ $dato->actividad }}</td>
        <td>Dist.
            @if ($dato->distrito == "0")
            MD
            @else
              {{ $dato->distrito }}
            @endif
        </td>
        <td>{{ number_format($dato->presupuesto,2,",",".") }}</td>
        <td>{{ number_format($dato->gastado,2,",",".") }}</td>
        <td>{{ number_format($dato->total,2,",",".") }}</td>
        <td>
          <a href="#modalModifiar"  data-toggle="modal" data-target="" class="actualizar" style="color: #B8823B;"> <li class="fa fa-edit"></li>Editar</a> &nbsp;&nbsp;&nbsp;
          <a href="#"  data-toggle="modal" data-target="" style="color: #ff0000;" class="eliminar"> <li class="fa fa-trash"></li>Eliminar</a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

{!! Form::open(['route'=>['Proyecto.destroy', ':DATO_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
{!! Form::close() !!}
@endsection

@section('js')
<script type="text/javascript">
  $(document).ready(function(){
    $('#tablaGamp').DataTable({
      "order": [[ 7, 'asc']],
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
