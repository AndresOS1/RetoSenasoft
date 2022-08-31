@extends('layouts.dashboard')
@section('content')
@include('sweetalert::alert')

<div class="col-12 justify-content-center d-flex">
  <a href="{{route('proveedor.create')}}">crear</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">nombre del proveedor</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($proveedores as $p)
            <tr>
                <th scope="row">{{$p->id_proveedor}}</th>
                <td>{{$p->nombre}}</td>
              </tr>
            @endforeach


        </tbody>
      </table>
</div>
@endsection