<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Models\Proveedore;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $proveedores = Proveedore::all();
        return view('proveedor.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Proveedor.create');
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
                    'nombre' => 'required',
        ]);

        if(!$validator->fails()){
            $proveedor=new Proveedore;
            $proveedor->nombre=$request->nombre;
            $proveedor->save();
            if($proveedor){
                Alert::success('Proveedor creado Correctamente');
                return redirect()->route('proveedor.index');
            }else{
                Alert::error('Algo a salido mal');
                return redirect()->route('proveedor.create');
            }
        }else{
            Alert::error('Falta un campo');
            return redirect()->route('proveedor.create');
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
        $proveedor = Proveedore::find($id);

        return view('Proveedor.edit', compact('proveedor'));
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
                    'nombre' => 'required',
        ]);

        if(!$validator->fails()){
            $proveedor = Proveedore::find($id);
            $proveedor->nombre=$request->nombre;
            $proveedor->save();
            if($proveedor){
                Alert::success('Proveedor Actualizado Correctamente');
                return redirect()->route('proveedor.index');
            }else{
                Alert::error('Algo a salido mal');
                return redirect()->route('proveedor.edit');
            }
        }else{
            Alert::error('Falta un campo');
            return redirect()->route('proveedor.edit');
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
        $proveedor = Proveedore::findOrfail($id);
        $proveedor->delete();
        Alert::warning('Proveedor Elimindado Correctamente');
        return redirect()->route('proveedor.index');

    }
}
