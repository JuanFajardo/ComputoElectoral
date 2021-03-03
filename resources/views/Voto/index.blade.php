@extends('gamp')


@section('title') Votos @endsection

@section('ventana') Votos
@endsection
@section('descripcion') Administracion de los votos @endsection
@section('titulo')
  <a href="{{asset('index.php')}}" style="color:#000;" accesskey="i"></i> <u>I</u>nicio </a>

 @endsection

@section('menuProyecto')
 class="active-menu"
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
                    {!! Form::open(['route'=>['Voto.update', ':DATO_ID'], 'method'=>'PATCH', 'id'=>'form-update' ])!!}

                    <div class="row">
                        {!! Form::hidden('id', null, ['class'=>'form-control', 'placeholder'=>'', 'id'=>'idVoto', 'required']) !!}
                        {!! Form::hidden('id_persona', null, ['class'=>'form-control', 'placeholder'=>'', 'id'=>'id_persona', 'required']) !!}
                        {!! Form::hidden('id_mesa', null, ['class'=>'form-control', 'placeholder'=>'', 'id'=>'id_mesa', 'required']) !!}
                      <div class="col-md-6">
                        <label for="mesa" > <b><i>Recinto y Mesa</i></b> </label>
                        {!! Form::text('mesa', null, ['class'=>'form-control', 'placeholder'=>'', 'id'=>'mesa', 'required']) !!}
                      </div>
                      <div class="col-md-6">
                        <label for="persona" > <b><i>Apertura</i></b> </label>
                        {!! Form::text('persona', null, ['class'=>'form-control', 'placeholder'=>'Apertura', 'id'=>'persona', 'required']) !!}
                      </div>
                    </div>

                    <div class="row">

                      <div class="col-md-12">
                        <center><img  id="imagen" width="450"></center>
                      </div>

                    </div>


                    <div class="row">
                      <div class="col-md-2">
                        <label for="als" > <b><i>AS</i></b> </label>
                        {!! Form::text('als', null, ['class'=>'voto form-control', 'placeholder'=>' ', 'id'=>'als', 'required']) !!}
                      </div>
                      <div class="col-md-2">
                        <label for="cc" > <b><i>cc</i></b> </label>
                        {!! Form::text('cc', null, ['class'=>'voto form-control', 'placeholder'=>' ', 'id'=>'cc', 'required']) !!}
                      </div>
                      <div class="col-md-2">
                        <label for="mas" > <b><i>mas</i></b> </label>
                        {!! Form::text('mas', null, ['class'=>'voto form-control', 'placeholder'=>' ', 'id'=>'mas', 'required']) !!}
                      </div>
                      <div class="col-md-2">
                        <label for="adn" > <b><i>adn</i></b> </label>
                        {!! Form::text('adn', null, ['class'=>'voto form-control', 'placeholder'=>' ', 'id'=>'adn', 'required']) !!}
                      </div>
                      <div class="col-md-2">
                        <label for="jap" > <b><i>jap</i></b> </label>
                        {!! Form::text('jap', null, ['class'=>'voto form-control', 'placeholder'=>' ', 'id'=>'jap', 'required']) !!}
                      </div>
                      <div class="col-md-2">
                        <label for="mcp" > <b><i>mcp</i></b> </label>
                        {!! Form::text('mcp', null, ['class'=>'voto form-control', 'placeholder'=>' ', 'id'=>'mcp', 'required']) !!}
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-2">
                        <label for="ucs" > <b><i>ucs</i></b> </label>
                        {!! Form::text('ucs', null, ['class'=>'voto form-control', 'placeholder'=>' ', 'id'=>'ucs', 'required']) !!}
                      </div>
                      <div class="col-md-2">
                        <label for="puka" > <b><i>puka</i></b> </label>
                        {!! Form::text('puka', null, ['class'=>'voto form-control', 'placeholder'=>' ', 'id'=>'puka', 'required']) !!}
                      </div>
                      <div class="col-md-2">
                        <label for="mds" > <b><i>mds</i></b> </label>
                        {!! Form::text('mds', null, ['class'=>'voto form-control', 'placeholder'=>' ', 'id'=>'mds', 'required']) !!}
                      </div>
                      <div class="col-md-2">
                        <label for="mts" > <b><i>adn</i></b> </label>
                        {!! Form::text('mts', null, ['class'=>'voto form-control', 'placeholder'=>' ', 'id'=>'mts', 'required']) !!}
                      </div>
                      <div class="col-md-2">
                        <label for="fpv" > <b><i>jap</i></b> </label>
                        {!! Form::text('fpv', null, ['class'=>'voto form-control', 'placeholder'=>' ', 'id'=>'fpv', 'required']) !!}
                      </div>
                      <div class="col-md-2">
                        <label for="mop" > <b><i>mop</i></b> </label>
                        {!! Form::text('mop', null, ['class'=>'voto form-control', 'placeholder'=>' ', 'id'=>'mop', 'required']) !!}
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-2">
                        <label for="pan" > <b><i>pan</i></b> </label>
                        {!! Form::text('pan', null, ['class'=>'voto form-control', 'placeholder'=>' ', 'id'=>'pan', 'required']) !!}
                      </div>
                      <div class="col-md-3">
                        <label for="nulo" > <b><i>nulo</i></b> </label>
                        {!! Form::text('nulo', null, ['class'=>'voto form-control', 'placeholder'=>' ', 'id'=>'nulo', 'required']) !!}
                      </div>
                      <div class="col-md-3">
                        <label for="blanco" > <b><i>blanco</i></b> </label>
                        {!! Form::text('blanco', null, ['class'=>'voto form-control', 'placeholder'=>' ', 'id'=>'blanco', 'required']) !!}
                      </div>
                      <div class="col-md-4">
                        <label for="total" > <b><i>total</i></b> </label>
                        {!! Form::text('total', null, ['class'=>'form-control', 'placeholder'=>' ', 'id'=>'total', 'required']) !!}
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
      <th>Tipo</th>
      <th>Zona</th>
      <th>Recinto</th>
      <th>Mesa</th>
      <th>Suma de Votos</th>
      <th>Total Votantes</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($datos as $dato)
    @if( $dato->total > $dato->habilitados )
      <tr data-id="{{ $dato->id }}" style="background-color:#F87979;">
    @elseif( $dato->total == "0" )
      <tr data-id="{{ $dato->id }}" style="background-color:#ffcc5e;">
    @elseif($dato->observacion == "nada" )
      <tr data-id="{{ $dato->id }}" style="background-color:#4d8933;">
    @else
      <tr data-id="{{ $dato->id }}">
    @endif
        <td>{{ $dato->tipo }}</td>
        <td>{{ $dato->zona }}</td>
        <td>{{ $dato->recinto }}</td>
        <td>{{ $dato->mesa }}</td>
        <td>{{ $dato->total }}</td>
        <td>{{ $dato->habilitados }}</td>
        <td>
          <a href="#modalModifiar"  data-toggle="modal" data-target="" class="actualizar btn btn-warning" style="color: #176F05;"> <li class="fa fa-edit"></li></a> &nbsp;&nbsp;&nbsp;
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
{!! Form::open(['route'=>['Voto.destroy', ':DATO_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
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

  $('.voto').focus(function(){
    var total = parseInt($('#pan').val()) + parseInt($('#als').val()) + parseInt($('#cc').val()) + parseInt($('#mas').val()) + parseInt($('#adn').val()) + parseInt($('#jap').val()) + parseInt($('#mcp').val()) + parseInt($('#ucs').val()) + parseInt($('#puka').val()) +  parseInt($('#mds').val()) +  parseInt($('#mts').val()) +  parseInt($('#fpv').val()) + parseInt($('#mop').val()) +  parseInt($('#nulo').val()) +  parseInt($('#blanco').val());
    $('#total').val(total);
  })
  $('.actualizar').click(function(event){
    event.preventDefault();
    var fila = $(this).parents('tr');
    var id = fila.data('id');
    var form = $('#form-update')
    var url = form.attr('action').replace(':DATO_ID', id);
    form.get(0).setAttribute('action', url);
    link  = '{{ asset("/index.php/Voto/votoVer/")}}/'+id;
    $.getJSON(link, function(data, textStatus) {
      if(data.length > 0){
        $.each(data, function(index, el) {

            $('#idVoto').val(el.votoId);

          $('#id_mesa').val(el.id_mesa);
          $('#id_persona').val(el.id_persona);
          $('#als').val(el.als);
          $('#cc').val(el.cc);
          $('#pan').val(el.pan);
          $('#mas').val(el.mas);
          $('#adn').val(el.adn);
          $('#jap').val(el.jap);
          $('#mcp').val(el.mcp);
          $('#ucs').val(el.ucs);
          $('#puka').val(el.puka);
          $('#mds').val(el.mds);
          $('#mts').val(el.mts);
          $('#fpv').val(el.fpv);
          $('#mop').val(el.mop);
          $('#nulo').val(el.nulo);
          $('#blanco').val(el.blanco);
          $('#total').val(el.total);

          $('#mesa').val(el.recinto+" "+el.mesa);
          $('#persona').val(el.persona);
          $('#observacion').val(el.observacion);


          var ruta= "{{asset('/voto/')}}";
          $('#imagen').attr('src', ruta+'/'+el.acta);

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
