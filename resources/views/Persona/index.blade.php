@extends('gamp')


@section('title') Personas @endsection

@section('ventana') Personas
@endsection
@section('descripcion') Administracion de las personas @endsection
@section('titulo')
  <a href="{{asset('index.php')}}" style="color:#000;" accesskey="i"></i> <u>I</u>nicio </a>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a  style="color:#000;" href="#modalAgregar"   data-toggle="modal" class="nuevo" data-target="" accesskey="n"> <li class="fa fa-plus"></li> <u>N</u>uevo Persona </a>
 @endsection

@section('menuPersona')
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
            <label for="id_mesa_" > <b><i>Mesa</i></b> </label>

            <select class="form-control" name="id_mesa" id="id_mesa_" "required" placeholder="Elige">
                @foreach($recintos as  $recinto)
                  <option value="{{$recinto->id}}"> <small>{{$recinto->recinto}} <b>{{$recinto->mesa}}</b> </small> </option>
                @endforeach
            </select>

          </div>
          <div class="col-md-4">
            <label for="ci_" > <b><i>Carnet</i></b> </label>
            {!! Form::text('ci', null, ['class'=>'form-control', 'placeholder'=>'CI', 'id'=>'ci_', 'required']) !!}
          </div>
          <div class="col-md-4">
            <label for="persona_" > <b><i>Nombre Completo</i></b> </label>
            {!! Form::text('persona', null, ['class'=>'form-control', 'placeholder'=>'Nombre Completo', 'id'=>'persona_', 'required']) !!}
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <label for="celular_" > <b><i>Celular</i></b> </label>
            {!! Form::text('celular', null, ['class'=>'form-control', 'placeholder'=>'Celular', 'id'=>'celular_', 'required']) !!}
          </div>
          <div class="col-md-6">
            <label for="codigo_persona_" > <b><i>Codigo</i></b> </label>
            {!! Form::text('codigo_persona', null, ['class'=>'form-control', 'placeholder'=>'codigo', 'id'=>'codigo_persona_', 'required', 'readonly']) !!}
          </div>
            {!! Form::hidden('codigo_celular', '0') !!}
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
                    {!! Form::open(['route'=>['Persona.update', ':DATO_ID'], 'method'=>'PATCH', 'id'=>'form-update' ])!!}
                    <div class="row">
                      <div class="col-md-4">
                        <label for="id_mesa" > <b><i>Mesa</i></b> </label>
                        <select class="form-control" name="id_mesa" id="id_mesa" "required" placeholder="Elige">
                            @foreach($recintos as  $recinto)
                              <option value="{{$recinto->id}}"> <small>{{$recinto->recinto}} <b>{{$recinto->mesa}}</b> </small> </option>
                            @endforeach
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="ci" > <b><i>Carnet</i></b> </label>
                        {!! Form::text('ci', null, ['class'=>'form-control', 'placeholder'=>'CI', 'id'=>'ci', 'required']) !!}
                      </div>
                      <div class="col-md-4">
                        <label for="persona" > <b><i>Nombre Completo</i></b> </label>
                        {!! Form::text('persona', null, ['class'=>'form-control', 'placeholder'=>'Nombre Completo', 'id'=>'persona', 'required']) !!}
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <label for="celular" > <b><i>Celular</i></b> </label>
                        {!! Form::text('celular', null, ['class'=>'form-control', 'placeholder'=>'Celular', 'id'=>'celular', 'required']) !!}
                      </div>
                      <div class="col-md-6">
                        <label for="codigo_persona" > <b><i>Codigo</i></b> </label>
                        {!! Form::text('codigo_persona', null, ['class'=>'form-control', 'placeholder'=>'codigo', 'id'=>'codigo_persona', 'required', 'readonly']) !!}
                      </div>
                        {!! Form::hidden('codigo_celular', '0') !!}
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
      <th>Persona</th>
      <th>Celular</th>
      <th>CI</th>
      <th>Codigo Persona</th>
      <th>Activo</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($datos as $dato)
      @if( $dato->codigo_celular == '0' )
        <tr data-id="{{ $dato->id }}" style="background-color:#f86161;">
      @else
        <tr data-id="{{ $dato->id }}">
      @endif

        <td>{{ $dato->id }}</td>
        <td>{{ $dato->persona }}</td>
        <td>{{ $dato->ci }}</td>
        <td>{{ $dato->celular }}</td>
        <td>  {{ $dato->codigo_persona }}</td>
        <td><small> <b>{{ $dato->codigo_celular }}</b> <br> {{ date('d/m/Y H:i:s', strtotime($dato->updated_at )) }}</small>  </td>

        <td>
          <a href="#modalModifiar"  data-toggle="modal" data-target="" class="btn btn-warning actualizar" style="color: #176F05;"> <li class="fa fa-edit"></li>Editar</a> &nbsp;&nbsp;&nbsp;
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

{!! Form::open(['route'=>['Persona.destroy', ':DATO_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
{!! Form::close() !!}
@endsection

@section('js')
<script type="text/javascript">

  $(document).ready(function(){
    $('#tablaGamp').DataTable({
      "order": [[ 1, 'asc']],
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

  $('#celular_').focus(function(){
    var random  =  parseInt( Math.random() * 100000 );
    $('#codigo_persona_').val( random );
  });

  $('.actualizar').click(function(event){
    event.preventDefault();
    var fila = $(this).parents('tr');
    var id = fila.data('id');
    var form = $('#form-update')
    var url = form.attr('action').replace(':DATO_ID', id);
    form.get(0).setAttribute('action', url);
    link  = '{{ asset("/index.php/Persona/")}}/'+id;
    $.getJSON(link, function(data, textStatus) {
      if(data.length > 0){
        $.each(data, function(index, el) {

          $('#id_mesa').val(el.id_mesa);
          $('#persona').val(el.persona);
          $('#celular').val(el.celular);
          $('#ci').val(el.ci);
          $('#codigo_persona').val(el.codigo_persona);


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
