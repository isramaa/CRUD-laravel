@extends('adminlte::page')
    @section('content')


    <div class="container">
    <div class="row">
        <h2>Realizar un nuevo pedido</h2>
    </div>
    <hr>
    <div class="row">

        <form action="{{ route('pedidos.store') }}" method="post" enctype="multipart/form-data" class="col-lg-7">
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
                <label for="nombre">Nombre del cliente</label>
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
                <label for="estado">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado" value="{{old('estado')}}" >
            </div>

            <div class="form-group">
                <label for="cp">Codigo Postal</label>
                <input type="text" class="form-control" id="cp" name="cp" value="{{old('cp')}}" >
            </div>

            <div class="form-group">
                <label for="producto">Producto</label>
                <input type="text" class="form-control" id="producto" name="producto" value="{{old('producto')}}" >
            </div>

            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="text" class="form-control" id="cantidad" name="cantidad" value="{{old('cantidad')}}" >
            </div>
            
            <div class="form-group">
                <label for="total">Total</label>
                <input type="text" class="form-control" id="total" name="total" value="{{old('total')}}" >
            </div>
            
            <button type="submit" class="btn btn-success">Guardar pedido</button>
    {{--            <button href="{{ route('pedidos.index') }}" class="btn btn-succes" id="btn-return">Lista de pedidos</button>
    --}}       </form>
    </div>

        <div class="row mt-3">
            <a href="{{ route('pedidos.index') }}" class="btn btn-succes" id="btn-return">Lista de pedidos</a>
        </div>

    </div>
    @endsection
		