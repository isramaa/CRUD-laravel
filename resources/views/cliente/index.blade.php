@extends('adminlte::page')
@section('content')
@section('css')

<link rel="stylesheet" href="{{asset('build/assets/app.css')}}">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="{{asset('build/assets/app.js')}}"></script>

@endsection
<div class="container">
   <div class="row">
       @if (session('message'))
           <div class="alert alert-success">
               {{ session('message') }}
           </div>
       @endif
   </div>
   <div class="row">
       <h2>Lista de clientes </h2>

       <hr>
       <br>
       <p align="right">
           <a href="{{ route('cliente.create') }}" class="btn btn-success">Crear Cliente</a>
           <a href="{{ route('home') }}" class="btn btn-primary">Regresar</a>
           <a href="{{ route('imprimirCli') }}" class="btn btn-primary">Imprimir</a>
       </p>
       <table id="example" class="table table-striped table-bordered" style="width:100%">
           <thead>
               <tr>
                   <th>Acciones</th>
                   <th>Id Cliente</th>
                   <th>Nombre</th>
                   <th>Apellidos</th>
                   <th>Correo</th>
                   <th>Telefono</th>
                   <th>Calle</th>
                   <th>Ciudad</th>
                   <th>Estado</th>
                   <th>Cp</th>

               </tr>
           </thead>
           <tbody>

           </tbody>
       </table>
   </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
 <div class="modal-content">
   <div class="modal-header">
     <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div class="modal-body">
     <span id="nombre"></span>
   
   </div>
   <div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
     <a href="/delete-cliente/" id="borrar" class="btn btn-danger">borrar</a>
   
   </div>
 </div>
</div>
</div>
@endsection
<!-- Button trigger modal -->

@section('js')

<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
<script type="text/javascript">
function modal(parametro){
console.log(parametro);
$('#nombre').html(parametro);

let url = "{{route('clienteDelete', ':id')}}";
url = url.replace(':id',parametro);
document.getElementById('borrar').href= url;

}
var data = @json($clientes);

$(document).ready(function() {
   $('#example').DataTable({
       "data": data,
       "pageLength": 100,
       "order": [
           [0, "desc"]
       ],
       "language": {
           "sProcessing": "Procesando...",
           "sLengthMenu": "Mostrar _MENU_ registros",
           "sZeroRecords": "No se encontraron resultados",
           "sEmptyTable": "Ningún dato disponible en esta tabla",
           "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
           "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
           "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
           "sInfoPostFix": "",
           "sSearch": "Buscar:",
           "sUrl": "",
           "sInfoThousands": ",",
           "sLoadingRecords": "Cargando...",
           "oPaginate": {
               "sFirst": "Primero",
               "sLast": "Último",
               "sNext": "Siguiente",
               "sPrevious": "Anterior"
           },
           "oAria": {
               "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
               "sSortDescending": ": Activar para ordenar la columna de manera descendente"
           }
       },
       responsive: true,
       // dom: 'Bfrtip',
       dom: '<"col-xs-3"l><"col-xs-5"B><"col-xs-4"f>rtip',
       buttons: [
           'copy', 'excel',
           {
               extend: 'pdfHtml5',
               orientation: 'landscape',
               pageSize: 'LETTER',
           }
       ]
   })
});

jQuery.extend(jQuery.fn.dataTableExt.oSort, {
   "portugues-pre": function(data) {
       var a = 'a';
       var e = 'e';
       var i = 'i';
       var o = 'o';
       var u = 'u';
       var c = 'c';
       var special_letters = {
           "Á": a,
           "á": a,
           "Ã": a,
           "ã": a,
           "À": a,
           "à": a,
           "É": e,
           "é": e,
           "Ê": e,
           "ê": e,
           "Í": i,
           "í": i,
           "Î": i,
           "î": i,
           "Ó": o,
           "ó": o,
           "Õ": o,
           "õ": o,
           "Ô": o,
           "ô": o,
           "Ú": u,
           "ú": u,
           "Ü": u,
           "ü": u,
           "ç": c,
           "Ç": c
       };
       for (var val in special_letters)
           data = data.split(val).join(special_letters[val]).toLowerCase();
       return data;
   },
   "portugues-asc": function(a, b) {
       return ((a < b) ? -1 : ((a > b) ? 1 : 0));
   },
   "portugues-desc": function(a, b) {
       return ((a < b) ? 1 : ((a > b) ? -1 : 0));
   }
});
//"columnDefs": [{ type: 'portugues', targets: "_all" }],
</script>
@endsection