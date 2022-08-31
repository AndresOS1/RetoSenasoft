<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Models\Proveedore;
use App\Models\Articulo;


class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulo::all();
        $provedor = Provedore::all();


        return view('articulo.index', compact('articulos', 'provedor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provedor = Provedore::all();
        return view('articulo.create', compact('provedor'));
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
                    'proveedor_id'  => 'required',
                    'existencias'   => 'required',
                    'precio'        => 'required',
                    'descripcion'   => 'required',
        ]);

        if(!$validator->fails()){
            $articulo= new Articulo;
            $articulo->proveedor_id = $request->proveedor_id;
            $articulo->existencias  = $request->existencias;    
            $articulo->precio       = $request->precio;
            $articulo->descripcion  = $request->descripcion;
            $articulo->save();
            if($articulo){
                Alert::success('Articulo creado Correctamente');
                return redirect()->route('articulo.index');
            }else{
                Alert::error('Algo a salido mal');
                return redirect()->route('articulo.create');
            }
        }else{
            Alert::error('Falta un campo');
            return redirect()->route('articulo.create');
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
        $articulo = Articulo::find($id);
        $provedor = Proveedor::all();

        return view('articulo.edit', compact('articulo', 'provedor'));
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
                    'proveedor_id'  => 'required',
                    'existencias'   => 'required',
                    'precio'        => 'required',
                    'descripcion'   => 'required',
        ]);

        if(!$validator->fails()){
            $articulo = Articulo::find($id);
            $articulo->proveedor_id = $request->proveedor_id;
            $articulo->existencias  = $request->existencias;    
            $articulo->precio       = $request->precio;
            $articulo->descripcion  = $request->descripcion;
            $articulo->save();
            if($articulo){
                Alert::success('Articulo actualiado Correctamente');
                return redirect()->route('articulo.index');
            }else{
                Alert::error('Algo a salido mal');
                return redirect()->route('articulo.edit');
            }
        }else{
            Alert::error('Falta un campo');
            return redirect()->route('articulo.edit');
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
        $articulo = Articulo::find($id);
        $articulo->delete();
        Alert::warning('Articulo Elimindado Correctamente');
        return redirect()->route('articulo.index');
    }
}
