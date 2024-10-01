@extends('adminlte::page')
@section('content')
<div class="container">
   <div class="row">
       <h2>Editar producto</h2>
</div>
<hr>
<div class="row">
       <form action="{{ route('productos.update', $productos->id) }}" method="post" enctype="multipart/form-data" class="col-lg-7">
           @csrf <!-- Protección contra ataques ya implementado en laravel  https://www.welivesecurity.com/la-es/2015/04/21/vulnerabilidad-cross-site-request-forgery-csrf/-->
           @method('PUT')
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
            <label for="nombre">Nombre del producto</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}" />
        </div>

        <div class="form-group">
            <label for="tipo">Tipo</label>
            <input type="text" class="form-control" id="tipo" name="tipo" value="{{old('tipo')}}" >
        </div>

        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="modelo" value="{{old('modelo')}}" >
        </div>

         <div class="form-group">
            <label for="precio">Precio</label>
            <input type="text" class="form-control" id="precio" name="precio" value="{{old('precio')}}" >
        </div>

         <div class="form-group">
            <label for="detalles">Detalles</label>
            <input type="text" class="form-control" id="detalles" name="detalles" value="{{old('detalles')}}" >
        </div>


        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion">{{old('descripcion')}}</textarea>
        </div>

        <div class="form-group">
            <label for="existencia">Existencia</label>
            <input type="text" class="form-control" id="existencia" name="existencia" value="{{old('existencia')}}" >
        </div>
        
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" id="status" name="status" value="{{old('status')}}" >
        </div>
           
           <button type="submit" class="btn btn-success">Guardar producto</button>
           <button href="{{ route('productos.index') }}" class="btn btn-primary" id="btn-return">Lista de productos</button>
       </form>

       {{-- <div class="row mt-3">
        <a href="{{ route('productos.index') }}" class="btn btn-primary" id="btn-return">Lista de productos</a>
    </div> --}}
   </div>
</div>
@endsection