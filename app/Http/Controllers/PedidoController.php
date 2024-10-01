<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use Barry\DomPDF\Facade as PDF;

class PedidoController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Muestra los registros de la tabla
       $vs_pedidos = Pedido::where('status', '=', 1)->get();
       $pedidos = $this->cargarDT($vs_pedidos);
       return view('pedido.index')->with('pedidos', $pedidos);
    }

    public function cargarDT($consulta){
        $pedidos = [];
        foreach ($consulta as $key => $value) {
            $ruta = "eliminar" . $value['id'];
            $eliminar = route('pedidoDelete', $value['id']);
            $actualizar = route('pedidos.edit', $value['id']);
            $acciones = '
                <div class="btn-acciones">
                    <div class="btn-circle">
                        <a href="' . $actualizar . '" role="button" class="btn btn-success" title="Actualizar">
                            <i class="far fa-edit"></i>
                        </a>
                        <a role="button" class="btn btn-danger" onclick="modal(' . $value['id'] . ')" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </div>
                </div>';

            $pedidos[$key] = array(
                $acciones,
                $value['id'],
                $value['nombre'],
                $value['apellidos'],
                $value['correo'],
                $value['telefono'],
                $value['calle'],
                $value['ciudad'],
                $value['estado'],
                $value['cp'],
                $value['producto'],
                $value['cantidad'],
                $value['total'],
                $value['status']
            );
        }
        return $pedidos;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pedido.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        // Guarda el registro capturado en el formulario de alta
        $this->validate($request, [
            'nombre' => 'required|min:5',
            'apellidos' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
            'calle' => 'required',
            'ciudad' => 'required',
            'estado' => 'required',
            'cp' => 'required',
            'producto' => 'required',
            'cantidad' => 'required',
            'total' => 'required'
        ]);
        $pedido = new Pedido();
        $pedido->nombre = $request->input('nombre');
        $pedido->apellidos = $request->input('apellidos');
        $pedido->correo = $request->input('correo');
        $pedido->telefono = $request->input('telefono');
        $pedido->calle = $request->input('calle');
        $pedido->ciudad = $request->input('ciudad');
        $pedido->estado = $request->input('estado');
        $pedido->cp = $request->input('cp');
        $pedido->producto = $request->input('producto');
        $pedido->cantidad = $request->input('cantidad');
        $pedido->total = $request->input('total');
        $pedido->status = 1;
        $pedido->save();
        return redirect()->route('pedidos.index');
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
        // Abrir formulario
        $pedido = Pedido::findOrFail($id);
        return view('pedido.edit', compact('pedido'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Guarda un registro modificado
        // Guarda la información del formulario de edición
        $this->validate($request, [
            'nombre' => 'required|min:5',
            'apellidos' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
            'calle' => 'required',
            'ciudad' => 'required',
            'estado' => 'required',
            'cp' => 'required',
            'producto' => 'required',
            'cantidad' => 'required',
            'total' => 'required'
        ]);

        $pedido = Pedido::findOrFail($id);
        $pedido->nombre = $request->input('nombre');
        $pedido->apellidos = $request->input('apellidos');
        $pedido->correo = $request->input('correo');
        $pedido->telefono = $request->input('telefono');
        $pedido->calle = $request->input('calle');
        $pedido->ciudad = $request->input('ciudad');
        $pedido->estado = $request->input('estado');
        $pedido->cp = $request->input('cp');
        $pedido->producto = $request->input('producto');
        $pedido->cantidad = $request->input('cantidad');
        $pedido->total = $request->input('total');
        $pedido->status = 1;
        $pedido->save();
        
        return redirect()->route('pedidos.index')->with('message', 'El Pedido se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function deletePedido($id){
        $pedido = Pedido::find($id);
        if($pedido){
            $pedido->status = 0;
            $pedido->update();
            return redirect()->route('pedidos.index')->with('message', 'El pedido se ha eliminado correctamente');
        } else {
            return redirect()->route('pedidos.index')->with('message', 'El pedido que trata de eliminar no existe');
        }
    }

    public function imprimirPed(){
        $pedidos = Pedido::all();
        $pdf = \PDF::loadView('ejemploPed', compact('pedidos'));
        return $pdf->download('pedidos.pdf');
    }
}
