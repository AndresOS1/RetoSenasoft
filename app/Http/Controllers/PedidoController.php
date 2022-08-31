<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Models\Proveedore;
use App\Models\Articulo;
use App\Models\User;
use App\Models\Pedido;



class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulo::all();
        $provedores = Provedore::all();
        $users = User::all();

        return view('pedido.index', compact('articulos', 'provedores', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articulos = Articulo::all();
        $provedores = Provedore::all();
        $users = User::all();

        return view('pedido.create', compact('articulos', 'provedores', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
         $validator = Validator::make($request->all(),[
                    'user_id'           => 'required',
                    'articulo_id'       => 'required',
                    'direccion_envio'   => 'required',
                    'fecha_pedido'      => 'required',
        ]);

        if(!$validator->fails()){
            $pedido= new Pedido;
            $pedido->user_id            = Auth()->user()->id;
            $pedido->articulo_id        = $request->existencias;    
            $pedido->direccion_envio    = $request->precio;
            $pedido->fecha_pedido       = $request->descripcion;
            $pedido->save();
            if($pedido){
                Alert::success('Pedido creado Correctamente');
                return redirect()->route('pedido.index');
            }else{
                Alert::error('Algo a salido mal');
                return redirect()->route('pedido.create');
            }
        }else{
            Alert::error('Falta un campo');
            return redirect()->route('pedido.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articulos = Articulo::all();
        $provedores = Provedore::all();
        $users = User::all();
        $pedido = Pedido::find($id);

        return view('pedido.edit', compact('articulos', 'provedores', 'users', 'pedido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
                    'user_id'           => 'required',
                    'articulo_id'       => 'required',
                    'direccion_envio'   => 'required',
                    'fecha_pedido'      => 'required',
        ]);

        if(!$validator->fails()){
            $pedido=  Pedido::find($id);
            $pedido->user_id            = Auth()->user()->id;
            $pedido->articulo_id        = $request->existencias;    
            $pedido->direccion_envio    = $request->precio;
            $pedido->fecha_pedido       = $request->descripcion;
            $pedido->save();
            if($pedido){
                Alert::success('Pedido actualizado Correctamente');
                return redirect()->route('pedido.index');
            }else{
                Alert::error('Algo a salido mal');
                return redirect()->route('pedido.edit');
            }
        }else{
            Alert::error('Falta un campo');
            return redirect()->route('pedido.edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();
        Alert::warning('Pedido Elimindado Correctamente');
        return redirect()->route('pedido.index');
        
    }
}
