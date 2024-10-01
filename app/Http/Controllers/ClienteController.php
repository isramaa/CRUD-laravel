<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Barry\DomPDF\Facade as PDF;
use GuzzeHttp\Client;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Mostrar todos los registros de la tabla
        //Muestra los registros de la tabla
       $vs_cliente = Cliente::where('EstadoC', '=', 1)
       ->get();
       $cliente = $this->cargarDT($vs_cliente);
       return view('cliente.index')->with('clientes', $cliente);
    }

    public function cargarDT($consulta){
        $cliente = [];
        foreach ($consulta as $key => $value) {
            $ruta = "eliminar" . $value['id'];
            $eliminar = route('clienteDelete', $value['id']);
            $actualizar = route('clientes.edit', $value['id']);
            /*$actualizar = route('cliente.edit', $value['id']);*/
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
 
 
            $cliente[$key] = array(
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
                $value['EstadoC']
 
            );
        }
        return $cliente;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        //Abrir un formulario para crear un nuevo registro
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        //Guarda el registro capturado de un formulario
        $this->validate($request, [
            'nombre' => 'required|min:5',
            'apellidos' => 'required',
            'correo' => 'required'
        ]);
        $cliente = new Cliente();//cambiar nombre de controlador
        $cliente->nombre = $request->input('nombre');
        $cliente->apellidos = $request->input('apellidos');
        $cliente->correo = $request->input('correo');
        $cliente->telefono = $request->input('telefono',200);
        $cliente->calle = $request->input('calle',200);
        $cliente->ciudad = $request->input('ciudad',200);
        $cliente->estado = $request->input('estado',200);
        $cliente->cp = $request->integer('cp',10);
        $cliente->estadoC=1;
        $cliente->save();
        return redirect()->route('clientes.index')->with(array(
            'message' => 'El cliente se ha guardado correctamente'
        ));
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
    public function edit(string $id){
        //Abrir el formulario para editar un registro
        $cliente = Cliente::findOrFail($id);
        return view('cliente.edit', array(
            'cliente'=>$cliente
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        //Guarda un registro modificado
        //Guarda la información del formulario de edición
        $this->validate($request, [
        'nombre' => 'required|min:5',
        'apellidos' => 'required',
        'correo' => 'required'
        ]);
            $cliente = Cliente::findOrFail($id);
            $cliente->nombre = $request->input('nombre');
            $cliente->apellidos = $request->input('apellidos');
            $cliente->correo = $request->input('correo');
            $cliente->telefono = $request->input('telefono',200);
            $cliente->calle = $request->input('calle',200);
            $cliente->ciudad = $request->input('ciudad',200);
            $cliente->estado = $request->input('estado',200);
            $cliente->cp = $request->integer('cp',10);
            $cliente->estadoC=1;
            $cliente->save();
            return redirect()->route('clientes.index')->with(array(
            'message' => 'El cliente se ha actualizado correctamente'
            ));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteCliente($id){
        $cliente = Cliente::find($id);
        if($cliente){
            $cliente->estadoC = 0;
            $cliente->update();
            return redirect()->route('clientes.index')->with(array(
                "message" => "El cliente se ha eliminado correctamente"));
        }else{
            return redirect()->route('clientes.index')->with(array(
                "message" => "El cliente que trata de eliminar no existe"));
        } //Fin del IF
     }

     public function imprimirCli(){
        //$pdf = \PDF::loadView('ejemplo');
        //return $pdf->download('ejemplo.pdf');
    
        $clientes = Cliente::where('estadoC', '=', 1)->get();
        $pdf = \PDF::loadView('ejemploCli', compact('clientes'));
        return $pdf->download('listaClientes.pdf');
        }

}
