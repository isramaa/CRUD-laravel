<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Barry\DomPDF\Facade as PDF;

class ProductoController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*  $productos = Productos::all();

        return view('producto.index', compact('productos')); */

        //Muestra los registros de la tabla
       $vs_productos = Producto::where('status', '=', 1)
       ->get();
       $productos = $this->cargarDT($vs_productos);
       return view('producto.index')->with('productos', $productos);
    }

    public function cargarDT($consulta){
        $productos = [];
        foreach ($consulta as $key => $value) {
            $ruta = "eliminar" . $value['id'];
            $eliminar = route('productoDelete', $value['id']);
          $actualizar = route('productos.edit', $value['id']);
            $acciones = '
           <div class="btn-acciones">
               <div class="btn-circle">
                   <a href="' . $actualizar . '" role="button" class="btn btn-success" title="Actualizar">
                       <i class="far fa-edit"></i>
                   </a>
                    <a role="button" class="btn btn-danger" onclick="modal('.$value['id'].')" data-bs-toggle="modal" data-bs-target="#exampleModal"">
                       <i class="far fa-trash-alt"></i>
                   </a>
               </div>
           </div>';
 
 
            $productos[$key] = array(
                $acciones,
                $value['id'],
                $value['nombre'],
                $value['tipo'],
                $value['modelo'],
                $value['precio'],
                $value['detalles'],
                $value['descripcion'],
                $value['existencia'],
                $value['status']
            );
        }
        return $productos;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        //Guarda el registro capturado en el formulario de alta
        $this->validate($request, [
            'nombre' => 'required|min:5',
            'tipo' => 'required',
            'modelo' => 'required',
            'precio' => 'required',
            'detalles' => 'required',
            'descripcion' => 'required',
            'existencia' => 'required'
        ]);
        $producto = new Producto();
        $producto -> nombre = $request->input('nombre');
        $producto -> tipo = $request->input('tipo');
        $producto -> modelo = $request->input('modelo');
        $producto -> precio = $request->input('precio');
        $producto -> detalles = $request->input('detalles');
        $producto -> descripcion = $request->input('descripcion');
        $producto -> existencia = $request->input('existencia');
        $producto->status = 1;
        $producto->save();
        return redirect()->route('productos.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         //Abrir formulario
         $productos = producto::findOrFail($id);
         return view('producto.edit', array(
             'productos' => $productos
         ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Guarda un registro modificado
        //Guarda la información del formulario de edición
        $this->validate($request, [
            'nombre' => 'required|min:5',
            'tipo' => 'required',
            'modelo' => 'required',
            'precio' => 'required',
            'detalles' => 'required',
            'descripcion' => 'required',
            'existencia' => 'required'
    ]);
        $producto = Producto::findOrFail($id);
        $producto -> nombre = $request->input('nombre');
        $producto -> tipo = $request->input('tipo');
        $producto -> modelo = $request->input('modelo');
        $producto -> precio = $request->input('precio');
        $producto -> detalles = $request->input('detalles');
        $producto -> descripcion = $request->input('descripcion');
        $producto -> existencia = $request->input('existencia');
        $producto->status = 1;
        $producto->save();
        return redirect()->route('productos.index')->with(array(
        'message' => 'El producto se ha actualizado correctamente'
));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function deleteProducto($id){
        $producto = producto::find($id);
        if($producto){
            $producto->status = 0;
            $producto->update();
            return redirect()->route('productos.index')->with(array(
                "message" => "El producto se ha eliminado correctamente"));
        }else{
            return redirect()->route('productos.index')->with(array(
                "message" => "El producto que trata de eliminar no existe"));
        } //Fin del IF
     
    }

    public function imprimirPro(){
        $productos = Producto::all();
        $pdf = \PDF::loadView('ejemploPro', compact('productos'));
        return $pdf->download('productos.pdf');

/*         $pdf = \PDF::loadView('ejemplo');
        return $pdf->download('ejemplo.pdf'); */
   

        /* $today = Carbon::now()->format('d/m/y');
        $pdf = \PDF::loadView('ejemplo', compact('today'));
        return $pdf->download('ejemplo.pdf'); */
    }

}
