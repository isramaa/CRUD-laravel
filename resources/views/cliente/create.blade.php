@extends('adminlte::page')
@section('content')
<div class="container">
   <div class="row">
       <h2>Crear un nuevo cliente</h2>
</div>
<div class="row">
       <hr>
       <form action="{{ route('clientes.store') }}" method="post" enctype="multipart/form-data" class="col-lg-7">
           @csrf <!-- Protección contra ataques ya implementado en laravel  https://www.welivesecurity.com/la-es/2015/04/21/vulnerabilidad-cross-site-request-forgery-csrf/-->
           @if($errors->any())
               <div class="alert alert-danger">
                   <ul>
                       @foreach($errors->all() as $error)
                           <li>{{$error}}</li>
                       @endforeach
                   </ul>
               </div>
           @endif


           <div class="form-group">
               <label for="nombre">Nombre</label>
               <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}" />
           </div>

           <div class="form-group">
               <label for="apellidos">Apellidos</label>
               <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{old('apellidos')}}" >
           </div>

           <div class="form-group">
               <label for="correo">Correo</label>
               <input type="text" class="form-control" id="correo" name="correo" value="{{old('correo')}}" >
           </div>

            <div class="form-group">
               <label for="telefono">Telefono</label>
               <input type="text" class="form-control" id="telefono" name="telefono" value="{{old('telefono')}}" >
           </div>


            <div class="form-group">
               <label for="calle">Calle</label>
               <input type="text" class="form-control" id="calle" name="calle" value="{{old('calle')}}" >
           </div>


           <div class="form-group">
               <label for="ciudad">Ciudad</label>
               <input type="text" class="form-control" id="ciudad" name="ciudad" value="{{old('ciudad')}}" >
           </div>

           <div class="form-group">
               <label for="estatus">Estado</label>
               <input type="text" class="form-control" id="estatus" name="estatus" value="{{old('estatus')}}" >
           </div>
           
           <div class="form-group">
               <label for="cp">Codigo postal</label>
               <input type="text" class="form-control" id="cp" name="cp" value="{{old('cp')}}" >
           </div>

            {{-- <div class="form-group">
            <label for="id_usuario">id_usuario</label>
            <input type="text" class="form-control" id="id_usuario" name="id_usuario" value="{{old('id_usuario')}}" >
            </div> --}}

            <div class="form-group">
                <label for="estado">EstadoC</label>
                <input type="text" class="form-control" id="estado" name="estado" value="{{old('estado')}}" >
            </div>
           
           <button type="submit" class="btn btn-success">Guardar cliente</button>

        <p align="right">
        <a href="{{ route('clientes.index') }}" class="btn btn-primary">Regresar</a>
        </p>
       </form>
   </div>
</div>
@endsection